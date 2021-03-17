<?php include './access_control/superadmin_auth.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <?php include './includes/head-block.php'; ?>
        <style>
            body{
                background: #DFE0DF;
                color: white;
            }
        </style>
    </head>
    <body>
        <!--navbar-->
        <?php include 'includes/backend-navbar.php'; ?> 
        <!--body content-->
        <section>
            <div class="container wrapper">
                <div class="row justify-content-center">  					
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="branch.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-sitemap fa-lg"></i> Branches</h5>
                                    <p class="card-text">Configure Branches</p>
                                </div>                           
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="district.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-sitemap fa-lg"></i> District</h5>
                                    <p class="card-text">Configure District</p>
                                </div>                           
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="dsoffice.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-sitemap fa-lg"></i> DS Offices</h5>
                                    <p class="card-text">Configure DS Offices</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="gndivision.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> GN Division</h5>
                                    <p class="card-text">Configure GN Division</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                  
                                        
                                       
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="subcmb.php?MC=2&RC=0&RL=1" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Religion</h5>
                                    <p class="card-text">Configure Religion</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="subcmb.php?MC=3&RC=0&RL=1" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Civil status</h5>
                                    <p class="card-text">Configure Civil status</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="subcmb.php?MC=5&RC=0&RL=1" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Occupation Type</h5>
                                    <p class="card-text">Configure Occupation Type</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="subcmb.php?MC=6&RC=0&RL=1" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Service Type</h5>
                                    <p class="card-text">Configure Service Type</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="subcmb.php?MC=10&RC=0&RL=1" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Service Category</h5>
                                    <p class="card-text">Configure Service Category</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="relatecmb.php?MC=7" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Service</h5>
                                    <p class="card-text">Configure Service</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="relatesubcmb.php?MC=8&RC=7&RL=2" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Class/ Grade</h5>
                                    <p class="card-text">Configure Class/ Grade</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="relatesubcmb.php?MC=9&RC=7&RL=2" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Designation</h5>
                                    <p class="card-text">Configure Designation</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="relatesubcmb.php?MC=13&RC=7&RL=2" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Salary Code</h5>
                                    <p class="card-text">Configure Salary Code</p>
                                </div>                           
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="subcmb.php?MC=12&RC=0&RL=1" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> Appointment Mode</h5>
                                    <p class="card-text">Configure Appointment Mode</p>
                                </div>                           
                            </div>
                        </a>
                    </div> 
					<div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="relatesubcmb.php?MC=11&RC=7&RL=2" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-stroopwafel fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-stroopwafel fa-lg"></i> EB Examinations</h5>
                                    <p class="card-text">Configure EB Examinations</p>
                                </div>                           
                            </div>
                        </a>
                    </div>   
                </div>
            </div>
        </section>
        <?php
        include './includes/end-block.php';
        include './includes/commonJS.php';
        ?>       
    </body>
</html>