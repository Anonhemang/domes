<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stalls</title>
    <style>
        .all {
            width: auto;
            height: auto;
        }

        .whole_box {
            width: 85%;
            border: 1px solid black;
            height: auto;
            display: flex;
            flex-wrap: wrap;
            margin-left: auto;
            margin-right: auto;
            overflow: scroll;
        }

        .big_box {
            display: flex;
            flex-wrap: wrap;
            border: 1px solid orange;
            width: 100%;
            height: 215px;
            margin: 1%;
        }

        .mini {
            width: 20px;
            height: 15px;
            padding: 5px;
            margin: 1px 2px 0;
            font-size: smaller;
            display: grid;
            background-color: lightgreen;
            transition: transform 2s;

        }

        .mini:hover,
        .mini-big:hover,
        .rmini:hover,
        .r3mini:hover {
            transform: rotateY(360deg) scale(2);
            background-color: green;
            color: white;
            z-index: 100;
        }

        .flopA:hover {
            z-index: 1000;
            transform: rotateX(180deg) scale(2);
        }

        .mini-big {
            width: 76px;
            height: 15px;
            padding: 5px;
            margin: 0 2px;
            text-align: center;
            font-size: smaller;
            display: grid;
            background-color: lightgreen;
            transition: transform 2s;

        }

        .row-2 {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            margin-top: 7%;
        }

        .rmini {
            width: 20px;
            height: min-content;
            padding: 5px;
            margin: 2px 2px;
            font-size: smaller;
            display: grid;
            background-color: lightgreen;
            transition: transform 3s;
        }

        .r3mini {
            width: 34px;
            height: min-content;
            padding: 5px;
            margin: 2px 1.5px;
            text-align: center;
            font-size: smaller;
            display: grid;
            transition: transform 2s;
            background-color: lightgreen;
        }

        .big {
            width: auto;
            height: auto;
            border: 1px solid plum;
            padding: 6% 5.4%;
        }

        .flt {
            border: 1px solid plum;
            width: auto;
            height: auto;
            padding: 5% 1%;
        }

        .r3 {
            display: flex;
            margin-top: -33px;
        }

        .r4 {
            display: flex;
            margin-left: 69px;
            margin-top: -30px;
            /* transform: rotateX(180deg); */
        }

        .stallsize {
            font-size: 3px;
        }

        .dome1 {
            display: flex;
            margin: 5% 0;
            width: min-content;
        }

        .domename {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            text-align: center;
        }

        .dome2 {
            transform: rotateY(180deg);
            margin-left: auto;
            width: 40%;
        }

        .domenamerig {
            transform: rotateY(180deg);
            writing-mode: vertical-lr;
            text-align: center;
        }

        .d2r4 {
            display: flex;
            /* transform: rotateX(180deg); */
            margin-top: auto;
            margin-bottom: 5px;
        }

        .d2r3 {
            margin-top: -31px;
        }

        .d2row-2 {
            margin-top: 0;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .row1 {
            /* width: 10px; */
            height: min-content;
            display: flex;
        }

        .row1box {
            width: 20px;
            height: 15px;
            padding: 5px;
            margin: 1px 2px 0;
            font-size: smaller;
            display: grid;
            background-color: lightgreen;
            transition: transform 3s;
        }

        .row1box:hover {
            transform: rotateY(540deg) scale(2);
            z-index: 1000;
            background-color: green;
            color: white;
        }

        .row2d2 {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            margin-top: -40px;
        }

        .subrow2 {
            margin-top: -17%;
            display: flex;
            justify-content: space-around;
            width: auto;
            height: min-content;
        }

        .row3 {
            display: flex;
            margin-top: 20px;
        }

        .selectdome {
            width: 100%;
            margin-left: auto;
        }

        .bys {
            float: inline-end;
            margin: 2% 10%;
            padding: 1%;
            color: white;
            background-color: green;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<?php

function stall($idd)
{
    include('conn.php');
    $sql = "SELECT * FROM st WHERE id=$idd";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            return $row['stall_num'];
        }
    }
}
?>

