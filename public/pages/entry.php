<div>
    <h2>Вхід</h2>
    <form id="form1" action="index.php?id=authenticate_handler" method="post">
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
        <div class="form-group control-group">
            <input type="submit" name="submit" id="submit" class="btn btn-success my-btn" value="Відправити">
            <input type="reset" name="reset" id="reset" class="btn btn-danger my-btn" value="Очистити">
        </div>
        <?php
        if (isset($_SESSION['message'])) {
            echo '
            <div class="form-group">
                <textarea name="msg" id="msg" class="form-control auth-warning" rows="2" disabled>'
                . $_SESSION['message'] .
                '</textarea>
            </div>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
    <!--  -->
    <small style="color: silver">Superuser 4SuperuseR2</small>
    <!--  -->
</div>