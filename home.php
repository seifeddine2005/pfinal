<?php
require_once("base.php");
$a="select * from compte";
$a1=mysqli_query($conn,$a);
if(mysqli_num_rows($a1)== 0){
    header("location:login.php");
}
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
            color: #D6D7D9;
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
        .main .imm{
            margin-left: 2.5%;
            margin-top: 2.5%;
            background-color: none;
            border: 1px solid #E7473C;
            width: 95%;
            height: 200px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .main .imm .img{
            width: 40%;
            height:300px;
            order: 2;
            margin-left: 40%; 
        }
        .main .imm .text {
            order: 1;
            font-size: 45px;
    padding-left: 5%;
    color: white;
    flex: 1;
        }
        .latest{
            margin-top: 2.5%;
            margin-left: 2.5%;
            color:black;
            width:95%;
           
        }
        .latest p{
            font-size: 20px;
            font-weight: bold;
        }
        .latest a{
            text-decoration: none;
            color: black;
            padding-left: 90%;
            font-size: 18px;
            
        }
        .latest a:hover{
            
            color: #D6D7D9;
        }
        .book{
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Crée trois colonnes de largeur égale */
            gap: 20px; /* Espace entre les éléments */
            padding: 20px;
            margin-top: 2.5%;
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
            <?php
            $a="select * from compte";
            $a1=mysqli_query($conn,$a)or die(mysqli_error($conn));
            while($row=mysqli_fetch_array($a1)){
            echo "<h1>Bienvenue $row[1] ,</h1>";}
            ?>
        </div>
        <div class="imm">
            <p class="text">
                <h3>Find the Book <br>
                you're looking for<br>
                easier to read.</h3>
                <input type="text" placeholder="Search" class="search" name="search">
            </p>
            <image src="images\fish.png" class="img"></image>
        </div>
        <div class="latest">
            <p>Latest
            <a href="">view all</a>
            </p>
            <div class="book">
                <?php
                  $a="select * from livre";
                  $a1=mysqli_query($conn,$a);
                  while($row=mysqli_fetch_array($a1)):?>
                <div class="inf">
                    
                        
                        <img src="images/<?=$row['img']?>">
                       
                    
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