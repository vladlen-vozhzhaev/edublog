<div class="container px-4 px-lg-5">
    <div class="row">
        <div class="col-sm-3 text-center">
            <img width="90%" src="..." alt="" id="userAvatar">
            <form action="/changeUserAvatar" enctype="multipart/form-data" method="post">
                <input type="file" name="avatar">
                <input type="submit" value="Загрузить">
            </form>
        </div>
        <div class="col-sm-9">
            <p><strong>ID:</strong> <span id="userId"></span></p>
            <p><strong>NAME: </strong><span id="userName"></span></p>
            <p><strong>EMAIL: </strong><span id="userEmail"></span></p>
        </div>
    </div>

</div>
<script>
    const userId = document.getElementById('userId');
    const userName = document.getElementById('userName');
    const userEmail = document.getElementById('userEmail');
    const userAvatar = document.getElementById('userAvatar');
    fetch('/getCurrentUserData')
        .then(response=>response.json()) // function(response){return response.json()}
        .then(result=>{
            console.log(result);
            userId.innerText = result.id;
            userName.innerText = result.name;
            userEmail.innerText = result.email;
            userAvatar.src = result.avatar;
        })
</script>