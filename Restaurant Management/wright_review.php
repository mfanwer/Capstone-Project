<?php
include './dbconfigur.php';
if (!empty($user_id)) {

    $restaurant_id = $_REQUEST['id'];
    $error = "";
    if (isset($_POST['btnsubmit'])) {
        extract($_POST);

        if (empty($title)) {
            $error = "Please enter title";
        }       
        if (empty($rating)) {
            $error = "Please enter rating";
        }
        if (empty($description)) {
            $error = "Please enter description";
        }
        if (empty($error)) {
            $sql_rating = "INSERT into resturent_rating(resturent_id,rating,reviews_title,reviews_description,user_id,created) values('" . $restaurant_id . "','" . $rating . "','" . $title . "','" . $description . "','" . $user_id . "','" . date('Y-m-d H:i:s') . "')";
            $result_rating = mysql_query($sql_rating);
            $valueInsert = (int) $result_rating;
            if ($valueInsert > 0) {
                header("location:wright_review.php?status=success&id=" . $restaurant_id);
            } else {
                $error = "Rating has not been submited has not been submited.";
            }
        }
    }
    ?>
    <html>
        <head>
            <title>Write a Review - Johnny on the Spot</title>
            <?php include 'title.php'; ?>
            <script type="text/javascript" src="js/validation.js"></script>
        </head>
        <body>
            <?php
            include 'header.php';
            ?>
            <header id="head" class="secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1>Write a Review</h1>
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
                        <form class="form-light mt-20" role="form" method="post" action="">
                            <?php
                            if (!empty($error)) {
                                echo '<div class="style">' . $error . '</div>';
                            }

                            if (isset($_GET['status']) && $_GET['status'] == "success") {
                                echo '<div class="style">Your Rating has been successfully posted.</div>';
                            }
                            ?>
                            <div class="form-group">
                                <label>Rating</label>
                                <input type="radio" id="rating1" name="rating" value="5">&nbsp;Excellent&nbsp;
                                <input type="radio" id="rating2" name="rating" value="4">&nbsp;Very Good&nbsp;
                                <input type="radio" id="rating3" name="rating" value="3">&nbsp;Good&nbsp;
                                <input type="radio" id="rating4" name="rating" value="2">&nbsp;Average&nbsp;
                                <input type="radio" id="rating5" name="rating" value="1">&nbsp;Poor&nbsp;
                            </div> 
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                                <input type="hidden" id="raustorant_id" name="raustorant_id" value="<?php echo $restaurant_id ?>">
                            </div>                            
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="message" name="description" placeholder="Write you description here..." style="height:100px;" maxlength="1000"></textarea>
                            </div>
                            <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-one"/>Submit</button><p><br/></p>
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