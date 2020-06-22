<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Регистрация ';
    require 'blocks/head.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-12 mb-5">
        <h3 class="text-center">Форма регистрации</h3>
        <form  class="decor d-flex justify-content-center" action="" method="post">
        <div class="form-left-decoration"></div>
        <div class="form-right-decoration"></div>
        <div class="circle"></div>
        <div class="form-inner">
          <label for="username">Ваше имя</label>
          <input type="text" name="username" id="username" class="form-control">

          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">

          <label for="login">Логин</label>
          <input type="text" name="login" id="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id="pass" class="form-control">

          <div class="alert alert-danger mt-2" id="errorBlock"></div>

          <button type="button" id="reg_user" class="btn_1 btn_2 mt-3 mx-auto">
            Зарегистрироваться
          </button>
          </div>
        </form>
      </div>


    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#reg_user').click(function () {
      var name = $('#username').val();
      var email = $('#email').val();
      var login = $('#login').val();
      var pass = $('#pass').val();

      $.ajax({
        url: 'ajax/reg.php',
        type: 'POST',
        cache: false,
        data: {'username' : name, 'email' : email, 'login' : login, 'pass' : pass},
        dataType: 'html',
        success: function(data) {
          if(data == 'Готово') {
            $('#reg_user').text('Все готово');
            $('#errorBlock').hide();
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
