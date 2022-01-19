//--------------------------------------------------Home Page-----------------------------------------------//
function beginButtonClicked(){
    document.location.href="orientation.html"
}
function calculatorButtonClicked(){
    document.location.href="calculatorPage.html"
}
//----------------------------------------------End Of Home Page--------------------------------------------//

//----------------------------------------------------Orientation Page-------------------------------------//
function checkCheckBoxes(){
    var numberOfBoxesTicked = 0;

    for (var i = 1; i<=9; i++){
        const checked = document.querySelector('input[id=cb'+i+']')
        if (checked.checked){
            numberOfBoxesTicked++;
        }
        else{
            document.querySelector('input[id=cb9]').checked=false
            document.getElementById('continue__button2').disabled=true
        }  
    }
    if(numberOfBoxesTicked==9){
        document.getElementById('continue__button2').disabled=false   
    }

}

function checkMissing(){
    var numberOfBoxesTicked = 0;

    for (var i = 1; i<=8; i++){
        const checked = document.querySelector('input[id=cb'+i+']')
        if (checked.checked){
            numberOfBoxesTicked++;
        }
        else{
            document.location.href="#cb"+(i-1)
            document.querySelector('input[id=cb9]').checked=false
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
    document.location.href="waiver.html"
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
        if(checkedAnswer&&checkedAnswer.value == 'r'+solution){
            //highlight the answer green
            document.getElementById('q'+i+'_r'+solution).parentNode.style.color='#5cb85c';
            document.getElementById('q'+i+'_r'+solution).parentNode.style.fontWeight='bold';

            numberOfCorrectAnswers++;
        }
        if(numberOfCorrectAnswers == 5){
            document.getElementById("continue__button").disabled=false
        }
        
    }  
}
//------------------------------------------End of Quiz Page------------------------------------------------//