<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unosStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Administracija</title>
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
        <br>
        <h2 style="text-align: center;">LOG IN</h2>
        <section role="main">
            <form enctype="multipart/form-data" action="loginProvjera.php" method="POST">
            
            <div class="form-item">
            <label for="content">Korisničko ime:</label>
            <div class="form-field">
            <input type="text" name="username" id="username" class="formfield-textual">
            <span id="porukaUsername" style="color: red; font-size: 14px;"></span>
            </div>
            </div>
            
            <div class="form-item">
            <label for="pphoto">Lozinka: </label>
            <div class="form-field">
            <input style="width: 100%; padding: 12px; border: 1px solid; border-radius: 4px;" type="password" name="pass" id="pass" class="formfield-textual">
            <span id="porukaPass" style="color: red; font-size: 14px;"></span>
            </div>
            </div>
            <br>
            <div class="form-item">
            <button type="submit" value="Prijava" id="slanje">Prijava</button>
            </div><br>
            <div class="reg">
            <a style="padding:14px 16px; text-decoration: none; color: white; background-color: black;" href="registracija.php">REGISTRIRAJ SE</a>
            </div>
            </form>
            </section>
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

            <script type="text/javascript">
            document.getElementById("slanje").onclick = function(event) {
            var slanjeForme = true;
            
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username.length == 0) {
            slanjeForme = false;
            poljeUsername.style.border="1px solid red";
            document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
            } else {
            poljeUsername.style.border="1px solid";
            document.getElementById("porukaUsername").innerHTML="";
            }
            var poljePass = document.getElementById("pass");
            var pass = document.getElementById("pass").value;
            
            if (pass.length < 2) {
            slanjeForme = false;
            poljePass.style.border="1px solid red";
            document.getElementById("porukaPass").innerHTML="<br>Lozinka mora imati barem 3 znaka!<br>";
            } else {
            poljePass.style.border="1px solid";
            document.getElementById("porukaPass").innerHTML="";
            }
            if (slanjeForme != true) {
            event.preventDefault();
            }
            };
            </script>
        </section>
    </main>
</body>
</html>

