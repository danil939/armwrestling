<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    $website_title = 'Новости';
    require 'blocks/head.php';
  ?>
</head>

<body>
  <?php require 'blocks/header.php'; ?>


  <div class="site-section">

    <div class="row container mx-auto">

        <div class="col-md-9">
          <?php
              require_once 'mysql_connect.php';

              $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
              $query = $pdo->query($sql);
              while($row = $query->fetch(PDO::FETCH_OBJ)) {

                echo "
                <div class='row mb-3'>
                  <div class='col-md-5'>
                    <a href='/news.php?id=$row->id'>
                      <img class='img-fluid rounded mb-3 mb-md-0'src='img/$row->img' alt=''>
                    </a>
                  </div>
                  <div class='col-md-7'>
                    <h3> $row->title </h3>
                    <b>Автор статьи:</b> <mark>$row->avtor</mark>
                    <p> $row->intro </p>
                    <a href='/news.php?id=$row->id' title='$row->title'>
                        <button class='btn_1 btn_2 ml-0 mb-2 mt-3'>Прочитать больше</button>
                    </a>  
                    <br/>
                  
                  </div>
              </div> "
              ;     
              }
            ?>
        </div>

        <div class="col-md-3">
            <?php include_once 'blocks/aside.php'; ?>
        </div>

    </div>
</div>
 

  <div class="row">
    <div class="col-md-12 text-center">
      <div class="site-block-27 mb-5">
        <ul>
          <li><a href="#">&lt;</a></li>
          <li class="active"><span>1</span></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&gt;</a></li>
        </ul>
      </div>
    </div>
  </div>






  <?php require 'blocks/footer.php'; ?>

  <!-- jQuery -->


</body>

</html>