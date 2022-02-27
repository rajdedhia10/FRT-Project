<?php
    include_once "includes/header.php";
?>





<section id="section-5">
    <div class="form-outer">
        <p>
            Log-In
        </p>
        <form class="form" action="includes/login.inc.php" method="post">
            <div class="form-line">
                <label>E-Mail Address</label>
                <input type="text" name="uid" placeholder="E-Mail Address">
            </div>
            <div class="form-line">
                <label>Password:</label>
                <input type="password" name="pwd" placeholder="Password">
            </div>                        
            <button type="submit" name="submit">Log In</button>
        </form>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Incorrect credentials</p>";
                }
            }
        ?>
    </div>
    <div class="form-outer">
        <p>
            Sign-Up
        </p>
        <form class="form" action="includes/signup.inc.php" method="post">
            <div class="form-line">
                <label>First Name:</label>
                <input type="text" name="fname" placeholder="First Name">
            </div>
            <div class="form-line">
                <label>Last Name:</label>
                <input type="text" name="lname" placeholder="Last Name">
            </div>
            <div class="form-line">
                <label>E-Mail Address:</label>
                <input type="text" name="email" placeholder="E-Mail Address">
            </div>
            <div class="form-line">
                <label>Password:</label>
                <input type="password" name="pwd" placeholder="Password">
            </div>
            <div class="form-line">
                <label>Re-Enter Password:</label>
                <input type="password" name="pwdrepeat" placeholder="Re-Enter Password">
            </div>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Choose a valid E-Mail!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Passwords don't match!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong!</p>";
                }
                else if ($_GET["error"] == "emailtaken") {
                    echo "<p>E-Mail Exists!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>You have signed up</p>";
                }
            }
        ?>
    </div>
</section>





<?php
    include_once "includes/footer.php"
?>