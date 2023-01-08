<div>
    <h2>Звіт про редагування новини</h2>
    <hr>
    <?php
    try {
        $id = $_POST['id'];
        $stored_photo = $_POST['photo']; // to compare with exitsting full file name

        $title = $_POST['title'];
        $about = $_POST['about'];
        $details = $_POST['details'];
        $source = $_POST['source'];
        $publish = date('Y-m-d H:i:s');
        $photo = "public/files/{$_FILES['photo']['name']}";

        if ($photo !== 'public/files/' && $stored_photo !== $photo) {

            // if new file was attached - check it and define full file name
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
                // try to copy new file
                if (!copy($_FILES['photo']['tmp_name'], $photo)) {
                    throw new Exception('Не вдалося завантажити файл на сервер');
                }
                // try to delete previouse file
                if (!unlink($stored_photo)) {
                    throw new Exception('Не вдалося видалити попередню версію файлу');
                }
            }
        } else {
            // if file was not changed - use existing full file name
            $photo = $stored_photo;
        }

        require_once('system/services/news_service.php');
        $service = new NewsService();
        $service->edit_news($id, $title, $about, $details, $photo, $source, $publish);

        echo "
            <h5 style=\"color: green\">
                Новина успішно відредагована
            </h5>
            <a href=\"index.php?id=news\">До списку новин</a>
            ";
    } catch (Exception $e) {
        echo "
            <h5 style=\"color: red\">
                В ході редагування новини щось пішло не так: 
                {$e->getMessage()}
            </h5>
            ";
    }
    ?>
</div>