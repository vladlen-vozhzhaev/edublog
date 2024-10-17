    <h2 class="text-center">Авторизация</h2>
    <div class="col-md-6 mx-auto">
        <form action="php/loginHandler.php" method="post">
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