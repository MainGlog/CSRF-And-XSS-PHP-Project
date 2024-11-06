<?php
    $conn = new mysqli('servername', 'username', 'password', 'db');

    //! Inserting into the database
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        //! Database columns: id (auto-incrementing), name
        $conn->query("INSERT INTO USERS VALUES(DEFAULT, $name)");
    }
    $user = $conn->query("SELECT id, name FROM users WHERE id = 123");

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
            <p>Hi,<?=$user['name']?>! Your user id is <?=$user['id']?></p>
        </form>
    </body>
</html>
