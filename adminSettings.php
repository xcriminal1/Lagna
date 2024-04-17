<?php
session_start();
global $conn;
include("connection.php");
require 'connection.php';
if(isset($_POST['change_password']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['np']);
    $query = "UPDATE admin_login SET password='$password' WHERE username='$username'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run)
    {
        $_SESSION['message']="Password has been changed sucessfully!!!";
        header("Location: adminSettings.php");
        exit(0);
    }
    else
    {
        $_SESSION['message']="User can not be found";
        header("Location: adminSettings.php");
        exit(0);
    }
}

if(isset($_POST['change_username']))
{
    $cusername = mysqli_real_escape_string($conn, $_POST['cUsername']);
    $nusername = mysqli_real_escape_string($conn, $_POST['nUsername']);
    $uquery = "UPDATE admin_login SET username='$nusername' WHERE username='$cusername'";
    $nquery_run = mysqli_query($conn, $uquery);

    if ($nquery_run)
    {
        $_SESSION['message'] = "Username Updated Successfully";
        header("Location: adminSettings.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User can not be found !!!";
        header("Location: adminSettings.php");
        exit(0);
    }
}


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
    <title>Settings</title>
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
        background-position: center;
        
    }
        .user-img{
            width: 50px;
            border-radius: 100%;
            border: 1px solid #FFD289;
        }
        .sidebar{
            position: absolute;
            top: 0;
            left: 0;
            height: 150vh;
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
        .contact-container{
        height: auto;
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
    .card-body{
        background: #0B1642;
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
        <h1>Settings</h1>
        <hr>
        <div class="container mt-5">

            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Username Settings</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">

                                <div class="mb-3">
                                    <label>Enter Current Username :</label>
                                    <input type="text" name="cUsername" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Enter New Username :</label>
                                    <input type="text" name="nUsername" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="change_username" class="btn btn-primary">Change</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">

            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Password Settings</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">

                                <div class="mb-3">
                                    <label>Enter Username :</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Enter New Password :</label>
                                    <input type="password" name="np" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="change_password" class="btn btn-primary">Change</button>
                                </div>

                            </form>
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