<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                    <img src="https://ai24x7.com/uploads/cash-on-delivery.png" style="height: 44px; width: 44px;"
                        alt="user-image">
                    <?php echo get_phrase('instructor_payouts'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('list_of_payouts'); ?></h4>
                <table style="border: 1px solid nopadding" border="0">
                    <tbody>
                        <?php
                        foreach ($data as $paramName => $paramValue) {
                        ?>
                        <tr>
                            <td style="border: 1px solid"><label><?php echo $paramName ?></label></td>
                            <td style="border: 1px solid"><?php echo $paramValue ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    initDataTable(['#pending-payout', '#completed-payout', '#subs-payout']);
});

function update_date_range() {
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>