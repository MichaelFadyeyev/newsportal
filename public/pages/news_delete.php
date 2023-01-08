<?php
$uri = $_SERVER['REQUEST_URI'];

//get news id to attache to URI when call news_edit_handler.php
$id = explode('news_id=', $uri)[1];
require_once('system/services/news_service.php');
$service = new NewsService();
$news = $service->get_news_details($id);

//get full file name to attache to URI when call news_edit_handler.php
$photo = $news['photo'];
?>
<h2>Видалення новини: <?= $news['title'] ?></h2>

<form class="container" id="form5" action="index.php?id=news_delete_handler" method="post">
    <!-- to transfere id and full file name in POST -->
    <input type="hidden" id="id" name="id" value="<?=$id?>"/>
    <input type="hidden" id="photo" name="photo" value="<?=$photo?>"/>
    <!--  -->
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
    <div class="row no-padding">
        <div class="col">
            <div class="control-group text-center">
                <input type="submit" name="submit" value="Видалити" class="btn btn-danger my-btn">
                <a href="index.php?id=news" class="btn btn-secondary my-btn">Повернутися</a>
            </div>
        </div>
    </div>
</form>