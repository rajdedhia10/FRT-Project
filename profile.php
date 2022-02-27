<?php
    include_once "includes/header.php";
    include_once "includes/parseProfile.php";
    if (!isset($_SESSION["userid"])) {
        header("location: login.php");
    exit();
    }
?>





<section id="section-7">
    <p>
        Personal Details
    </p>
    <table>
        <tr>
            <th>User ID</th>
            <td>
            <?php 
            if(isset($userid)) {
                echo $userid;
            }
            ?></td>
        </tr>
        <tr>
            <th>User Name</th>
            <td>
            <?php 
            if(isset($userid)) {
                echo $userFname;
                echo " ";
                echo $userLname;
            }
            ?>
            </td>
        </tr>
        <tr>
            <th>E-Mail Address</th>
            <td>
            <?php 
            if(isset($userEmail)) {
                echo $userEmail;
            }
            ?></td>
        </tr>
    </table>
</section>
<section id="section-8">
    <p>
        My Orders
    </p>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Quantity</th>
            <th>Address</th>
        </tr>
        <?php
        if($total != 0) {
            while($result = mysqli_fetch_assoc($data)) {
                echo "
                <tr>
                    <td>".$result['ordersId']."</td>
                    <td>".$result['ordersQuantity']."</td>
                    <td>".$result['ordersAddress']."</td>
                </tr>
                ";
            }
        }
        else {
            echo "No Records Found";
        }
        ?>
    </table>
</section>
<section id="section-9">
    <p>
        My Devices
    </p>
    <?php
        if($totaldevices != 0) {
            while($resultdevices = mysqli_fetch_assoc($datadevices)) {
                echo "
                <div class='devices-table-part-1'>
                    <table>
                        <tr>
                            <td>Device Id</td>
                            <td>".$resultdevices['devicesId']."</td>
                        </tr>
                    </table>
                </div>
                <div class='devices-table-part-2'>
                    <table>
                        <tr>
                            <td>Soil Moisture</td>
                        </tr>
                        <tr>
                            <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>Ambient Temperature</td>
                        </tr>
                        <tr>
                            <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                        </tr>
                    </table>
                </div>
                <div class='devices-table-part-3'>
                    <table>
                        <tr>
                            <td>Humidity</td>
                        </tr>
                        <tr>
                            <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>Heat Index</td>
                        </tr>
                        <tr>
                            <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                        </tr>
                    </table>
                </div>
                ";
            }
        }
        else {
            echo "No Records Found";
        }
        ?>
        <form class="form" action="includes/add-device.inc.php" method="post">
            <div class="form-line">
                <label>Enter Device Id:</label>
                <input type="text" name="deviceid" placeholder="Device Id">
            </div>
            <button type="submit" name="submit">Add</button>
        </form>
</section>





<?php
    include_once "includes/footer.php";
?>