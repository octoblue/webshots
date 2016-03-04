<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>



<div id="page-content" style="margin-top: -20px; min-height: 1000px;">
    <a href="/webshots/index.php" class="timeline-icon" style="font-size: 20px"><i class="fa fa-home"></i>Home</a>
    <div class="row text-center" style="margin:0 0 10px 0">
        <form>
    <div class="col-sm-12 col-lg-12">
    <fieldset style="float: left; width: 30%">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-daterange1">Select Date Range</label>
            <div class="col-md-8">
                <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                    <input type="text" id="example-daterange1" name="example-daterange1" class="form-control text-center" placeholder="From">
                    <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                    <input type="text" id="example-daterange2" name="example-daterange2" class="form-control text-center" placeholder="To">
                </div>
            </div>
        </div>
    </fieldset>
        <div class="form-group form-actions" style="float: left; width: 20%">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
            </div>
        </div>
        </div>
            </form>
        </div>
<div class="row text-center">
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
                <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 animation-expandOpen">3</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">120</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> This Month</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">3.200</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> Last Month</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">2.850</span></div>
        </a>
    </div>
</div>
    <div class="block full">
        <!-- All Orders Title -->
        <div class="block-title">
            <div class="block-options pull-right">
            </div>
            <h2><strong>All</strong> Orders</h2>
        </div>
        <!-- END All Orders Title -->

        <!-- All Orders Content -->
        <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 100px;">ID</th>
                <th class="visible-lg">Customer</th>
                <th class="text-center visible-lg">Products</th>
                <th class="hidden-xs">Payment</th>
                <th class="text-right hidden-xs">Value</th>
                <th>Status</th>
                <th class="hidden-xs text-center">Submitted</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $labels['0']['class']   = "label-success";
            $labels['0']['text']    = "Delivered";
            $labels['1']['class']   = "label-info";
            $labels['1']['text']    = "For delivery";
            $labels['2']['class']   = "label-danger";
            $labels['2']['text']    = "Canceled";
            $labels['3']['class']   = "label-warning";
            $labels['3']['text']    = "Processing";

            $payment    = array('Paypal', 'Bank Wire', 'Check', 'Credit Card');
            $customers  = array('Gerald Berry', 'Patrick Bates', 'Ethan Greene', 'Nancy Rose', 'Harry Medina', 'Ryan Hopkins', 'Anthony Franklin', 'Harry Burke');
            ?>
            <?php for($i=99; $i>39; $i--) { ?>
                <tr>
                    <td class="text-center"><a href="page_ecom_order_view.php"><strong>ORD.6851<?php echo $i; ?></strong></a></td>
                    <td class="visible-lg"><a href="javascript:void(0)"><?php $rand = rand(0, 7); echo $customers[$rand]; ?></a></td>
                    <td class="text-center visible-lg"><a href="javascript:void(0)"><?php echo rand(1, 5); ?></a></td>
                    <td class="hidden-xs"><?php $rand = rand(0, 3); echo $payment[$rand]; ?></td>
                    <td class="text-right hidden-xs"><strong>$<?php echo rand(25, 2500); ?>,00</strong></td>
                    <td><span class="label<?php $rand = rand(0, 3); echo ($labels[$rand]['class']) ? " " . $labels[$rand]['class'] : ""; ?>"><?php echo $labels[$rand]['text']; ?></span></td>
                    <td class="hidden-xs text-center"><?php echo sprintf('%02d', rand(1, 28)) . '/' . sprintf('%02d', rand(1, 12)); ?>/2014</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-xs">
                            <a href="page_ecom_order_view.php" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <!-- END All Orders Content -->
    </div>

</div>
<?php include 'inc/template_scripts.php'; ?>

    <!-- Load and execute javascript code used only in this page -->
    <script src="js/pages/ecomOrders.js"></script>
    <script>$(function(){ EcomOrders.init(); });</script>

<?php include 'inc/template_end.php'; ?>