//--------------------------------------------------Home Page-----------------------------------------------//
function beginButtonClicked(){
    document.location.href="orientation.html"
}
function calculatorButtonClicked(){
    document.location.href="calculatorPage.html"
}
//----------------------------------------------End Of Home Page--------------------------------------------//

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
        //if the answer is not correct 
        
    }  
}
//------------------------------------------End of Quiz Page------------------------------------------------//