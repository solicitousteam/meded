<style>
    .footer-area{
            margin-top: 656px !important;
    }
</style>
<?php
$this->db->where('user_id', $this->session->userdata('user_id'));
$this->db->order_by('id', 'DESC');
$purchase_history = $this->db->get('subscription');
?>

<?php include "profile_menus.php"; ?>

<section class="purchase-history-list-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 style="font-weight: bolder;">Subscription History</h5>
                <?php
                if ($this->user_model->instructor_is_subscribe($this->session->userdata('user_id')) > 0) : ?>
                <a href="<?php echo site_url('user'); ?>" class="btn btn-outline-primary"
                    style="float: right;color:#fff;border-radius: 5px;">Move to
                    Dashboard</a>
                <?php endif; ?>
            </div>
            <div class="col-md-12 mt-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Subscription Status</th>
                            <th scope="col">Payment Date</th>
                            <th scope="col">Subscription Expire Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if ($purchase_history->num_rows() > 0) : ?>
                        <?php
                            foreach ($purchase_history->result_array() as $each_purchase) : ?>
                        <tr>
                            <td><?php echo $i;
                                        $i++; ?></td>
                            <td><?= $each_purchase['order_id'] ?></td>
                            <td><?= $each_purchase['subscription_amount'] ?></td>
                            <td><?= $each_purchase['subscription_payment_status'] ?></td>
                            <td><?= $each_purchase['subscription_status'] ?></td>
                            <td><?= date("Y-m-d", strtotime($each_purchase['subscription_entry_date'])) ?></td>
                            <td><?= $each_purchase['subscription_expire_date'] ?></td>
                        </tr>
                        <?php endforeach;
                        else : ?>
                        <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                        </tr>
                        <?php endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php
if (addon_status('offline_payment') == 1) :
    include "pending_purchase_course_history.php";
endif;
?>
<nav>
    <?php echo $this->pagination->create_links(); ?>
</nav>