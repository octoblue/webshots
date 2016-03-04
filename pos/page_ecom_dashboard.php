<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php
    $salesToday = Sale::salesTotal();
    $startDate = false;
    $endDate = false;
    if(isset($_REQUEST['startDate'])) $startDate = $_REQUEST['startDate'];
    if(isset($_REQUEST['endDate'])) $endDate = $_REQUEST['endDate'];
    $sales = Sale::sales($startDate, $endDate);
    $salesAmount = Sale::salesTotal($startDate, $endDate);
    $products = Product::products($startDate, $endDate);
    $productsAmount = Product::productsTotal($startDate, $endDate);

?>
<!-- Page content -->
<div id="page-content">
    <?php include 'inc/page_head.php'; ?>
    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background">
                    <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen"><?php echo $salesToday['counter']; ?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Sell</strong> Today</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo $salesToday['amount']; ?> LBP</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Cost</strong> Today</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo $salesToday['cost']; ?>$</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Net</strong> Profit</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo($salesToday['amount'] - ($salesToday['cost'] * 1500)); ?> LBP</span></div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- eShop Overview Block -->
    <div class="block col-xs-6">
        <!-- eShop Overview Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <div class="form-group">
                    <form action="/page_ecom_dashboard.php" method="get">
                    <label class="col-md-4 control-label" for="example-daterange1">Select Date Range</label>
                    <div class="col-md-4">
                        <div class="input-group input-daterange" data-date-format="yyyy-mm-dd">
                            <input type="text" id="startDate" name="startDate" class="form-control text-center" placeholder="From">
                            <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                            <input type="text" id="endDate" name="endDate" class="form-control text-center" placeholder="To">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                    </div>
                    </form>
                </div>
            </div>
            <h2><strong>CompuShop</strong> Overview</h2>
        </div>
        <!-- END eShop Overview Title -->

        <!-- eShop Overview Content -->
        <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="row push">
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo $salesAmount['counter']; ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Invoices</a></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo $salesAmount['amount']; ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Sell Value</a></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo($salesAmount['cost'] * 1500); ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Cost Value</a></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo($salesAmount['amount'] - ($salesAmount['cost'] * 1500)); ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Net Profit</a></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo $productsAmount['counter']; ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Products Bought</a></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo $productsAmount['sell']; ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Products Cost</a></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo $productsAmount['amount']; ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Products Payed</a></small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3><strong class="animation-fadeInQuick"><?php echo($salesAmount['amount'] - $productsAmount['amount']); ?></strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Cost x Profit</a></small></h3>
                        </div>
                    </div>
                </div>

            </div>
        <!-- END eShop Overview Content -->
    </div>
    <!-- END eShop Overview Block -->

    <!-- Orders and Products -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Latest Orders Block -->
            <div class="block">
                <!-- Latest Orders Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="page_ecom_orders.php" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Show All"><i class="fa fa-eye"></i></a>
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <h2><strong>Latest</strong> Orders</h2>
                </div>
                <!-- END Latest Orders Title -->

                <!-- Latest Orders Content -->
                <table class="table table-borderless table-striped table-vcenter table-bordered">
                    <tbody>
                    <?php
                    if(count($products) < 10){$countProd = count($products);}else{$countProd = 10;}
                    for($i=0; $i<$countProd; $i++) {
                        ?>
                        <tr>
                            <td class="text-center"><a href="/page_ecom_order_view.php?id=<?php echo $products[$i]->id;?>"><strong><?php echo $products[$i]->id; ?></strong></a></td>
                            <td class="hidden-xs"><a href="/page_ecom_order_view.php?id=<?php echo $products[$i]->id;?>"><?php echo(Supplier::getSupplier($products[$i]->supplierId)->name); ?></a></td>
                            <td class="hidden-xs"><strong><?php echo $products[$i]->date; ?></strong></td>
                            <td class="text-right" style="color: red"><strong><?php echo $products[$i]->sell; ?></strong></td>
                            <td class="text-right" style="color: green"><strong><?php echo $products[$i]->amount; ?></span></strong></td>
                        </tr>
                        <?php
                    }?>
                    </tbody>
                </table>
                <!-- END Latest Orders Content -->
            </div>
            <!-- END Latest Orders Block -->
        </div>
        <div class="col-lg-12">
            <!-- Top Products Block -->
            <div class="block">
                <!-- Top Products Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="page_ecom_products.php" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Show All"><i class="fa fa-eye"></i></a>
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <h2><strong>Top</strong> Products</h2>
                </div>
                <!-- END Top Products Title -->

                <!-- Top Products Content -->
                <table class="table table-borderless table-striped table-vcenter table-bordered">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 100px;"><a href="page_ecom_product_edit.php"><strong>PID.8765</strong></a></td>
                            <td><a href="page_ecom_product_edit.php">iPhone 6 Plus 32GB</a></td>
                            <td class="text-center"><strong>435</strong> orders</td>
                            <td class="hidden-xs text-center">
                                <div class="text-warning">

                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <!-- END Top Products Content -->
            </div>
            <!-- END Top Products Block -->
        </div>
    </div>
    <!-- END Orders and Products -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/ecomDashboard.js"></script>
<script>$(function(){ EcomDashboard.init(); });</script>

<?php include 'inc/template_end.php'; ?>