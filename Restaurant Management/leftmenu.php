<div class="list styled custom-list">
    <div style="margin-left: 10px;margin-bottom: 10px;text-align: center;">
        <?php
        if (!empty($user_image)) {
            echo '<img src="' . $user_image . '" width= "250" style="border: solid 1px #ccc;"/>';
        } else {
            echo '<img src="images/default.jpg" width="250" style="border: solid 1px #ccc;"/>';
        }
        if (!empty($user_name)) {
            echo '<p style="text-align:left;padding-top:10px;"><strong>' . ucfirst($user_name) . '</strong></p>';
        }
        ?>
    </div>
    <ul>
        <li><a href="myaccount.php">Profile</a></li>
        <?php        
        if ($user_type == "admin") {
            ?>
            <li><a href="contact_list.php">Contact List</a></li>
            <li><a href="restaurant_list.php">Restaurant List</a></li>
            <li><a href="user_list.php">User List</a></li>
            <?php
        } else if ($user_type == "user") {
            ?>            
            <li><a href="restaurant_list.php">Restaurant List</a></li>
            <?php
        } else if ($user_type == "restaurant") {
            ?>
            <li><a href="offer.php">Offer of the day</a></li>
            <li><a href="offer_list.php">Offer of the day List</a></li>
            <li><a href="add_menu.php">Add Menu</a></li>
            <li><a href="menu_list.php">Menu List</a></li>
        <?php } ?>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>