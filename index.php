<?php
include_once 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1>LOGIN</h1>
                <div class="form-group">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
                        <label>User name</label>
                        <input class="form-control" name="username" required="true">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="true">
                        <br>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="register.php" class="alert-link">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlString = "SELECT * from users where username = '$username'";

    $result = $mysqli->query($sqlString);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        echo '<div class="alert alert-danger" role="alert" style="text-align:center"> Username invalid!</div>';
        return;
    }
    if ($row['password'] != $password) {
        echo '<div class="alert alert-danger" role="alert" style="text-align:center"> Password invalid!</div>';
        return;
    }
    $_SESSION['infor'] = $row;
    header('location:home.php');
}
?>