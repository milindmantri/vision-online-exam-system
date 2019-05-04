<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="./res/css/result.css" />
</head>

<body>
    <?php
    include_once './res/html/header.html';
    ?>
    <div style="text-align:center;">
    <div class="main-container" style="display:inline-block; text-align:left; ">

        <div id="result">
        <div id="result-text">Result</div>
            <div class="display-info">
                <div class="display-title">
                    <div class="padding-10"> Name: </div>
                    <div class="padding-10"> Total Questions: </div>
                    <div class="padding-10">Questions Answered: </div>
                    <div class="padding-10">Answers Correct: </div>
                    <div class="padding-10">Total Marks: </div>
                    <div class="padding-10">Marks Obtained: </div>
                    <div class="padding-10">Percentage: </div>
                </div>

                <div class="display-value">
                    <div id="display-name" class="padding-10">My Name</div>
                    <div id="display-total-questions" class="padding-10">My Total Questions</div>
                    <div id="display-questions-answered" class="padding-10">My Email Id</div>
                    <div id="display-answers-correct" class="padding-10">My Correct Answer</div>
                    <div id="display-total-marks" class="padding-10">My Total Marks</div>
                    <div id="display-marks-obtained" class="padding-10">My Marks Obtained</div>
                    <div id="display-percentage" class="padding-10">My Percentage</div>
                </div>

            </div>
            <div id="print-button"> <button>Print</button>  </div>
        </div>
    </div>
    </div>


</body>

</html>