<?php
include './dbconfigur.php';
$resArr = array();
$restaurant_id = "";
if (isset($_GET['id'])) {
    $restaurant_id = $_GET['id'];
}
$sql = "SELECT * FROM users WHERE user_type ='restaurant' and id = '" . $restaurant_id . "'";
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    $resArr = mysql_fetch_assoc($result);
}
?>
<html>
    <head>
        <title>Restaurant - Johnny on the Spot</title>
        <link rel="favicon" href="images/favicon.png">
        <link rel="stylesheet" media="screen" href="css/fonts.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="css/bootstrap-theme.css" media="screen">        
        <link rel="stylesheet" href="css/style.css">       
        <style type="text/css">

            .rating span {
                font-family: FontAwesome;
                font-weight: normal;
                font-style: normal;
                display: inline-block;
            }

            .rating span:hover {
                cursor: pointer;
            }

            .rating span:before {
                content: "\f005";
                padding-right: 5px;
                color: #ACACAC;
            }

            .rating span.star:before {
                color: #FEA200;
            }

            .rating.live:hover span:before {
                color: #FEA200;
            }

            .rating.live span:hover ~ span:before {
                color: #ACACAC;
            }
        </style>
        <link rel="stylesheet" href="jquery/jRating.jquery.css">
        <script type="text/javascript" src="jquery/jquery.js"></script>
        <script type="text/javascript" src="jquery/jRating.jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.basic').jRating();
            });
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
                        <h1><?php echo $resArr['name']; ?></h1>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row"><p>&nbsp;</p></div>
            <div class="row">                    
                <div class="col-md-8">                      
                    <div class="row" style="padding-left: 17px;padding-right: 17px;">
                        <p><?php  $resArr['description']; ?></p>
                        <p>&nbsp;</p>
                        <h5><b>Offer of the day</b></h5>
                        <div class="row">
                            <div class="col-md-12">  
                                <table class="table_list">
                                    <tr>
                                        <td class="grid_heading">S.No</td>                                    
                                        <td class="grid_heading">Offer</td>
                                        <td class="grid_heading">Price</td>
                                        <td class="grid_heading">Description</td>
                                        <td class="grid_heading">Image</td>                                        
                                    </tr>
                                    <?php
                                    $i = 0;
                                    $sql_contact = "SELECT * FROM offer_of_day WHERE resturent_id = '" . $resArr['id'] . "' ORDER BY resturent_id ASC";
                                    $res_contact = mysql_query($sql_contact);
                                    if (mysql_num_rows($res_contact) > 0) {
                                        while ($row = mysql_fetch_array($res_contact)) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td class="grid_label"><?php echo $i; ?></td>                                            
                                                <td class="grid_label"><?php echo $row['offer_name'] ?></td>
                                                <td class="grid_label"><?php echo $row['price'] ?></td>
                                                <td class="grid_label"><?php echo $row['details'] ?></td>
                                                <td class="grid_label"><img src="<?php echo $row ['image'] ?>" height="80"/></td>                                                
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="7">Data not found.</td></tr>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <h5><b>Menu</b></h5>
                        <div class="row">
                            <div class="col-md-12">  
                                <table class="table_list">                                
                                    <tr>
                                        <td class="grid_heading">S.No</td>                                    
                                        <td class="grid_heading">Meal Name</td>
                                        <td class="grid_heading">Price</td>
                                        <td class="grid_heading">Meal Details</td>
                                        <td class="grid_heading">Meal Image</td>                                    
                                    </tr>
                                    <?php
                                    $i = 0;
                                    $sql_contact = "SELECT * FROM resturent_menu WHERE resturent_id = '" . $resArr['id'] . "' ORDER BY resturent_id ASC";
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
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="7">Data not found.</td></tr>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                  
                <div class="col-md-4" style="padding-left: 60px">
                    <img src="<?php echo $resArr['imgpath']; ?>" alt="" class="img-responsive" width="150">                           
                    <div class="contact-info">                                 
                        <h5><b>Address</b></h5>
                        <p><?php echo $resArr['address']; ?>, <?php echo $resArr['city']; ?>, <?php echo $resArr['state']; ?></p>

                        <h5><b>Email</b></h5>
                        <p><?php echo $resArr['email']; ?></p>

                        <h5><b>Phone</b></h5>
                        <p><?php echo $resArr['phone_no']; ?></p>                         
                        <h5><b>Rating & Review</b></h5>
                        <div>
                            <?php
                            $ctr = 0;
                            $tot = 0;
                            $avg = 0;
                            $sql_rating = "SELECT u.name,r.rating,r.reviews_title  FROM resturent_rating r JOIN users u WHERE u.id = r.user_id AND u.user_type = 'user' AND r.resturent_id = '" . $resArr['id'] . "' order by r.created desc";
                            $res_rating = mysql_query($sql_rating);
                            if (mysql_num_rows($res_rating) > 0) {
                                while ($row_rating = mysql_fetch_array($res_rating)) {
                                    $ctr++;
                                    $tot = $tot + $row_rating['rating'];
                                    ?>
                                    <table width="100%">
                                        <tr>
                                            <td><?php echo ucfirst($row_rating['name']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $row_rating['reviews_title'] ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 32px;font-weight: bold;">
                                                <?php
                                                if ($row_rating['rating'] == 5) {
                                                    echo '<span style="color:red;">*****<span>';
                                                } else if ($row_rating['rating'] == 4) {
                                                    echo '<span style="color:red;">****</span><span style="color:#ccc;">*</span>';
                                                } else if ($row_rating['rating'] == 3) {
                                                    echo '<span style="color:red;">***</span><span style="color:#ccc;">**</span>';
                                                } else if ($row_rating['rating'] == 2) {
                                                    echo '<span style="color:red;">**</span><span style="color:#ccc;">***</span>';
                                                } else {
                                                    echo '<span style="color:red;">*</span><span style="color:#ccc;">****</span>';
                                                }
                                                ?>
                                                <hr/>

                                            </td>
                                        </tr>                                        
                                    </table>
                                    <?php
                                }
                                $avg = $tot / $ctr;
                            }
                            ?>
                        </div>
                        <h5><b>Overall Rating</b></h5>
                        <p style="font-size: 32px;font-weight: bold;">
                            <?php
                            if ($avg > 4) {
                                echo '<span style="color:red;">*****<span>';
                            } else if ($avg > 3) {
                                echo '<span style="color:red;">****</span><span style="color:#ccc;">*</span>';
                            } else if ($avg > 2) {
                                echo '<span style="color:red;">***</span><span style="color:#ccc;">**</span>';
                            } else if ($avg > 1) {
                                echo '<span style="color:red;">**</span><span style="color:#ccc;">***</span>';
                            } else {
                                echo '<span style="color:red;">*</span><span style="color:#ccc;">****</span>';
                            }
                            ?>
                        </p>
                        <p>
                            <a href="wright_review.php?id=<?php echo $resArr['id']; ?>">Write a Review</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>       
        <?php
        include 'footer.php';
        ?>               
    </body>
</html>
