<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                    <img src="https://main.solicitous.cloud/meded4/uploads/notification.png"
                        style="height: 44px; width: 44px;" alt="user-image">
                    <?php echo get_phrase('Notification'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('Notification'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/notification/save'); ?>"
                        method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Title<span class="required">*</span></label>
                            <input type="text" name="code" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Description<span class="required">*</span></label>
                            <input type="text" name="coupon_amount" class="form-control" required>
                        </div>
                        <!--  <div class="form-group">-->
                        <!--    <label>Description</label>-->
                        <!--    <input type="radio" name="" class="form-control" required>-->
                        <!--</div>-->


                        <div class="form-group">
                            <label>User Type<span class="required">*</span></label>
                            <select name="userstype" id="userstype" class="form-control" required>
                                <option value="1">Student</option>
                                <option value="2">Instructor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>All/Single<span class="required">*</span></label>
                            <select name="allsingle" id="allsingle" class="form-control" required>
                                <option value="1">All</option>
                                <option value="2">Single</option>
                            </select>
                        </div>

                        <?php



                        ?>
                        <div class="form-group" style="display: none;" id="allsingle2_div">
                            <label>Single<span class="required">*</span></label>
                            <select name="allsingle2" id="allsingle2" style="" class="form-control" required>

                            </select>
                        </div>

                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>








<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('Notification'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th><?php echo get_phrase('title'); ?> </th>
                                <th><?php echo get_phrase('description'); ?></th>
                                <th>Notification for</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($notifications_list as $key => $user) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>

                                <td><?php echo $user['title']; ?>

                                </td>
                                <td><?php echo $user['description']; ?></td>
                                <td><?php echo $user['notification_for']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>







<script>
$(document).ready(function() {
    $('select#userstype').change(function() {

        var selectdVal = $('select#userstype').val();
        //alert( selectdVal );



        $.ajax({
            type: 'POST',
            url: 'changestudentType',
            data: {},
            success: function(data) {

                $('#allsingle').show();

            },
        });
    });

    $('select#allsingle').change(function() {

        var selectdVal = $('select#allsingle').val();
        var userstype = $('select#userstype').val();



        //alert( selectdVal );  userstype
        $.ajax({
            type: 'POST',
            url: 'changestudentTypeUser',
            data: {
                data1: selectdVal,
                data2: userstype
            },
            success: function(data) {


                if (selectdVal == '1') {
                    $('#allsingle2,#allsingle2_div').hide();
                } else {


                    $('#allsingle').show();
                    $('#allsingle2').html(data);
                    $('#allsingle2,#allsingle2_div').show();
                }

                //allsingle2

            },
        });


    });
});
</script>

