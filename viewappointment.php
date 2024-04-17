<?php
global $conn;
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com./boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>View Appointment</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body{
            background: #0B1642;
            background-size: auto;
            background-position: center;}
        .user-img{
            width: 50px;
            border-radius: 100%;
            border: 1px solid #FFD289;
        }
        .card{
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10PX rgb(255, 210, 137, .2);
            border: 2px solid #faead1;
            border-radius: 15px;
        }
        .card-body{
            background: #0B1642;
        }
        .sidebar{
            position: absolute;
            top: 0;
            left: 0;
            height: 200vh;
            width: 80px;
            background-color: #12171e;
            padding: 0.4rem 0.8rem;
            transition: all 0.5s ease;
        }
        .sidebar.active ~ .main-content{
            left: 250px;
            width: calc(100% - 250px);
        }
        .sidebar.active{
            width: 250px;

        }
        .sidebar #btn{
            position: absolute;
            color: #FFD289;
            top: .4rem;
            left: 50%;
            font-size: 1.2rem;
            line-height: 50px;
            transform: translateX(-50%);
            cursor: pointer;
        }
        .sidebar.active #btn{
            left: 90%;
        }
        .sidebar .top .logo{
            display: flex;
            height: 50px;
            width: 100%;
            align-items: center;
            pointer-events: none;
            opacity: 0;
        }
        .sidebar.active .top .logo{
            opacity: 1;
        }
        .top .logo i{
            font-size: 2rem;
            margin-right: 1rem;
        }
        .user{
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }
        .user p{
            color: #fff;
            opacity: 1;
            margin-left: 1rem;
        }
        .bold{
            font-weight: 600;
        }
        .sidebar p{
            opacity: 0;
        }
        .sidebar.active p{
            opacity: 1;
        }
        .sidebar ul li{
            position: relative;
            list-style-type: none;
            height: 50px;
            width: 90%;
            margin: 0.8rem auto;
            line-height: 50px;
        }
        .sidebar ul li a {
            color: #FFD289;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 0.8rem;
        }
        .sidebar ul li a:hover{
            background-color: #FFD289;
            color: #fff;
        }
        .sidebar ul li a i{
            min-width: 50px;
            text-align: center;
            height: 50px;
            border-radius: 12px;
            line-height: 50px;
        }
        .sidebar .nav-item{
            opacity: 0;
        }
        .sidebar.active .nav-item{
            opacity: 1;
        }
        .sidebar ul li .tooltip{
            position: absolute;
            left: 125px;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0.5rem 0.8rem rgba(0,0,0,0.2);
            border-radius: 0.6rem;
            padding: 0.4rem 1.2rem;
            line-height: 1.8rem;
            z-index: 20;
            opacity: 0;
        }
        .sidebar ul li:hover .tooltip{
            opacity: 1;
        }
        .sidebar.active ul li .tooltip{
            display: none;
        }
        .main-content{
            position: relative;
            background:url();
            min-height: 100vh;
            top: 0;
            left: 80px;
            transition: all 0.5s ease;
            width: calc(100% - 80px);
            padding: 1rem;
            align-items: center;
            color: #FFD289;
        }
        .main-content .container hr{
            border: none;
            width: 220px;
            height: 5px;
            background-color: #FFD289;
            border-radius: 10px;
            margin-bottom: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx"><img src="./images/logo_up.png" style="width: 30px;"></i>
                <span><img src="./images/logo_down.png" style="width: 50px;" alt=""></span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
            <img src="./images/avatar.png" class="user-img" alt="">
            <div>
                <p class="bold">Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="adminPanel.php">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">DASHBOARD</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-cog"></i>
                    <span class="nav-item">SETTINGS</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href="adminLogin.php">
                    <i class="bx bx-log-out-circle"></i>
                    <span class="nav-item">LOGOUT</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="container">
            <h1>View Appointments</h1>
            <hr>
            <div class="container mt-5">


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Appointment Details

                                </h4>
                            </div>
                            <div class="card-body">

                                <?php
                                if (isset($_GET['id']))
                                {
                                    $sl_no = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM booking WHERE SL_NO='$sl_no'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0)
                                    {
                                        $booking = mysqli_fetch_array($query_run);
                                        ?>

                                    <div class="mb-3">
                                        <label>1. Client Name</label><br>
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;<?=$booking['name'];?></h4>
                                    </div>
                                    <div class="mb-3">
                                        <label>2. Mobile Number</label><br>
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;<?=$booking['phone'];?></h4>
                                    </div>
                                    <div class="mb-3">
                                        <label>3. Email Address</label><br>
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;<?=$booking['email'];?></h4>
                                    </div>
                                    <div class="mb-3">
                                        <label>4. Address Line 1</label><br>
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;<?=$booking['address1'];?></h4>
                                    </div>
                                    <div class="mb-3">
                                        <label>5. Address Line 2</label><br>
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;<?=$booking['address2'];?></h4>
                                    </div>
                                    <div class="mb-3">
                                        <label>6. Service Requested</label><br>
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;<?=$booking['service'];?></h4>
                                    </div>
                                    <div class="mb-3">
                                        <label>7. Appointment Date</label><br>
                                        <h4>&nbsp;&nbsp;&nbsp;&nbsp;<?=$booking['date'];?></h4>
                                    </div>

                                        <?php
                                    }
                                    else
                                    {
                                        echo"<h4>No record found</h4>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');

    btn.onclick = function ()
    {
        sidebar.classList.toggle('active');
    };
</script>
</html>