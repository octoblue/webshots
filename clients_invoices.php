<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
    <div id="page-content" style="margin-top: -20px; min-height: 1000px;">
<?php include 'inc/page_head.php'; ?>
        <div class="block full">
            <div class="block-title">
                <h2><strong>Datatables</strong> integration</h2>
            </div>
            <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's design and it offers many features such as on-the-fly filtering and variable length pagination.</p>

            <div class="table-responsive">
                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center"><i class="gi gi-user"></i></th>
                        <th>Client</th>
                        <th>Email</th>
                        <th>Subscription</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $labels['0']['class'] = "label-success";
                    $labels['0']['text'] = "VIP";
                    $labels['1']['class'] = "label-info";
                    $labels['1']['text'] = "Business";
                    $labels['2']['class'] = "label-primary";
                    $labels['2']['text'] = "Personal";
                    $labels['3']['class'] = "label-warning";
                    $labels['3']['text'] = "Trial";
                    ?>
                    <?php for($i=1; $i<61; $i++) { ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"><img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle"></td>
                            <td><a href="javascript:void(0)">client<?php echo $i; ?></a></td>
                            <td>client<?php echo $i; ?>@company.com</td>
                            <?php $rand = rand(0, 3); ?>
                            <td><span class="label<?php echo ($labels[$rand]['class']) ? " " . $labels[$rand]['class'] : ""; ?>"><?php echo $labels[$rand]['text']; ?></span></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
