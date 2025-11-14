
<?php mysqli_set_charset('utf8'); ?>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-pencil"></i> <span>Admin TWTA</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="images/p16.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username']; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="pending.php"><i class="fa fa-user"></i>Pending Member</a></li>
                    <li><a href="member.php"><i class="fa fa-user"></i>Member</a></li>
                 <!--   <li><a href="writers.php"><i class="fa fa-user"></i>Approved Writers</a></li> -->
				 <!--<li><a href="new_writer.php"><i class="fa fa-plus"></i>Add New Writer</a></li>-->
                    <li><a href="assign.php"><i class="fa fa-tasks"></i>Assign Topics</a></li>
                    <li><a href="associate.php"><i class="fa fa-tasks"></i>Ad Associate</a></li>
                    <!--<li><a href="viewassinged.php"><i class="fa fa-eye"></i>View Assingned Topics</a></li>-->
                    <li><a href="fbupload.php"><i class="fa fa-facebook"></i>Upload Photo</a></li>
                    <li><a href="fbupload_1.php"><i class="fa fa-facebook"></i>Upload Achievement</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>