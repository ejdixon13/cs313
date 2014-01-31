<?php
session_start();

if (isset($_SESSION['redirectUrl']))
{
    //unset($_SESSION['redirectUrl']);
    $redirectUrl = $_SESSION['redirectUrl'];
    header("Location: $redirectUrl");
    die();
}
?>

<html lang="en">
<head>
    <title>Dr. Dudley's New Patient</title>
    <link rel="stylesheet" type="text/css" href="survey.css"/>
    <script rel="javascript" type="text/javascript" src="survey.js"></script>
</head>
<body>
        <p> New Patient Registration<hr></p>
        <p class="surveyHead">Step 1: Patient Information</p>
        <form action="survey.php" method="post" class="form">
            <table>
                <tr><td>Patient Name:</td>  <td> <input type="text" name="name"></td></tr>

                <tr><td>E-mail:</td>        <td><input type="text" name="email"></td></tr>
             
                <tr><td>Address:</td>       <td><input type="text" name="address" size="30"></td></tr>
 
                <tr><td>City:</td>          <td><input type="text" name="city"></td></tr>

                <tr><td>State:</td>         <td><input type="text" name="state"></td></tr>

                <tr><td>Zip Code:</td>      <td><input type="text" name="zipCode"></td></tr>
            </table>
            
            <table>
                <tr><td>Home Phone:</td>    <td><input type="text" name="homePhone"></td></tr>
                <tr><td>Work Phone: </td>   <td><input type="text" name="workPhone"></td></tr>
                <tr><td>Cell Phone:</td>    <td><input type="text" name="cellPhone"></td></tr>
                <tr><td>Sex:</td>           <td><input type="radio" name="sex" value="m"> Male 
                                            <input type="radio" name="sex" value="f">Female</td></tr>
                <tr><td>Marital Status:</td> <td><input type="radio" name="marital" value="m">M
                                                 <input type="radio" name="marital" value="s">S 
                                                 <input type="radio" name="marital" value="d">D 
                                                 <input type="radio" name="marital" value="w">W</td></tr>
                </tr>
                <tr><td>Date of Birth:</td> <td><select name="month">
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                                </select>
                    <select name="day">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>               
                            </select>
                    <input type="text" name="year" maxlength="4" size="4">
                    </td>
                </tr>
             </table><br/><br/><br/>
            
            <div class="center"><input type="submit" value="Next Step"></div>
        </form>
    
</body>
</html>
