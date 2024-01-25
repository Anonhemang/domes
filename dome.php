<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domes</title>
    <style>
        .tds {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="all">
        <table border="2" style="width: 90%;margin:auto">
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th style="width:10%">Dome Number</th>
                <th style="width:10%">Stall Number</th>
                <th style="width:10%">Status</th>
                <th>Edit</th>
            </tr>
            <?php
            $sql = "SELECT * FROM st";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {

            ?>
                    <tr>
                        <td class="tds"><?php echo $row['id'] ?></td>
                        <td class="tds"><?php echo $row['c_name']; ?></td>
                        <td class="tds"><?php echo $row['dome_num']; ?></td>
                        <td class="tds"><?php echo $row['stall_num']; ?></td>
                        <td class="tds" style="background-color: <?php echo ($row['rolee'] == 1) ? 'green' : ($row['rolee'] == 2 ? 'yellow' : ($row['rolee'] == 3 ? 'red' : '')); ?>; text-align:center"><?php if ($row['rolee'] == 1) {
                                                                                                                                                                                                            echo "Empty";
                                                                                                                                                                                                        } elseif ($row['rolee'] == 2) {
                                                                                                                                                                                                            echo "Partially Booked";
                                                                                                                                                                                                        } elseif ($row['rolee'] == 3) {
                                                                                                                                                                                                            echo "Booked";
                                                                                                                                                                                                        } ?></td>
                        <td class="tds">
                            <form action="edit.php" method="post">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="edit_ids">
                                <button type="submit" style="width: 100%;padding: 10px;margin:auto" name="edit_btn">Edit</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>