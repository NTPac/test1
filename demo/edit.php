<?php
include_once 'session.php';
include_once 'config.php';

$id = $_GET['id'];
$sqlString = "SELECT * from users where id = '$id'";
$result = $mysqli->query($sqlString);
$user = $result->fetch_array();
$username = $user['username'];
$pass = $user['password'];
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
                <h1>UPDATE</h1>
                <a href="home.php" class="alert-link">Back</a>
                <div class="form-group">
                    <form action="edit.php?id=<?=$id?>" method='POST'>
                        <input name="id" type="hidden" value=<?= $id ?>>
                        <label>User name</label>
                        <input class="form-control" name="username" value=<?php echo $username; ?>>
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="oldPassword" required="true">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="newPassword" required="true">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="cfPassword" required="true">
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $newPassword = $_POST['newPassword'];
    $oidPassword = $_POST['oldPassword'];
    $cfPassword = $_POST['cfPassword'];

    if ($oidPassword != $pass) {
        echo '<div class="alert alert-danger" role="alert" style="text-align:center>Password Invalid!</div>';
        return;
    }
    if ($newPassword != $cfPassword) {
        echo '<div class="alert alert-danger" role="alert" style="text-align:center> Confirm password not math!</div>';
        return;
    }
    $sqlString = "UPDATE users SET password = '$newPassword' WHERE id= $id";
    if ($mysqli->query($sqlString)) {
        echo '<div class="alert alert-success" role="alert" style="text-align:center> Update password successfully !</div>';
    }
}
?>