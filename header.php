<?php
    session_start();
    $greetingMsg =  empty($_SESSION['userName']) ? "Guest":  $_SESSION['userName'];
?>
<header>
    <div>
        <img src="images/logo.png" alt="logo"/>
        <div class="search-box">
            <form action="search.php" method="GET" >
                <input type="text" name="search" placeholder="Search keyword or item..."/>
                <input type="submit" value="Search"/>
            </form>
        </div>
        <div class="user-menu">
            <label class="greeting">Hello <?php  echo $greetingMsg  ?>,</label>
            <a>My Account</a>
            <a class="logout">Logout</a>
        </div>
        <div class="cart-box">
            <span>1</span>
        </div>
    
    </div>
    <div class="user-menu-md">
        <div><a class="logout">Logout</a></div>
        <div><a>My Account</a></div>
        <div class="greeting">Hello <?php echo $greetingMsg ?></div>
    </div>
</header>
