<div>
    <h2>Звіт про видалення новини</h2>
    <hr>
    <?php
    try {
        $id = $_POST['id'];
        $stored_photo = $_POST['photo'];

        require_once('system/services/news_service.php');
        $service = new NewsService();
        $service->delete_news($id);

        // try to delete photo file
        if (!unlink($stored_photo)) {
            throw new Exception('Не вдалося видалити фото');
        }
        echo "
            <h5 style=\"color: green\">
                Новина успішно видалена
            </h5>
            <a href=\"index.php?id=news\">До списку новин</a>
            ";
    } catch (Exception $e) {
        echo "
            <h5 style=\"color: red\">
                В ході видалення новини щось пішло не так: 
                {$e->getMessage()}
            </h5>
            ";
    }
    ?>
</div>