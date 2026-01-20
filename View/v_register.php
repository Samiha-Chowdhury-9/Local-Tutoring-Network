<?php



?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="v_css/registerStyle.css">
        <script src="v_js/v_registration.js" defer></script>

    </head>
    <body>
        <form action="../Controller/c_registration.php" method="POST">
            Name:
            <input type="text" id="name" name="name"><br>
            <span name="nameErr"><?php if(isset($_POST["nameErr"])){echo $_POST["nameErr"];}?></span><br>

            Gender:
            <input type="radio" id="male" name="gender" value="male"> Male
            <input type="radio" id="female" name="gender" value="female"> Female <br><br>
            <span name="genderErr"><?php if(isset($_POST["genderErr"])){echo $_POST["genderErr"];}?></span><br>


            Phone Number:
            <input type="text" id="phoneNum" name="phoneNum"><br>
            <span name="phoneErr"><?php if(isset($_POST["phoneErr"])){echo $_POST["phoneErr"];}?></span><br>

            Email:
            <input type="email" id="email" name="email"><br>
            <span name="emailErr"><?php if(isset($_POST["emailErr"])){echo $_POST["emailErr"];}?></span><br>

            Password:
            <input type="password" id="password" name="password"><br>
            <span name="passErr"><?php if(isset($_POST["passErr"])){echo $_POST["passErr"];}?></span><br>

            Confirm Password:
            <input type="password" id="confirmPassword" name="confirmPassword"><br>
            <span name="confirmPassErr"><?php if(isset($_POST["confirmPassErr"])){echo $_POST["confirmPassErr"];}?></span><br>

            Role:
            <input type="radio" name="role" value="tutor" class="role-option"> Tutor
            <input type="radio" name="role" value="student-guardian" class="role-option"> Student / Guardian<br>
            <span name="roleErr"><?php if(isset($_POST["roleErr"])){echo $_POST["roleErr"];}?></span><br>
        
            <div id="tutorExtra" class="extraFields">
            Educational Background:
            <select name="tutorEducationalBackground">
                <option value="undergraduate" selected>Undergraduate</option>
                <option value="graduate">Graduate</option>
            </select><br><br>

            Current Institution (if any): 
            <input type="text" name="tutorCurrentInstitution"><br><br>

            Years of Experience (if any): 
            <input type="number" name="experienceYears"><br><br>

            Short Biography (Optional): <br>
            <textarea name="shortBiography" rows="4" cols="30"></textarea><br><br>
                </div>

            <div id="studentExtra" class="extraFields">
                Current Class/Level:
                <select name="studentClassLevel">
                    <option value="">Select an Option</option>
                    <option value="class-2">Class 1</option>
                    <option value="class-3">Class 2</option>
                    <option value="class-1">Class 3</option>
                    <option value="class-4">Class 4</option>
                    <option value="class-5">Class 5</option>
                    <option value="class-6">Class 6</option>
                    <option value="class-7">Class 7</option>
                    <option value="class-8">Class 8</option>
                    <option value="class-9">Class 9</option>
                    <option value="class-10">Class 10</option>
                    <option value="college-first-year">College First Year</option>
                    <option value="college-second-year">College Second Year</option>
                    <option value="admission-candidate">Admission Candidate</option>
                </select><br><br>

                Current Institution: 
                <input type="text" name="studentCurrentInstitution"><br><br>

                Location: 
                <input type="text" name="location"><br><br>
            </div>


            <input type="submit" name="submit" value="submit">
            <input type="reset" name="reset" id="resetBtn" value="reset">
        </form>
    </body>
</html>