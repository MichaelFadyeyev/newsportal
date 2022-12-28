<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsPortal - <?=$this->title?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/styles/base.css">
    <link rel="icon" href="public/images/favicon.ico">
</head>
<body>
    <header>
        <?php include('public/fragments/nav.php'); ?>
    </header>
    <main>
        <?php include($this->content) ?>
    </main>
    <footer>
        <hr>
        <h6>
            Copyright: &copy; IT-Academy STEP - Ukraine, 2022
        </h6>
    </footer>
</body>
</html>