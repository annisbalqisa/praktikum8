<?php

require_once 'db.php';

// get id ?? 1 and convert to int | prevert sql inject
$id = intval($_GET['id'] ?? 1);

// join table film and language
$sql = "SELECT film.*, language.name as language_film FROM film JOIN language ON (film.language_id = language.language_id) WHERE film.film_id = $id";

// get data from query
$row = $database->query($sql)->fetch_array();
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

<body>
    <div class="container">
      <div>
        <h1 class="text-dark text-center">DETAIL MOVIE</h1>
      </div>
      <div class="row mt-4">
          <div class="col justify-content-between">
              <div class="card mb-4">
                  <div class="card-header"></div>
                  <div class="card-body">
                      <div class="card mt-4 mb-4">
                          <div class="row g-0">
                              <div class="col-md-4">
                                  <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRnTnlyQqGAGDEDgqouPXXC27s3DTdAol5KEPJQCp9d5XkDeI_3"<?= $row['film_id'] ?>/400" class="img-fluid rounded-start">
                              </div>
                              <div class="col-md-8">
                                  <div class="card-body">
                                      <h3 class="card-title mb-2"><?= $row['title'] ?> (<?= $row['release_year'] ?>)</h3>
                                      <p class="card-text mt-2 mb-2">
                                          <span class="badge bg-light rounded-pill border border-dark text-dark me-2"><?= $row['rating'] ?></span>
                                          <?= $row['special_features'] ?> |
                                          <?= floor($row['length'] / 60) ? floor($row['length'] / 60) . "h " : '' ?>
                                          <?= ($row['length'] % 60) ? ($row['length'] % 60) . ' m' : '' ?>
                                      </p>
                                      <h4 class="mt-4">Overview</h4>
                                      <p class="card-text"><?= $row['description'] ?></p>
                                      <div class="row">
                                          <div class="col-sm-6 col-lg-4 col-xxl-3">
                                              <div class="mb-1"><strong>Language</strong></div>
                                              <div class="mb-2"><?= $row['language_film'] ?></div>
                                          </div>
                                          <div class="col-sm-6 col-lg-4 col-xxl-3">
                                              <div class="mb-1"><strong>Rental Duration</strong></div>
                                              <div class="mb-2"><?= $row['rental_duration'] ?> days</div>
                                          </div>
                                          <div class="col-sm-6 col-lg-4 col-xxl-3">
                                              <div class="mb-1"><strong>Rental Rate</strong></div>
                                              <div class="mb-2">$<?= $row['rental_rate'] ?></div>
                                          </div>
                                          <div class="col-sm-6 col-lg-4 col-xxl-3">
                                              <div class="mb-1"><strong>Replacement Cost</strong></div>
                                              <div class="mb-2">$<?= $row['replacement_cost'] ?></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              <!-- </div> -->
          </div>
          <div class="col-12">
              <div class="d-grid">
                  <a href="dekstop.php" class="btn btn-primary mb-3">Back</a>
              </div>
          </div>
      </div>
  </div>
</body>

</html>
