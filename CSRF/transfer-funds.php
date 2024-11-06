<?php

if (session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //! Check if token is set
    if (!isset($_POST['token']) || !isset($_SESSION['token']))
    {
        exit("Token is not set.");
    }

    //! Token validation
    if ($_POST['token'] == $_SESSION['validation'])
    {
        if (time() >=  $_SESSION['token-expiration'])
        {
            exit("Token expired, please reload the form.");
        }

        echo "Token is valid";
        unset($_SESSION['token']);
        unset($_SESSION['token-expiration']);

        if($_POST['confirm'] === true)
        {
            transferFunds();
        }
    }
    else exit("Invalid token");
}
function transferFunds()
{
    echo "test";
}

?>

<html lang="en-US">
    <head>
        <title>Transfer Funds</title>
    </head>
    <body>
        <h1>Transfer Funds</h1>
        <form action="index.php" method="post">
            <label>Account # to transfer to</label>
            <input type="number" name="transfer-to" value="">
            <label>Amount to transfer</label>
            <input type="number" name="amount" value="">
            <button type="submit">Transfer funds</button>
        </form>
    </body>
</html>
