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
<div>
    <h2>Редагування новини</h2>
    <hr>
    <form class="container" id="form4" action="index.php?id=news_edit_handler" method="post" enctype="multipart/form-data">
        <!-- to transfere id and full file name in POST -->
        <input type="hidden" id="id" name="id" value="<?= $id ?>" />
        <input type="hidden" id="photo" name="photo" value="<?= $photo ?>" />
        <!--  -->
        <div class="row no-padding">
            <div class="col-3 img-container">
                <img class="img-mini" src="<?= $news['photo'] ?>" alt="-">
            </div>
            <div class="col-1"></div>
            <div class="col-8">
                <div class="form-group">
                    <label for="title">Заголовок:</label>
                    <input type="text" id="title" name="title" class="form-control" value=<?= $news['title'] ?> required />
                </div>

                <div class="form-group">
                    <label for="source">Джерело:</label>
                    <input type="url" id="source" name="source" class="form-control" value=<?= $news['source'] ?> required />
                </div>
            </div>
        </div>
        <div class="row no-padding">
            <div class="col">
                <div class="form-group">
                    <label for="photo">Фото:</label>
                    <input type="file" id="photo" name="photo" class="form-control" value=<?= $news['photo'] ?> />
                </div>
                <div class="form-group">
                    <label for="about">Опис:</label>
                    <textarea id="about" name="about" class="form-control" rows="3" required><?= $news['about'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="details">Подробиці:</label>
                    <textarea id="details" name="details" class="form-control" rows="7" required><?= $news['details'] ?></textarea>
                </div>
                <div class="control-group text-center">
                    <input type="submit" name="submit" value="Відправити" class="btn btn-success my-btn">
                    <input type="reset" name="reset" value="Відмінити" class="btn btn-danger my-btn">
                    <a href="index.php?id=news" class="btn btn-secondary my-btn">Повернутися</a>
                </div>
            </div>
        </div>
    </form>
</div>
</div>