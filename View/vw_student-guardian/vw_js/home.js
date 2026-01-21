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