<?php
    require_once "config.php";

    if (!empty($_POST)) {
        $stmt = mysqli_prepare($link, "INSERT INTO news VALUES (null, ?, ?, null,?)");
        mysqli_stmt_bind_param($stmt, 'sss', $title, $newsText, $imgLink);

        $title = $_POST["titleInput"];
        $newsText = $_POST["newsText"];
        $imgLink = "img.img";

        mysqli_stmt_execute($stmt);

        printf("строк добавлено: %d.\n", mysqli_stmt_affected_rows($stmt));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>админка</title>
</head>
<body>
<div class="container-md">
<form action="addNews.php" method="POST">
  <div class="mb-3">
    <label for="titleInput" class="form-label">Заголовок</label>
    <input name="titleInput" type="text" class="form-control" id="titleInput" aria-describedby="titleInputHelp">
    <div id="titleInputHelp" class="form-text">Напишите заголовок новости.</div>
  </div>
  <div class="mb-3">
    <label for="newsText" class="form-label">Текст новости</label>
    <textarea name="newsText" rows="5" class="form-control" id="newsText" aria-describedby="newsInputHelp"> </textarea>
    <div id="newsInputHelp" class="form-text">Напишите текст новости.</div>
  </div>
  <div class="mb-3">
    <label for="newsImage">Прикрепите изображение</label>
    <input type="file" class="form-control-file" id="newsImage">
  </div>
<button type="submit" class="btn btn-primary">Опубликовать</button>
</form>
</div>
</body>
</html>