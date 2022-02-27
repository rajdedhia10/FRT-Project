<?php
    include_once "includes/header.php";
    if (!isset($_SESSION["userid"])) {
        header("location: login.php");
    exit();
    }
?>





<section id="section-6">
    <div  class="form-outer">
        <form class="form" action="includes/buy.inc.php" method="post">
            <div class="form-line">
                <label>Quantity:</label>
                <input type="text" name="quantity" placeholder="Quantity">
            </div>
            <div class="form-line">
                <label>Address:</label>
                <input type="text" name="address" placeholder="Address">
            </div>
            <button type="submit" name="submit">Buy Now</button>
        </form>
    </div>
</section>





<?php
    include_once "includes/footer.php";
?>