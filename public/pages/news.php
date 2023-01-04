<?php
require_once('system/services/news_service.php');
$service = new NewsService();
$news = $service->get_news();
?>

<div>
    <h2>Новини</h2>
    <?php if ($this->user === 'Superuser') : ?>
        <a href="index.php?id=news_add">Додати новину</a>
    <?php endif; ?>
    <table id="table1">
        <thead>
            <tr>
                <th>Фото</th>
                <th>Заголовок</th>
                <th>Опис</th>
                <th>Публікація</th>
                <th>Джерело</th>
                <th>Управління</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($news as $row) : ?>
                <tr>
                    <td class="td-mini"><img src="<?= $row['photo'] ?>" alt="-" class="mini"></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['about'] ?></td>
                    <td><?= $row['publish'] ?></td>
                    <td><?= $row['source'] ?></td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary my-btn-sm">Деталі</a>
                        <?php if ($this->user['role_id'] == 1) : ?>
                            <a href="" class="btn btn-sm btn-success my-btn-sm">Змінити</a>
                            <a href="" class="btn btn-sm btn-danger my-btn-sm">Видалити</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>