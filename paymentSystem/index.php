<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secure pay out</title>
</head>

<body>
    <form action="process.php" method="post">
        <input type="text" name="full_name" placeholder="Enter your full name" required>
        <br>

        <input type="email" name="email_add" placeholder="Enter your email" required>
        <br>

        <input type="number" value="200" name="amount" required>
        <br>

        <input type="submit" name="submit" value="Pay Now">
    </form>

</body>

</html>