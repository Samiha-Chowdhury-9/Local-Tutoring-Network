function checkUsername() {
            var username = document.getElementById('username').value;
            var msgSpan = document.getElementById('username_msg');
            var submitBtn = document.getElementById('submitBtn');

            if (username.length === 0) {
                msgSpan.innerHTML = "";
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controller/c_check_username.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        msgSpan.innerHTML = response.message;
                        if (response.status === "taken") {
                            msgSpan.style.color = "red";
                            submitBtn.disabled = true;
                        } else {
                            msgSpan.style.color = "green";
                            submitBtn.disabled = false;
                        }
                    } catch (e) {}
                }
            };
            xhr.send("username=" + username);
        }