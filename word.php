<?php session_start() ?>
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
                    <form method="POST">
                        <div class="mb-4">
                            <label for="word" class="form-label"><b>Kelimeyi Gir</b></label>
                            <input style="text-align: center;" type="text" class="form-control" id="word" name="word" placeholder="" required>
                        </div>
                        <div class="mb-4">
                            <label for="clue" class="form-label"><b>Arayana kısa bir ipucu ver</b></label>
                            <input style="text-align: center;" type="text" class="form-control" id="clue" name="clue" placeholder="" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label"><b>Kelimeyi unutman durumunda sana kelimeyi hatırlatabilirim.<br>Bunun için bir oyun kurucu şifresi belirlemen gerek.<br>(Lütfen şifreyi unutma)</b></label>
                            <input style="text-align: center;" type="password" class="form-control" id="password" name="password" placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success btn-lg mb-5">Oyunu Alanına Git</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <?php
    if (isset($_POST["word"]) && isset($_POST["password"]) && isset($_POST["clue"])) {
        $_SESSION["word"] = $_POST["word"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["clue"] = $_POST["clue"];
        echo "<script>alert('Oyun Sayfasına Yönlendiriliyorsunuz. lütfen tamam butonuna basınız.');</script>";
        echo'<script>window.location.href = "game.php";</script>';
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>