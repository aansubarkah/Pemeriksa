<?php
/**
 * @var View $this
 */
echo $this->Form->create('RolesUser', array(
    "role" => "form",
    'id' => 'editUser'
));

echo $this->Form->input('id', array(
    'type' => 'hidden',
    'value' => $user['RolesUser']['id']
));

echo '<div class="form-group col-sm-9">';
echo $this->Form->select('role_id', $role, array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'role_id',
    'value' => $user['RolesUser']['role_id']
));
echo '</div>';

echo $this->Form->input('start', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'start',
    'value' => $user['RolesUser']['start'],
    'placeholder' => 'Tanggal Mulai (Jika dikosongkan sistem akan menggunakan tanggal hari ini)'
));

echo $this->Form->input('end', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'end',
    'value' => $user['RolesUser']['end'],
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
echo $this->Html->script(array('bootstrap-datepicker','locales/bootstrap-datepicker.id', 'jquery.validate.min', 'jquery.validate.custom.messages'));

echo $this->fetch('script');
echo $this->fetch('css');
?>
<script type="text/javascript">
    $(function () {
        $('#start').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            language: 'id',
            weekStart: 1
        });
        $('#end').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            language: 'id',
            weekStart: 1
        });

        $('#editUser').validate({
            rules: {
                'data[LevelsUser][level_id]': {
                    required: true
                }
            }
        });
    });
</script>