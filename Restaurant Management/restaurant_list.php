<?php
include './dbconfigur.php';
if (!empty($user_id)) {
    $error = "";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $user_id = mysql_real_escape_string($_GET['id']);
        $sql = "DELETE FROM users WHERE id='" . $user_id . "'";
        $result = mysql_query($sql);
        $valueInsert = (int) $result;
        if ($valueInsert > 0) {
            header("location:user_list.php?status=success");
        } else {
            $error = "User has not been deleted.";
        }
    }
    ?>
    <html>
        <head>
            <title>Restaurant List - Johnny on the Spot</title>
            <?php include 'title.php'; ?>
        </head>
        <body>
            <?php
            include 'header.php';
            ?>
            <header id="head" class="secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1>User List</h1>
                        </div>
                    </div>
                </div>
            </header>            
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div> 
                        <?php
                        include './leftmenu.php';
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div> 
                        <form class="form-light mt-20" role="form" method="post" action="user_list.php">
                            <table class="table_list">
                                <?php
                                if (isset($_GET['status']) && $_GET['status'] == "success") {
                                    echo '<tr><td colspan="4">User has been successfully deleted.</td></tr>';
                                }
                                if (!empty($error)) {
                                    echo '<tr><td>' . $error . '</td></tr>';
                                }
                                ?>
                                <tr>
                                    <td class="grid_heading">S.No</td>
                                    <td class="grid_heading">Logo</td>
                                    <td class="grid_heading">Restaurant Name</td>
                                    <td class="grid_heading">Email</td>
                                    <td class="grid_heading">Phone</td>
                                    <?php
                                            if($user_type == "admin"){
                                            ?>
                                    <td class="grid_heading">Delete</td>
                                      <?php } ?>
                                </tr>
                                <?php
                                $i = 0;
                                $sql = "SELECT * FROM users WHERE user_type ='restaurant' ORDER BY name ASC";
                                $result = mysql_query($sql);
                                if (mysql_num_rows($result) > 0) {
                                    while ($row = mysql_fetch_array($result)) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td class="grid_label"><?php echo $i; ?></td>
                                            <td class="grid_label"><img src="<?php echo $row ['imgpath'] ?>" height="80"/></td>
                                            <td class="grid_label"><?php echo $row['name'] ?></td>
                                            <td class="grid_label"><?php echo $row['email'] ?></td>
                                            <td class="grid_label"><?php echo $row['phone_no'] ?></td>
                                            <?php
                                            if($user_type == "admin"){
                                            ?>
                                            <td class="grid_label"><a href="restaurant_list.php.php?id=<?php echo $row ['id']; ?>">Delete</a></td>                            
                                            <?php } ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </form>
                        </div>                
                    </div>
                </div>       
                <?php
                include 'footer.php';
                ?>               
            </body>
        </html>
        <?php
    } else {
        header("location:login.php?msg=login");
        ob_flush();
    }
}
?>
