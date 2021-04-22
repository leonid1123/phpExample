<?php
    session_start();
    if((!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) ?? $_SESSION["username"]=="leonid112"){
        header("location: login.php");
        exit;
    }
    require_once "config.php";

    if (!empty($_POST)) {
        $msg="";
        $stmt = mysqli_prepare($link, "INSERT INTO news VALUES (null, ?, ?, null,?)");
        mysqli_stmt_bind_param($stmt, 'sss', $title, $newsText, $imgLink);

        $uploaddir = 'img/';
        $uploadfile = $uploaddir . basename($_FILES['newsImage']['name']);

        if (move_uploaded_file($_FILES['newsImage']['tmp_name'], $uploadfile)) {
            $msg =  "Файл корректен и был успешно загружен.\n";
        } else {
            $msg =  "Возможная атака с помощью файловой загрузки!\n";
        }

        $title = $_POST["titleInput"];
        $newsText = $_POST["newsText"];
        $imgLink = $_FILES['newsImage']['name'];

        mysqli_stmt_execute($stmt);

        //printf("строк добавлено: %d.\n", mysqli_stmt_affected_rows($stmt));
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
<h1>Форма добавления новостей <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
<form enctype="multipart/form-data" action="addNews.php" method="POST">
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
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <label for="newsImage">Прикрепите изображение</label>
    <input name="newsImage" type="file" class="form-control-file" id="newsImage">
  </div>
<button type="submit" class="btn btn-primary">Опубликовать</button>
</form>

<?php
if (empty($msg)) {
    $show = "visually-hidden";
} else {
    $show = "";
}
?>

<div class="<?php echo $show;  ?> alert alert-primary" role="alert">
  <?php
  if (!empty($msg)) {
    echo $msg;
  }
  ?>
</div>

</div>


</body>
</html>