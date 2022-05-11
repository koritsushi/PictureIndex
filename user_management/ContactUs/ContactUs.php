<!DOCTYPE html>
<html lang="en">

<?php include('../../userHead.php');
include "../../dbConn.php";
$baseUrl = 'http://localhost/PictureIndex/user_management/ContactUs';
$distUrl = 'http://localhost/PictureIndex/dist/'; ?>
<html>
    <head>
            <!--Linked with CSS (Cascading Style Sheets)-->
            <link rel="stylesheet" href="http://localhost/PictureIndex/StyleSheet.css">
    </head>

    <!--Navigation bar-->    
    <body>
    <?php include('../../userHeader.php') ?>   
    <!--Contact Us and Feedback Section-->
    <section class="contact">
        <div class="content">
            <h1>Contact Us</h1>
            <p></p>
        </div>
        <div class="container">
        <div class="contactInfo">
            <div class="box">
                <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h2>Email</h2>
                        <p>PictureIndex@gmail.com</p>
                    </div>
                </div>
                <div class="feedbackForm">
                    <form>
                        <h2>Feedback</h2>
                        <div class="inputbox">
                            <input type="text" name="" required="required">
                            <span>Subject</span>
                        </div>
                        <div class="inputbox">
                            <textarea required="required"></textarea>
                            <span>Description</span>
                        </div>
                        <div class="inputbox">
                            <textarea required="required"></textarea>
                            <span>Suggestion</span>
                        </div>
                        <div class="inputbox">
                            <input type="submit" name="" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </section>

    <?php include "../../userFooter.php"; ?>  
    </body>
</html>