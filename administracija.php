<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="unosStyle.css">
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
  <br>

<body class="boja">
    <br>
    <main class="boja2">
    <div style="padding-left:10px;" >
    <h2><?php echo $_SESSION['korisnickoIme']; ?></h2>
    <button class="logout" ><a style="color:black;" href="logout.php">Log out</a></button>
    </div>
    <?php
include "connect.php";

$sql = "SELECT * FROM vijesti";
$result = $dbc->query($sql);
    
while($row = $result->fetch_assoc()){ ?>
    <form enctype="multipart/form-data" action="" method="POST">
     <div class="form-item"> 
     <label for="title">Naslov vjesti:</label>
    <div class="form-field"> 
    <input type="text" name="title" class="form-field-textual" value="<?php echo $row['naslov'];?>"> 
    </div> 
    </div> 
    <div class="form-item"> 
    <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label> 
    <div class="form-field"> 
    <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">
        <?php echo $row['sazetak'];?>
    </textarea> 
    </div> 
    </div> 
    <div class="form-item"> 
    <label for="content">Sadržaj vijesti:</label> 
    <div class="form-field"> 
    <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">
        <?php echo $row['tekst'];?>
    </textarea> 
    </div> 
    </div> 
    <div class="form-item"> 
    <label for="pphoto">Slika:</label> 
    <div class="form-field">
        <input hidden type="text" name="slika" value="<?php echo $row['slika'];?>" id="">
<input type="file" class="input-text" id="pphoto" value="<?php echo $row['slika'];?>" name="pphoto"/> 
<br>
<?php echo '<img src="' . "slike/" . $row['slika'] . '" width=100px>'?>
</div> 
</div> 
<div class="form-item"> 
<label for="category">Kategorija vijesti:</label> 
<div class="form-field"> 
<select name="category" id="category" class="form-field-textual">
<option value="none" selected disabled hidden>Odaberite kategoriju</option> 
<option <?php if($row['kategorija'] == "SPORT"){
    echo "selected";
} ?> value="SPORT">Sport</option> 
<option <?php if($row['kategorija'] == "KULTURA"){
    echo "selected";
} ?> value="KULTURA">Kultura</option> 
</select> 
</div> 
</div> 
<div class="form-item"> 
<label>Spremiti u arhivu: 
<div class="form-field">
<?php 
if($row['arhiva'] == 0) { 
    echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?'; 
} else { 
        echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?'; 
    } 
    ?>
</div> 
</label> 
</div> 
</div> 
<div class="form-item"> 
<input type="hidden" name="id" class="form-field-textual" value="<?php echo $row['id'];?>"> 
<button type="reset" value="Poništi">Poništi</button>
<button type="submit" name="update" value="Prihvati"> Izmjeni</button> 
<button type="submit" name="delete" value="Izbriši"> Izbriši</button>
<?php
if(isset($_POST['delete'])){
    
    $id=$_POST['id'];
    echo $id;
    $sql = "DELETE FROM vijesti WHERE id= '$id' "; 
    $result = $dbc->query($sql);
    echo "<meta http-equiv='refresh' content='0'>";
}
    
    if(isset($_POST['update'])){
        $picture = $_FILES['pphoto']['name'];
        if($picture == ""){
            $picture = $_POST['slika'];
        }
        $title = $_POST['title'];
        $about = $_POST['about'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        if(isset($_POST['archive'])){
        $archive = 1;
        header("Refresh:1");
        }else{
        $archive = 0;
        }
        $target_dir = 'slike/'.$picture;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
        $id=$_POST['id'];
        $sql = "UPDATE vijesti SET naslov = '$title', sazetak = '$about', tekst = '$content', slika = '$picture', kategorija = '$category', arhiva = '$archive' WHERE id = $id";
        $result = $dbc->query($sql);
        echo "<meta http-equiv='refresh' content='0'>"; 
        }
    ?> 
</div> 
</form>
<br>
<hr style="border-top: 2px solid black; border-radius: 5px;">
<br>
<?php
}
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
