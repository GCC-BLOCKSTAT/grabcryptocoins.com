<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grabcrypto Coins | 
            <?php
            if (isset($_SESSION['admin'])) {
                echo 'Admin';
            } elseif (isset($_SESSION['poweruser'])) {
                echo 'Poweruser';
            } else {
                echo 'Operator';
            }
            ?>
            | Connecting Friends</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url(); ?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/colorbox.css'); ?>" />      

    </head>
    <body class="skin-blue">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url('admin/home'); ?>" class="logo"><b>Grabcrypto Coins</a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    if (isset($_SESSION['admin'])) {
                                        getAdminData($_SESSION['admin']);
                                        if (getAdminData($_SESSION['admin'])->profile_image != "") {
                                            ?>
                                            <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['admin'])->profile_image); ?>" class="user-image" alt="Logo">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/default_img.png'); ?>"  class="user-image" alt="Logo">  
                                        <?php } ?>
                                        <span class="hidden-xs"><?php echo ucwords(getAdminData($_SESSION['admin'])->name); ?></span>

                                    <?php
                                    } elseif (isset($_SESSION['poweruser'])) {
                                        getAdminData($_SESSION['poweruser']);
                                        if (getAdminData($_SESSION['poweruser'])->profile_image != "") {
                                            ?>
                                            <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['poweruser'])->profile_image); ?>"  class="user-image" alt="Logo">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/default_img.png'); ?>"  class="user-image" alt="Logo">
                                        <?php } ?>
                                        <span class="hidden-xs"><?php echo ucwords(getAdminData($_SESSION['poweruser'])->name); ?> (Power User)</span>

                                    <?php
                                    } else {
                                        getAdminData($_SESSION['operator']);
                                        if (getAdminData($_SESSION['operator'])->profile_image != "") {
                                            ?>
                                            <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['operator'])->profile_image); ?>"  class="user-image" alt="Logo">
    <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/default_img.png'); ?>"  class="user-image" alt="Logo">
                                            <?php } ?>
                                        <span class="hidden-xs"><?php echo ucwords(getAdminData($_SESSION['operator'])->name); ?> (Operator)</span>
                                        <?php } ?>  
                                </a>
                                <ul class="dropdown-menu" style="width:310px">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php
                                        if (isset($_SESSION['admin'])) {
                                            getAdminData($_SESSION['admin']);
                                            if (getAdminData($_SESSION['admin'])->profile_image != "") {
                                                ?>
                                                <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['admin'])->profile_image); ?>" class="img-circle" alt="Logo">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url('assets/images/default_img.png'); ?>"  class="img-circle" alt="Logo">
                                            <?php } ?>
                                            <p><?php echo ucwords(getAdminData($_SESSION['admin'])->name); ?></p>

<?php
} elseif (isset($_SESSION['poweruser'])) {
    getAdminData($_SESSION['poweruser']);
    if (getAdminData($_SESSION['poweruser'])->profile_image != "") {
        ?>
                                                <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['poweruser'])->profile_image); ?>" class="img-circle" alt="Logo">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url('assets/images/default_img.png'); ?>" class="img-circle" alt="Logo"> 
                                            <?php } ?>
                                            <p><?php echo ucwords(getAdminData($_SESSION['poweruser'])->name); ?></p>

<?php
} else {
    getAdminData($_SESSION['operator']);
    if (getAdminData($_SESSION['operator'])->profile_image != "") {
        ?>
                                                <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['operator'])->profile_image); ?>"  class="img-circle" alt="Logo">
    <?php } else { ?>
                                                <img src="<?php echo base_url('assets/images/default_img.png'); ?>" class="img-circle" alt="Logo">
    <?php } ?>
                                            <p><?php echo ucwords(getAdminData($_SESSION['operator'])->name); ?></p>
