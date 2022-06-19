<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Unos</title>
    <link rel="stylesheet" type="text/css" href="unosStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<br>
    <main>
        <form name="form" action="skripta.php" method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <label for="title">Naslov vijesti</label>
                <div class="form-field">
                    <input type="text" name="title" id="title" class="form-field-textual">
                    <span id="porukaTitle" style="color: red; font-size: 14px;"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="about">Kratki sadržaj vijesti</label>
                <div class="form-field">
                    <textarea name="about" id="about" cols="30" rows="10" class="formfield-textual"></textarea>
                    <span id="porukaAbout" style="color: red; font-size: 14px;"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="content">Sadržaj vijesti</label>
                <div class="form-field">
                    <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
                    <span id="porukaContent" style="color: red; font-size: 14px;"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="pphoto">Slika: </label>
                <div class="form-field">
                    <input type="file" accept="image/jpg,image/gif" class="input-text" name="pphoto" id="pphoto" />
                    <br>
                    <span id="porukaSlika" style="color: red; font-size: 14px;"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="category">Kategorija vijesti</label>
                <div class="form-field">
                    <select name="category" id="category" class="form-field-textual">
                        <option value="none" selected disabled hidden>Odaberite kategoriju</option>
                        <option value="SPORT">Sport</option>
                        <option value="KULTURA">Kultura</option>
                    </select>
                    <br>
                    <span id="porukaKategorija" style="color: red; font-size: 14px;"></span>
                </div>
            </div>
            <div class="form-item">
                <label>Spremiti u arhivu:
                    <div class="form-field">
                        <input type="checkbox" name="archive">
                    </div>
                </label>
            </div>
            <div class="form-item">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" id="slanje" value="Prihvati">Prihvati</button>
            </div>
        </form>

        

    </main>

    <footer>
        <hr>
        <div class="footer"><p>Copyright © 2019 BBC. The BBC is not responsible for the content of external sites.<p class="read"> Read about our approach to external linking.</p></p></div>
    </footer>

    <script type="text/javascript">
    document.getElementById("slanje").onclick = function(event) { 
        var slanjeForme = true;
         // Naslov vjesti (5-30 znakova) 
         var poljeTitle = document.getElementById("title"); 
         var title = document.getElementById("title").value; 
         if (title.length < 5 || title.length > 30) { 
            slanjeForme = false; 
            poljeTitle.style.border="1px solid red"; 
            document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>"; } else { 
                poljeTitle.style.border="1px solid"; 
                document.getElementById("porukaTitle").innerHTML=""; 
            } 
            // Kratki sadržaj (10-100 znakova) 
            var poljeAbout = document.getElementById("about"); 
            var about = document.getElementById("about").value; 
            if (about.length < 10 || about.length > 100) { 
                slanjeForme = false; 
                poljeAbout.style.border="1px solid red"; document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>"; 
            } else { 
                poljeAbout.style.border="1px solid"; 
                document.getElementById("porukaAbout").innerHTML=""; 
            } 
            // Sadržaj mora biti unesen 
            var poljeContent = document.getElementById("content"); 
            var content = document.getElementById("content").value; 
            if (content.length == 0) { 
                slanjeForme = false; 
                poljeContent.style.border="1px solid red"; 
                document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>"; 
            }else { 
                poljeContent.style.border="1px solid";
                document.getElementById("porukaContent").innerHTML=""; 
            }

            // Slika mora biti unesena 
            var poljeSlika = document.getElementById("pphoto"); 
            var pphoto = document.getElementById("pphoto").value; 
            if (pphoto.length == 0) { 
                slanjeForme = false;  
                document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>"; 
            } else {  
                document.getElementById("porukaSlika").innerHTML=""; 
            } 
            // Kategorija mora biti odabrana 
            var poljeCategory = document.getElementById("category");
            if(document.getElementById("category").selectedIndex == 0) { 
                slanjeForme = false; 
                poljeCategory.style.border="1px solid red"; 
                document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>"; } else { 
                    poljeCategory.style.border="1px solid"; 
                    document.getElementById("porukaKategorija").innerHTML=""; 
                } 
                if (slanjeForme != true) { 
                    event.preventDefault(); 
                } 
        }; 
            </script>
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