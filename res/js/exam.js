function questionNumbers(){
    var x="",i;
    for(i=1; i<=10; i++)
    {
        x=x+"<button id='ques"+i+"' class='mark'>"+i+"</button>";
        if(i%4==0)
        x=x+"<br>";
    }
    x=x+"<div><button class='all-button'>Submit Test</button></div>";
    document.getElementById("question-mark").innerHTML = x;

}
questionNumbers();
