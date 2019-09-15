<?php
include_once 'session.php';
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
                <h1>DELETE</h1>
                <div class="alert alert-danger" role="alert" style="text-align:center">Are you sure to delete this record ?</div>
                <form action='delete.php' method="POST">
                    <input name='id' type='hidden' value=<?= $_GET['id'] ?>>
                    <button type="submit" class="btn btn-danger">YES</button>
                    <button type="button" class="btn btn-dark" onClick="document.location.href='home.php'">No</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sqlString = "DELETE FROM users where id = '$id'";
    $mysqli->query($sqlString);
    header('location: home.php');
}
?>