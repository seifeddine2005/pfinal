<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            display: flex;
            justify-content: center;
            min-height: 100vh;
            
        }

        .wrapper{
            position: fixed;
            padding-top: 1%;
            width: 450px;
            height: 520px;
            border:1px solid black;
            border-radius: 10px;
            margin-top: 5%;
        }

        .wrapper h1{
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box{
            width: 100%;
            height: 50px;
            margin:30px 0;
            padding-left: 10%;
        }

        .input-box input{
            width: 80%;
            height: 100%;
            background: transparent;
            outline: none;
            border: 0.5px solid black;
            border-radius: 40px;
            font-size: 16px;
            padding: 20px 45px 20px 20px;
        }

        .input-box select{
            width: 85%;
            height: 50px;
            background: transparent;
            outline: none;
            border :none;
            font-size: 16px;
            padding: 10px 45px 20px 0px;
            
        }
       

        .input-box input::placeholder{
            color:black;
        }

        .wrapper .btn{
            width: 80%;
            height: 45px;
            margin-left: 10%;
            background: black;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #f5efe9;
            font-weight: 600;
        }
  
        .wrapper .ouvrir{
            font-size: 16px;
            text-align: center;
            margin: 20px 0 15px;
        }
  
        .ouvrir p a{
            color: black;
            text-decoration: none;
            font-weight: 600;
        }
  
        .ouvrir p a:hover{
            text-decoration: underline;
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
  
      
    </style>
</head>
<body>
    <?php
    require_once("base.php");
    $error='';
    if(isset($_POST['btn'])){
        $nom=$_POST["nom"];
        $email=$_POST["email"];
        $mdp=$_POST["mdp"];
        $type=$_POST["type"];
        if($nom==="" || $email==="" || $mdp=== ""|| $type=== ""){
            $error="Information Incomplete";

        }
        else{
            $a="select * from users where email='$email'";
            $a1=mysqli_query($conn,$a)or die(mysqli_error($conn));
            if(mysqli_num_rows($a1)== 0){
                $b="insert into users values('','$nom','$email','$mdp','$type')";
                $b1=mysqli_query($conn,$b)or die(mysqli_error($conn));
                header("location:login.php");
            }
            else{
                $error="Email deja existe";
            }
        }
        
    }
    ?>
     
    <?php if (!empty($error)): ?>
        <div class='alert' role='alert'>
            <h4 class='text-center'><?php echo $error; ?></h4>
        </div>
    <?php endif; ?>

   
    <div class="wrapper">
    <form action="" method="POST">
        <h1>Create</h1>
        <div class="input-box">
        <input type="text" name="nom" placeholder="Nom User" value="<?php echo isset($nom) ? htmlspecialchars($nom) : ''; ?>">
        <i class='bx bx-user'></i>
        </div>
        <div class="input-box">
        <input type="email" name="email" placeholder="Email User" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
        <i class='bx bx-envelope' ></i>
        </div>
        <div class="input-box">
        <input type="password" name="mdp" placeholder="Mot de passe" value="<?php echo isset($mdp) ? htmlspecialchars($mdp) : ''; ?>">
        <i class='bx bxs-lock-alt' ></i>
        </div>
        <div class="input-box">
        <select name="type">
            <option value="">Type User</option>
            <option value="user" <?php echo isset($type) && $type === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?php echo isset($type) && $type === 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
        </div>
        <button type="submit" class="btn" name="btn">Ajouter Compte</button>
        <div class="ouvrir">
            <p><a href="login.php">Login</a></p>
        </div>



    </form>
    </div>

    
</body>
</html>