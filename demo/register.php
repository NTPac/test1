<?php
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1>REGISTER</h1>
                <a href="index.php" class="alert-link">Back</a>
                <div class="form-group">
                    <form action="register.php" method='POST'>
                        <label>User name</label>
                        <input class="form-control" name="username" required="true">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="true">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cfPassword" required="true">
                        <br>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $cfPassword = $_POST['cfPassword'];

    if ($password != $cfPassword) {
        echo '<div class="alert alert-danger" role="alert" style="text-align:center"> Confirm password not math!</div>';
        return;
    }
    $sqlString = "SELECT username from users where username = '$userName'";
    $result = $mysqli->query($sqlString);
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="alert alert-danger" role="alert" style="text-align:center"> Username existed!</div>';
        return;
    }
    $sqlString = "INSERT INTO users (username, password) values ('$userName', '$password')";
    if ($mysqli->query($sqlString)) {
        echo '<div class="alert alert-success" role="alert" style="text-align:center"> Create task successfully !</div>';
        return;
    }
}

?>