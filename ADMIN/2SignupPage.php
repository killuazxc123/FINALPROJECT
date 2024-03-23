<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignupPage</title>
    <!--CSS-->
    <link rel="stylesheet" href="styling2.css?v=<?php echo time(); ?>">
    <!--boxicons CSS-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<?php
$firstname = $middlename = $lastname = $email = $password = $cpassword =  $account_type = "";
$firstnameErr = $middlenameErr = $lastnameErr = $emailErr = $passwordErr = $cpasswordErr = $account_typeErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["firstname"]))
    {
        $firstnameErr = " Firstname is required";
    }
    else
    {
        $firstname = $_POST["firstname"]; 
    }

    if(empty($_POST["middlename"]))
    {
        $middlenameErr = "Middlename is required";
    }
    else
    {
        $middlename = $_POST["middlename"]; 
    }

    if(empty($_POST["lastname"]))
    {
        $lastnameErr = " Lastname is required";
    }
    else
    {
        $lastname = $_POST["lastname"]; 
    }

    if(empty($_POST["email"]))
    {
        $emailErr = " Email is required";
    }
    else
    {
        $email = $_POST["email"];
    }
    
    if(empty($_POST["password"]))
    {
        $passwordErr = " Password is required";
    }
    else
    {
        $password = $_POST["password"];
    }

    if(empty($_POST["cpassword"]))
    {
        $cpasswordErr = " Confirm Password is required";
    }
    else{
        $cpassword = $_POST["cpassword"];   
        include("database.php");
        if ($firstname && $middlename && $lastname && $email && $password && $cpassword){
	$query=mysqli_query($connections, "INSERT INTO user (firstname,middlename,lastname,email,password,cpassword) 
    values ('$firstname','$middlename','$lastname','$email','$password','$cpassword')");

    

    
            if ($email && $password){
            include("database.php");
        $check_email = mysqli_query ($connections, "SELECT * FROM user WHERE email = '$email'");
        $check_email_row = mysqli_num_rows ($check_email);
                if($check_email_row>0){
            while($row = mysqli_fetch_assoc($check_email)){
            $db_password = $row["password"];
            $db_account_type = $row["account_type"];
                if($password == $db_password){
                if($db_account_type == "1"){
                echo"<script> window.location.href='ADMIN';</script>";
            }else{
                echo"<script> window.location.href='USER';</script>";
}
    }else{
    $passwordErr = "Password is incorrect!";
}
}
    }else{
    $emailErr = "Email is not registered!";
}
}

    }    
}
}
?>

    <section class="container forms">
    <div class="form login">
        <div class="form-content">
            <header>Sign Up</header>

            <form method="post" action="">
                <div class="field input-field">
                    <input type="text" name="firstname" value="<?php echo $firstname?>" placeholder="First Name">
                    <span class="Error"><?php echo $firstnameErr;?></span>
                </div>

                <div class="field input-field">
                    <input type="text" name="middlename" value="<?php echo $middlename?>" placeholder="Middle Name">
                    <span class="Error"><?php echo $middlenameErr;?></span>
                </div>

                <div class="field input-field">
                    <input type="text" name="lastname" value="<?php echo $lastname?>" placeholder="Last Name">
                    <span class="Error"><?php echo $lastnameErr;?></span>
                </div>

				<div class="field input-field">
                    <input type="email" name="email"  value="<?php echo $email?>"  placeholder="Phone number, username, or email">
                    <span class="Error"><?php echo $emailErr;?></span>
                </div>
				
                <div class="field input-field">
                    <input type="password" name="password" value="<?php echo $password?>"  placeholder="Password">
                    <span class="Error"><?php echo $passwordErr;?></span>
                    <i class='bx bxs-hide eye-icon'></i>
                </div>

                <div class="field input-field">
                    <input type="password" name="cpassword"  value="<?php echo $cpassword?>"  placeholder="Confirm Password">
                    <span class="Error"><?php echo $cpasswordErr;?></span>
                    <i class='bx bxs-hide eye-icon'></i>
                </div>
                
                <div class="field input-field">
                <button>Sign Up</button>
                </div>
            </form>
            
            <div class="form-link">
                <span>Don't have an account? <a href="1LoginPage.php" class="login-link">Log in</a></span> 
            </div>
        </div>
        
        <div class="line"></div>
        
        <div class="media-optionsf">
            <a href="https://www.facebook.com/" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Continue with Facebook</span>
            </a>
        </div>

        <div class="media-optionsg">
            <a href="https://www.google.com/account/about/" class="field google">
               <img src="google.png" alt="" class="google-img">
                <span>Continue with Google</span>
            </a>
        </div>
    </div>
    </section>
</body>
</html>