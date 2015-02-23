<?php
/**
 * @var View $this
 */
echo $this->Form->create('LevelsUser', array(
    "role" => "form",
    'id' => 'addUser'
));

echo '<div class="form-group col-sm-9">';
echo $this->Form->select('level_id', $level, array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'level_id'
));
echo '</div>';

echo $this->Form->input('start', array(
    'required' => false,
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'start',
    'placeholder' => 'Tanggal Mulai (Jika dikosongkan sistem akan menggunakan tanggal hari ini)'
));

echo $this->Form->input('end', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'end',
    'placeholder' => 'Tanggal Berakhir (Dapat dikosongkan)'
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
echo $this->Html->script(array('bootstrap-datepicker', 'jquery.validate.min', 'jquery.validate.custom.messages'));

echo $this->fetch('script');
echo $this->fetch('css');
?>
<script type="text/javascript">
    $(function () {
        $('#start').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        $('#end').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('#addUser').validate({
            rules: {
                'data[LevelsUser][level_id]': {
                    required: true
                }
            }
        });
    });
</script>