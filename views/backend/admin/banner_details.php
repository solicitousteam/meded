<style>
    .table-bordered td,
    .table-bordered th {
        white-space: nowrap;
        padding: 5px 9px;
    }

    .banner-request img {
        width: 40px;
    }

    .banner-request .btn {
        border-radius: 30px;
        min-width: auto;
        padding: 5px 10px;
        line-height: 15px;
        height: auto;
        padding-bottom: 10px !important;
    }

    .banner-request .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #e3eaef;
        font-weight: bold !important;
        color: #FFF;
        background: #3d479a;
        padding: 11px 10px;
    }
</style>

<div class="row ">
    <div class="col-xl-12">

        <h4 class="page-title">
            <img src="https://ai24x7.com/uploads/checklist.png" style="height: 44px; width: 44px;" alt="user-image"> &nbsp; Banner Request
        </h4>
    </div> <!-- end card body-->

</div>
<div class="card mt-4">
    <div class="card-body banner-request row">
        <div class="col-md-6">
            <div class="table-responsive">
                <p><b>First Name : </b> <?php echo $banner_detail["first_name"] ?></p>
                <p><b>Last Name : </b> <?php echo $banner_detail["last_name"] ?></p>
                <p><b>Email : </b> <?php echo $banner_detail["email"] ?></p>
                <p><b>Phone : </b> <?php echo $banner_detail["phone"] ?></p>
                <p><b>Organisation : </b> <?php echo $banner_detail["organisation"] ?></p>
                <p><b>Duration : </b> <?php echo $banner_detail["duration"] ?></p>
                <p><b>Website : </b> <?php echo $banner_detail["website"] ?></p>
                <p><b>Concept : </b> <?php echo $banner_detail["concept"] ?></p>
                <p><b>From Date : </b> <?php echo date("d F, Y", strtotime($banner_detail["from_date"])) ?></p>
                <p><b>To Date : </b> <?php echo date("d F, Y", strtotime($banner_detail["to_date"])) ?></p>
    
                <img src="<?php echo $banner_detail["image"] ?>" style="width: 400px">
            </div>
        </div>
        <div class="col-md-6">
            <form class="required-form" action="<?= base_url('admin/updatebanner')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">From Date<span class="required">*</span></label>
                    <input type="date" class="form-control date_picker" name="from_date" required="" min="2022-05-13">
                </div>
                <div class="form-group">
                    <label for="name">To Date<span class="required">*</span></label>
                    <input type="date" class="form-control date_picker" name="to_date" required="" min="2022-05-13">
                </div>
                <input type="hidden" name="banner_id" value="<?= $banner_detail["id"]?>">
                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" style="padding: 10px 15px 0px 15px;line-height: 10px;">Submit</button>
            </form>
        </div>
    </div>
</div>
<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('.date_picker').attr('min', today);
</script>