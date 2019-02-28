<?php
include './dbconfigur.php';
if (!empty($user_id)) {
    $error = "";

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $user_id = mysql_real_escape_string($_GET['id']);
        $sql = "DELETE FROM resturent_menu WHERE id='" . $user_id . "'";
        $result = mysql_query($sql);
        $valueInsert = (int) $result;
        if ($valueInsert > 0) {
            header("location:menu_list.php?status=success");
        } else {
            $error = "User has not been deleted.";
        }
    }
    ?>
    <html>
        <head>
            <title>Menu List- Johnny on the Spot</title>
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
                            <h1>Menu List</h1>
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
                        <form class="form-light mt-20" role="form" method="post" action="menu_list.php">
                            <table class="table_list">
                                <?php
                                if (isset($_GET['status']) && $_GET['status'] == "success") {
                                    echo '<tr><td colspan="4">Menu has been successfully deleted.</td></tr>';
                                }
                                if (!empty($error)) {
                                    echo '<tr><td>' . $error . '</td></tr>';
                                }
                                ?>
                                <tr>
                                    <td class="grid_heading">S.No</td>                                    
                                    <td class="grid_heading">Meal Name</td>
                                    <td class="grid_heading">Price</td>
                                    <td class="grid_heading">Meal Details</td>
                                    <td class="grid_heading">Meal Image</td>
                                    <td class="grid_heading">Delete</td>
                                </tr>
                                <?php
                                $i = 0;
                                $sql_contact = "SELECT * FROM resturent_menu WHERE resturent_id = '".$user_id."' ORDER BY resturent_id ASC";
                                $res_contact = mysql_query($sql_contact);
                                if (mysql_num_rows($res_contact) > 0) {
                                    while ($row = mysql_fetch_array($res_contact)) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td class="grid_label"><?php echo $i; ?></td>                                            
                                            <td class="grid_label"><?php echo $row['meal_name'] ?></td>
                                            <td class="grid_label"><?php echo $row['price'] ?></td>
                                            <td class="grid_label"><?php echo $row['meal_deteails'] ?></td>
                                            <td class="grid_label"><img src="<?php echo $row ['meal_img'] ?>" height="80"/></td>
                                            <td class="grid_label"><a href="menu_list.php?id=<?php echo $row ['id']; ?>">Delete</a></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="7">Data not found.</td></tr>';
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
?>
