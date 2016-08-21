<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php';?>
<?php if(isset($_REQUEST['error'])){?>
    <div class="alert alert-danger alert-dismissable" style="position: absolute; right:20px; top:20px; width: 300px;" data-animation="animation-fadeInQuick">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="fa fa-times-circle"></i> An Error Occured</h4> Please Try Again Later!
    </div>
<?php } ?>
<script language="JavaScript">
    $('.select-chosen').chosen();
</script>
<div id="page-content">
    <?php include 'inc/page_head.php'; ?>
    <div class="block">
        <!-- Products Title -->
        <div class="block-title">
            <h2 class="order-page"><i class="fa fa-shopping-cart"></i> <strong>Products</strong></h2>
            <a href="api.php?action=clear-orders" style="float: right;font-size: 14px;padding: 10px 30px 0 0;">Clear Page</a>
        </div>
        <!-- END Products Title -->
        <!-- Products Content -->
        <div class="table-responsive">
            <form id="add-task-form" class="push neworders" action="api.php" method="get">
                <input type="hidden" name="action" value="orders">
                <div class="input-group input-group-lg">
                    <input type="text" id="add-task" name="barcode" class="form-control" style="width: 20%" placeholder="Barcode">
                    <input type="text" id="add-task" name="serial" class="form-control" autofocus style="width: 20%" placeholder="Serial">
                    <input type="text" id="add-task" name="name" class="form-control" style="width: 20%" placeholder="Name">
                    <input type="text" id="add-task" name="quantity" class="form-control" style="width: 20%" placeholder="Quant.">
                    <input type="text" id="add-task" name="sell" class="form-control" style="width: 20%" placeholder="Sell">
                    <div class="input-group-btn">
                        <button type="submit" id="add-task-btn" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </form>
            <form id="edit-task-form" class="push order-submit" action="api.php" method="get">
                <input type="hidden" name="action" value="save">
            <table class="table table-bordered table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th class="text-center">QTY</th>
                    <th class="text-center">COST</th>
                    <th class="text-center" style="width: 20%;">PRICE</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                foreach($_SESSION['order'] as $order){?>
                <tr>
                    <td class="text-center">
                        <strong><?php echo $order['id']; ?></strong>
                    </td>
                    <td><?php echo $order['name']; ?></td>
                    <td><?php echo $order['description']; ?></td>
                    <td class="text-center"><strong><input type="text" name="quantity-<?php echo $order['id']; ?>" id="quant" value=" <?php echo $order['quantity']; ?>" style="text-align: center; border: none;" size=5/></strong></td>
                    <td class="text-center" style="color: white" onclick="if(this.style.color == 'white'){this.style.color='black';}else{this.style.color = 'white'}"><strong><?php echo $order['cost']; ?></strong></td>
                    <td class="text-center">
                        <strong><input type="text" name="sell-<?php echo $order['id']; ?>" id="sell" value="<?php echo $order['sell']; ?>" style="text-align: center; border: none;"/> </strong>
                        <div class="btn-group btn-group-xs" style="position: absolute">
                            <a href="#" data-toggle="tooltip" title="" class="btn btn-default edit-product" data-original-title="Save" data-productId = "<?php echo $order['id'];?>"><i class="fa fa-save"></i></a>
                            <a href="/api.php?action=delete-order&productId=<?php echo $order['id']; ?>" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                  <?php
                    $total += $order['sell'] * $order['quantity'];
                    $totalCost += $order['cost'] * $order['quantity'];
                }
            ?>
                <tr>
                    <td colspan="5" class="text-right text-uppercase"><strong>Total Price:</strong></td>
                    <td class="text-center"><strong><?php echo $total; ?></strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right text-uppercase"><strong>Total Paid:</strong></td>
                    <td class="text-right"><input type="text" name="paid" class="form-control" onkeyup="document.getElementById('due').innerHTML = <?php echo $total; ?> - this.value;"></td>
                </tr>
                    <td colspan="5" class="text-right text-uppercase"><strong>Client:</strong></td>
                    <td class="text-right">
                        <select id="product-category" name="client" class="select-chosen" data-placeholder="Choose Client.." style="width: 250px; display: none;">
                            <option value="1">Cash Sale</option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                            <?php
                            foreach(Client::getClients() as $client){
                               ?>
                                <option value="<?php echo $client->id ?>"><?php echo $client->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr class="active">
                    <td colspan="5" class="text-right text-uppercase"><strong>Total Due:</strong></td>
                    <td class="text-center" id="due"><strong><?php echo $total; ?></strong></td>
                </tr>
                </tbody>
            </table>
            <div class="full">
                <input type="button" class="btn btn-sm btn-success submit-order" value="Submit" style="float: right">
            </div>
                <input type="hidden" name="total" value="<?php echo $total; ?>" />
                <input type="hidden" name="totalCost" value="<?php echo $totalCost; ?>" />
                </form>
        </div>
        <!-- END Products Content -->
    </div>
    <div class="return-cash block">
        <span class="close"><i class="fa fa-close"></i></span>
        <div class="block-title"> Return Cash </div>
        <p class="original" data-total="<?php echo $total; ?>"><?php echo $total; ?></p>
        <input type="text" class="cash" value="<?php echo $total; ?>" onkeyup="document.getElementById('return').innerHTML =  this.value - <?php echo $total; ?>;">
        <p id="return">0</p>
        USD: <input type="checkbox" name="currency" value="on" id="currency" data-rate="<?php echo Setting::getSettingByName('usdrate')->value; ?>">
        <input type="button" class="btn btn-sm btn-success" value="Submit">
    </div>
    <?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>
