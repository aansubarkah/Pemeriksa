<?php
/**
 * @var View $this
 */
echo $this->Form->create('DepartementsUser', array(
    "role" => "form",
    'id' => 'editUser'
));

echo $this->Form->input('id', array(
    'type' => 'hidden',
    'value' => $user['DepartementsUser']['id']
));

echo '<div class="form-group col-sm-9">';
echo $this->Form->select('departement_id', $departement, array(
    'label' => false,
    'class' => 'form-control',
    'id' => 'departement_id',
    'value' => $user['DepartementsUser']['departement_id']
));
echo '</div>';

echo $this->Form->input('start', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'start',
    'value' => $user['DepartementsUser']['start'],
    'placeholder' => 'Tanggal Mulai (Jika dikosongkan sistem akan menggunakan tanggal hari ini)'
));

echo $this->Form->input('end', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'end',
    'value' => $user['DepartementsUser']['end'],
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
                'data[DepartementsUser][departement_id]': {
                    required: true
                }
            }
        });
    });
</script>