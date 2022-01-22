<?php
/**
 * This file uses handwriting.js, modified and used under MIT license, Copyright (c) 2015 Elton
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ski Library - Waiver</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://raw.githubusercontent.com/jakubfiala/atrament.js/master/dist/atrament.min.js"></script>
</head>

<script>
  function showSnackbar() {
    var a = document.getElementById("snackbar")
    a.className = "show"
    setTimeout(function(){ a.className = a.className.replace("show", ""); }, 3000);
  }
  function alphabetOnly(input) {
    var alphabet = /[^a-z]/gi;
    input.value = input.value.replace(alphabet, "");
  }
  function numbersOnly(input) {
    var numbers = /[^0-9]/g;
    input.value = input.value.replace(numbers, "");
  }
</script>

<body>
    <!--Navbar Section-->
    <div class="navbar">
      <div class="navbar__container">
        <!--Navbar items-->
        <div class="title__container">
          <img id="navbar__logo" src="images/ualbertasmalllogo.png" alt="logo">
        <a href="home.html" class="main__title">Augustana Ski Library</a>
        </div>
        <div class="items__container">
          <a href="#about" class="navbar__links" id="howtouse-page" style="margin-right: 20px;">About</a>
          <a href="#howtouse" class="navbar__popup" id="howToUse-popup" style="text-align: right;" onclick="HowToUse__popup()">HowtoUse</a>
            <div class="popup__container" id="popup__container">
              <div class="slide__container">
                <div class="slide6" id="slide6"><img src="images/6thPopupTransparent.png" width="100%" alt="slide6"></div>
                
              </div>
              <button class="close__popup" onclick="closePopup()"> Close </button>
        </div>
      </div>
    </div>

   <!--Page Section-->
      <div class="middle__elements">
        <h1 class="liability_header" style="text-align: center;">Release of Liability, Assumption of Risks and Indemnity Agreement</h1>
        <h3 class="liability_subheader" style="text-align: center;">
            <u>PLEASE READ CAREFULLY</u><br>
            BY SIGNING THIS FORM, YOU ACCEPT CERTAIN LEGAL OBLIGATIONS AND GIVE UP IMPORTANT LEGAL RIGHTS, INCLUDING THE RIGHT TO SUE
        </h3>

        <?php
          if (isset($_GET['status'])){
            ?>
            <script>
              <?php
            if($_GET['status'] == 'exists'){
              ?> alert("Invalid entry. Our records indicate a certification exists for the ID you have entered.");
              <?php
            } elseif ($_GET['status'] == 'failed'){
              ?> alert("Invalid entry, please try again. Ensure that all fields are filled in correctly.");
              <?php
            } elseif ($_GET['status'] == 'invalid') {
              ?> alert("Invalid entry, please try again. Ensure that your name(s) and ID are valid.");
              <?php
            }?>
            </script>
            <?php
          }
        ?>

        <div class="container mt-5">
          <div class="row">
            <form action="addRecord.php" method="post">
              <div class="row">
                <h4>Participant</h4>
                <div class="col-sm-4">
                  <label for="firstName">First Name:</label>
                  <input type="text" class="form-control" name="firstName" onkeyup="alphabetOnly(this)" required=1>
                </div>
                <div class="col-sm-4">
                  <label for="lastName">Last Name:</label>
                  <input type="text" class="form-control" name="lastName" onkeyup="alphabetOnly(this)" required=1>
                </div>
                <div class="col-sm-4">
                  <label for="idNumber">ID Number:</label>
                  <input type="number" class="form-control" name="idNumber" onkeyup="numbersOnly(this)" required=1>
                </div>
                <div class="col-sm-4">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="col-sm-4">
                  <label for="age">Age:</label>
                  <input type="number" class="form-control" name="age" onkeyup="numbersOnly(this)" required=1> 
                </div>
    
                <div class="col-sm-4">
                  <label for="address">Address:</label>
                  <input type="text" class="form-control" placeholder="Enter street address" name="address"> 
                </div>
    
                <div class="col-sm-4">
                  <label for="city">City:</label>
                  <input type="text" class="form-control" name="city" onkeyup="alphabetOnly(this)" required=1> 
                </div>
    
                <div class="col-sm-4">
                  <label for="province">Province:</label>
                  <input type="text" class="form-control" name="province" onkeyup="alphabetOnly(this)" required=1> 
                </div>
              </div>
              <br>
              <div class="row">
                <h4>Emergency Contact</h4>
                <div class="col-sm-4">
                  <label for="emergency_relation">Relationship:</label>
                  <input type="text" class="form-control" name="emergency_relation" onkeyup="alphabetOnly(this)" required=1>
                </div>
                <div class="col-sm-4">
                  <label for="emergency_firstName">First Name:</label>
                  <input type="text" class="form-control" name="emergency_firstName" onkeyup="alphabetOnly(this)" required=1>
                </div>
                
                <div class="col-sm-4">
                  <label for="emergency_lastName">Last Name:</label>
                  <input type="text" class="form-control" name="emergency_lastName" onkeyup="alphabetOnly(this)" required=1>
                </div>
    
                <div class="col-sm-4">
                  <label for="emergency_phone">Phone Number:</label>
                  <input type="number" class="form-control" name="emergency_phone" onkeyup="numbersOnly(this)" required=1>
                </div>
              </div>
              <br>
    
            <div class="row">
              <div class="col">
                <p><u><strong> Assumption of Risks</strong></u><br>
                  In consideration of my participation in Augustana Nordic Ski Library, I acknowledge that I am aware of, and freely accept
                  <strong>all risks, dangers and hazards</strong> associated with being a participant in Augustana Nordic Ski Library, including the possible
                  risk of severe or fatal injury to myself or others. These risks include, but are not limited to:</p>
        
                  <ol>
                    <li>The risks associated with traveling on commercial, public, or private vehicles to and from locations to be visited,
                      including but not limited to a vehicle accident resulting in severe physical injuries or death;
                    </li>
        
                    <li>
                      Injuries, incident or property damage resulting from travel to and from all locations, venues and destinations in
                      relation to Augustana Nordic Ski Library;
                    </li>
                    
                    <li>
                      General health risks such as allergic reactions to food, animals, environment;
                    </li>
                    
                    <li>
                      Injuries or illness resulting from failure to follow directions, instructions and guidelines provided by those in
                      charge of the activity;
                    </li>
                    
                    <li>
                      Injuries or illness arising from activities or functions in my free time, including, but not limited to, injury or loss of
                      any nature arising from tours, walks, hiking, shopping, sports activities, dancing, alcohol or drug ingestion,
                      intoxication and/or alcohol/drug poisoning from alcohol or drugs I consume;
                    </li>
    
                    <li>
                      General health risks such as allergic reactions to animals or environment;
                    </li>
    
                    <li>
                      Injury or loss arising from falls on the ice or on steep, slippery or uneven terrain;
                    </li>
    
                    <li>
                      Injury and/or illness resulting from exposure to weather conditions, including but not limited to cold, snow, ice,
                      wind, hail, rain, sleet, fog, etc;
                    </li>
    
                    <li>
                      The possibility of bodily injury from skiing including broken bones, muscle strains and sprains, soft tissue injury
                      such as cuts and abrasions, and dental damage from falling down, falling through ice or being knocked down;
                    </li>
    
                    <li>
                      Injury resulting from impact with obstructions, equipment, other participants or spectators;
                    </li>
    
                    <li>
                      An increased load on the heart, which may result in dizziness, shortness of breath and in extreme circumstances,
                      may result in a heart attack;
                    </li>
    
                    <li>
                      Potential exposure to infectious and communicable disease, including but not limited to COVID-19.
                    </li>
                  </ol>
              </div>

              <div class="row">
                <div class="col-sm-1">
                  <label for="initials_para_1">Initials:</label>
                  <input type="text" class="form-control" name="initials_para1" onkeyup="alphabetOnly(this);" required=1>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <p><br><u><strong> Assumption of Risks</strong></u><br>
                    In consideration for the University allowing me to participate in the Augustana Nordic Ski Library, I agree:
                  </p>

                  <ol>
                    <li>
                      that the Governors of the University of Alberta, their officers, employees, and volunteers (hereinafter referred to
                      as the “University”) are not responsible for any loss, damage, injury or expense of any kinds sustained by me
                      while participating in the Augustana Nordic Ski Library and all related activities, except to the extent that any loss,
                      damage, injury or expense might result from the negligence of the University;
                    </li>

                    <li>
                      to <strong>WAIVE ANY AND ALL CLAIMS</strong> that I have or may in the future have against the University arising out of any
                      aspect of my participation in the Augustana Nordic Ski Library and to <strong>RELEASE</strong> the University from any and all liability 
                      resulting from any loss, damage, injury (including death) or expense that I may suffer as a result of my
                      participation in the Augustana Nordic Ski Library, due to any cause whatsoever, including without limitation,
                      negligence, breach of contract, or breach of any statutory or other duty of care, as well as any duty of care owned
                      under the <i>Occupiers’ Liability Act</i> (Alberta) on the part of the University;
                    </li>

                    <li>
                      to <strong>INDEMNIFY AND HOLD HARMLESS</strong> the University in relation to:
                      <ol type="a">
                        <li>
                          any damage to University property caused by me;
                        </li>

                        <li>
                          any and all liability for any damages to the personal property of, or personal injury to, any third party
                          resulting from my participation in the Augustana Nordic Ski Library; and
                        </li>

                        <li>
                          any and all claims, demands, actions and costs which might arise out of my participation in the
                          Augustana Nordic Ski Library, except to the extent that such claims, demands, actions and costs may
                          have been caused by the negligence of the University.
                        </li>
                      </ol>
                    </li>
                  </ol>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-1">
                  <label for="initials_para_2">Initials:</label>
                  <input type="text" class="form-control" name="initials_para2" onkeyup="alphabetOnly(this)" required=1>
                </div>
              </div>

              
            </div>

            <div class="row">
              <div class="col">
                <p><br><u><strong>Acknowledgement</strong></u><br>
                  I ACKNOWLEDGE THAT I HAVE READ AND UNDERSTOOD THIS AGREEMENT before signing it, that I have executed this
                  Agreement voluntarily, and that this Agreement is to be binding upon myself, my heirs, executors, administrators and
                  representatives. Further, I acknowledge and agree:
                </p>

                <ol>
                  <li>
                    To follow all rules and guidelines set out by the University and its representatives related to the Augustana Nordic
                    Ski Library and all related activities.
                  </li>

                  <li>
                    That students of the University of Alberta are subject to the University of Alberta’s Code of Student Behaviour
                    and that I will conduct myself accordingly at all times.
                  </li>

                  <li>
                    That I will ski safely and within my abilities.
                  </li>

                  <li>
                    That I will wear appropriate attire, including footwear, for outdoor activity and weather conditions.
                  </li>

                  <li>
                    I will follow all guidelines for infection prevention and control as instructed, including University campus
                    vaccination protocols, social distancing, hand hygiene, and wearing personal protective equipment (eg. gloves,
                    masks) to protect myself against COVID-19 and other communicable diseases.
                  </li>

                  <li>
                    I will follow health authority self-isolation guidelines and stay home if I feel ill.
                  </li>
                </ol>
              </div>
            </div>

            <div class="row">
              <div class="col">
                    <span style="display : inline-block">
                      <canvas id="can" width="400" height="100" style="border: 2px solid; cursor: crosshair; width: 100%;"></canvas>
                      <br>
                      <button onclick="can.erase();">Erase</button>
                  </span>
              
                  <script type="text/javascript" src="handwriting.js"></script>
                  <script type="text/javascript">
                  var can = new handwriting.Canvas(document.getElementById("can"), 3);
                  can.setCallBack(function(data, err) {
                      if (err) throw err;
                      else document.getElementById("result1").innerHTML = data;
                  });
                  </script>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <table>
                  <td>
                    Protection of Privacy - The personal information requested on this form is collected under the authority of Section 33(c) of the Alberta
                    Freedom of Information and Protection of Privacy Act and will be protected under Part 2 of that Act. It will be used for the purpose of
                    administering the Augustana Nordic Ski Library and/or to communicate with the emergency contact in case the participant is seriously
                    injured or ill. Direct any questions about this collection to: Randal Nickel, Executive Director, Student Life, Augustana Recreation,
                    4901-46 Ave Camrose AB T4V 2R3, (780) 679-1630, rnickel@ualberta.ca
                  </td>
                </table>

                <small>
                  Note: This waiver must be copied (in colour when possible) to a single double-sided page and completed in full (initialed, signed, dated, witnessed)
                  before any participant may begin this activity. No changes to the document may be made except by the Office of Insurance & Risk Assessment. Signed
                  documents must be filed with the department and be kept for a minimum of ten years.
                </small>
              </div>
            </div>
            <div>
              <h6><br><br><b>Please ensure that all form data is correct before submitting.<b></h6>
              <button type="submit" name="submit">Submit</button>
            </div>
            </form>
          </div>
        </div>
    </div>

  <script src='app.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>