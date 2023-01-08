    <?php
    $uri = $_SERVER['REQUEST_URI'];

    //get news id from URI
    $id = explode('news_id=', $uri)[1];
    require_once('system/services/news_service.php');
    $service = new NewsService();
    $news = $service->get_news_details($id);
    ?>
    <div>
        <h2><?= $news['title'] ?></h2>
        <!--  -->
        <div class="container">
            <div class="row no-padding">
                <div class="container" id="form5">
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
                                <?php if ($this->user['role_id'] == 1) : ?>
                                    <a href="index.php?id=news_edit&news_id=<?= $id ?>" class="btn btn-success my-btn">Редагувати</a>
                                <?php endif; ?>
                                <a href="index.php?id=news" class="btn btn-secondary my-btn">Повернутися</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>