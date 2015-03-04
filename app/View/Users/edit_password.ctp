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
    'value' => AuthComponent::user('id')
));

echo $this->Form->input('oldPassword', array(
    'type' => 'password',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'oldPassword',
    'placeholder' => 'Password Lama'
));

echo $this->Form->input('password', array(
    'type' => 'password',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'password',
    'placeholder' => 'Password Baru'
));

$options = array(
    'label' => 'Simpan',
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'btnSave',
    'type' => 'submit'
);

echo $this->Form->end($options);

echo $this->Html->script(array('jquery.validate.min', 'jquery.validate.custom.messages'));

echo $this->fetch('script');
?>
<script type="text/javascript">
    $(function () {
        $.validator.addMethod('regex', function (value, element, regexpr) {
            return regexpr.test(value);
        }, 'Hanya huruf dan angka');

        $('#edit').validate({
            rules: {
                'data[User][password]': {
                    required: true,
                    minlength: 1,
                    regex: /^[0-9a-zA-Z]+$/
                },
                'data[User][oldPassword]': {
                    required: true,
                    minlength: 1,
                    remote: {
                        url: '<?php echo Router::url('/users/isPasswordCorrect.json', true); ?>',
                        type: 'post',
                        data: {//this variabel sent to server in format key: value
                            oldPassword: function () {
                                return $('#oldPassword').val();
                            }
                        }
                    }
                }
            },
            messages: {
                'data[User][oldPassword]': {
                    remote: 'Password tidak sesuai'
                }
            }
        });
    });
</script>