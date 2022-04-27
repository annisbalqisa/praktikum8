<?php

require_once 'db.php';

// select table
$sql = "SELECT * FROM film WHERE film_id <= 30 ORDER BY title ASC";
$result = $database->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>202410101045-Praktikum 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="custom.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <div>
  	<h1 class="text-dark text-center">MOVIE LIST</h1>
  </div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end me-lg-5 mb-lg-3">
  	<button class="btn btn-primary" type="button"><i class="fas fa-plus"></i> Create</button>
  </div>
  	<aside-dekstop>
  		<div class="card-dekstop mb-4">
  			<div class="card-header">
  				<i class="fas fa-sort-alpha-down"></i> Sorting
  			</div>
  			<div class="card-body">
  				<p class="card-text">Sort by Movie Title</p>
  				<select class="form-select" id="sort" aria-label="Default select example">
  					<option value="ASC">Sort by Name Ascending</option>
  					<option value="DESC">Sort by Name Descending</option>
  				</select>
  			</div>
  		</div>
  		<div class="card-dekstop">
  			<div class="card-header">
  				<i class="fas fa-filter"></i> Filters
  			</div>
  			<div class="card-body">
  				<p class="card-text">Filter by Movie Rating</p>
  				<select class="form-select mb-3" id="filter" aria-label="Default select example">
  					<option class="text-muted" selected>Movie Rating</option>
  					<?php
  					require_once 'db.php';
  					$query = mysqli_query($database, "SELECT DISTINCT rating FROM film");
  					while ($row = mysqli_fetch_object($query)) :
  					?>
  						<option value="<?= $row->rating; ?>"><?= $row->rating; ?></option>
  					<?php endwhile; ?>
  				</select>
  				<p class="card-text">Search by Movie Title</p>
  				<div class="input-group mb-3">
  					<input type="text" class="form-control" id="search" placeholder="Search title..." aria-label="Recipient's username" aria-describedby="button-addon2">
  					<button class="btn btn-primary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
  				</div>
  			</div>
  		</div>
  	</aside-dekstop>
    <div class="container-dekstop">
  		<div class="row" id="content">
        <?php
        require_once 'db.php';
        $query = mysqli_query($database, "SELECT * FROM film");
        while ($row = mysqli_fetch_object($query)) :
        ?>
          <div class="col-sm-3 mb-3">
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
        <?php endwhile; ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <script type="text/javascript">

      $(document).ready(function() {
        $('#search').on('keyup', function() {
          $.ajax({
            type: 'POST',
            url: 'search.php',
            data: {
              search: $(this).val()
            },
            cache: false,
            success: function(data) {
              $('#content').html(data);
            }
          });
        });

        $('#filter').on('change', function() {
          $.ajax({
            type: 'POST',
            url: 'filter.php',
            data: {
              filter: $(this).val()
            },
            cache: false,
            success: function(data) {
              $('#content').html(data);
            }
          });
        });

        $('#sort').on('change', function() {
          $.ajax({
            type: 'POST',
            url: 'sort.php',
            data: {
              sort: $(this).val()
            },
            cache: false,
            success: function(data) {
              $('#content').html(data);
            }
          });
        });
      });
    </script>
  </body>

  </html>
