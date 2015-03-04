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

echo $this->Form->input('name', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'name',
    'placeholder' => 'Nama Tanpa Gelar',
    'value' => $user['User']['name']
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

        $('#edit').validate({
            rules: {
                'data[User][name]': {
                    required: true,
                    minlength: 2
                },
                'data[User][fullname]': {
                    required: true,
                    minlength: 2
                },
                'data[User][birthdate]': {
                    date: true
                },
                'data[User][cardnumber]': {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: '<?php echo Router::url('/users/isCardnumberBelongsToUser.json', true); ?>',
                        type: 'post',
                        data: {//this variabel sent to server in format key: value
                            cardnumber: function () {
                                return $('#cardnumber').val();
                            }
                        }
                    }
                },
                'data[User][number]': {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: '<?php echo Router::url('/users/isNumberBelongsToUser.json', true); ?>',
                        type: 'post',
                        data: {//this variabel sent to server in format key: value
                            number: function () {
                                return $('#number').val();
                            }
                        }
                    }
                }
            },
            messages: {
                'data[User][cardnumber]': {
                    remote: 'No Karpeg tersebut telah ada'
                },
                'data[User][number]': {
                    remote: 'NIP tersebut telah ada'
                }
            }
        });
    });
</script>