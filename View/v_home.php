<?php

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="v_css/homeStyle.css">
    </head>

    <body>
        <header>
            <section>
                <h1>Local Tutoring Network</h1>
                <h3><p id="motto">Connect with the best tutors in your area</p></h3>
                <br>
                
                <article>
                    <p>
                        Welcome to the <span>Local Tutoring Network</span>. 
                        Find the perfect tutor or student for your educational needs.
                    </p>
                </article>
            </section>
        </header>

        <main>
            <div class="button-wrapper">
                <button class="btn" onclick="location.href='v_login.php'">Login</button>
                <br><br>
                <div class="row">
                    <button class="btn" onclick="location.href='v_register_student.php'">Register as Student/Guardian</button>
                    <button class="btn" onclick="location.href='v_register_tutor.php'">Register as Tutor</button>
                </div>
            </div>

            <section class="reviews-container">
                <h2>User Reviews</h2>
                
                <div class="review-box">
                    <p><b>"Great platform!"</b></p>
                    <p>I found a math tutor in 2 days. - <i>Riya Hossain</i></p>
                </div>

                <div class="review-box">
                    <p><b>"Very helpful"</b></p>
                    <p>Good for finding students nearby. - <i>Ahmed Sadib</i></p>
                </div>

                <div class="review-box">
                    <p><b>"Easy to use"</b></p>
                    <p>Simple registration process. - <i>Hasib Ahsan</i></p>
                </div>
            </section>
        </main>

        <footer>
            <section>
                <p><b>Local Tutoring Network</b></p>
                <p>Contact: support@proton.com | +88014324728</p>
                <p>© 2026 All Rights Reserved.</p>
            </section>
        </footer>
    </body>
</html>