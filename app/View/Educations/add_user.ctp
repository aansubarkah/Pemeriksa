<?php
/**
 * @var View $this
 */
echo $this->Form->create('EducationsUser', array(
    "role" => "form",
    'id' => 'addUser'
));

echo '<div class="form-group col-sm-9">';
echo $this->Form->select('education_id', $education, array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'education_id'
));
echo '</div>';

echo $this->Form->input('date', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'date',
    'placeholder' => 'Tanggal (Jika dikosongkan sistem akan menggunakan tanggal hari ini)'
));

$options = array(
    'label' => 'Simpan',
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'btnSave',
    'type' => 'submit'
);

echo $this->Form->end($options);

echo $this->Html->css(array('datepicker'));
echo $this->Html->script(array('bootstrap-datepicker', 'locales/bootstrap-datepicker.id', 'jquery.validate.min', 'jquery.validate.custom.messages'));

echo $this->fetch('script');
echo $this->fetch('css');
?>
<script type="text/javascript">
    $(function () {
        $('#date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            language: 'id',
            weekStart: 1
        });

        $('#addUser').validate({
            rules: {
                'data[EducationsUser][education_id]': {
                    required: true
                }
            }
        });
    });
</script>