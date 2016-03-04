<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>

<div id="page-content" style="margin-top: -20px; min-height: 1000px;">

    <a href="/webshots/index.php" class="timeline-icon" style="font-size: 20px"><i class="fa fa-home"></i>Home</a>

    <div class="row">
        <div class="col-lg-12">
            <!-- General Data Block -->
            <div class="block">
                <!-- General Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>
                </div>
                <!-- END General Data Title -->

                <!-- General Data Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">PID</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="6825" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-name">Name</label>
                        <div class="col-md-9">
                            <input type="text" id="product-name" name="product-name" class="form-control" placeholder="Enter product name..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-description">Description</label>
                        <div class="col-md-9">
                            <!-- CKEditor, you just need to include the plugin (see at the bottom of this page) and add the class 'ckeditor' to your textarea -->
                            <!-- More info can be found at http://ckeditor.com -->
                            <textarea id="product-description" name="product-description" class="ckeditor"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-category">Category</label>
                        <div class="col-md-8">
                            <!-- Chosen plugin (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://harvesthq.github.io/chosen/ -->
                            <select id="product-category" name="product-category" class="select-chosen" data-placeholder="Choose Category.." style="width: 250px;">
                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                <option value="1">Tablets</option>
                                <option value="2">Laptops</option>
                                <option value="3">PCs</option>
                                <option value="4">Consoles</option>
                                <option value="5">Movies</option>
                                <option value="6">Books</option>
                                <option value="7">Cables</option>
                                <option value="8">Adapters</option>
                                <option value="9">Office</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-price">Cost</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <input type="text" id="product-price" name="product-cost" class="form-control" placeholder="0,00">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-price">Sell</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                <input type="text" id="product-price" name="product-sell" class="form-control" placeholder="0,00">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Condition</label>
                        <div class="col-md-9">
                            <label class="radio-inline" for="product-condition-new">
                                <input type="radio" id="product-condition-new" name="product-condition" value="condition_new" checked> New
                            </label>
                            <label class="radio-inline" for="product-condition-used">
                                <input type="radio" id="product-condition-used" name="product-condition" value="condition_used"> Used
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Quantity</label>
                        <div class="col-md-9">
                            <input type="text" id="product-quant" name="product-quant" class="form-control" placeholder="Enter product quantity..">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END General Data Content -->
            </div>
            <!-- END General Data Block -->
        </div>
    </div>
</div>
<?php include 'inc/template_scripts.php'; ?>

    <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
    <script src="js/helpers/ckeditor/ckeditor.js"></script>

<?php include 'inc/template_end.php'; ?>