    <?php
    $uri = $_SERVER['REQUEST_URI'];
    $id = explode('news_id=', $uri)[1];
    require_once('system/services/news_service.php');
    $service = new NewsService();
    $news = $service->get_news_details($id);
    ?>
    <div>
        <h2><?= $news['title'] ?></h2>
        <table id="table2">
            <tr>
                <td class="td-mini">
                    <img src="<?= $news['photo'] ?>" alt="-" class="mini">
                </td>
                <td class="td-details" rowspan="4"><?= $news['details'] ?></td>
            </tr>
            <tr>
                <td>
                    <strong>Опис</strong>
                    <p><?= $news['about'] ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Опубліковано</strong>
                    <p><?= $news['publish'] ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Джерело</strong>
                    <p><?= $news['source'] ?></p>
                </td>
            </tr>
        </table>
    </div>

