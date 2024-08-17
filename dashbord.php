<?php
require_once("base.php");
$a="select * from compte";
$a1=mysqli_query($conn,$a);
$x=mysqli_fetch_array($a1);
$error="";
if($x[3]!=="admin"){
    $error="Espace Admin";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
        
        
        .alert{
            background-color: red;
            margin-top: 1%;
            height:40px;
            width:100%;
            color:white;
            font-size: 24px;
            text-align: center;
           
        }
        table{
            margin-top: 2.5%;
            margin-left: 2.5%;
            width:90%;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
        }

        thead {
            background-color: #D6D7D9; /* This matches the color palette you're working with */
            color: white;
        }
        tbody tr:hover {
            background-color: #ddd;
        }

        tbody td {
            border-bottom: 1px solid #ccc;
        }

        th {
            border-bottom: 2px solid #D6D7D9;
        }

        tbody td.bg {
            background-color: #D6D7D9;
        }

        tbody td.action {
            text-align: center;
         }

        .btn1 {
            background-color: none;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            border-color: green;
        }

        .btn1:hover {
            background-color: green;
        }
        .btn2 {
            background-color: none;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            border-color: red;
        }

        .btn2:hover {
            background-color: red;
        }
        .pdf{
            color: black;
            text-decoration: none;
        }
        .pdf:hover{
            color: white;
            
        }
    </style>
</head>

<body>

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
                
                <a href="home.php">
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
    <?php if (!empty($error)): ?>
        <div class='alert' role='alert'>
            <h4 class='text-center'><?php echo $error; ?></h4>
        </div>
    <?php else : ?>
        <div class="container">
        <h1>Demande</h1>
        </div>
        <table border = 0 cellspacing = 0 cellpadding = 10>
            <thead>
      <tr>
        <th>#</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Genre</th>
        <th>Annee</th>
        <th>File PDF</th>
        <th>Affiche</th>
        <th>Decision</th>
      </tr>
      </thead>
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM demande");
      ?>

      <?php foreach ($rows as $row) : ?>
        <tbody>
      <tr>
        
            
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['nom']?></td>
            <td><?php echo $row["aut"]?></td>
            <td><?php echo $row["genre"]?></td>
            <td><?php echo $row["annee"]?></td>
            <td><a href="pdf/<?php echo $row['file']?>" class="pdf"><?php echo $row['file'] ?></a></td>
            <td><img src="images/<?=$row['img']?>" style="height : 75px;"></td>
            <td>
            <button type="submit" class="btn1" name="action" id="aj" value="ajouter">Ajouter</button>
            <button type="button" class="btn2" name="action" id="eff" value="eff">Effacer</button></td>
       
     

      </tr>
      
      </tbody>
      <?php endforeach; ?> 
      
      
    </table>
    <?php endif; ?>
    </div>
    
</body>
</html>