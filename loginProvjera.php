<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unosStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Log In Provjera</title>
</head>
<body>
  <header>
    <nav id="myTopnav" class="topnav" >
        <div class="logo"><img src="slike/BBC_logo_black_background.png" alt="slika"></div>
  
        <a href="index.php">Home</a>
        <a href="kategorija.php?id=KULTURA">Kultura</a>
        <a href="kategorija.php?id=SPORT">Sport</a>
        <a href="<?php 
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
    <br>
    <main>
        <section>
        <?php 
        include 'connect.php';

        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);

        $query = "SELECT * FROM korisnik WHERE korisnickoIme='$username'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result)>0) {
            if (password_verify($lozinka, $row['lozinka'])) {
                if ($row['razina'] == 1) {
                    session_start();
                    $_SESSION['username'] = 'admin';
                    echo '<a class="gumb" style="padding:14px 16px; text-decoration: none; color: white; background-color: black;" href="administracija.php">ADMINISTRACIJA</a>';
                    $_SESSION['korisnickoIme'] = $username;
                    
                }
                else {
                    session_start();
                    $_SESSION['username'] = 'user';
                    echo '<p style="padding-top:15px;">' . $username . ', nemate dovoljna prava za pristup ovoj stranici.' . '</p>';
                    echo "  <br>
                    <button><a style='color:black;' href='logout.php'>Log out</a></button>";
                    $_SESSION['korisnickoIme'] = $username;

                }
            } else {
                echo '<a style="padding:14px 16px; text-decoration: none; color: white; background-color: black; margin-top: 25px;" href="registracija.php">REGISTRIRAJ SE</a>';
            }
        }
        else {
            echo '<a style="padding:14px 16px; text-decoration: none; color: white; background-color: black; margin-top: 25px;" href="registracija.php">REGISTRIRAJ SE</a>';
        }


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

