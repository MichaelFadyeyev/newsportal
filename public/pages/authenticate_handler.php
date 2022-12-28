<?php
if (isset($_POST['reset'])) {
    unset($_SESSION['login']);
    unset($_SESSION['pass1']);
    unset($_SESSION['message']);
    header('Location: index.php?id=entry', true);
} else {

    echo '<div>
        <h2>Вхід до порталу</h2>';

$login = $_POST['login'];
$pass1 = $_POST['pass1'];

$errors = [];

require('system/services/users_service.php');
$services = new UsersService();

if (count($errors) > 0) {
    echo '<h5 style=color: "red">';
    foreach ($errors as $err) {
        echo $err . '<br>';
    }
    echo '</h5>';
} else {
    try {
        $passw = md5($pass1);
        $response = $services->authenticate($login, $passw);
        if ($response !== 0) {
            $_SESSION['user'] = $response;
            header('Location: index.php?id=main');
            exit();
        } else {
            $_SESSION['message'] = 'Користувача з даним логіном / паролем не знайдено';
            header('Location: index.php?id=entry');
        }
    } catch (Exception $e) {
        echo "
        <h5 style=\"color: red\">
            Під час входу трапились певні помилки:
            {$e->getMessage()}
        </h5>
        ";
    }
}
echo '</div>';
}
