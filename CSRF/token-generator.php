<?php

if (session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}

// Generating a random token
$_SESSION['token'] = bin2hex(random_bytes(32));

// Set expiration time to one hour from time of creation
$_SESSION['token-expiration'] = time() + 3600;
?>

<html>
    <head>
        <title>CSRF Token Generator</title>
    </head>
    <body>
        <h1>Legitimate Website</h1>
        <form method="post" action="secure.php">
            <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
            <input type="submit" value="Click to redirect to website"/>
        </form>
    </body>
</html>