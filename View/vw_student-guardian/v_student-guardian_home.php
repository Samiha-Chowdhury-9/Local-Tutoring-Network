<?php

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
    
    <div style="margin-top: 20px; padding: 10px; border-bottom: 2px solid #ddd;">
        <button onclick="loadTutors()">🔍 Find Tutors</button> 
        <button onclick="loadProfile()">👤 My Profile</button>
        <button onclick="location.href='v_my_bookings.php'">📅 My Bookings</button> 
        <button onclick="location.href='v_resourses.php'">📚 Resources</button> 
        <button onclick="location.href='../v_logout.php'" style="background-color: red; color: white;">Logout</button>
    </div>

    <div id="result_area" style="margin-top: 20px; padding: 20px;">
        <h3>Select an option from the menu above.</h3>
    </div>

    <script>
        
        function loadTutors() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controller/c_student_process.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('result_area').innerHTML = "<h3>Tutor List</h3>" + xhr.responseText;
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
                    document.getElementById('result_area').innerHTML = "<h3>My Profile</h3>" + xhr.responseText;
                }
            };
            xhr.send('action=view_profile');
        }

        
        function updateProfile() {
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;
            var institution = document.getElementById('institution').value;
            var dob = document.getElementById('dob').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controller/c_student_process.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('msg').innerHTML = xhr.responseText;
                }
            };
            
            var data = 'action=update_profile&phone=' + phone + '&address=' + address + '&institution=' + institution + '&dob=' + dob;
            xhr.send(data);
        }
    </script>
</body>
</html>