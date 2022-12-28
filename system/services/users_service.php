<?php

require_once('system/providers/db_provider.php');


class UsersService extends DbProvider {

    public function registry($login, $passw, $email, $regdate, $role_id, $status_id) {
        $query = 'insert into users (login, passw, email, regdate, role_id, status_id) ';
        $query .='values (?, ?, ?, ?, ?, ?)';
        $stmt = $this->_conn->prepare($query);
        $stmt->bind_param('ssssii', $login, $passw, $email, $regdate, $role_id, $status_id);
        if(!$stmt->execute()){
            throw new Exception('Помилка виконання запиту на додавання користувача');
        }
        $stmt->close();
    }

    public function check_login_unique($login) {
        // ...
        $query = 'select * from users where login = ?';
        $stmt = $this->_conn->prepare($query);
        $stmt->bind_param('s', $login);
        if(!$stmt->execute()){
            throw new Exception('Помилка входу');
        }

    }

    public function check_email_unique() {
        // ...
    }

    public function authenticate($login, $passw) {
        // ...
        $query = 'select * from users where login = ? and passw = ?';
        $stmt = $this->_conn->prepare($query);
        $stmt->bind_param('ss', $login, $passw);
        if(!$stmt->execute()){
            throw new Exception('Помилка входу');
        }
        $stmt->store_result();
        if($stmt->num_rows()>0){
            $stmt->close();
            return $login;
        }
        $stmt->close();
        return 0;

    }

}
