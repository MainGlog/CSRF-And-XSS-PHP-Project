<?php
$conn = new mysqli('servername', 'username', 'password', 'db');
$user = $conn->query("SELECT id, name FROM users WHERE id = 1");

//! Setting variable to the sanitized value of the input
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = htmlentities($_POST['name']);
}

//! Inserting into the database
$stmt = $conn->prepare("INSERT INTO USERS VALUES(DEFAULT, $name)");
$stmt->bind_param('s');

if ($stmt->execute() === false)
{
    error_log("Error inserting user: " . $conn->error);
}
$stmt->close();

//! Setting variable to display user information
$user = [ 'id' => '1', 'name' => $name ];
?>

<html lang="en-US">
<head>
    <title>Stored XSS</title>
</head>
<body>
<h1>Stored XSS Example</h1>
<form method="post">
    <label>Enter your name</label>
    <input type="text" name="name">

    <button type="submit">Enter</button>
    <p hidden>Hi,<?=$user['name']?>! Your user id is <?=$user['id']?></p>
</form>
</body>
</html>
