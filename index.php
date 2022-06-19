<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Home</title>
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

  <main>
    <div class="wtbbc">
        <h2>Welcome to BBC.com</h2>
        <p id="date"></p>
    </div>
    <h2 class="hnews">Kultura</h2>
    <?php
    include "connect.php";

    $sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'KULTURA' LIMIT 3";
    $result = $dbc->query($sql);
    $i=0;

    echo "<section>";
    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<a href='clanak.php?id=" . $row['id'] . "'>";
        echo "<img src='" . "slike/" . $row['slika'] . "' alt='slika'>";
        echo "<h3>" . $row['naslov'] . "</h3>";
        echo "<p>" . $row['sazetak'] . "</p>";
        echo "</a>";
        echo "</article>";
        $i++;
        if ($i == 3) {
            echo "</section> <section>";
            $i = 0;
        }
    }
    echo "</section>";
    ?>

    <h2 class="hsport">Sport</h2>
    
    
    <?php
    $sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'SPORT' LIMIT 3";
    $result = $dbc->query($sql);
    $i=0;

    echo "<section>";
    while($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<a href='clanak.php?id=" . $row['id'] . "'>";
        echo "<img src='" . "slike/" . $row['slika'] . "' alt='slika'>";
        echo "<h3>" . $row['naslov'] . "</h3>";
        echo "<p>" . $row['sazetak'] . "</p>";
        echo "</a>";
        echo "</article>";
        $i++;
        if ($i == 3) {
            echo "</section> <section>";
            $i = 0;
        }

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

  <script>
    months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    n =  new Date();
    month = months[n.getMonth()];
    day = days[n.getDay()];
    date = n.getDate();
    document.getElementById("date").innerHTML = day + "," + date + " " + month;
  </script>
</body>
</html>

