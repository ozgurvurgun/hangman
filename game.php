<?php
session_start();
//Kelime seçimi yapılmadan sayfaya girilemesin istiyorum
//$_SESSION["word"] verisi null durumda olursa sayfa word.php sayfasına yönlenecek
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
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-2 mx-auto">
          <div class="mb-4">
            <label for="input_password" class="form-label"><b>Oyun Kurucu Şifresi</b></label>
            <input type="password" class="form-control" id="input_password" placeholder="">
          </div>
          <div class="">
            <button class="btn btn-success btn-lg mb-2" onclick="get_passw();">Kelimeyi Hatırla</button>
          </div>
          <div class="">
            <button style="color: black;" class="btn btn-success btn-lg mb-3 bg-warning" onclick="keepPlaying();">Yeni Oyun</button>
          </div>
          <div class="mb-4">
            <label for="" class="form-label mb-3 text-danger"><h3>İpucu</h3></label>
            <h5><?=$_SESSION["clue"] ?></h5>
          </div>
        </div>
      </div>
  </section>

  <script>
    function keepPlaying(){
      window.location.href="again.php";
    }
    //php session da tutulan word verisini html olarak basıp değeri javascript e atıyorum.
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

  <section class="p-5 text-center homepage">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-4 mx-auto">
          <div class="">
            <img id="hanged.man" src="" alt="">
          </div>
        </div>
      </div>
  </section>

  <section class="p-5 text-center homepage">
    <div class="container mt-1">
      <div class="row">
        <div class="col-md-2 mx-auto">
          <?php
          //Kullanıcı kelime sayısı kadar deneme yapacak. Bu nedenle seçilen kelimeyi parçalayıp uzunluğu miktarında
          //döngü oluşturuyorum.
          //Her inputtan farklı kelime alınacağından ve bunların sınamaları yapılacağından benzersiz id leri olmalı o nedenle i değişkeninin değerini
          //id attribute une basıyorum. 
          $word = $_SESSION["word"];
          $str_word = str_split($word);
          for ($i = 0; $i < count($str_word); $i++) {
            echo '<input style="text-align: center;" type="text" class="form-control" id="' . $i . '">';
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class=" text-center homepage">
    <div class="container">
      <div class="row">
        <div class="col-md-2 mx-auto">
          <div class="mb-3">
            <button class="btn btn-success btn-lg mb-5" onclick="answer();">Cevapla</button>
          </div>
        </div>
      </div>
  </section>

  <script>
    var can = 10;

    function answer() {
      var i, split_word, js_new_Life, jslife, php_output_hata_onleyici = "";
      split_word = word.split("");
      var super_gamer = [];

      for (i = 0; i < split_word.length; i++) {
        super_gamer.push(String(document.getElementById(i).value)); //inpulardan gelen veriyi bir arrayda topluyorum.
      }

      //session verisini silmek için yönlendrime yaparken önce again.php ye gönderiyorum. Oradan word.php ye 


      for (i = 0; i < split_word.length; i++) { //dizi en optimal şekilde belirlenen kelimenin harf sayısı kadar dönüyor. ne eksik ne fazla.
        if (document.getElementById(i).value == split_word[i]) { //i değişkeni ile input id lerimin değerlerine ulaşıp sınamalarını yapıyorum.
          document.getElementById(i).style.backgroundColor = "green";
        } else if (document.getElementById(i).value == "") {
          document.getElementById(i).style.backgroundColor = "white";
        } else {
          document.getElementById(i).style.backgroundColor = "red";
          can -= 1;
        }
      }
      //inputlardan gelen dizide toplanmış veriyi tek parça string yapıyorum.
      if (super_gamer.join('') == word) { //Bu string kullanıcın başta belirlemiş olduğu word e eşitse oyunu kazanıyor ve yeni oyun için word.php sayfasına gidiyor. 
        alert("Kelimeyi buldun Mükemmelsin ❤️. Tamam butonuna bastıktan 7 saniye sonra kelime seçim sayfasına göndereceğim seni. Böylelikle yeni bir kelime seçip oyuna devam edebilirsin :)");
        setTimeout(function() {
          window.location.assign("again.php");
          //7 saniye sonra yönlenecek
        }, 7000);
      }

      //can değişkeninin durumuna göre hazırladığım birbirini takip eden görsellerim basılıyor.
      switch (can) {
        case 9:
          document.getElementById("hanged.man").src = "hanged_image/hanged1.png";
          break;
        case 8:
          document.getElementById("hanged.man").src = "hanged_image/hanged2.png";
          break;
        case 7:
          document.getElementById("hanged.man").src = "hanged_image/hanged3.png";
          break;
        case 6:
          document.getElementById("hanged.man").src = "hanged_image/hanged4.png";
          break;
        case 5:
          document.getElementById("hanged.man").src = "hanged_image/hanged5.png";
          break;
        case 4:
          document.getElementById("hanged.man").src = "hanged_image/hanged6.png";
          break;
        case 3:
          document.getElementById("hanged.man").src = "hanged_image/hanged7.png";
          break;
        case 2:
          document.getElementById("hanged.man").src = "hanged_image/hanged8.png";
          break;
        case 1:
          document.getElementById("hanged.man").src = "hanged_image/hanged9.png";
          break;
        case 0:
          document.getElementById("hanged.man").src = "hanged_image/hanged10.png";
          break;
        default:
          document.getElementById("hanged.man").src = "";
          break;
          break;
      }
      if (can <= 0) {
        alert('Üzgünüm adamı ipten kurtaramadın 😭 . Aradığın kelime : " ' + word + ' " idi. Tamam butonuna bastıktan sonra, 7 saniye içinde kelime seçim sayfasına gönderiyorum seni. Böylelikle yeni bir kelime seçip yeni oyunda adamı ipten kurtarabilirsin :)')
        setTimeout(function() {
          window.location.assign("again.php");
          //7 saniye sonra yönlenecek
        }, 7000);
      }
    }
  </script>






  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>