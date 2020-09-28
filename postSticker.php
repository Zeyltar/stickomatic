<?php 
  include('inc/header.inc.php');
  include('inc/data.inc.php');
?>
<body>
  <?php
    include('inc/navbar.inc.php');

    if (empty($_SESSION["userID"]) || empty($_SESSION["hash"]))
    {
      echo "Vous devez être connecté(e) pour consulter cette page.";
    }
    else { ?>
      <div class="container-fluid p-0">
        <hr class="m-0">
          <section class="resume-section p-3 p-lg-5 d-flex justify-content-center">
            <div class="w-100"> 
              <h2 class="mb-5">Poster un sticker</h2>
              <form method="POST" action="action/postSticker-action.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="images">Image</label>
                  <input type="file" class="form-control-file" id=images name="images[]" accept=".jpg,.jpeg,.png">
                </div>
                <button type="submit" class="btn btn-primary">Poster</button>
              </form>
            </div>
          </section>
        <hr class="m-0">  
      </div>
  <?php }
    include('inc/footer.inc.php'); ?>