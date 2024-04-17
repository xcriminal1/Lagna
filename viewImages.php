<?php
global $conn;
include("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./sass/include/adminlogin.scss">
    <link rel="stylesheet" href="lightbox.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "sans-serif";
        }

        body {
            display: block;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #0B1642;
            background-size: cover;
            background-position: center;
        }
        .wrapper {
            width: 420px;
            background: whitesmoke;
            border: 2px solid #FFD289;
            backdrop-filter: blur(10px);
            color: #FFD289;
            border-radius: 10px;
            padding: 30px 40px;
            box-shadow: 0 0 10PX rgba(0, 0, 0, .2);
            margin-top: 100px;
            position: relative;
            top: 50px;
            bottom: 50px;
        }
        .wrapper h1{
            font-size: 36px;
            text-align: center;
        }
        .wrapper .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
            color: #FFD289;
        }
        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid #FFD289;
            border-radius: 40px;
            font-size: 16px;
            color: #FFD289;
            padding: 20px 45px 20px 20px;
            font-weight: 100;
        }
        .input-box input::placeholder{
            color: #FFD289;
            font-weight: 100;
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }
        .wrapper .remember-forgot{
            display: flex;
            justify-content: space-between;
            font-size: 14.5px;
            margin: -15px 0 15px;
        }
        .remember-forgot label input{
            accent-color: #FFD289;
            margin-right: 3px;
        }
        .remember-forgot a{
            color: #FFD289;
            text-decoration: none;
        }
        .remember-forgot a:hover{
            text-decoration: underline;
        }
        .wrapper .btn{
            width: 100%;
            height: 45px;
            background: black;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px;
            color: #FFD289;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
        }
        .wrapper .btn:hover{
            background: #FFD289;
            color: #fff;
        }
        .g-container{
            max-width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(22rem, 100%), 1fr));
            grid-gap: 30px;
            padding: 50px 8%;
            overflow-x: auto;
        }
        .gallery{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(22rem, 100%), 1fr));
            grid-gap: 30px;
        }
        .gallery img{
            width: 100%;

        }
        .gallery img:hover{
            transform: translateY(-10px);
            transition: 0.3s;
        }
        .gallery i{
            color: #FFD289;



        }
        .gallery i:hover{
            transition: 0.3s;
            transform: translateY(-10px);
        }


    </style>
</head>
<body >
<div class="main">
    <center>
        <div class="wrapper">
            <form action="viewImages.php" method="POST">
                <h1>Welcome</h1>
                <div class="input-box">
                    <input type="text" id="e_id" name="e_id" placeholder="Enter Event ID" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="pin" name="pin" placeholder="Enter Event PIN" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" class="btn" name="submit" value="getPhotos">Get Photos</button>
            </form>
        </div>
    </center>

    <h1 class="font-rale text-center py-3" style="color: #FFD289; margin-top: 100px">Photos</h1>
    <div class="g-container">
        <?php
            if (isset($_POST['submit']))
            {
                $e_id = $_POST['e_id'];
                $pin = $_POST['pin'];
                $sql = "select * from eventimages where e_id='$e_id' and pin='$pin'";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0)
                {
                    while($fetch = mysqli_fetch_assoc($result)){

                    ?>
                        <div class="gallery">

                            <a href="upload/<?php echo $fetch['image']; ?>" data-lightbox="lagna_gallery" data-titles="">
                                <img src="upload/<?php echo $fetch['image']; ?>" alt="">
                                <a href="upload/<?php echo $fetch['image']; ?>" download><i class="fa-solid fa-download"></i></a>
                            </a>
                        </div>
                        <?php
                    }
                }
            }
            ?>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Custom JS-->

<script src="./index.js"></script>
<script src="lightbox-plus-jquery.js"></script>

</body>
</html>
