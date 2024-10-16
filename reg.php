<?php
require_once('header.php');
?>
<div class="container px-4 px-lg-5">
    <h2 class="text-center">Регистрация</h2>
    <div class="col-md-6 mx-auto">
        <form action="php/regHandler.php" method="post">
            <div class="mb-3">
                <label for="">Имя</label>
                <input name="name" type="text" class="form-control" required placeholder="Имя">
            </div>
            <div class="mb-3">
                <label for="">E-mail</label>
                <input name="email" type="email" class="form-control" required placeholder="E-mail">
            </div>
            <div class="mb-3">
                <label for="">Пароль</label>
                <input name="pass" type="password" class="form-control" required placeholder="Пароль">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
<?php
require_once('footer.php');
?>
