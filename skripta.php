<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="clanakStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
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
include 'connect.php';

$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];
$date = date('d/m/Y');

$pphoto = $_FILES["pphoto"]["name"];
$tempname = $_FILES["pphoto"]["tmp_name"];

if(isset($_POST['archive'])){
    $archive = 1;
    }else{
    $archive = 0;
    }

 $sql = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?,?,?,?,?,?,?)";
  $stmt = mysqli_stmt_init($dbc);
  if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, 'ssssssi', $date, $title, $about, $content, $pphoto, $category, $archive);
      mysqli_stmt_execute($stmt);
    }
mysqli_close($dbc);
?>

        <?php
        if($category == "KULTURA"){
          echo "<div class='zuto' style='color:white; background-color:red;'> ";
        }elseif($category == "SPORT"){
          echo "<div class='zuto' background-color:rgb(241, 213, 52);'> ";
        }
        ?>
            <div class="sport"><h1><?php echo strtoupper($category);?></h1></div>
        </div>
<body>
      <main>
        <section>
            <article>
                <h2><?php echo $title;?></h2>
                <img src="slike/<?php echo $pphoto;?>" alt="slika">
                <h3><?php echo $about;?></h3>
                <p><?php echo $content;?></p>
            </article>
        </section>
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



