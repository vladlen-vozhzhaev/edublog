<?php
session_start();
require_once('php/simple_html_dom.php');
$dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$content = "";
if($uri == '/'){
    $content = file_get_contents('mainPage.html');
}
elseif($uri == '/login'){
    $content =  file_get_contents('login.php');
}elseif ($uri == '/reg'){
    $content =  "Страница регистрации";
}elseif($uri == '/profile'){
    $content = file_get_contents('profile.php');
}elseif ($uri == '/getCurrentUserData'){
    $user = [
        'id'=>$_SESSION['id'],
        'name'=>$_SESSION['name'],
        'email'=>$_SESSION['email'],
        'avatar'=>$_SESSION['avatar']
    ];
    exit(json_encode($user));
}elseif ($uri == '/changeUserAvatar'){
    $path = "img/".time().basename($_FILES['avatar']['name']);
    if ($_FILES['avatar']['type'] == 'image/png'){
        move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
        $stmt = $dbh->prepare("UPDATE `users` SET `avatar`=:avatar WHERE id=:id");
        $stmt->execute(array(
            'avatar'=>'/'.$path,
            'id'=>$_SESSION['id'],
        ));
        $_SESSION['avatar'] = '/'.$path;
        header('Location: /profile');
    }else{
        exit('filetype error');
    }
}elseif ($uri == '/addArticle' and $method == 'GET'){
    $content = file_get_contents('addArticle.html');
}elseif($uri == '/addArticle' and $method == 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['id'];
    $html = str_get_html($content);
    $img = $html->find('img')[0];
    $src = $img->src;
    $meta = explode(',', $src)[0];
    $extension = explode(';',explode('/', $meta)[1])[0];
    $filename = microtime().'.'.$extension;
    $output_file = 'img/'.$filename;
    $base64 = explode(',', $src)[1];
    $ifp = fopen( $output_file, 'wb' );
    fwrite( $ifp, base64_decode( $base64 ) );
    fclose( $ifp );
    $img->src = '/'.$output_file;
    $stmt = $dbh->prepare("INSERT INTO articles (title, content, author_id) VALUES (:title, :content, :author_id)");
    $stmt->execute(array(
        'title'=>$title,
        'content'=>$html,
        'author_id'=>$author_id
    ));
    exit(json_encode(['result'=>'success']));
}elseif ($uri == '/getArticles'){
    $stmt = $dbh->query("SELECT * FROM articles");
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    exit(json_encode($articles));
}

require_once("template.php");