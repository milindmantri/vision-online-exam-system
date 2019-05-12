function printName(name){
    document.getElementById("display-name").innerHTML=name;
}

function fillDetails(total_question,questions_attempted,answers_correct,total_marks,marks_obtained,percentage){
    document.getElementById("display-total-questions").innerHTML=total_question;
    document.getElementById("display-questions-attempted").innerHTML=questions_attempted;
    document.getElementById("display-answers-correct").innerHTML=answers_correct;
    document.getElementById("display-total-marks").innerHTML=total_marks;
    document.getElementById("display-marks-obtained").innerHTML=marks_obtained;
    document.getElementById("display-percentage").innerHTML=percentage;
}