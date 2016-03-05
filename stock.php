<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>

<div id="page-content" style="margin-top: -20px; min-height: 1000px;">
    <?php include 'inc/page_head.php'; ?>
    <div class="col-md-12">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <div class="block-title">
                <h2><strong>Create New</strong> Stock</h2>
            </div>
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->
            <form action="api.php" method="get" class="form-horizontal form-bordered">
                <input type="hidden" name="action" value="insert_stock">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Product Name</label>
                    <div class="col-md-9">
                        <input type="text" id="example-text-input" name="name" class="form-control" placeholder="Text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Barcode</label>
                    <div class="col-md-9">
                        <input type="text" id="example-text-input" name="barcode" class="form-control" placeholder="Barcode">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Serial</label>
                    <div class="col-md-9">
                        <input type="text" id="example-text-input" name="serial" class="form-control" placeholder="Serial">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Description</label>
                    <div class="col-md-9">
                        <textarea id="textarea-ckeditor" name="description" class="ckeditor" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Cost</label>
                    <div class="col-md-9">
                        <input type="text" id="example-text-input" name="cost" class="form-control" placeholder="Cost">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Sell</label>
                    <div class="col-md-9">
                        <input type="text" id="example-text-input" name="sell" class="form-control" placeholder="Sell">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Quantity</label>
                    <div class="col-md-9">
                        <input type="text" id="example-text-input" name="quant" class="form-control" placeholder="Quantity">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-text-input">Supplier</label>
                    <div class="col-md-9">
                        <select id="product-category" name="supplier" class="select-chosen" data-placeholder="Choose Supplier.." style="width: 250px; display: none;">
                            <option value="1"></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                            <?php
                            foreach(Supplier::getSuppliers() as $client){
                                ?>
                                <option value="<?php echo $client->id ?>"><?php echo $client->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                    </div>
                </div>
            </form>
            <!-- END Basic Form Elements Content -->
        </div>
        <!-- END Basic Form Elements Block -->
    </div>

</div>
<script src="js/helpers/ckeditor/ckeditor.js"></script>
