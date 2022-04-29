<?php if (isset($_SESSION['username'])){ ?>
      <div class="mb-3" style="display: contents;
 width:20%; margin:50px; padding:20px;">
  <form action="upload.php" method="post" enctype="multipart/form-data">
  <h4 style="margin:20px;">Kép feltöltése:</h4>
  <div class="input-group"style="margin-bottom:30px;">
  <input  type="file" class="form-control" name="fileToUpload" id="fileToUpload" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
  <input class="btn btn-outline-secondary" type="submit" value="Feltöltés" name="submit">
</div>
</form>
</div>

<?php } else { echo "<h3 style='margin:20px;'>Feltöltéshez be kell jelentkezned!</h3>"; } ?>
         
         <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
              <div class="carousel-item active">
                  <img class="d-block w-100" src="img/1.jpg" alt="First slide">
              </div>
                <?php
                $dir = 'upload/';
                $file_list = array_diff(scandir($dir), array('..', '.'));

                foreach($file_list as $item)
                {
                    echo '<div class="carousel-item">';
                    echo '<img class="d-block w-100" src="upload/' . $item . '">';
                    echo '</div>';
                }
                ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>

