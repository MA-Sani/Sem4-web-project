<?php
    session_start();

    if(isset($_REQUEST["btnsubmit"])) {    
        $search = $_REQUEST["search"];
        $users = "SELECT * FROM id_pass WHERE Email = '".$search."' || password='".$search."' ";
    }
    else {
        $users = "SELECT * FROM id_pass";
    }
    $con = mysqli_connect("localhost","root","","login_db");
    $usersResult = mysqli_query($con, $users);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_REQUEST["message"])) {
        echo $_REQUEST["message"];
    }
    ?>
    <form>
        <input type="text" name="search">
        <input type="submit" name="btnsubmit">
    </form>
    <table width="100%" border="1">
        <tr>
            <td>Email</td>
            <td>password</td>
            <td>Role</td>
            <td>Action</td>
        </tr>
        <?php 
        if(mysqli_num_rows($usersResult) > 0) {
            while($row = mysqli_fetch_assoc($usersResult)) {
                ?>
                <tr>
                    <td><?php echo $row["Email"]; ?></td>
                    <td><?php echo $row["password"]; ?></td>
                    <td><?php echo $row["role"]; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

                    </td>
                </tr>
                <?php 
            } 
        }
        else {
                ?>
                <tr>
                    <td>No record found.</td>
                </tr>
                <?php
        }
        ?>
    </table>
</body>
</html>