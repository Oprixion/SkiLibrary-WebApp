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
      echo("Result is empty!!!!!");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!--Navbar Section-->
    <div class="navbar">
      <div class="navbar__container">
        <!--Navbar items-->
        <div class="title__container">
          <img id="navbar__logo" src="images/ualbertasmalllogo.png" alt="logo">
        <a href="homePage.html" class="main__title">Augustana Ski Library</a>
        </div>
        <div class="items__container">
          <a href="#about" class="navbar__links" id="howtouse-page" style="margin-right: 20px;">About</a>
          <a href="#howtouse" class="navbar__links" id="about-page" style="text-align: right;">HowtoUse</a>
        </div>
        
      </div>
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