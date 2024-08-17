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
       
        .wrapper{
            position: fixed;
            padding-top: 1%;
            width: 450px;
            height: 650px;
            border:1px solid black;
            border-radius: 10px;
            
            margin-left: 25%;
            
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

        .input-box textarea{
            width: 85%;
            height: 50px;
            background: transparent;
            outline: none;
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
        .wrapper .file{
            margin-left: 10%;
            margin-top: 5%;
        }
        .alert{
            background-color: red;
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
 $error='';
 if(isset($_POST['btn'])){
     $titre=$_POST["titre"];
     $aut=$_POST["aut"];
     $genre=$_POST["genre"];
     $date=$_POST["annee"];

     $img_name = $_FILES['image']['name'];
     $img_size = $_FILES['image']['size'];
     $tmp_name = $_FILES['image']['tmp_name'];
     $img_error = $_FILES['image']['error'];

    $filename = $_FILES["pdf"]["name"];
    $tempfile = $_FILES["pdf"]["tmp_name"];
    $folder = "pdf/";
    $destination=$folder.basename($filename);

    $def=$_POST["def"];

     
     $def=$_POST["def"];
     if($genre==="" || $titre==="" || $def=== ""|| $aut=== "" || $img_error!==0){
         $error="Information Incomplete";

     }
     else{
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path ="images/". $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            move_uploaded_file($tempfile, $destination);
            $b = "INSERT INTO demande VALUES ('','$titre', '$aut', '$genre', '$date', '$filename', '$new_img_name','$def')";
            $b1 = mysqli_query($conn, $b) or die(mysqli_error($conn));

        }
     }
     
 }
?>
    
<form action="" method="POST" enctype="multipart/form-data">
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
    <?php if (!empty($error)): ?>
        <div class='alert' role='alert'>
            <h4 class='text-center'><?php echo $error; ?></h4>
        </div>
    <?php endif; ?>
        <div class="wrapper">
        
            <h1>Ajouter un livre</h1>
            <div class="input-box">
                <input type="text" name="titre" placeholder="Titre de livre" value="<?php echo isset($titre) ? htmlspecialchars($titre) : ''; ?>">
            </div>
            <div class="input-box">
                <input type="text" name="aut" placeholder="Auteur de livre" value="<?php echo isset($aut) ? htmlspecialchars($aut) : ''; ?>">
            </div>
            <div class="input-box">
                <input type="text" name="genre" placeholder="Genre de livre" value="<?php echo isset($genre) ? htmlspecialchars($genre) : ''; ?>">
            </div>
            <div class="input-box">
                <input type="date" name="annee" placeholder="Annee de distribution" value="<?php echo isset($annee) ? htmlspecialchars($annee) : ''; ?>">
            </div>
            <div class="file">
                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="">
            </div>
            <div class="file">
            <input type="file" name="pdf" id = "pdf" accept=".pdf" value="">
            </div>
            <div class="input-box">
                <textarea placeholder="Histoire de livre" name="def" value="<?php echo isset($genre) ? htmlspecialchars($genre) : ''; ?>"></textarea>
            </div>
            <button type="submit" class="btn" name="btn">Ajouter livre</button>

       

        </div>
        


    </div>
</form>
</body>
</html>