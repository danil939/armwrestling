<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Авторизация';
    require 'blocks/head.php';
  ?>
</head>
<body >
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-12 mb-5">
        <?php
          if($_COOKIE['login'] == ''):
        ?>
        <h3 class="text-center">Авторизация</h3>
        <form class="decor d-flex justify-content-center" action="" method="post">
          
        <div class="form-left-decoration"></div>
        <div class="form-right-decoration"></div>
        <div class="circle"></div>
        <div class="form-inner">
          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" id="errorBlock"></div>

          <button type="button" id="auth_user" class="btn_1 btn_2 ml-0 mt-3">
            Войти
          </button>
          </div>
        </form>
        <?php
          else:
        ?>
        <h2> Привет: <?=$_COOKIE['login']?></h2>
        <button class="btn_1 btn_2 m-0" id="exit_btn">Выйти</button>
        <?php
          endif;
        ?>
      </div>

    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#exit_btn').click(function () {
      $.ajax({
        url: 'ajax/exit.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function(data) {
          document.location.reload(true);
        }
      });
    });

    $('#auth_user').click(function () {
      var login = $('#login').val();
      var pass = $('#pass').val();

      $.ajax({
        url: 'ajax/auth.php',
        type: 'POST',
        cache: false,
        data: {'login' : login, 'pass' : pass},
        dataType: 'html',
        success: function(data) {
          if(data == 'Готово') {
            $('#auth_user').text('Готово');
            $('#errorBlock').hide();
            document.location.reload(true);
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
      });
    });
  </script>
   <!-- jQuery -->

</body>
</html>
