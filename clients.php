<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>

<?php
$clients = Client::getClients();
?>
<div id="page-content" style="margin-top: -20px; min-height: 1000px;">
    <?php include 'inc/page_head.php'; ?>
    <div class="row text-center">
        <div class="col-sm-6 col-lg-3">
            <a href="client_new.php" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>Add New</strong> Client</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-danger">
                    <h4 class="widget-content-light"><strong>Number of</strong> Clients</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen"><?php echo count($clients); ?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>This Week</strong> Clients</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo count(Client::getClients(date('Y-m-d', strtotime('-7 days')))); ?></span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>This Month</strong> Clients</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo count(Client::getClients(date('Y-m-d', strtotime('-30 days')))); ?></span></div>
            </a>
        </div>
    </div>

    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">
            <h2><strong>All</strong> Clients</h2>
        </div>
        <!-- END All Products Title -->

        <!-- All Products Content -->
        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 70px;">ID</th>
                <th>Client Name</th>
                <th>Number</th>
                <th>Address</th>
                <th class="hidden-xs text-center">Buys</th>
                <th class="text-center">Payed</th>
                <th class="text-center">Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($clients as $client) { ?>
                <tr>
                    <td class="text-center"><a href="page_ecom_product_edit.php"><strong><?php echo $client->id; ?></strong></a></td>
                    <td><a href="page_ecom_product_edit.php"><?php echo $client->name; ?></a></td>
                    <td><strong><?php if($client->cell!='')echo $client->cell; ?></strong> <?php if($client->tel!='') ?> - <?php echo $client->tel; ?></strong></td>
                    <td><?php echo $client->address; ?></td>
                    <td class="hidden-xs text-center"><?php echo $client->buys; ?></td>
                    <td class="hidden-xs text-center"><?php echo $client->payed; ?></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-xs">
                            <a href="/client_new.php?clientId=<?php echo $client->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="/api.php?action=client_delete&clientId=<?php echo $client->id; ?>" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <!-- END All Products Content -->
    </div>
</div>
<script src="js/pages/ecomProducts.js"></script>
<script>$(function(){ EcomProducts.init(); });</script>

