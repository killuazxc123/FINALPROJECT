<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPPage</title>
    <!--CSS-->
    <link rel="stylesheet" href="styling3.css?v=<?php echo time(); ?>">
    <!--boxicons CSS-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <section class="container forms">
    <div class="form login">
        <div class="form-content">
            <header>Forgot Password</header>

            <form action="#">
                <div class="field input-field">
                    <input type="email" placeholder="Phone number, username, or email" class="input">
                </div>

                <div class="field input-field">
                    <input type="password" placeholder="Password" class="password">
                    <i class='bx bxs-hide eye-icon'></i>
                </div>
                
                <div class="form-link">
                    <a href="3FPPage.php" class="forgot-pass">Forgot password?</a> 
                </div>

                <div class="field input-field">
                   <button>Continue</button>
                </div>
            </form>
            
            <div class="form-link">
                <span>Don't have an account? <a href="2SignupPage.php" class="signup-link">Sign up</a></span> 
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