<?php
function colorr()
{
    include('conn.php');
    $color = "SELECT * FROM st ";
    $rub = mysqli_query($conn, $color);

    if (mysqli_num_rows($rub) > 0) {
        while ($col = mysqli_fetch_array($rub)) {
            $bgcolor = ''; // Initialize the variable

            if ($col['rolee'] == 3) {
                $bgcolor = 'red';
            } elseif ($col['rolee'] == 1) {
                $bgcolor = 'yellow';
            } elseif ($col['rolee'] == 2) {
                $bgcolor = 'green';
            }
        }
        return $bgcolor;
        
    }
    

    return '';
// echo "<script>console.log('$bgcolor')</script>";

}
?>

<body>
    <div class="all">
        <div class="whole_box">
            <div class="selectdome">
                <a href="form.php"><button class="bys" value="">Book Your Stall</button></a>
            </div>
            <!-- Dome - 1 -->
            <div class="dome1">
                <h1 class="domename"><small style="font-size: 15px; font-weight: lighter;">Business</small><br>Dome 1
                </h1>
                <div class="big_box">
                    <div class="mini" style="background-color:<?php echo colorr() ?>"><?php echo stall(1) ?><small class="stallsize">3*3</small></div>
                    <div class="mini" style="background-color:<?php echo colorr() ?>"><?php echo stall(2) ?><small class="stallsize">3*3</small></div>
                    <div class="mini" style="background-color:<?php echo $bgcolor; ?>"><?php echo stall(3) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(4) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(5) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(6) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(7) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(8) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(9) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(10) ?><small class="stallsize">3*3</small></div>
                    <div class="mini"><?php echo stall(11) ?><small class="stallsize">3*3</small></div>
                    <div class="mini-big"><?php echo stall(12) ?><small class="stallsize">3*3</small></div>
                    <div class="row-2">
                        <div class="rmini"><?php echo stall(13) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(14) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(15) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(16) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(17) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(18) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(19) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(20) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini"><?php echo stall(21) ?><small class="stallsize">3*3</small></div>
                        <div class="rmini" style="height: 10px; width: 30px;text-align: center;padding: 25px;"><?php echo stall(22) ?><small class="stallsize">3*3</small></div>
                        <div class="r3">
                            <div class="rmini" style=" padding:50px 23px;"><?php echo stall(23) ?><small class="stallsize">3*3</small></div>
                            <div class="r3mini"><?php echo stall(24) ?><small class="stallsize">3*3</small></div>
                            <div class="r3mini"><?php echo stall(25) ?><small class="stallsize">3*3</small></div>
                            <div class="r3mini"><?php echo stall(26) ?><small class="stallsize">3*3</small></div>
                            <div class="r3mini"><?php echo stall(27) ?><small class="stallsize">3*3</small></div>
                            <div class="r3mini"><?php echo stall(28) ?><small class="stallsize">3*3</small></div>
                        </div>

                    </div>
                    <div class="r4">
                        <div class="mini"><?php echo stall(29) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(30) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(31) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(32) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(33) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(34) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(35) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(36) ?><small class="stallsize">3*3</small></div>
                        <div class="mini"><?php echo stall(37) ?><small class="stallsize">3*3</small></div>
                        <div class="mini" style="width: 76px;text-align: center;"><?php echo stall(38) ?><small class="stallsize">3*3</small></div>
                    </div>
                </div>
            </div>
            <?php

            ?>

            <!-- Dome - 2 -->
            <div class="dome1 dome2">
                <h1 class="domenamerig"><small style="font-size: 15px; font-weight: lighter;">I.T</small><br>Dome 2
                </h1>
                <div class="big_box">
                    <div class="row1box">B1<small class="stallsize">3*3</small></div>
                    <div class="row1box">B2<small class="stallsize">3*3</small></div>
                    <div class="row1box">B3<small class="stallsize">3*3</small></div>
                    <div class="row1box">B4<small class="stallsize">3*3</small></div>
                    <div class="row1box">B5<small class="stallsize">3*3</small></div>
                    <div class="row1box">B6<small class="stallsize">3*3</small></div>
                    <div class="row1box">B7<small class="stallsize">3*3</small></div>
                    <div class="row1box">B8<small class="stallsize">3*3</small></div>
                    <div class="row1box">B9<small class="stallsize">3*3</small></div>
                    <div class="row1box">B10<small class="stallsize">3*3</small></div>
                    <div class="row1box">B11<small class="stallsize">3*3</small></div>
                    <div class="row1box" style="width: 76px;text-align: center;">B12<small class="stallsize">3*3</small>
                    </div>
                    <div class="d2row-2">
                        <div class="row1box ">B13<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B14<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B15<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B16<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B17<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B18<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B19<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B20<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B21<small class="stallsize">3*3</small></div>
                        <div class="row1box " style="height: 10px; width: 30px;text-align: center;padding: 25px;">
                            B22<small class="stallsize">3*3</small></div>
                        <div class="r3 d2r3">
                            <div class="row1box " style="margin-top: -10px;">B23<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B24<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B25<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B26<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B27<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                        </div>

                    </div>
                    <div class="d2r4">
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B30<small class="stallsize">3*3</small></div>
                        <div class="row1box">B31<small class="stallsize">3*3</small></div>
                        <div class="row1box">B32<small class="stallsize">3*3</small></div>
                        <div class="row1box">B33<small class="stallsize">3*3</small></div>
                        <div class="row1box">B34<small class="stallsize">3*3</small></div>
                        <div class="row1box">B35<small class="stallsize">3*3</small></div>
                        <div class="row1box">B36<small class="stallsize">3*3</small></div>
                        <div class="row1box">B37<small class="stallsize">3*3</small></div>
                        <div class="row1box" style="width: 76px;text-align: center;">B38<small class="stallsize">3*3</small></div>
                    </div>
                </div>
            </div>

            <!-- Dome - 3 -->
            <div class="dome1">
                <h1 class="domename"><small style="font-size: 15px; font-weight: lighter;">Business</small><br>Dome 1
                </h1>
                <div class="big_box">
                    <div class="mini">A1<small class="stallsize">3*3</small></div>
                    <div class="mini">A2<small class="stallsize">3*3</small></div>
                    <div class="mini">A3<small class="stallsize">3*3</small></div>
                    <div class="mini">A4<small class="stallsize">3*3</small></div>
                    <div class="mini">A5<small class="stallsize">3*3</small></div>
                    <div class="mini">A6<small class="stallsize">3*3</small></div>
                    <div class="mini">A7<small class="stallsize">3*3</small></div>
                    <div class="mini">A8<small class="stallsize">3*3</small></div>
                    <div class="mini">A9<small class="stallsize">3*3</small></div>
                    <div class="mini">A10<small class="stallsize">3*3</small></div>
                    <div class="mini">A11<small class="stallsize">3*3</small></div>
                    <div class="mini-big">A12<small class="stallsize">3*3</small></div>
                    <div class="row-2">
                        <div class="rmini">A13<small class="stallsize">3*3</small></div>
                        <div class="rmini">A14<small class="stallsize">3*3</small></div>
                        <div class="rmini">A15<small class="stallsize">3*3</small></div>
                        <div class="rmini">A16<small class="stallsize">3*3</small></div>
                        <div class="rmini">A17<small class="stallsize">3*3</small></div>
                        <div class="rmini">A18<small class="stallsize">3*3</small></div>
                        <div class="rmini">A19<small class="stallsize">3*3</small></div>
                        <div class="rmini">A20<small class="stallsize">3*3</small></div>
                        <div class="rmini">A21<small class="stallsize">3*3</small></div>
                        <div class="rmini" style="height: 10px; width: 30px;text-align: center;padding: 25px;">A22<small class="stallsize">3*3</small></div>
                        <div class="r3">
                            <div class="rmini" style=" padding:50px 23px;">A23<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A24<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A25<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A26<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A27<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A28<small class="stallsize">3*3</small></div>
                        </div>

                    </div>
                    <div class="r4">
                        <div class="mini">A29<small class="stallsize">3*3</small></div>
                        <div class="mini">A30<small class="stallsize">3*3</small></div>
                        <div class="mini">A31<small class="stallsize">3*3</small></div>
                        <div class="mini">A32<small class="stallsize">3*3</small></div>
                        <div class="mini">A33<small class="stallsize">3*3</small></div>
                        <div class="mini">A34<small class="stallsize">3*3</small></div>
                        <div class="mini">A35<small class="stallsize">3*3</small></div>
                        <div class="mini">A36<small class="stallsize">3*3</small></div>
                        <div class="mini">A37<small class="stallsize">3*3</small></div>
                        <div class="mini" style="width: 76px;text-align: center;">A38<small class="stallsize">3*3</small></div>
                    </div>
                </div>
            </div>

            <!-- Dome - 4 -->
            <div class="dome1 dome2">
                <h1 class="domenamerig"><small style="font-size: 15px; font-weight: lighter;">I.T</small><br>Dome 2
                </h1>
                <div class="big_box">
                    <div class="row1box">B1<small class="stallsize">3*3</small></div>
                    <div class="row1box">B2<small class="stallsize">3*3</small></div>
                    <div class="row1box">B3<small class="stallsize">3*3</small></div>
                    <div class="row1box">B4<small class="stallsize">3*3</small></div>
                    <div class="row1box">B5<small class="stallsize">3*3</small></div>
                    <div class="row1box">B6<small class="stallsize">3*3</small></div>
                    <div class="row1box">B7<small class="stallsize">3*3</small></div>
                    <div class="row1box">B8<small class="stallsize">3*3</small></div>
                    <div class="row1box">B9<small class="stallsize">3*3</small></div>
                    <div class="row1box">B10<small class="stallsize">3*3</small></div>
                    <div class="row1box">B11<small class="stallsize">3*3</small></div>
                    <div class="row1box" style="width: 76px;text-align: center;">B12<small class="stallsize">3*3</small>
                    </div>
                    <div class="d2row-2">
                        <div class="row1box ">B13<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B14<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B15<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B16<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B17<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B18<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B19<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B20<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B21<small class="stallsize">3*3</small></div>
                        <div class="row1box " style="height: 10px; width: 30px;text-align: center;padding: 25px;">
                            B22<small class="stallsize">3*3</small></div>
                        <div class="r3 d2r3">
                            <div class="row1box " style="margin-top: -10px;">B23<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B24<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B25<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B26<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B27<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                        </div>

                    </div>
                    <div class="d2r4">
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B30<small class="stallsize">3*3</small></div>
                        <div class="row1box">B31<small class="stallsize">3*3</small></div>
                        <div class="row1box">B32<small class="stallsize">3*3</small></div>
                        <div class="row1box">B33<small class="stallsize">3*3</small></div>
                        <div class="row1box">B34<small class="stallsize">3*3</small></div>
                        <div class="row1box">B35<small class="stallsize">3*3</small></div>
                        <div class="row1box">B36<small class="stallsize">3*3</small></div>
                        <div class="row1box">B37<small class="stallsize">3*3</small></div>
                        <div class="row1box" style="width: 76px;text-align: center;">B38<small class="stallsize">3*3</small></div>
                    </div>
                </div>
            </div>


            <!-- Dome - 5 -->
            <div class="dome1">
                <h1 class="domename"><small style="font-size: 15px; font-weight: lighter;">Business</small><br>Dome 1
                </h1>
                <div class="big_box">
                    <div class="mini">A1<small class="stallsize">3*3</small></div>
                    <div class="mini">A2<small class="stallsize">3*3</small></div>
                    <div class="mini">A3<small class="stallsize">3*3</small></div>
                    <div class="mini">A4<small class="stallsize">3*3</small></div>
                    <div class="mini">A5<small class="stallsize">3*3</small></div>
                    <div class="mini">A6<small class="stallsize">3*3</small></div>
                    <div class="mini">A7<small class="stallsize">3*3</small></div>
                    <div class="mini">A8<small class="stallsize">3*3</small></div>
                    <div class="mini">A9<small class="stallsize">3*3</small></div>
                    <div class="mini">A10<small class="stallsize">3*3</small></div>
                    <div class="mini">A11<small class="stallsize">3*3</small></div>
                    <div class="mini-big">A12<small class="stallsize">3*3</small></div>
                    <div class="row-2">
                        <div class="rmini">A13<small class="stallsize">3*3</small></div>
                        <div class="rmini">A14<small class="stallsize">3*3</small></div>
                        <div class="rmini">A15<small class="stallsize">3*3</small></div>
                        <div class="rmini">A16<small class="stallsize">3*3</small></div>
                        <div class="rmini">A17<small class="stallsize">3*3</small></div>
                        <div class="rmini">A18<small class="stallsize">3*3</small></div>
                        <div class="rmini">A19<small class="stallsize">3*3</small></div>
                        <div class="rmini">A20<small class="stallsize">3*3</small></div>
                        <div class="rmini">A21<small class="stallsize">3*3</small></div>
                        <div class="rmini" style="height: 10px; width: 30px;text-align: center;padding: 25px;">A22<small class="stallsize">3*3</small></div>
                        <div class="r3">
                            <div class="rmini" style=" padding:50px 23px;">A23<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A24<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A25<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A26<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A27<small class="stallsize">3*3</small></div>
                            <div class="r3mini">A28<small class="stallsize">3*3</small></div>
                        </div>

                    </div>
                    <div class="r4">
                        <div class="mini">A29<small class="stallsize">3*3</small></div>
                        <div class="mini">A30<small class="stallsize">3*3</small></div>
                        <div class="mini">A31<small class="stallsize">3*3</small></div>
                        <div class="mini">A32<small class="stallsize">3*3</small></div>
                        <div class="mini">A33<small class="stallsize">3*3</small></div>
                        <div class="mini">A34<small class="stallsize">3*3</small></div>
                        <div class="mini">A35<small class="stallsize">3*3</small></div>
                        <div class="mini">A36<small class="stallsize">3*3</small></div>
                        <div class="mini">A37<small class="stallsize">3*3</small></div>
                        <div class="mini" style="width: 76px;text-align: center;">A38<small class="stallsize">3*3</small></div>
                    </div>
                </div>
            </div>


            <!-- Dome - 6 -->
            <div class="dome1 dome2">
                <h1 class="domenamerig"><small style="font-size: 15px; font-weight: lighter;">I.T</small><br>Dome 2
                </h1>
                <div class="big_box">
                    <div class="row1box">B1<small class="stallsize">3*3</small></div>
                    <div class="row1box">B2<small class="stallsize">3*3</small></div>
                    <div class="row1box">B3<small class="stallsize">3*3</small></div>
                    <div class="row1box">B4<small class="stallsize">3*3</small></div>
                    <div class="row1box">B5<small class="stallsize">3*3</small></div>
                    <div class="row1box">B6<small class="stallsize">3*3</small></div>
                    <div class="row1box">B7<small class="stallsize">3*3</small></div>
                    <div class="row1box">B8<small class="stallsize">3*3</small></div>
                    <div class="row1box">B9<small class="stallsize">3*3</small></div>
                    <div class="row1box">B10<small class="stallsize">3*3</small></div>
                    <div class="row1box">B11<small class="stallsize">3*3</small></div>
                    <div class="row1box" style="width: 76px;text-align: center;">B12<small class="stallsize">3*3</small>
                    </div>
                    <div class="d2row-2">
                        <div class="row1box ">B13<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B14<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B15<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B16<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B17<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B18<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B19<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B20<small class="stallsize">3*3</small></div>
                        <div class="row1box ">B21<small class="stallsize">3*3</small></div>
                        <div class="row1box " style="height: 10px; width: 30px;text-align: center;padding: 25px;">
                            B22<small class="stallsize">3*3</small></div>
                        <div class="r3 d2r3">
                            <div class="row1box " style="margin-top: -10px;">B23<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B24<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B25<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B26<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B27<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                            <div class="row1box " style="margin-top: -10px;">B28<small class="stallsize">3*3</small>
                            </div>
                        </div>
                    </div>
                    <div class="d2r4">
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B29<small class="stallsize">3*3</small></div>
                        <div class="row1box">B30<small class="stallsize">3*3</small></div>
                        <div class="row1box">B31<small class="stallsize">3*3</small></div>
                        <div class="row1box">B32<small class="stallsize">3*3</small></div>
                        <div class="row1box">B33<small class="stallsize">3*3</small></div>
                        <div class="row1box">B34<small class="stallsize">3*3</small></div>
                        <div class="row1box">B35<small class="stallsize">3*3</small></div>
                        <div class="row1box">B36<small class="stallsize">3*3</small></div>
                        <div class="row1box">B37<small class="stallsize">3*3</small></div>
                        <div class="row1box" style="width: 76px;text-align: center;">B38<small class="stallsize">3*3</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>