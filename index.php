<!DOCTYPE html>
<html>
    
    <head>
        <meta charset= "utf-8" />
        <title>Random Password Generator</title>
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Cuprum:700" rel="stylesheet">
    </head>
    
    <body>
        <h1>Calorie Consumption Calculator</h1>
        
        <form>
            <!--Form 1-->
            Weight: <input type="text"  name="weight"> lbs
            <br><br>
           
            <!--Form 2-->
            Height: <input type="text" name="ft">ft <input type="text" name="in">in
            <br><br>
            
            <!--Form 3-->
            Age: 
            <?php
                echo" <select name= 'age'>";
                for($i = 15; $i <= 100; $i++)
                {
                    echo "<option  value = '$i'> $i</option>";
                }
                echo"</select>";
            ?>years
            <br><br>
           
            <!--Form 4-->
            Gender:
            <label for= "male">Male</label>
            <input type="radio" name = "gender" value="0">
            <label for= "female">Female</label>
            <input type="radio" name = "gender" value="1">
            <br><br>
            
            <!--Form 5-->
            Activity Level:
            <select name= "actLvl">
                <option value= "0">Sedentary</option>
                <option value= "1">Lightly Active</option>
                <option value= "2">Moderately Active</option>
                <option value= "3">Very Active</option>
                <option value= "4">Extremely Active</option>
            </select>
            <br><br>
            
            <!--Form 6-->
            Goal: 
            <select name= "goal">
                <option value= "0">Lose Weight</option>
                <option value= "1">Maintain Weight</option>
                <option value= "2">Gain Weight</option>
            </select>
            <br><br>
            
            <!--Form 7-->
            <input type ="Submit" name = "calculate" value = "Calculate" />
        </form>
        <br><br>
        
        <?php 
            if(isset($_GET['calculate']))
            {
                $weight = $_GET['weight'];
                $ft = $_GET['ft'];
                $in = $_GET['in'];
                $height= ($ft*12) + $in;
                $age = $_GET['age'];
                $gender = $_GET['gender'];
                $actLvl = $_GET['actLvl'];
                $goal= $_GET['goal'];
                
                if($gender==0)
                {
                    $bmr= 66 + (6.23 * $weight) + (12.7 * $height) - (6.8 * $age);
                }
                else
                {
                    $bmr= 655 + (4.35 * $weight) + (4.7 * $height) - (4.7 * $age);
                }
                echo "Your Basal Metabolic Rate is $bmr <br>";
                
                switch ($actLvl) {
                    case '0':
                        $bmr*= 1.2;
                        break;
                    case '1':
                        $bmr*= 1.375;
                        break;
                    case '2':
                        $bmr*= 1.55;
                        break;
                    case '3':
                        $bmr*= 1.725;
                        break;
                    case '4':
                        $bmr*= 1.9;
                        break;
                }
                echo "Your total daily expenditure is $bmr <br>";
                
                switch ($goal) 
                {
                    case '0':
                        $bmr-=500;
                        echo "So in order to lose one pound a week you must consume no more than $bmr calories<br>";
                        break;
                    case '1':
                        echo "So in order to maintain your current weight you must consume no more than $bmr calories<br>";
                        break;
                    case '2':
                        $bmr+=500;
                        echo "So in order to gain one pound a week you must consume at least $bmr calories<br>";
                        break;
                }
            }
            unset($_GET['weight']);
        ?>
        
    </body>
    
</html>