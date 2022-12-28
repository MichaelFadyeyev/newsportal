<div>
    <h2>Додавання новини</h2>
    <hr>
    <form id="form3" action="index.php?id=news_add_handler" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="about">Опис:</label>
            <textarea id="about" name="about" class="form-control" rows="7" required></textarea>
        </div>
        <div class="form-group">
            <label for="details">Подробиці:</label>
            <textarea id="details" name="details" class="form-control" rows="7" required></textarea>
        </div>
        <div class="form-group">
            <label for="photo">Фото:</label>
            <input type="file" id="photo" name="photo" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="source">Джерело:</label>
            <input type="url" id="source" name="source" class="form-control" required />
        </div>
        <div class="form-group text-center">
            <input type="submit" value="Відправити" class="btn btn-success my-btn">
            <input type="submit" value="Відмінити" class="btn btn-danger my-btn">
        </div>
    </form>
</div>