<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>


    <?php
    include('conn.php');
    error_reporting(0);
    if (isset($_POST['edit_btn'])) {
        $id = $_POST['edit_ids'];

        $fetch = "SELECT * FROM st where id='$id' ";
        $runn = mysqli_query($conn, $fetch);



        if (mysqli_num_rows($runn) > 0) {
            while ($row = mysqli_fetch_assoc($runn)) {

    ?>
                <form method="post">
                    <table>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <h1>Registration</h1>
                                </center>
                            </td>
                        </tr>
                        <tr>

                            <input type="hidden" value="<?php echo $row['id'] ?>" name="edit_id">

                            <td colspan="2"><input type="text" name="e_name" value="<?php echo $row['c_name'] ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="email" readonly name="e_dome" id="email" value="<?php echo $row['dome_num'] ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" readonly name="e_stall" id="number" value="<?php echo $row['stall_num'] ?>"></td>
                        </tr>
                        <tr>
                           <td> <select name="rolee" id="">
                                <option value="1">Green</option>
                                <option value="2">Yellow</option>
                                <option value="3">Red</option>
                            </select>
                           </td>
                        </tr>

                        <tr>
                            <td>
                                <button type="submit" name="updatebtn">Update</button>
                            </td>
                            <td><a href="dome.php">Cancel</a></td>
                        </tr>
                    </table>
                </form>
    <?php
            }
        }
    }
    ?>
</body>

</html>








<?php
session_start();

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id']; // Make sure you have an input field with name="edit_id" in your form
    $name = $_POST['e_name'];
    $role = $_POST['rolee'];

    $upd_que = "UPDATE st SET c_name = '$name', rolee=$role WHERE id='$id'";
    $run_upd = mysqli_query($conn, $upd_que);

    if ($run_upd) {
        $_SESSION['success'] = "Data updated successfully";
        header('Location: dome.php');
    } else {
        echo "Failed to update data: " . mysqli_error($conn);
    }
}
?>