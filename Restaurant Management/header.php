<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">            
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="images/jonny.jpg" alt="Techro HTML5 template" height="75"></a>
               
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li><a href="index.php">Home</a></li>                
                <li><a href="contact.php">Contact</a></li>
                <li><a href="restaurant_register.php">Restaurant Registeration</a></li>
                <li><a href="search.php">Search</a></li>
                <?php
                if (!empty($user_id)) {
                    ?>
                    <li><a href="myaccount.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="register.php">User SignUp</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>       
    </div>
</div>