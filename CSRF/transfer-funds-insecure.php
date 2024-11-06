<?php

if (session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    transferFunds();
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

