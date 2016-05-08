<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php
$client = Client::getClient($_REQUEST['clientId']);
$invoices = $client->invoices();
?>
<div class="ClientPays" style="display: none; width:300px; height: 300px; margin:auto;border-radius: 13px;z-index:10;position: absolute; top:0; right:0; left:0; bottom:0;background: #394263;text-align: center; ">
    <form method="get" action="api.php">
        <input type="hidden" name="action" value="ClientPay">
        <input type="hidden" name="clientId" value="<?php $_REQUEST['clientId']; ?>">
        <input type="text" style="margin: 130px 0 0 0;" name="pay">
        <input type="submit" value="Pay">
    </form>
</div>
    <div id="page-content" style="margin-top: -20px; min-height: 1000px;">
<?php include 'inc/page_head.php'; ?>
        <div class="row text-center">
            <div class="col-sm-6 col-lg-3">
                <a href="#" class="widget widget-hover-effect2 clientPay">
                    <div class="widget-extra themed-background-success">
                        <h4 class="widget-content-light"><strong>Pay</strong></h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-danger">
                        <h4 class="widget-content-light"><strong>Number of</strong> Invoices</h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen"><?php echo count($invoices); ?></span></div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-dark">
                        <h4 class="widget-content-light"><strong>Total</strong> Sold</h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo $client->buys; ?></span></div>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-dark">
                        <h4 class="widget-content-light"><strong>Total</strong> Payed</h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?php echo $client->payed; ?></span></div>

                </a>
            </div>
        </div>
        <div class="block full">
            <div class="block-title">
                <h2><strong>Client</strong> Invoices</h2>
            </div>
            <div class="table-responsive">
                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Invoice Id</th>
                        <th>Date</th>
                        <th>Cost</th>
                        <th>Sell</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($invoices as $i){?>
                        <tr>
                            <td class="text-center"><?php echo $i->id; ?></td>
                            <td><a href="javascript:void(0)"><?php echo $i->date; ?></a></td>
                            <td><?php $i->cost; ?></td>
                            <td><?php $i->sell; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
