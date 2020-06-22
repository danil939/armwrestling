<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $website_title = 'Контакты';
    require 'blocks/head.php';
  ?>
</head>
<body >
  <?php require 'blocks/header.php'; ?>

 
  <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            <form action="#" class="p-5 bg-white">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label for="username">Имя</label>
                  <input type="text" id="username" name="username" class="form-control" >
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label  for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" >
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Сообщение</label> 
                  <textarea name="mess" id="mess" class="form-control"></textarea>
                </div>
              </div>
              
              <div class="alert alert-danger mt-2" id="errorBlock"></div>

              <div class="row form-group">
              <button class="btn_1 btn_2" type="button" id="mess_send"> Отправить сообщение</button>
            
              </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Контактная информация</h3>
              <p class="mb-0 font-weight-bold">Адресс:</p>
              <p class="mb-4">Удмуртская республика, г. Ижевск, ул. Студенческая, д.46</p>

              <p class="mb-0 font-weight-bold">Контакты:</p>
              <p class="mb-4"><a href="#">+7 951 196 52 87</a></p>

              <p class="mb-0 font-weight-bold">Почтовый адрес:</p>
              <p class="mb-0"><a href="#">Neodimm891@mail.ru</a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Дополнительная информация</h3>
              <p>Чирков Даниил...</p>
            </div>
          </div>
        </div>
      </div>
    </div>


  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#mess_send').click(function () {
      var name = $('#username').val();
      var email = $('#email').val();
      var mess = $('#mess').val();

      $.ajax({
        url: 'ajax/mail.php',
        type: 'POST',
        cache: false,
        data: {'username' : name, 'email' : email, 'mess' : mess},
        dataType: 'html',
        success: function(data) {
          if(data == 'Готово') {
            $('#mess_send').text('Все готово');
            $('#errorBlock').hide();
            $('#username').val("");
            $('#email').val("");
            $('#mess').val("");
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
