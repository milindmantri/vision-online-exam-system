<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam</title>
    <link rel="stylesheet" href="./res/css/exam.css" />
    
</head>
<body>
    <?php
        include_once './res/html/header-exam.html'
    ?>
    <div id="container">
    <div id="exam" class="flex-container flex-direction-row ">
    
        <div id="question-answer" class="flex-container flex-direction-column margin-10 box box-shadow" >
            <div id= "questions" >
                <p id="mcq-question">Q-1) Two numbers are in the ratio of 2:9. If their H.C.F. is 19, numbers are: 
                </p>
            </div>
            <div id="answers" >
                A. <input type="radio" id="option1" name="option" value="6, 27">6, 27 <br/>
                B. <input type="radio" id="option2" name="option" value="8, 36">8, 36 <br/>
                C. <input type="radio" id="option3" name="option" value="38, 171">38, 171 <br/>
                D. <input type="radio" id="option4" name="option" value="20, 90">20, 90 <br/>
                <button class="all-button">Next</button>
                <button class="all-button">Mark for Review</button>
            </div>
        </div>

        <div id="question-attempt" class="flex-container flex-direction-column margin-10 box box-shadow">
            <div id="symbols" class="box">
                <div class="sample-div"><span >Visited:</span> <button id="visited" class='sample-mark'>0</button> </div>
                <div class="sample-div"> <span>Attempted: </span> <button id="attempted" class='sample-mark'>0</button> </div>
                <div class="sample-div"> <span>Not Visited:</span> <button id="not-attempted" class='sample-mark'>0</button></div>
                <div class="sample-div"> <span>Mark for Review:</span> <button id="mark-review" class='sample-mark'>0</button></div>

            </div>
            <div id="question-mark" class="box"></div>
        </div>
    </div>
</div>
    <script src="./res/js/exam.js"></script>
</body>
</html>