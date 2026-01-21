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
    <title>Search Tutor</title>
    <link rel="stylesheet" href="vw_css/tutor_search_style.css">
    <style>
        .search-box { 
            margin: 20px auto; 
            text-align: center; 
        }
        #result_area {
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>
<body onload="filterTutors()"> 

    <h2>Find a Tutor</h2>
    
    <div class="search-box">
        <input type="text" id="search_query" onkeyup="filterTutors()" placeholder="Search by Subject (e.g. Math, English)..." style="width: 300px; padding: 10px;">
    </div>

    <hr>

    <div id="result_area">
        <p style="text-align:center;">Loading tutors...</p>
    </div>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='v_student-guardian_home.php'">Back to Dashboard</button>
    </div>

    <script>
        function filterTutors() {
            var input = document.getElementById('search_query').value;
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controller/c_search_tutor.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('result_area').innerHTML = xhr.responseText;
                }
            };
            xhr.send('search_query=' + input);
        }
    </script>
</body>
</html>