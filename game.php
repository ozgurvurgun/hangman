<?php
session_start();

if ($_SESSION["word"] == null) {
  echo "<script>alert('Kelime belirlemediniz. Kelime oluşturma sayfasına yönlendiriliyorsunuz.');</script>";
  echo '<script>window.location.href = "word.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="google-site-verification" content="OjEh7WK4lQjpnG7YCYNG3k6TyDBsmunvKRvfOLHDVQY" />
  <meta name="google" content="sitelinkssearchbox" />
  <meta name="googlebot" content="index, follow" />
  <meta name="robots" content="index,follow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/eb7367d676.js" crossorigin="anonymous"></script>
  <title>Hanged Man</title>
</head>

<body style="font-family:  'Raleway', sans-serif;padding-top:5px">
  <section class="p-5 text-center homepage">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="mb-4">
            <label for="input_password" class="form-label"><b>Oyun Kurucu Şifresi</b></label>
            <input type="text" class="form-control" id="input_password" placeholder="">
          </div>
          <div class="mb-3">
            <button class="btn btn-success btn-lg mb-5" onclick="get_passw();">Kelimeyi Hatırla</button>
          </div>
        </div>
      </div>
  </section>

  <script>
    var word = "<?= $_SESSION["word"] ?>";

    function get_passw() {
      var get_psw = "<?= $_SESSION["password"] ?>";
      var input_psw = document.getElementById("input_password").value;
      if (input_psw == get_psw) {
        alert("Kelime: " + word);
      } else {
        alert("Şifreyi Hatalı Girdin.");
      }
    }
  </script>
  <script>
  </script>
  <section class="p-5 text-center homepage">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <?php
          $word = $_SESSION["word"];
          $str_word = str_split($word);
          for ($i = 0; $i < count($str_word); $i++) {
            echo '<input type="text" class="form-control" id="' . $i . '">';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="p-1 text-center homepage">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="mb-3">
            <button class="btn btn-success btn-lg mb-5" onclick="answer();">Cevapla</button>
          </div>
        </div>
      </div>
  </section>
  <script>
     <?php
      if (isset($_SESSION["can"])) {
        $life = $_SESSION["can"];
      } else {
        $life = 10;
      }
      ?>
    function answer() {
      var i, split_word, js_new_Life, jslife, php_output_hata_onleyici;
      split_word = word.split("");
      jslife = <?= $life ?>;
      for (i = 0; i < split_word.length; i++) {
        if (document.getElementById(i).value == split_word[i]) {
          document.getElementById(i).style.backgroundColor = "green";

        } else if (document.getElementById(i).value == "") {
          document.getElementById(i).style.backgroundColor = "white";
        } else {
          document.getElementById(i).style.backgroundColor = "red";
          <?php $new_life = $life - 1; ?>
          <?php $_SESSION["can"] = $new_life; ?>   //5,6 saat sonra: ben karar mekanizmalarına php gömüyorum ama san ki if else leri php sallamıyor galiba

          js_new_Life = jslife - 1; //gozlemledğim kadarı ile html olarak basılmayan değerler js tarafından algılanmıyor. O yüzden php değerlerini bastırıp js değişkenlerine atıyorum.

        }
      }
      alert("kalan can : " + <?= $life ?>);

     
    }
    <?php 
     if ($new_life <= 0) {
      echo' alert("Oyun Bitti Başaramadın. Aradığın kelime : " + word + " idi.")';
      unset($_SESSION["can"]);
    }
    ?>
  </script>






  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>