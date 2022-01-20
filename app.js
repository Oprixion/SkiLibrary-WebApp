//--------------------------------------------------Home Page-----------------------------------------------//
function beginButtonClicked(){
    document.location.href="orientation.html"
}
function calculatorButtonClicked(){
    document.location.href="calculator.html"
}
function HowToUse__popup() {
    var popup = document.getElementById("popup__container");
    popup.style.visibility="initial"
}
function toSlide2(){
    document.getElementById("slide2").scrollIntoView({behavior: "auto", block: "center"});
}
function toSlide1(){
    document.getElementById("slide1").scrollIntoView({behavior: "auto", block: "center"});
}
function closePopup(){
    var popup = document.getElementById("popup__container");
    popup.style.visibility="hidden"
}
//----------------------------------------------End Of Home Page--------------------------------------------//

//----------------------------------------------------Orientation Page-------------------------------------//
//verify if user has checked for the boxes
function checkCheckBoxes(){
    var numberOfBoxesTicked = 0;

    for (var i = 0; i<=8; i++){
        const checked = document.querySelector('input[id=cb'+i+']')
        if (checked.checked){
            numberOfBoxesTicked++;
        }
        else{
            document.querySelector('input[id=cb8]').checked=false
            document.getElementById('continue__button2').disabled=true
        }  
    }
    if(numberOfBoxesTicked==9){
        document.getElementById('continue__button2').disabled=false   
    }

}
//verify if the user has checked all the previous boxes
function checkMissing(){
    var numberOfBoxesTicked = 0;
    for (var i = 0; i<=7; i++){
        const checked = document.querySelector('input[id=cb'+i+']')
        if (checked.checked){
            numberOfBoxesTicked++;
        }
        //lead the user to the missing check box
        if(checked.checked==false){
            document.querySelector('input[id=cb8]').checked=false
            if(i<=2&&($('#collapseOne').is( ":hidden" ))){
                document.getElementById('general__expand').click()
                document.getElementById("cb"+i).scrollIntoView({behavior: "smooth", block: "center"});
                return;
            }
            else if(i<=2&&($('#collapseOne').is( ":visible" ))){
                document.getElementById("cb"+i).scrollIntoView({behavior: "smooth", block: "center"});
                return
            }
            else if(i>2&&(($('#collapseTwo').is( ":hidden" )))){
                document.getElementById('sizing__expand').click()
                document.getElementById("cb"+i).scrollIntoView({behavior: "smooth", block: "center"});
                return
            }
            else if(i>2&&(($('#collapseTwo').is( ":visible" )))){
                document.getElementById("cb"+i).scrollIntoView({behavior: "smooth", block: "center"});
                return
            }
            
        }
        
    }
    if(numberOfBoxesTicked==8){
        document.getElementById('continue__button2').disabled=false   
    }
}

function toQuizPage(){
    document.location.href="quizPage.html"
}
//---------------------------------------------End of Orientation Page-------------------------------------//


//----------------------------------------------QuizPage----------------------------------------------------//
function toWaiverPage(){
    document.location.href="waiver.php"
}
function validateAnswer(){
    var correctAnswers = [1, 3, 2, 3, 4]
    var numberOfCorrectAnswers = 0;
    
    for(var i=1; i<=5; i++){
        //find selected answer for question 
        var checkedAnswer = document.querySelector('input[name=q'+i+']:checked');
        //answer for question i
        var solution = correctAnswers[i-1];
        //if the answer if correct
        console.log(i+" "+checkedAnswer.value)
        if(checkedAnswer&&(checkedAnswer.value == 'r'+solution)){
            //highlight the answer green
            clearStyle(i);
            document.getElementById('q'+i+'_r'+solution).parentNode.style.color='#5cb85c';
            document.getElementById('q'+i+'_r'+solution).parentNode.style.fontWeight='bold';
            numberOfCorrectAnswers++;
            console.log("pass");
        }
        if(checkedAnswer&&(checkedAnswer.value != 'r'+solution)){
            clearStyle(i);
            document.getElementById('q'+i+'_'+checkedAnswer.value).parentNode.style.color='#FF0000';
            document.getElementById('q'+i+'_'+checkedAnswer.value).parentNode.style.fontWeight='bold';
            console.log("failed");
        }
        if(numberOfCorrectAnswers == 5){
            document.getElementById("continue__button").disabled=false
        }      
    }
    
}

function clearStyle(questionNo){
    for(var i=1; i<=4; i++){
        document.getElementById('q'+questionNo+'_r'+i).parentNode.style.color='#292d31'
        document.getElementById('q'+questionNo+'_r'+i).parentNode.style.fontWeight='400';
    }
}
//------------------------------------------End of Quiz Page------------------------------------------------//

function finalCheck(){
    if (alert("Please ensure all information is correct"));
}