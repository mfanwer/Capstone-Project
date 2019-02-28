<?php
include './dbconfigur.php';
?>
<html>
    <head>
        <title>Search - Johnny on the Spot</title>
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
                        <h1>Search</h1>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row"><p>&nbsp;</p></div>
            <div class="row">                    
                <div class="col-md-8">  
                    <?php
                    $search = "";
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                    }
                    ?>
                    <form class="form-light mt-20" role="form" method="get" action="">
                        <div class="form-group" style="padding-top:70px">                            
                            <input type="text" id="search" name="search" class="form-control" value="<?php echo $search ?>" placeholder="Type a location                                             								             Press Enter">
                        </div> 
                    </form>
                    <div class="row" style="padding-left: 17px;padding-right: 17px;">
                        <?php
                        if (!empty($search)) {
                            $i = 0;
                            $sql = "SELECT * FROM users WHERE user_type ='restaurant' and city like '%" . $search . "%' ORDER BY name ASC";
                            $result = mysql_query($sql);
                            if (mysql_num_rows($result) > 0) {
                                echo '<table class="table_list">';
                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td class="grid_heading">S.No</td>
                                        <td class="grid_heading">Logo</td>
                                        <td class="grid_heading">Restaurant Name</td>
                                        <td class="grid_heading">Email</td>
                                        <td class="grid_heading">Phone</td>

                                    </tr>
                                    <?php
                                    $i++;
                                    ?>
                                    <tr>
                                        <td class="grid_label"><?php echo $i; ?></td>
                                        <td class="grid_label"><a href="restaurant_home.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $row ['imgpath'] ?>" height="80"/></a></td>
                                        <td class="grid_label"><?php echo $row['name'] ?></td>
                                        <td class="grid_label"><?php echo $row['email'] ?></td>
                                        <td class="grid_label"><?php echo $row['phone_no'] ?></td>                                       
                                    </tr>
                                    <?php
                                }
                                echo '</table>';
                            } else {
                                echo 'No records found.';
                            }
                        }
                        ?>

                    </div>
                </div>                  

                <div class="col-md-4" style="padding-left: 60px;">
                      <div class="title-box clearfix "><h2 class="title-box_primary">Locations</h2></div> 
                    <figure class="frame thumbnail alignnone clearfix">
                        <p><img class="size-full " alt="usa" src="images/ny.png" width="" height="197"><a href=""https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Ghaziabad,Uttar+pradesh,+India&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Ghaziabad,Uttar+pradesh,+Indi&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Ghaziabad,Uttar+pradesh,+Indi&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Ghaziabad,Uttar+pradesh,+Indi&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"><b>View Larger Map</a>
					   		</p>
                    </figure>
                </div>

                </div>
            </div>
        </div>       
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        <?php
        include 'footer.php';
        ?>               
    </body>
</html>
