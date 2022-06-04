<?php

$error_msg = false;

if(!empty($_POST['korisnicko_ime']) && !empty($_POST['lozinka'])){

    $users = simplexml_load_file("users.xml");

    $login_user = $_POST['korisnicko_ime'];
    $login_pass = $_POST['lozinka'];

    foreach($users->children() as $xml_user){
        if($xml_user->korisnicko_ime == $login_user && $xml_user->lozinka == $login_pass){
            header("Location: Naslovnica.html");
        }
    }

    $error_msg = true;

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <link rel="stylesheet" href="style.css" >
        <title> Login </title>
    </head>

    <body>

        <div class="login-header">
            <h1> Login </h1>
        </div>

        <?php if($error_msg == true){ ?>
            <div class="login-error">
                <h3> Kriva lozinka ili korisnicko ime </h3>
            </div>
        <?php } ?>

        <div class="login-forma">
            <form method="post" action="login.php">
                <p> Korisničko ime <input type="text" name="korisnicko_ime" size ="15"/> </p>
                <p> Lozinka <input type="password" name="lozinka" size ="15"/> </p>
                <p> <input type="submit" value="Login"/> </p>
            </form>
        </div>

    </body>

</html>