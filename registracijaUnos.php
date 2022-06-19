<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unosStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Registracija</title>
</head>
<body>
  <header>
    <nav id="myTopnav" class="topnav" >
        <div class="logo"><img src="slike/BBC_logo_black_background.png" alt="slika"></div>
  
        <a href="index.php">Home</a>
        <a href="kategorija.php?id=KULTURA">Kultura</a>
        <a href="kategorija.php?id=SPORT">Sport</a>
        <a href="<?php 
            session_start();
            if(isset($_SESSION['username'])){
              if($_SESSION['username'] == 'admin'){
                echo "administracija.php";
            }else{
              echo "user.php";
            }
            }else{
                echo "login.php";
            }
            ?>">Administracija</a>
        <a href="unos.php">Unos</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </nav>
  </header>
<body>
    <main>
        <section>
        <?php
        include 'connect.php';

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0;
        $registriranKorisnik = '';
        $sql = "SELECT korisnickoIme FROM korisnik WHERE korisnickoIme = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        }
        if(mysqli_stmt_num_rows($stmt) > 0){
        $msg='Korisničko ime već postoji!';
        echo '<p style="padding:25px;">' . $msg . '</p>';
        }else{
        $sql = "INSERT INTO korisnik (ime, prezime,korisnickoIme, lozinka,
        razina)VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username,
        $hashed_password, $razina);
        mysqli_stmt_execute($stmt);
        $registriranKorisnik = true;
        echo '<p style="padding:25px;">' . 'Uspješno registriran korisnik!' . '</p>';
        }
        }
        mysqli_close($dbc);
        ?>
        </section>
    </main>
    <script>
        function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
        }
    </script>
</body>
</html>


