<?php
session_start();
global $conn;
include("connection.php");

if (isset($_POST['delete']))
{
    $sl_no = mysqli_real_escape_string($conn, $_POST['delete']);
    $query = "DELETE FROM booking WHERE SL_NO='$sl_no'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run)
    {
        $_SESSION['message'] = "Data Deleted Successfully";
        header("Location: adminPanel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data can't be Deleted";
        header("Location: adminPanel.php");
        exit(0);
    }
}

if (isset($_POST['idelete']))
{
    $event_id = mysqli_real_escape_string($conn, $_POST['idelete']);
    $query = "DELETE FROM event WHERE event_id='$event_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run)
    {
        $_SESSION['message'] = "Data Deleted Successfully";
        header("Location: adminPanel.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data can't be Deleted";
        header("Location: adminPanel.php");
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
    <link rel="stylesheet" href="style.css">


    <title>Admin Panel</title>
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
        .user-img{
            width: 50px;
            border-radius: 100%;
            border: 1px solid #FFD289;
        }
        .sidebar{
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            width: 80px;
            background-color: #12171e;
            padding: 0.4rem 0.8rem;
            transition: all 0.5s ease;
            height: auto;
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
            left: 50px;
            transition: all 0.5s ease;
            width: calc(100% - 80px);
            padding: 1rem;
            color: #FFD289;
        }
        .main-content .container hr{
            border: none;
            width: 150px;
            height: 5px;
            background-color: #FFD289;
            border-radius: 10px;
            margin-bottom: 20px;
            margin-top: 10px;
        }
        .card .card-header{
            display: flex;
            position: relative;
        }
        .card .card-header .cEventBtn{
            position: absolute;
            display: flex;
            right: 20px;
        }
            .table{
                width: 100%;
                background: #FFD289;
                border-collapse: collapse;
                padding: 1rem;

            }
            .table th,td{
                padding: 1rem;
                font-weight: 600;
            }
            .table th{
                background: black;
                color: #FFD289;
            }
            .table tr:nth-of-type(2n){
                background: white;
            }
            @media (max-width: 650px){
                th {
                    display: none;
                }
                td{
                    display: block;
                    padding: 0.5rem 1rem;
                }
                td:first-child{
                    padding-top: 2rem;
                }
                td:last-child{
                    padding-bottom: 2rem;
                }
                td::before{
                    content: attr(data-cell) " : ";
                    font-weight: 700;
                    text-transform: capitalize;

                }
            }
            @media (max-width: 1055px) {
                th {
                    display: none;
                }
                td{
                    display: block;
                    padding: 0.5rem 1rem;
                }
                td:first-child{
                    padding-top: 2rem;
                }
                td:last-child{
                    padding-bottom: 2rem;
                }
                td::before{
                    content: attr(data-cell) " : ";
                    font-weight: 700;
                    text-transform: capitalize;

                }
            }
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
                <a href="#">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">DASHBOARD</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="adminSettings.php">
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
            <h1 class="heading">Dashboard</h1>
            <hr>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Appointment</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Client Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email Address</th>
                                            <th>Service</th>
                                            <th>Appointment Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM booking LIMIT 5";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $booking)
                                                {

                                                    ?>
                                                    <tr>
                                                        <td data-cell="Serial No"><?= $booking['SL_NO']; ?></td>
                                                        <td data-cell="Name"><?= $booking['name']; ?></td>
                                                        <td data-cell="Phone"><?= $booking['phone']; ?></td>
                                                        <td data-cell="Email"><?= $booking['email']; ?></td>
                                                        <td data-cell="Service"><?= $booking['service']; ?></td>
                                                        <td data-cell="Booking Date"><?= $booking['date']; ?></td>
                                                        <td data-cell="Action">
                                                            <a href="viewappointment.php?id=<?= $booking['SL_NO']; ?>" class="btn btn-info btn-sm">View</a>
                                                            <form action="" method="POST" class="d-inline">
                                                                <button type="submit" name="delete" value="<?=$booking['SL_NO'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }                                            }
                                            else
                                            {
                                                echo "<h5>No Record Found</h5>";
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Events</h4>
                                <button class="cEventBtn btn btn-success" onclick="location.href='createEvent.php'">Create Event</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Event ID</th>
                                        <th>Event Name</th>
                                        <th>Client Name</th>
                                        <th>Event PIN</th>
                                        <th>Event Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM event LIMIT 5";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $event)
                                        {

                                            ?>
                                            <tr>
                                                <td data-cell="Event ID"><?= $event['event_id']; ?></td>
                                                <td data-cell="Event Name"><?= $event['event_name']; ?></td>
                                                <td data-cell="Client Name"><?= $event['client_name']; ?></td>
                                                <td data-cell="PIN"><?= $event['event_pin']; ?></td>
                                                <td data-cell="Date"><?= $event['event_date']; ?></td>
                                                <td data-cell="Action">
                                                    <a href="viewEvents.php?id=<?= $event['event_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <form action="" method="POST" class="d-inline">
                                                        <button type="submit" name="idelete" value="<?=$event['event_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <?php
                                        }                                            }
                                    else
                                    {
                                        echo "<h5>No Record Found</h5>";
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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