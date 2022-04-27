<?php
    if (isset($_POST['filter'])):
        require_once 'db.php';
        $filter = $_POST['filter'];

        $query = mysqli_query($database, "SELECT * FROM film WHERE rating ='" . $filter . "'");
        while ($row = mysqli_fetch_object($query)):
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
