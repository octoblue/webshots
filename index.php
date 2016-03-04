<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong><?php echo($_SESSION['user']); ?></strong><br><small>Have a nice day!</small></h1>
                </div>
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_ecom_dashboard.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="gi gi-usd"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>250$</strong><br>
                        <small>Sales Today</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="reports.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-more_items"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        5 <strong>Items</strong>
                        <small>Reports</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="order.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="gi gi-sort-by-order"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        New <strong>Order</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="stocks.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-danger animation-fadeIn">
                        <i class="gi gi-oxygen_bottle"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Stock</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="clients.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="gi gi-user"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Clients</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="suppliers.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-dark-amethyst animation-fadeIn">
                        <i class="gi gi-user"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Suppliers</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include 'inc/template_scripts.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps -->
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/helpers/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>

<?php include 'inc/template_end.php'; ?>