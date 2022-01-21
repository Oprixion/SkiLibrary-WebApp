<?php 

require "config.php";

$noSuchRecord='';
// Assume id number has been entered.

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $id = $_POST['idNumber'];



    $statement = "SELECT fName, lName, idNumber
                FROM PATRON
                WHERE '$firstName' = fName AND '$lastName' = lname AND $id = idNumber";
                
    $query = mysqli_query($connection, $statement);
    // echo(typeof($query));
    $result = mysqli_fetch_array($query);

    if (empty($result)){
        $noSuchRecord = "No record found associated with ID $id";
    } else {
        ?>

        <html>
            <script>
                document.location.href="certificate.php?patron=<?php echo($id);?>";
            </script>
        </html>

        <?php  
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ski Library</title>
        <link rel="icon" type="image/x-icon" href="images/ualbertasmalllogo.png">
        <link rel="stylesheet" href="style.css">

        <style>
        </style>
    </head>

    <body>
        <!---------------------------------------Navbar Section AND BACK BUTTON------------------------------------->
    <!--Navbar Section-->
    <div class="navbar">
      <div class="navbar__container">
        <!--Navbar items-->
        <div class="title__container">
          <img id="navbar__logo" src="images/ualbertasmalllogo.png" alt="logo">
        <a href="index.html" class="main__title">Augustana Ski Library</a>
        </div>
        <div class="items__container">
          <a href="#about" class="navbar__links" id="howtouse-page" style="margin-right: 20px;">About</a>
          <a href="#howtouse" class="navbar__popup" id="howToUse-popup" style="text-align: right;" onclick="HowToUse__popup()">HowtoUse</a>
            <div class="popup__container" id="popup__container">
              <div class="slide__container">
                <div class="slide8" id="slide8"><img src="images/8thPopupTransparent.png" width="100%" alt="slide8"></div>
                
              </div>
              <button class="close__popup" onclick="closePopup()"> Close </button>
        </div>
        
      </div>
    </div>

        <!---------------------------------------PAGE CONTENTS------------------------------------->
        <div class="middle__elements">
            <!--Back Button-->
            <form action="index.html">
                <button class="back__button"><b>Back</b></button>
              </form>
            <!-- Title and Description -->
            <br>
            <b>Certification Login</b><br>
            Enter your student ID to verify certification status.
            <br>
            <!-- Login form -->
            <form action="login.php" method="post">
                <br>
                First name: <input type="text" placeholder="John" name="firstName" required=1><br><br>
                Last name: <input type="text" placeholder="Smith" name="lastName" required=1><br><br>
                Student ID: <input type="number" placeholder="1234567" name="idNumber" required=1><br><br>
                <button type="submit" name="submit"><b>View Ski Pass</b></button>
            </form>
            <h3 style="color:red"><?php echo $noSuchRecord; ?></h3>
        </div>
    </body>
</html>