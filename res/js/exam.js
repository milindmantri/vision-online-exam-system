function questionNumbers(total){

    var x="",i;
    for(i=1; i<=total; i++)
    {
        x=x+"<button type='button' id='ques"+i+"' class='mark' onclick='markVisited("+i+")'>"+i+"</button>";
        if(i%4==0)
        x=x+"<br>";
    }
    x=x+"<div> <button name='submit-test' type='button' class='all-button all-button-hover' onclick='calculateScore()'>Submit Test</button></div>";
    document.getElementById("mark-question").innerHTML = x;
}



/*
function countDownTimer(){
    <!-- Display the countdown timer in an element -->
<p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
}*/
