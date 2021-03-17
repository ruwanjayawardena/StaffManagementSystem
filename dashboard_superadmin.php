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
                        <a href="usercategory.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-user-circle fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-user-circle fa-lg"></i> User Category </h5>
                                    <p class="card-text">User Category & Privileges <br><small>Super User Panel</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="user.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-user fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-user fa-lg"></i> User</h5>
                                    <p class="card-text">Configure Users<br><small>Super User Panel</small></p>
                                </div>                           
                            </div>
                        </a>
                    </div>                                   
                    
                    
                    <div class="col-lg-3 col-sm-4 col-xs-12 hvr-grow">
                        <a href="dashboard_combobox_setup.php" class="text-decoration-none">
                            <div class="card text-white bg-primary">
                                <div class="card-header text-center d-none d-sm-block"><i class="fas fa-sitemap fa-4x"></i></div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-sitemap fa-lg"></i> System Setup</h5>
                                    <p class="card-text">System Settings</p>
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