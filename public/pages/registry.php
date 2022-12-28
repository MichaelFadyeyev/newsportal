<div>
    <h2>Реєстрація</h2>
    <form id="form1" action="index.php?id=registry_handler" method="post">
        <div class="form-group">
            <label for="login">Логін</label>
            <input type="text" name="login" id="login" class="form-control" requared>
            <span id="login_err" class="error text-danger"></span>
        </div>
        <div class="form-group">
            <label for="pass1">Пароль</label>
            <input type="password" name="pass1" id="pass1" class="form-control" requared>
            <span id="pass1_err" class="error text-danger"></span>
        </div>
        <div class="form-group">
            <label for="pass2">Підтвердження пароль</label>
            <input type="password" name="pass2" id="pass2" class="form-control" requared>
            <span id="pass2_err" class="error text-danger"></span>
        </div>
        <div class="form-group">
            <label for="email">Підтвердження пароль</label>
            <input type="email" name="email" id="email" class="form-control" requared>
            <span id="email_err" class="error text-danger"></span>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-success my-btn" value="Відправити">
            <input type="reset" name="reset" id="reset" class="btn btn-danger my-btn" value="Очистити">
        </div>
    </form>
    <!--  -->
    <small style="color: silver">Superuser 4SuperuseR2</small>
    <!--  -->
</div>