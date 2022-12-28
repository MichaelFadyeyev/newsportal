<?php
$this->user='Гість';
unset($_SESSION['user']);
header('Location: index.php?id=main');
exit();