<?php } ?>  
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
<?php if (isset($_SESSION['admin'])) { ?>
                                            <div class="pull-left">
                                                <a href="<?php echo base_url('admin/Home/adminprofile/') . $_SESSION['admin']; ?>" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-left" style="margin-left: 10px;">
                                                <a href="<?php echo base_url('admin/Home/changepassword/') . $_SESSION['admin']; ?>" class="btn btn-default btn-flat">Change Password</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="<?php echo base_url('admin/login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
<?php } elseif (isset($_SESSION['poweruser'])) { ?>
                                            <div class="pull-left">
                                                <a href="<?php echo base_url('admin/Home/adminprofile/') . $_SESSION['poweruser']; ?>" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-left" style="margin-left: 10px;">
                                                <a href="<?php echo base_url('admin/Home/changepassword/') . $_SESSION['poweruser']; ?>" class="btn btn-default btn-flat">Change Password</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="<?php echo base_url('admin/login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
<?php } else { ?>
                                            <div class="pull-left">
                                                <a href="<?php echo base_url('admin/Home/adminprofile/') . $_SESSION['operator']; ?>" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-left" style="margin-left: 10px;">
                                                <a href="<?php echo base_url('admin/Home/changepassword/') . $_SESSION['operator']; ?>" class="btn btn-default btn-flat">Change Password</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="<?php echo base_url('admin/login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
<?php } ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
<?php
if (isset($_SESSION['admin'])) {
    getAdminData($_SESSION['admin']);
    ?>
                            <div class="pull-left image">
                            <?php if (getAdminData($_SESSION['admin'])->profile_image != "") { ?>
                                    <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['admin'])->profile_image); ?>" class="img-circle" alt="Logo">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('assets/images/default_img.png'); ?>" class="img-circle" alt="Logo">
                                <?php } ?>
                            </div>
                            <div class="pull-left info">
                                <p><?php echo ucwords(getAdminData($_SESSION['admin'])->name); ?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>

                        <?php } elseif (isset($_SESSION['poweruser'])) {
                            getAdminData($_SESSION['poweruser']);
                            ?>
                            <div class="pull-left image">
                                <?php if (getAdminData($_SESSION['poweruser'])->profile_image != "") { ?>
                                    <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['poweruser'])->profile_image); ?>" class="img-circle" alt="Logo">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('assets/images/default_img.png'); ?>" class="img-circle" alt="Logo">
                                <?php } ?>
                            </div>
                            <div class="pull-left info">
                                <p><?php echo ucwords(getAdminData($_SESSION['poweruser'])->name); ?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        <?php } else {
                            getAdminData($_SESSION['operator']);
                            ?>
                            <div class="pull-left image">
                            <?php if (getAdminData($_SESSION['operator'])->profile_image != "") { ?>
                                    <img src="<?php echo base_url('uploads/admin/' . getAdminData($_SESSION['operator'])->profile_image); ?>"  class="img-circle" alt="Logo">
                            <?php } else { ?>
                                    <img src="<?php echo base_url('assets/images/default_img.png'); ?>">
    <?php } ?>
                            </div>
                            <div class="pull-left info">
                                <p><?php echo ucwords(getAdminData($_SESSION['operator'])->name); ?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>

                        <?php } ?>  
                    </div>
                    <ul class="sidebar-menu">
                            <li><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <?php if(isset($_SESSION['admin'])){ ?>
                           <li><a href="<?php echo base_url('admin/subadmin'); ?>"><i class="fa fa-user"></i> <span>Subadmin</span></a></li>
                        <?php } ?>
                            <li><a href="<?php echo base_url('admin/users'); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                            <li><a href="<?php echo base_url('admin/response'); ?>"><i class="fa fa-user"></i> <span>User Request</span></a></li>
                            <li><a href="<?php echo base_url('admin/sellwallet'); ?>"><i class="fa fa-user"></i> <span>Seller Request</span></a></li>
                            <li><a href="<?php echo base_url('admin/wallet'); ?>"><i class="fa fa-user"></i> <span>Buyer Request</span></a></li>
                            <li><a href="<?php echo base_url('admin/money'); ?>"><i class="fa fa-user"></i> <span>Add Money Request</span></a></li>
                            <li><a href="<?php echo base_url('admin/withdraw'); ?>"><i class="fa fa-user"></i> <span>Withdraw Request</span></a></li>
                            <li><a href="<?php echo base_url('admin/defaults'); ?>"><i class="fa fa-cog "></i> <span>Currency Setting</span></a></li>
                        <?php if(isset($_SESSION['admin'])){ ?>
                            <li><a href="<?php echo base_url('admin/disclaimer'); ?>"><i class="fa fa-list"></i> <span>Disclaimer</span></a></li>
                            <li><a href="<?php echo base_url('admin/bank'); ?>"><i class="fa fa-list"></i> <span>Add Bank Account</span></a></li>
                            <li><a href="<?php echo base_url('admin/pages'); ?>"><i class="fa fa-list"></i> <span>Pages</span></a></li>
                        <?php } ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>       
