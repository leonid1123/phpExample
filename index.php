<?php
    require_once "config.php";
    $query = "SELECT title, newsText, date, imgLink FROM news ORDER BY date DESC";
    $result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Новости</title>
</head>
<body>
<div class="container-md">
<h1> Новости </h1>
<?php
while ($row = mysqli_fetch_assoc($result)) {
echo '<div class="card mb-3" style="max-width: 100%;">';
echo '<div class="row g-0">';
echo '<div class="col-md-3">';
echo '<img src="img/'.$row["imgLink"].'" alt="Fail">'; //<img src="img/file.ext">
echo '</div>';
echo '<div class="col-md-8">';
echo '<div class="card-body">';
echo '<h5 class="card-title">'.$row["title"].'</h5>';
echo '<p class="card-text">'.$row["newsText"].'</p>';
echo '<p class="card-text"><small class="text-muted">'.$row["date"].'</small></p>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}
?>
</div>
</body>
</html>