<?php
/**
 * @var View $this
 */
echo $this->Form->create('User', array(
    "role" => "form",
    'id' => 'edit'
));

echo $this->Form->input('id', array(
    'type' => 'hidden',
    'value' => $user['User']['id']
));
echo $this->Form->input('fullname', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'fullname',
    'placeholder' => 'Nama Lengkap',
    'value' => $user['User']['fullname']
));

echo $this->Form->input('number', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'number',
    'placeholder' => 'NIP',
    'value' => $user['User']['number']
));

echo $this->Form->input('cardnumber', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'cardnumber',
    'placeholder' => 'No Karpeg',
    'value' => $user['User']['cardnumber']
));

echo $this->Form->input('birthplace', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'birthplace',
    'placeholder' => 'Tempat Lahir',
    'value' => $user['User']['birthplace']
));

echo $this->Form->input('birthdate', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'birthdate',
    'placeholder' => 'Tanggal Lahir',
    'value' => $user['User']['birthdate']
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
        $('#birthdate').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        /*$('#edit').validate({
            rules: {
                'data[Letter][date]': {
                    date: true
                },
                'data[Letter][name]': {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: '<?php echo Router::url('/letters/isLetterNotExists.json', true); ?>',
                        type: 'post',
                        data: {
                            start: function () {
                                var start = '<?php echo $letter['Letteruserview']['activitystart']; ?>';
                                return start;
                            },
                            name: function () {
                                return $('#name').val();
                            }
                        }
                    }
                }
            },
            messages: {
                'data[Letter][name]': {
                    remote: 'SP2 dengan nomor tersebut telah ada'
                }
            }
        });*/
    });
</script>