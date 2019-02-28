
<?php
include './dbconfigur.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Us -Johnny on the Spot</title>
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
                        <h1>About us</h1>
                    </div>
                </div>
            </div>
        </header>
        <!-- container -->
        <section class="container">
            <div class="row">
                <!-- main content -->
                <section class="col-sm-12 maincontent">
                    <h3>About Project</h3>
                    <p>
                        <img src="images/about.jpg" alt="" class="img-rounded pull-right" width="300">
                        E-learning is essentially the computer and network enabled transfer of skills and knowledge. E-learning refers to using electronic applications and processes to learn.
                    </p>
                    <p>In this web portal project the courses are delivered partly or completely via the Internet, an intranet or an extranet.</p>
                    <p>Also the site should be friendly for disabled people who are slow learners and also post video links for the deaf and blind.</p>
                    <p>We planned what all students need to be targeted being the students of class 12th preparing for their boards and for engineering entrances and also the students pursuing B.Tech.</p>
                    <h3>Our Goals</h3>                    
                    <p>The main goals of concern in developing an Online education portal is that it is a typically much larger endeavor than that of an instructor-led training (ILT) whether we consider the increased expenses, number of people involved, development time, technological requirements, and delivery options. </p>
                </section>
            </div>
        </section>
        <!-- /container -->
        <section class="team-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Development Team</h3>                       
                        <br />
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-xs-6"  >
                        <!-- Team Member -->
                        <div class="team-member" height="250" width="200" >
                            <!-- Image Hover Block -->
                            <div class="member-img" >
                                <!-- Image  -->
                                <img class="img-responsive" src="images/photo-1.jpg" alt="" height="250" width="200" >
                            </div>
                            <!-- Member Details -->
                            <h4>Shaurya Ratna(DEVELOPER)</h4>                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Team Member -->
                        <div class="team-member pDark">
                            <!-- Image Hover Block -->
                            <div class="member-img">
                                <!-- Image  -->
                                <img class="img-responsive" src="images/photo-2.jpg" alt="" >
                            </div>
                            <!-- Member Details -->
                            <h4>Shruti Khanna(DEVELOPER)</h4>                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Team Member -->
                        <div class="team-member pDark" height="250" width="250">
                            <!-- Image Hover Block -->
                            <div class="member-img">
                                <!-- Image  -->
                                <img class="img-responsive" src="images/photo-3.jpg" alt="" height="250" width="250">
                            </div>
                            <!-- Member Details -->
                            <h4>Jaspal Saini(MENTOR)</h4>                           
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Team Member -->
                        <div class="team-member pDark">
                            <!-- Image Hover Block -->
                            <div class="member-img">
                                <!-- Image  -->
<!--                                <img class="img-responsive" src="images/photo-4.jpg" alt="">
-->                            </div>
                            <!-- Member Details -->
                            <h4> </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include 'footer.php';
        ?>        
    </body>
</html>
