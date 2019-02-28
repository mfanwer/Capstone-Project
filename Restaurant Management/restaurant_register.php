<?php
include './dbconfigur.php';
if (isset($_POST['btnsubmit'])) {
    $error = "";
    extract($_POST);

    $current_image = $_FILES['fileimg']['name'];
    $path = "uploads";
    $time = date("fYhis"); //get time
    $imgname = "";

//upload profile image
    $profile_image = $_FILES['fileimg']['name'];
    if (!empty($profile_image)) {
        $extension = substr(strrchr($profile_image, '.'), 1); 
        $imgname = $time . "." . $extension;
        $comImagePath = $path . "/" . $imgname;
        $action = copy($_FILES['fileimg']['tmp_name'], $comImagePath);
    } else {
        $imgname = "";
    }
     $sql_query = "INSERT INTO users(name,email,phone_no,description,password,imgpath,adding_date,user_type)"
    . "VALUES('" . $name . "','" . $email . "','" . $phone_no . "','" . $description . "','" . $password . "','" . $comImagePath . "','" . date('Y-m-d h:i:s') . "','restaurant')";
    $result = mysql_query($sql_query);
    if ($result) {
        header("location:restaurant_register.php?reg=success");
    } else {
        $error = "Data has not been saved.";
    }
}
?>
<html>
    <head>
        <title> Restaurant Register - Restaurant Management System</title>
        <?php include 'title.php'; ?> 
        <script type="text/javascript">
            //check for integer
            function checkForIntegers(i)
            {
                if (i.value.length > 0)
                {
                    i.value = i.value.replace(/[^\d]+/g, '');

                }
            }

        </script>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <header id="head" class="secondary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h1>Restaurant Register</h1>
                    </div>
                </div>
            </div>
        </header>
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="section-title">Restaurant Register</h3>
                    <form class="form-light mt-20" role="form" method="post" action="restaurant_register.php" id="register-form" novalidate enctype="multipart/form-data">
                        <?php
                        if (!empty($message)) {
                            echo '<div class="style">' . $error . '</div>';
                        }
                        if (isset($_GET['reg']) && $_GET['reg'] == "success") {
                            echo '<div class="style">You have been successfuly registered.</div>';
                        }
                        ?> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your name" maxlength="100">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address"maxlength="125">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" id="phone_no" name="phone_no"class="form-control" placeholder="Phone number"maxlength="10"  onkeyup="checkForIntegers(this)" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" id="fileimg" name="fileimg">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Write you message here..." style="height:100px;" maxlength="1000"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"maxlength="25">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" id="cnfpassword" name="cnfpassword" class="form-control" placeholder="Confirm Password"maxlength="25">
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-one" onClick="return regsFormValidation()">Submit</button><p><br/></p>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="title-box clearfix ">
                        <h2 class="title-box_primary">Locations</h2></div> 
                    <figure class="frame thumbnail alignnone clearfix">
                        <p><img class="size-full " alt="usa" src="images/ny.png" width="" height="250"><a href=""https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Ghaziabad,Uttar+pradesh,+India&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Ghaziabad,Uttar+pradesh,+Indi&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Ghaziabad,Uttar+pradesh,+Indi&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Ghaziabad,Uttar+pradesh,+Indi&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"><b>View Larger Map</a></p>
                    </figure>                   						
                </div>
            </div>
        </div>       
        <?php
        include 'footer.php';
        ?>               

    </body>
</html>
