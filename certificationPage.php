<?php 
  require "config.php";

  if (isset($_GET['patron'])){
    $id = $_GET['patron'];

    $statement = "SELECT fName, lName
                  FROM PATRON
                  WHERE $id = idNumber";
    
    $query = mysqli_query($connection, $statement);
    $result = mysqli_fetch_array($query);
    if (empty($result)){
      echo("SHIT!");
    }
    $firstName = $result[0];
    $lastName = $result[1];
  }
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ski Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Navbar Section-->
   <div class="navbar">
    <div class="navbar__container">
        <a href="#" id="navbar__logo"><img src="images/logo.PNG" alt="logo"></a>
        <a href="#home" class="main__title"> Augustana Ski Library</a>
        <ul class="navbar__menu">
            <!--Navbar items-->
          <li class="navbar__item">
            <a href="#howtouse" class="navbar__links" id="howtouse-page">About</a>
          </li>
          <li class="navbar__item">
            <a href="#about" class="navbar__links" id="about-page">How to use</a>
          </li>
        </ul>
      </div>
   </div>

   <!--Page Section-->
   <div class="side__elements">
    <!--Image setup-->
    <img src="images/right.jpg" class="right__image">
    <img src="images/left.jpg" class="left__image">
  </div>
  <div class="middle__elements">
    <div class="certificate__elements">
      <!--Certificate setup-->
    <img src="images/certificate.png" class="certificate__image">
    <!--Certification info-->
    <div class="info__container">
      <div class="name"><b>Name:</b> <?php echo($firstName)?> <?php echo($lastName)?>
      </div> Is eligible to borrow ski equipments <br>
      <div class="studentID"><b>ID:</b> <?php echo($id)?></div>
    </div>
    </div>
    
    <!--Instructions-->
    <div class="instruction__container"> Take a screenshot of this photo and show it to the 
      library staff to recieve your sticker. A copy of this will also be sent to your email
    </div>

    <button class="back__button">
      <a href="homePage.html">Home</a>
    </button>


  </div>
      
</body>
</html>