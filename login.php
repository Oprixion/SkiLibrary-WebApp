<?php 

require "config.php";


// Assume id number has been entered.

if (isset($_POST['submit'])) {
    $id = $_POST['idNumber'];



    $statement = "SELECT fName, lName, idNumber
                FROM PATRON
                WHERE $id = idNumber";
                
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
        <div class="navbar">
            <div class="navbar__container">
                <a href="#" id="navbar__logo"><img src="images/ualbertasmalllogo.png" alt="logo"></a>
                <a href="home.html" class="main__title"> Augustana Ski Library</a>
                <ul class="navbar__menu">
                    <!--Navbar items-->
                    <li class="navbar__item">
                        <a href="#about" class="navbar__links" id="howtouse-page">About</a>
                    </li>
                    <li class="navbar__item">
                        <a href="#howtouse" class="navbar__links" id="about-page">How to use</a>
                    </li>
                </ul>
            </div>
        </div>

        <!---------------------------------------PAGE CONTENTS------------------------------------->
        <div class="middle__elements">
            <!--Back Button-->
            <form action="home.html">
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
                Student ID: <input type="number" placeholder="1234567" name="idNumber" required=1><br><br>
                <button type="submit" name="submit"><b>View Ski Pass</b></button>
            </form>
        </div>
    </body>
</html>