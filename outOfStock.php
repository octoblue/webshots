<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>

<?php
$conn = Db::dbConnect();
$stock = Stock::outOfStock();
?>

    <div id="page-content" style="margin-top: -20px; min-height: 1000px;">
        <a href="/index.php" class="timeline-icon" style="font-size: 20px"><i class="fa fa-home"></i>Home</a>
        <div class="block full">
            <!-- All Orders Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                </div>
                <h2><strong>Out Of</strong> Stock</h2>
            </div>
            <!-- END All Orders Title -->

            <!-- All Orders Content -->
            <table id="ecom-orders" class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">ID</th>
                    <th class="visible-lg">Name</th>
                    <th class="text-center visible-lg">Barcode</th>
                    <th class="hidden-xs">Serial</th>
                    <th class="text-right hidden-xs">Description</th>
                    <th>Cost</th>
                    <th class="hidden-xs text-center">Sell</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($stock as $s){ ?>
                    <tr>
                        <td class="text-center"><strong><?php echo $s->id; ?></strong></td>
                        <td class="visible-lg"><?php echo $s->name; ?></td>
                        <td class="text-center visible-lg"><?php echo $s->barcode; ?></td>
                        <td class="hidden-xs"><?php echo $s->serial; ?></td>
                        <td class="text-right hidden-xs"><strong><?php echo $s->description; ?></strong></td>
                        <td><span class="label"><?php echo $s->cost; ?></span></td>
                        <td class="hidden-xs text-center"><?php echo $s->sell; ?></td>
                        <td class="hidden-xs text-center"><?php echo $s->quantity; ?></td>
                        <td class="hidden-xs text-center"><?php echo $s->supplier; ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="stock.php?stockId=<?=$s->id?>" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                <a href="api.php?action=delete_stock&stockId=<?=$s->id?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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