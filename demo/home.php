<?php
include_once 'session.php';
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1>Home</h1>
                <p class="text-info">Hello <?= $_SESSION['infor']['username'] ?>!</p>
                <a href="logout.php" class="alert-link">Logout</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">UserName</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlString = "SELECT * FROM users";
                        if ($result = $mysqli->query($sqlString)) {
                            while ($row = $result->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['password'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success" onClick="document.location.href='edit.php?id=<?php echo $row['id']; ?>'"">Update</button>
                    <button type=" button" class="btn btn-danger" onClick="document.location.href='delete.php?id=<?php echo $row['id']; ?>'"">Delete</button>
                </td>
            </tr>
        <?php }
        } ?>

                    </tbody>
                </table>
            </div>
        </div>
</div>
</body>

</html>