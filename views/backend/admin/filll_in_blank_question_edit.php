<?php
//$param2 = question id and $param3 = quiz id
$question_details = $this->crud_model->get_fill_in_blank_question_by_id($param2)->row_array();
if ($question_details['answer'] != "" || $question_details['answer'] != null) {
    $options = json_decode($question_details['answer']);
} else {
    $options = array();
}
?>
<form action="<?php echo site_url('admin/fill_in_blank_action/' . $param3 . '/edit/' . $param2); ?>" method="post"
    id='mcq_form'>
    <input type="hidden" name="question_type" value="fill_in_blank">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('question_title'); ?></label>
        <input class="form-control" type="text" name="title" id="title"
            value="<?php echo $question_details['title']; ?>" required>
    </div>
    <div class="form-group" id='multiple_choice_question'>
        <label for="number_of_options"><?php echo get_phrase('number_of_blanks'); ?></label>
        <div class="input-group">
            <input type="number" class="form-control" name="number_of_options" id="number_of_options"
                data-validate="required" data-message-required="Value Required" min="0"
                value="<?php echo $question_details['number_of_blank']; ?>">
            <div class="input-group-append" style="padding: 0px"><button type="button"
                    class="btn btn-secondary btn-sm pull-right" name="button"
                    onclick="showOptions(jQuery('#number_of_options').val())" style="border-radius: 0px;"><i
                        class="fa fa-check"></i></button></div>
        </div>
    </div>
    <div class="form-group options">
        <label>Text</label>
        <div class="input-group">
            <textarea class="form-control" name="text_area" placeholder="Text"
                required><?= $question_details['text'] ?></textarea>
        </div>
    </div>
    <?php
    foreach ($options as $key => $value) : ?>
    <div class="form-group options">
        <label>Answer <?= $key + 1 ?></label>
        <div class="input-group">
            <input type="text" class="form-control" name="options[]" id="option_<?= $key + 1 ?>"
                placeholder="Answer <?= $key + 1 ?>" required value="<?= $value ?>">
        </div>
    </div>
    <?php endforeach;
    ?>
    <div class="text-center">
        <button class="btn btn-success" id="submitButton" type="button" name="button"
            data-dismiss="modal"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>
<script type="text/javascript">
function textarea(count) {
    let text = '';
    for (let index = 1; index <= count; index++) {
        text += `textarea __(${index})__ textarea `;
    }
    return `<div class="form-group options">
        <label>Text</label>
        <div class="input-group">
            <textarea class="form-control" name="text_area" placeholder="Text" required>${text}</textarea>
        </div>
    </div>`;
}

function html_option_form(count) {
    return `<div class="form-group options">
        <label>Answer ${count}</label>
        <div class="input-group">
            <input type="text" class="form-control" name="options[]" id="option_${count}" placeholder="Answer ${count}" required>
        </div>
    </div>`
}

function showOptions(number_of_options) {
    jQuery('.options').remove();
    let html = textarea(number_of_options);

    for (let index = 1; index <= number_of_options; index++) {
        html += html_option_form(index);
    }
    jQuery('#multiple_choice_question').after(html);

}

$('#submitButton').click(function(event) {
    $.ajax({
        url: '<?php echo site_url('admin/fill_in_blank_action/' . $param3 . '/edit/' . $param2); ?>',
        type: 'post',
        data: $('form#mcq_form').serialize(),
        success: function(response) {
            console.log(response);
            if (response == 1) {
                success_notify('<?php echo get_phrase('question_has_been_updated'); ?>');
            } else {
                error_notify(
                    '<?php echo get_phrase('no_options_can_be_blank_and_there_has_to_be_atleast_one_answer'); ?>'
                );
            }
        }
    });
    window.location.reload;
});
</script>