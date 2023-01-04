<div>
    <h2>Звіт про реєстрацію</h2>
    <?php
    $login = $_POST['login'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $email = $_POST['email'];

    // 1. data validation on server side
    $errors = [];
    $pattern1 = '/^[a-zA-Z][a-zA-Z0-9_]{5,15}$/';
    $pattern2 = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_]{6,}$/';
    $pattern3 = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    
    
    // 2. Створення екземпляру классу сервісу
    require('system/services/users_service.php');
    $service = new UsersService();

    // 3. Перевірка введених даних на помилки
    if (!preg_match($pattern1, $login)) {
        $errors[] = 'Логін не відповідає шаблону безпеки';
    }
    if (!preg_match($pattern2, $pass1)) {
        $errors[] = 'Пароль не відповідає шаблону безпеки';
    }
    if ($pass1 !== $pass2) {
        $errors[] = 'Введені паролі не співпадають';
    }

    if (!preg_match($pattern3, $email)) {
        $errors[] = 'E-Mail не відповідає шаблону безпеки';
    }

    if (!$service->check_login_unique($login)){
        $errors[] = 'Логін вже використовується';
    }

    if (!$service->check_email_unique($email)){
        $errors[] = 'E-Mail вже використовується';
    }

    // 4. Підсумковий аналіз даних
    if (count($errors) > 0) {
        echo '<h5 style="color: red">';
        foreach ($errors as $err) {
            echo $err . '<br>';
        }
        echo '</h5>';
    } else {
        // 5. Сценарій реєстрції користувача
        try {
            $passw = md5($pass1);
            $regdate = date('Y-m-d H:i:s');
            $role_id = 3; // role_id для user
            $status_id = 3; // status_id для user
            $service->registry($login, $passw, $email, $regdate, $role_id, $status_id);
            echo '
            <h5 style="color: green">
                Реєстрація успішно завершена!
            </h5>';
        } catch (Exception $e) {
            echo "
            <h5 style=\"color: red\">
                В ході реєстрації трапились певні помилки:
                {$e->getMessage()}
            </h5>
            ";
        }
    }




    ?>
</div>