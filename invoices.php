<?php
include 'inc/db.php';
include 'inc/config.php';
include 'inc/template_start.php';
?>

<div id="page-content" style="margin-top: -20px; min-height: 1000px;">

    <a href="/index.php" class="timeline-icon" style="font-size: 20px"><i class="fa fa-home"></i>Home</a>

    <div class="row text-center">
        <div class="col-sm-9 col-lg-4">
            <div class="widget">
                <div class="widget-extra themed-background-success">
                    <h4 class="widget-content-light"><strong>ORD.685195</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen">15/10/2014</span></div>
            </div>
        </div>
        <div class="col-sm-9 col-lg-4">
            <div class="widget">
                <div class="widget-extra themed-background-danger">
                    <h4 class="widget-content-light"><i class="fa fa-money"></i> <strong>Payment</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-danger animation-expandOpen"><i class="fa fa-ban"></i></span></div>
            </div>
        </div>
        <div class="col-sm-9 col-lg-4">
            <div class="widget">
                <div class="widget-extra themed-background-muted">
                    <h4 class="widget-content-light"><i class="fa fa-truck"></i> <strong>Delivery</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span></div>
            </div>
        </div>
    </div>
    <div class="block">
        <!-- Products Title -->
        <div class="block-title">
            <h2><i class="fa fa-shopping-cart"></i> <strong>Products</strong></h2>
        </div>
        <!-- END Products Title -->

        <!-- Products Content -->
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">ID</th>
                    <th>Product Name</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">QTY</th>
                    <th class="text-right" style="width: 10%;">UNIT COST</th>
                    <th class="text-right" style="width: 10%;">PRICE</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center"><a href="page_ecom_product_edit.php"><strong>PID.8715</strong></a></td>
                    <td><a href="page_ecom_product_edit.php">Xbox One</a></td>
                    <td class="text-center"><strong>720</strong></td>
                    <td class="text-center"><strong>1</strong></td>
                    <td class="text-right"><strong>$399,00</strong></td>
                    <td class="text-right"><strong>$399,00</strong></td>
                </tr>
                <tr>
                    <td class="text-center"><a href="page_ecom_product_edit.php"><strong>PID.8726</strong></a></td>
                    <td><a href="page_ecom_product_edit.php">Forza Motorsport 5</a></td>
                    <td class="text-center"><strong>368</strong></td>
                    <td class="text-center"><strong>1</strong></td>
                    <td class="text-right"><strong>$59,00</strong></td>
                    <td class="text-right"><strong>$59,00</strong></td>
                </tr>
                <tr>
                    <td class="text-center"><a href="page_ecom_product_edit.php"><strong>PID.8760</strong></a></td>
                    <td><a href="page_ecom_product_edit.php">Playstation 4</a></td>
                    <td class="text-center"><strong>652</strong></td>
                    <td class="text-center"><strong>1</strong></td>
                    <td class="text-right"><strong>$399,00</strong></td>
                    <td class="text-right"><strong>$399,00</strong></td>
                </tr>
                <tr>
                    <td class="text-center"><a href="page_ecom_product_edit.php"><strong>PID.8728</strong></a></td>
                    <td><a href="page_ecom_product_edit.php">Killzone: Shadow Fall</a></td>
                    <td class="text-center"><strong>368</strong></td>
                    <td class="text-center"><strong>1</strong></td>
                    <td class="text-right"><strong>$59,00</strong></td>
                    <td class="text-right"><strong>$59,00</strong></td>
                </tr>
                <tr>
                    <td class="text-center"><a href="page_ecom_product_edit.php"><strong>PID.8763</strong></a></td>
                    <td><a href="page_ecom_product_edit.php">Little Big Planet 3</a></td>
                    <td class="text-center"><strong>150</strong></td>
                    <td class="text-center"><strong>1</strong></td>
                    <td class="text-right"><strong>$59,00</strong></td>
                    <td class="text-right"><strong>$59,00</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right text-uppercase"><strong>Total Price:</strong></td>
                    <td class="text-right"><strong>$975,00</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right text-uppercase"><strong>Total Paid:</strong></td>
                    <td class="text-right"><strong>$975,00</strong></td>
                </tr>
                <tr class="active">
                    <td colspan="5" class="text-right text-uppercase"><strong>Total Due:</strong></td>
                    <td class="text-right"><strong>$0,00</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- END Products Content -->
    </div>
    <div class="block">
        <!-- Billing Address Title -->
        <div class="block-title">
            <h2><i class="fa fa-building-o"></i> <strong>Billing</strong> Address</h2>
        </div>
        <!-- END Billing Address Title -->

        <!-- Billing Address Content -->
        <h4><strong>Jonathan Taylor</strong></h4>
        <address>
            Sunset Str 620<br>
            Melbourne<br>
            Australia, 21-842<br><br>
            <i class="fa fa-phone"></i> (999) 852-11111<br>
            <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">johnathan.taylor@example.com</a>
        </address>
        <!-- END Billing Address Content -->
    </div>
    <div class="block">
        <!-- Log Title -->
        <div class="block-title">
            <h2><i class="fa fa-file-text-o"></i> <strong>Log</strong> Messages</h2>
        </div>
        <!-- END Log Title -->

        <!-- Log Content -->
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <tbody>
                <tr>
                    <td>
                        <span class="label label-primary">Order</span>
                    </td>
                    <td class="text-center">October 17, 2014 - 12:00</td>
                    <td><a href="javascript:void(0)">Support</a></td>
                    <td class="text-success"><i class="fa fa-fw fa-check"></i> <strong>Order Completed</strong></td>
                </tr>
                <tr>
                    <td>
                        <span class="label label-primary">Order</span>
                    </td>
                    <td class="text-center">October 17, 2014 - 10:15</td>
                    <td><a href="javascript:void(0)">Support</a></td>
                    <td class="text-info"><i class="fa fa-fw fa-info-circle"></i> <strong>Preparing Order</strong></td>
                </tr>
                <tr>
                    <td>
                        <span class="label label-success">Payment</span>
                    </td>
                    <td class="text-center">October 16, 2014 - 17:15</td>
                    <td><a href="javascript:void(0)">Harry Burke</a></td>
                    <td class="text-success"><i class="fa fa-fw fa-check"></i> <strong>Payment Completed</strong></td>
                </tr>
                <tr>
                    <td>
                        <span class="label label-danger">Email</span>
                    </td>
                    <td class="text-center">October 16, 2014 - 09:10</td>
                    <td><a href="javascript:void(0)">Support</a></td>
                    <td class="text-danger"><i class="fa fa-fw fa-exclamation-triangle"></i> <strong>Missing payment details. Email was sent and awaiting for payment before processing</strong></td>
                </tr>
                <tr>
                    <td>
                        <span class="label label-primary">Order</span>
                    </td>
                    <td class="text-center">October 15, 2014 - 12:26</td>
                    <td><a href="javascript:void(0)">Support</a></td>
                    <td><strong>All products are available</strong></td>
                </tr>
                <tr>
                    <td>
                        <span class="label label-primary">Order</span>
                    </td>
                    <td class="text-center">October 15, 2014 - 12:15</td>
                    <td><a href="javascript:void(0)">Harry Burke</a></td>
                    <td><strong>Order Submitted</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- END Log Content -->
    </div>

</div>
