<?php
include 'dbconfigur.php';
if (!empty($user_id)) {

    $error = "";
    if (isset($_POST['btnsubmit'])) {
        extract($_POST);
        $current_image = $_FILES['fileimg']['name'];
        $path = "uploads/product_name/";
        $time = date("fYhis"); //get time
        $imgname = "";

        //upload profile image
        $profile_image = $_FILES['fileimg']['name'];
        if (!empty($profile_image)) {
            $extension = substr(strrchr($profile_image, '.'), 1); //filethumgimg
            $imgname = $time . "." . $extension;
            $comImagePath = $path . "/" . $imgname;
            $action = copy($_FILES['fileimg']['tmp_name'], $comImagePath);
        } else {
            $imgname = "";
        }
        $sql_query = "INSERT INTO resturent_menu(resturent_id,meal_name,meal_deteails,price,meal_img,created)VALUES('" . $user_id . "','" . $meal_name . "','" . $meal_deteails . "','" . $price . "','" . $comImagePath . "','" . date('Y-m-d h:i:s') . "')";
        $result = mysql_query($sql_query);
        if ($result) {
            header("location:add_menu.php?status=success");
        } else {
            $error = "Data has not been saved.";
        }
    }
    ?>
    <html>
        <head>
            <title>Add Menu - Restaurant Management System </title>
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
                            <h1>Add Menu</h1>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div> 
                        <?php
                        include 'leftmenu.php';
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="title-box clearfix">&nbsp;<br/><br/></div> 
                        <form class="form-light mt-20" role="form" method="post" action="add_menu.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meal Name</label>
                                        <input type="meal_name" id="meal_name" name="meal_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" id="price" name="price" class="form-control">
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Meal Details</label>
                                <textarea class="form-control" id="meal_deteails" name="meal_deteails" style="height:100px;"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meal Image</label>
                                        <input type="file" id="fileimg" name="fileimg">
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (!empty($error)) {
                                echo '<div class="style">' . $error . '</div>';
                            }
                            if (isset($_GET['status']) && $_GET['status'] == "success") {
                                echo '<div class="style">Your data has been successfuly added.</div>';
                            }
                            ?>
                            <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-one" onclick="return menuFormValidation()"/>Submit</button><p><br/></p>
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
mysql_close();
?>