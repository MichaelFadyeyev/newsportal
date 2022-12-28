<div>
    <h2>Звіт про додавання новини</h2>
    <hr>
    <?php
    try {
        $title = $_POST['title'];
        $about = $_POST['about'];
        $details = $_POST['details'];
        $source = $_POST['source'];
        $publish = date('Y-m-d H:i:s');
        $photo = "public/files/{$_FILES['photo']['name']}";

        $type = $_FILES['photo']['type'];

        if (
            $type !== 'image/png' &&
            $type !== 'image/jpeg' &&
            $type !== 'image/bmp'
        ) {
            throw new Exception('Файл не є графічним');
        }

        $size = $_FILES['photo']['size'];
        if ($size > 10 * 1024 * 1024) {
            throw new Exception('Розмір файлу перевищує 10 Мб');
        }

        if (file_exists($photo)) {
            throw new Exception('Такий файл вже існує на сервері');
        } else {
            if (!copy($_FILES['photo']['tmp_name'], $photo)) {
                throw new Exception('Не вдалося завантажити файл на сервер');
            }
        }

        require_once('system/services/news_service.php');
        $service = new NewsService();
        $service->add_news($title, $about, $details, $photo, $source, $publish);

        echo "
        <h5 style=\"color: green\">
            Новина успішно додана в базу даних
        </h5>
        <a href=\"index.php?id=news\">До списку новин</a>
        ";
    } catch (Exception $e) {
        echo "
        <h5 style=\"color: red\">
            В ході додавання новини щось пішло не так: 
            {$e->getMessage()}
        </h5>
        ";
    }
    ?>
</div>