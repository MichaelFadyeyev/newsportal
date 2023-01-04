<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php?id=main">NewsPortal</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?id=main">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?id=news">Новини</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?id=about">Про сайт</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?id=contacts">Контакти</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?id=#" style="margin-right: 100px">
                        Вітаємо Вас,
                        <span style="color: lime">
                            <?php print_r($this->user['login']) ?>
                        </span>
                        !
                    </a>
                </li>
                <?php if ($this->user['login'] === 'Гість') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=entry">Вхід</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=registry">Реєстрація</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=exit">Вихід</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=profile">Профіль</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>