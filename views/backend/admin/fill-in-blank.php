<?php
$sections = $this->crud_model->get_section('course', $param2)->result_array();
?>
<form action="<?php echo site_url('admin/fill_in_blank/' . $param2 . '/add'); ?>" method="post">
    <div class="form-group">
        <label for="title">Fill in the blank title</label>
        <input class="form-control" type="text" name="title" id="title" required>
    </div>
    <div class="form-group">
        <label for="section_id"><?php echo get_phrase('section'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="section_id" id="section_id" required>
            <?php foreach ($sections as $section) : ?>
            <option value="<?php echo $section['id']; ?>"><?php echo $section['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label><?php echo get_phrase('instruction'); ?></label>
        <textarea name="summary" class="form-control"></textarea>
    </div>
    <div class="text-center">
        <button class="btn btn-success" type="submit" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function() {
    initSelect2(['#section_id']);
});
</script>