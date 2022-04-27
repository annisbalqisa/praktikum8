<?php
if (isset($_POST['sort'])) :
    require_once 'db.php';
    $sort = $_POST['sort'];

    $query = mysqli_query($database, "SELECT * FROM film ORDER BY title " . $sort . "");
    while ($row = mysqli_fetch_object($query)) :
?>
    <div class="col-sm-auto mt-3">
      <div class="card" style="width: 15rem">
        <a href="index.php">
          <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRnTnlyQqGAGDEDgqouPXXC27s3DTdAol5KEPJQCp9d5XkDeI_3" class="card-img-top" alt="" />
        </a>
        <div class="card-body">
          <h5 class="card-title"><?= $row->title; ?></h5>
          <div class="card-title text-secondary"><?= $row->release_year; ?></div>
              <p class="card-text">Rating: <?= $row->rating; ?></p>
              <a href="#" class="btn btn-outline-primary btn-sm float-end ms-1"><i class="bi bi-pencil-square"></i></a>
              <a href="#" class="btn btn-outline-secondary btn-sm float-end "><i class="bi bi-trash3"></i></a>
          </div>
        </div>
      </div>

<?php
    endwhile;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>202410101045-Praktikum 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
