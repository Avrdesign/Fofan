<div class="container">
    <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Авторизация</h2>
        <label for="inputEmail" class="sr-only">Имя</label>
        <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Имя">
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" name ="password" id="inputPassword" class="form-control" placeholder="Пароль">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <div class="marginTop20PX alert alert-danger alert-dismissible <?php echo $access["message"] ? '': 'hidden';?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Ошибка!</strong> Не правильно ввели имя или пароль.
        </div>
    </form>
</div> <!-- /container -->