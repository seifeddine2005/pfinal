<?php
require_once("base.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .sidebar{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width:200px;
        
            padding: 0.4rem 0.4rem;
        }
        .sidebar .top .logo{
            
            display: flex;
            padding-top: 25px;
            height: 50px;
            width:100%;
            padding-left: 10px;
            font-size: 24px;
            margin-bottom: 50%;
        }
        
        .sidebar ul li{
            position: relative;
            list-style-type: none;
            height: 50px;
            width:90%;
            
            
            
            
            
        }
        .sidebar ul li a{
            text-decoration: none;
            color:black;
            padding-left: 10%;
            font-size: 18px;
            
            
        }
        .sidebar ul li a:hover{
            color:#CDF7CF;
        }
        .seidebar ul li a i{
            min-width: 50px;
            text-align: center;
            height: 50px;
            border-radius: 12px;
            line-height: 50px;
            padding-left: 5%;
        }
        .logout{
            text-decoration: none;
            
            padding-left: 8%;
            font-size: 18px;
            padding-top: 150%;
            
        }
        .logout a{
            text-decoration: none;
           color: black;
            
            font-size: 18px;
        }
        .logout a:hover{
            text-decoration: underline;
        }
        .main {
            margin-left: 200px; 
            padding: 1rem;
            position: relative;
            background-color: white;
        }
        .main .container{
            margin-top:0.5%;
            margin-left: 1.5%;
        }
        
       
        .book{
            margin-left: 2.5%;
            margin-top: 2.5%;
            border-color:black ;
            width: 200px;
            height: 300px;
            border: 1px solid black;
            border-radius: 10%;


        }
        .inf{
            width: 100%;
            height: 250px;
            padding-top: 5%;
            padding-left: 10%;
        }
        .inf .img{
            width: 80%;
            height: 200px;
        }
        .titre{
            font-weight: bold;
        }
        .aut{
            opacity: 0.5;
        }
        
        .btn{
            width: 80%;
            height: 20px;
            margin-left: 5%;
            margin-top: 5%;
            
            border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            
        }
    
        
    </style>
</head>

<body>
    
    
<form action="" method="POST">
    <div class="sidebar">
        <div class="top">
            <div class="logo">
            <spam>BOOK</spam>
            <i class='bx bx-book-open'></i>
            <spam>CLUB</spam>
            </div>
        </div>
        
        <ul>
            <li>
                
                <a href="">
                <i class='bx bx-home'></i>    
                Home</a>
            </li>
            <li>
                
                <a href="">
                <i class='bx bx-book-bookmark' ></i>    
                Book</a>
            </li>
            <li>
            
            <a href="">
            <i class='bx bx-book-add'></i>    
            Add book</a>
            </li>
            <li>
                
                <a href="dashbord.php" class="dashbord">
                <i class='bx bx-tachometer'></i>
                Dashbord</a>
            </li>
            
            
        </ul>
        <div class="logout">
        <a href="login.php" class="out">
            <i class='bx bx-log-out'></i>    
            Log out
            </a>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <h1>Livres Disponible</h1>
        </div>
        
        
        
            <div class="book">
                <?php
                  $a="select * from livre";
                  $a1=mysqli_query($conn,$a);
                  while($row=mysqli_fetch_array($a1)):?>
                <div class="inf">
                    
                        
                        <img src="images/IMG-66bd81dc578487.92032264.jpg" class="img">
                       
                  
                    <div class="inf1">
                        <div class="titre">
                        <?php 
                        echo $row[1];?>
                        </div>
                        <div class="aut">
                        <?php 
                        
                        echo $row[2];
                        ?>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn" name="btn">More information</button>
                </div>
                <?php endwhile; ?>


            </div>
        </div>
        
    </div>
</form>
</body>
</html>