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
    <table>
    <?php
        if($totaldevices != 0) {
            while($resultdevices = mysqli_fetch_assoc($datadevices)) {
                echo "
                <tr>
                    <td>Device Id</td>
                    <td>".$resultdevices['devicesId']."</td>
                </tr>
                <tr>
                    <td>Soil Moisture</td>
                    <td>Ambient Temperature</td>
                </tr>
                <tr></tr>
                <tr>
                    <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                    <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                </tr>
                <tr>
                    <td>Humidity</td>
                    <td>Heat Index</td>
                </tr>
                <tr></tr>
                <tr>
                    <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                    <td><iframe width='450' height='260' style='border: 1px solid #cccccc;' src='https://thingspeak.com/channels/".$resultdevices['devicesId']."/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line'></iframe></td>
                </tr>
                <tr></tr>
                ";
            }
        }
        else {
            echo "No Records Found";
        }
        ?>
        <tr>
            <td colspan="2"><a href="">Add Device</a></td>
        </tr>
    </table>
</section>





<?php
    include_once "includes/footer.php";
?>