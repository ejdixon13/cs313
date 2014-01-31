<?php
session_start();
 $_SESSION['redirectUrl'] = "http://ec2-54-209-114-1.compute-1.amazonaws.com/survey/survey.php";
 if (!isSet($_SESSION['name']))
 {
    $_SESSION['name'] = $_POST['name'];
 }
?>


<html>
    <head>
        <title>Results Page</title>
        <script rel="javascript" type="text/javascript" src="chart.js"></script>
        <script rel="javascript" type="text/javascript" src="surveyResults.js"></script>
        <link rel="stylesheet" type="text/css" href="survey.css"/>
        <meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
        <style>canvas{}</style>
    </head>
<body>
<p> Results Page<hr></p>
    
    
    
<div class="subHead">Welcome <?php echo $_SESSION['name']; ?>, to the results page!</div><br/>

<?php

// add m or f to gender.txt
$genderFile = fopen("gender.txt", "a+") or exit ("Unable to open file!");
fwrite($genderFile, $_POST['sex']);
fclose();

// add marital status to marital.txt
$maritalBirthFile = fopen("maritalBirth.txt", "a+") or exit ("Unable to open file!");
fwrite($maritalBirthFile, $_POST['marital']);

// add j of f to birthMonth.txt
if ($_POST['month'] == "january")
    {
        fwrite($maritalBirthFile, 'j');
    }
else if ($_POST['month'] == "february")
    {
        fwrite($maritalBirthFile, 'f');
    }
else{
    fwrite($maritalBirthFile, 'z');
}
fclose();



$genderFile = fopen("gender.txt", "r") or exit ("Unable to open file!");
$maritalBirthFile = fopen("maritalBirth.txt", "r") or exit ("Unable to open file!");

$maleCount = 0;
$femaleCount = 0;
$marriedCount = 0;
$singleCount = 0;
$divorcedCount = 0;
$widowedCount = 0;
$janCount = 0;
$febCount = 0;

// count number of males and femals
while (!feof($genderFile))
  {
        $gender = fgetc($genderFile);
            switch($gender){
                case "m": $maleCount++;
                    break;
                case "f": $femaleCount++;
                    break;
            }
  }
  
// count marital status and jan feb c
while (!feof($maritalBirthFile))
  {
        $type = fgetc($maritalBirthFile);
            switch($type){
                case "j": $janCount++;
                    break;
                case "f": $febCount++;
                    break;
                case "m": $marriedCount++;
                    break;
                case "w": $widowedCount++;
                    break;
                case "s": $singleCount++;
                    break;
                case "d": $divorcedCount++;
                    break;
            }
  }

fclose();

/*
print "Girl Count = $femaleCount <br/>";
print "Boy Count = $maleCount <br/>";
print "Married = $marriedCount <br/>";
print "Single = $singleCount <br/>";
print "Divorced = $divorcedCount <br/>";
print "Widowed = $widowedCount <br/>";
print "January = $janCount <br/>";
print "February = $febCount<br/>";*/

$genderCount = array($femaleCount, $maleCount, 0, 0);
$maritalCount = array($singleCount, $divorcedCount, $widowedCount, $marriedCount);
$monthCount = array($janCount, $febCount, 0, 0);

// make pie chart of my various counts
for ($i = 0; $i < 3; $i++)
{
    $phrase0;
    $phrase1;
    $phrase2;
    $phrase3;
    $titlePhrase;
    $counts;
    switch ($i){
        case "0": $counts = $genderCount;
                  $phrase0 = "Female: $counts[0]";
                  $phrase1 = "Male: $counts[1]";
                  $titlePhrase = "Patient Gender";
            break;
        case "1": $counts = $maritalCount;
                  $phrase0 = "Single: $counts[0]";
                  $phrase1 = "Divorced: $counts[1]";
                  $phrase2 = "Widowed: $counts[2]";
                  $phrase3 = "Married: $counts[3]";
                  $titlePhrase = "Patient Marital Status";
            break;
        case "2": $counts = $monthCount;
                  $phrase0 = "January Births: $counts[0]";
                  $phrase1 = "February Births: $counts[1]";
                  $titlePhrase = "Patient Birth Month";
            break;
    }
print "
    <div class= \"center\">
        <p>$titlePhrase</p>
        <div class=\"border\"><canvas id=\"$i\" height=\"200\" width=\"200\"></canvas></div>
        <p id=\"stuff\">$phrase0</p>
        <p id=\"stuff1\">$phrase1</p>";
        
        if ($i == 1)
        {
            print"
            <p id=\"stuff2\">$phrase2</p>
            <p id=\"stuff3\">$phrase3</p>";
        }
        
print"     
    </div>
        <script>
                var pieData = [
                                {
                                        value: $counts[0],
                                        color:\"#F38630\"
                                },
                                {
                                        value : $counts[1],
                                        color : \"#585858\"
                                },
                                {
                                        value : $counts[2],
                                        color : \"#69D2E7\"
                                },
                                {
                                        value : $counts[3],
                                        color : \"#2EFE2E\"
                                }
                        
                        ];
            
            var myPie = new Chart(document.getElementById(\"$i\").getContext(\"2d\")).Pie(pieData);
        
          </script>";
}

// Prints content of file
/*if ($content = file("gender.txt"))
{
    foreach ($content as $line)
    {
        print "$line <br/>";
    }
}*/
?>
</body>
</html>