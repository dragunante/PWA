<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="clanakStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
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
        <?php
                include "connect.php";
                $id = $_GET['id'];
        
                $sql = "SELECT * FROM vijesti WHERE id = '$id'";
                $result = $dbc->query($sql);
                while($row = $result->fetch_assoc()) {
                    $category = $row['kategorija'];
                }
                if($category == "KULTURA"){
                    echo "<div class='zuto' style='color:white; background-color:red;'> ";
                  }elseif($category == "SPORT"){
                    echo "<div class='zuto' background-color:rgb(241, 213, 52);'> ";
                  }
      ?>
        <div class="sport"><h1><?php echo strtoupper($category);?></h1></div>
        </div>

      <main>
      <?php  
        $result = $dbc->query($sql);
        echo "<section>";
        while($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<h2>" . $row['naslov'] . "</h2>";
            echo "<img src='" . "slike/" . $row['slika'] . "' alt='slika'>";
            echo "<h3>" . $row['sazetak'] . "</h3>";
            echo "<p>" . $row['tekst'] . "</p>";
            echo "</article>";
        }
        echo "</section>";
        ?>
      </main>


      <footer>
        <hr>
        <div class="footer"><p>Copyright © 2019 BBC. The BBC is not responsible for the content of external sites.<p class="read"> Read about our approach to external linking.</p></p></div>
      </footer>
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