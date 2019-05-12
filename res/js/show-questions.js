var ques_no = 0;
var total_questions=0;
var option_selected = 0;
var answer_marked=[];
function changeQuestion(direction){ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {              
               document.getElementById("question-answer").innerHTML = this.responseText;
               if(answer_marked[ques_no]!=0)
               {
                var optionID="#option"+answer_marked[ques_no].toString();
                var op = document.querySelector(optionID);
                op.checked=true;
               }
               
               if(ques_no==total_questions)
                {
                    var next_button = document.getElementById("next");
                    next_button.disabled="true";
                    next_button.classList.add("disable-button");
                    next_button.classList.remove("all-button-hover");
                }

                if(ques_no==1)
                {
                    var prev_button = document.getElementById("prev");
                    prev_button.disabled="true";
                    prev_button.classList.add("disable-button");
                    prev_button.classList.remove("all-button-hover");
                
                }
                
                var quesID="#ques"+ques_no.toString();
                var b = document.querySelector(quesID);
                b.classList.add("visited");
                
                option_selected = 0;
                
               // console.log(answer_marked);

                //var myjson = JSON.stringify(answer_marked);

               // console.log(myjson);
            }
            
        };
        if(direction==1)
            ques_no++;
        else if(direction==0)
            ques_no--;
        xmlhttp.open("GET","show-questions.php?q="+ques_no,true);
        xmlhttp.send();
}

function markReview(){ 
    var quesID="#ques"+ques_no.toString();
    var b = document.querySelector(quesID);
    b.classList.add("mark-review");   
}

function markVisited(num){
    ques_no=num;
    var quesID="#ques"+ques_no.toString();
    var b = document.querySelector(quesID);
    b.classList.add("visited");
    changeQuestion(3);
}

function markOption(val){
    option_selected = val;
    var quesID="#ques"+ques_no.toString();
    var b = document.querySelector(quesID);
    b.classList.add("attempted");
    b.classList.remove("mark-review")

    answer_marked[ques_no]=val;
    console.log(answer_marked);
}

function clearResponse()
{
    var quesID="#ques"+ques_no.toString();
    var b = document.querySelector(quesID);
    b.classList.remove("attempted");
    b.classList.remove("mark-review");

    var optionID="#option"+answer_marked[ques_no].toString();
    var op = document.querySelector(optionID);
    op.checked=false;
    answer_marked[ques_no]=undefined;
}

function setTotalQuestions(num)
{
    total_questions=num;
    var j;
    for(j=0;j<=num;j++)
        answer_marked[j]=0;
}

function calculateScore() { 
   window.location.href = "result.php?answer=" + answer_marked; 
  }

window.onload = function() {
    changeQuestion(1);
  };