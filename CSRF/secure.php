<?php

if (session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Check if token is set
    if (!isset($_POST['token']) || !isset($_SESSION['token']))
    {
        exit("Token is not set.");
    }

// Token validation
    if ($_POST['token'] == $_SESSION['validation'])
    {
        if (time() >=  $_SESSION['token-expiration'])
        {
            exit("Token expired, please reload the form.");
        }

        echo "Token is valid";
        unset($_SESSION['token']);
        unset($_SESSION['token-expiration']);
        // TODO Continue program
    }
    else exit("Invalid token");
}

