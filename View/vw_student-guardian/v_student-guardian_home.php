<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){
    header("Location: ../v_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../v_css/common.css">
</head>
<body>
    <h1>Student Dashboard</h1>
    <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
    
    <div style="margin-top: 20px;">
        <button onclick="loadTutors()">Find Tutors</button> 
        <br><br>
        <button onclick="loadProfile()">My Profile</button>
        <br><br>
        <button onclick="location.href='v_my_bookings.php'">My Bookings</button> 
        <br><br>
        <button onclick="location.href='v_resourses.php'">Resources</button> 
        <br><br>
        <button onclick="location.href='../v_logout.php'" style="background-color: red; color: white;">Logout</button>
    </div>

    <hr>

    <div id="result_area" style="margin-top: 20px;">
        </div>

    <script>
        
        function loadTutors() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controller/c_student_process.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('result_area').innerHTML = xhr.responseText;
                }
            };
            xhr.send('action=show_all_tutors');
        }

        
        function loadProfile() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controller/c_student_process.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('result_area').innerHTML = xhr.responseText;
                }
            };
            xhr.send('action=view_profile');
        }

       
        function updateProfile() {
            var email = document.getElementById('email').value;
            var edu = document.getElementById('education_background').value;
            var inst = document.getElementById('institution').value;
            var loc = document.getElementById('location').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controller/c_student_process.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('msg').innerHTML = xhr.responseText;
                }
            };
            
            var data = 'action=update_profile&email=' + email + '&education_background=' + edu + '&institution=' + inst + '&location=' + loc;
            xhr.send(data);
        }
    </script>
</body>
</html>