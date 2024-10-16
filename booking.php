<?php
session_start();
global $conn;
include("connection.php");
if (isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address1 = mysqli_real_escape_string($conn, $_POST['address1']);
    $address2 = mysqli_real_escape_string($conn, $_POST['address2']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    $query = "INSERT INTO booking (name, phone, email, address1, address2, service, date) VALUES ('$name','$phone','$email','$address1','$address2','$service','$date')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run)
    {
        $_SESSION['message'] = "Data inserted sucessfully";
        header("Location: booking.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data does not inserted sucessfully";
        header("Location: booking.php");
        exit(0);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins", "sans-serif";
        }
        body{

            background: url("./images/bookingBG.png");
            background-size: cover;
            background-position: center;
        }
        .contact-container{
            height: 150vh;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        .contact-left{
            display: flex;
            flex-direction: column;
            align-items: start;
            gap: 20px;
            border: 2px solid #faead1;
            border-radius: 40px;
            padding: 30px 30px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10PX rgba(0, 0, 0, .2);
        }
        .contact-left-title h2{
            font-weight: 600;
            color: #FFD289;
            font-size: 40px;
            margin-bottom: 5px;

        }
        .contact-left-title hr{
            border: none;
            width: 180px;
            height: 5px;
            background-color: #FFD289;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .contact-inputs{
            width: 400px;
            height: 50px;
            border: none;
            outline: none;
            padding-left: 25px;
            font-weight: 500;
            color: #FFD289;
            border-radius: 50px;
        }
        .contact-left textarea{
            height: 140px;
            padding-top: 15px;
            border-radius: 20px;
        }
        .contact-inputs:focus{
            border: 2px solid #FFD289;
        }
        .contact-inputs::placeholder{
            color: #FFD289;
        }
        .contact-left button{
            display: flex;
            align-items: center;
            padding: 15px 30px;
            font-size: 16px;
            color: #FFD289;
            gap: 10px;
            border: none;
            border-radius: 50px;
            background: black;
            cursor: pointer;
            align-self: flex-end;
        }
        .contact-left button:hover{
            background: #FFD289;
            color: white;
        }
        .contact-right img{
            width: 500px;
        }
        @media(max-width:800px){
            .contact-container{
                height: 150vh;
            }
            .contact-inputs{
                width: 80vw;
            }
            .contact-right{
                display: none;
            }
        }
        .grid .grid-items
        {
            margin-right: 0.2rem;
            margin-top: 0.2rem;
            justify-items: center;
            align-items: center;
        }
        footer{
            background-color: #000000;
        }

        footer h5{
            color:#FFD289;
            font-weight: 700;
            font-size: 1.2rem;
        }

        footer li{
            padding-bottom: 4px;
        }

        footer li a{
            font-size: 0.8rem;
            color: #999;
        }

        footer li a:hover{
            color: #D8D8D8;
        }

        footer p{
            color: #999;
            font-size: 0.8rem;

        }

        footer .social a{
            color: #000;
            width: 38px;
            height: 38px;
            background-color: #fff;
            display: inline-block;
            text-align: center;
            line-height: 38px;
            border-radius: 50%;
            transition: 0.3s ease;
            margin: 0 5px;
        }

        footer .social a:hover{
            color: #fff;
            background-color: #FFD289;
        }
        footer .dev h6
        {
            color: #fff;
        }
        footer .cont h6
        {
            color: #fff;
        }
        footer .copyright p
        {
            text-align: center;
        }
        .grid .grid-items .item .product img
        {
            transition: transform 0.5s ease;
        }
        .grid .grid-items .item .product img:hover
        {
            transform: scale(1.1);
        }
        .inner-layer .container .row .col-sm-7 .content img{
            width: 500px;
            height: 500px;
        }



    </style>
</head>
<body >
<!--Start Header-->
<div class="header sticky-top" id="header">
    <!--Start Primary Navigation Bar-->

    <nav class=" navbar navbar-expand-lg color-second-bg">
        <img src="./images/logo_bgless.png" style="height: 50px;" alt="">
        <button class="navbar-toggler" style="color: #FFD289;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: #FFD289;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto m-auto font-rubik font-size-20">
                <li class="nav-item">
                    <a class="nav-link" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SERVICES</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="booking.html">BOOKING<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="womens.html">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="contactus.html" >CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="blogs.html" >BLOGS</a>
                </li>
            </ul>



        </div>
    </nav>
    <!--End Primary Navigation Bar-->
</div>
<!--End Header-->
<!--Start main-->
<div class="contact-container">
    <div class="contact-right">
        <img src="./images/logo_bgless.png" alt="">
    </div>
    <form action="" class="contact-left" method="POST">
        <div class="contact-left-title">
            <h2>Book Your Date</h2>
            <hr>
        </div>
        <input type="hidden" name="access_key" value="b5a73b54-6f8f-42a2-bdc9-b21dfd78d943">
        <input type="text" placeholder="Enter Full Name" name="name" id="name" class="contact-inputs" required>
        <input type="text" placeholder="Enter Mobile Number" name="phone" id="phone" class="contact-inputs" required>
        <input type="email" placeholder="Enter Email Address" name="email" id="email" class="contact-inputs" required>
        <input type="text" placeholder="Address Line 1" name="address1" id="address1" class="contact-inputs" required>
        <input type="text" placeholder="Address Line 2" name="address2" id="address2" class="contact-inputs" required>
        <input type="text" placeholder="Service Required" name="service" id="service" class="contact-inputs" required>
        <input type="date" placeholder="Enter Appointment Date" name="date" id="date" class="contact-inputs" required>
        <button type="submit" name="submit">Submit</button>
    </form>


</div>
<!--End main-->
<!--Start Footer-->
<footer>
    <footer class="mt-3 py-5">
        <div class="row container mx-auto pt-3">
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <img src="./images/logo_bgless.png" style="height: 80px;">
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase list-unstyled">
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                    <li><a href="#">Item 3</a></li>
                    <li><a href="#">Item 4</a></li>
                    <li><a href="#">Item 5</a></li>
                </ul>
            </div>
            <div class="cont footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Contact Details</h5>
                <div>
                    <p>Dumdum, Kolkata,<br>741302<br>
                        +91 9134728073<br>
                        lagna.india07@gmail.com</p>
                </div>
            </div>
            <div class="social col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="text-uppercase">Social Media</h5>
                <div>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>

            </div>
        </div>
        <div class="dev container  mx-auto  pt-3 text-center">
            <p>LAGNA INDIA ©2023-2026. All Rights Reserved </p>
            <h6 class="text-uppercase ">Developed by : EpioTech</h6>
        </div>
    </footer>
</footer>
<!--End Footer-->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Custom JS-->

<script src="./index.js"></script>

</body>
</html>