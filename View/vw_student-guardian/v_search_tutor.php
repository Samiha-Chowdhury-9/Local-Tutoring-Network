<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student-guardian'){
    header("Location: ../v_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search Tutor</title>
    <link rel="stylesheet" href="../v_css/common.css?v=1.1">
    
    <style>
        body {
            padding-top: 40px; 
        }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
        }

        .search-box { 
            margin: 20px auto 30px auto; 
            text-align: center; 
            max-width: 500px;
        }

        /* * Automatically themes the 'Book Session' buttons generated 
         * dynamically by the c_search_tutor.php controller 
         */
        .book-btn {
            display: inline-block;
            padding: 8px 15px;
            background-color: var(--text-light);
            color: #000;
            text-decoration: none;
            border: 2px solid var(--border-color);
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
            text-align: center;
        }

        .book-btn:hover {
            background-color: var(--primary-hover);
            color: var(--bg-page);
        }

        .cancel-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--primary-color);
            font-weight: bold;
            text-decoration: none;
        }
        
        .cancel-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body onload="filterTutors()"> 

    <div class="dashboard-container">
        <h2 class="header-title">Find a Tutor</h2>
        
        <div class="search-box">
            <input type="text" id="search_query" onkeyup="filterTutors()" placeholder="Search by Subject (e.g. Math, English)...">
        </div>

        <div id="result_area" style="overflow-x: auto;">
            <p style="text-align:center;">Loading tutors...</p>
        </div>

        <div style="text-align:center; margin-top: 30px;">
            <a href="v_student-guardian_home.php" class="cancel-link">&larr; Back to Dashboard</a>
        </div>
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