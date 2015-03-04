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

echo $this->Form->input('oldUsername', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'oldUsername',
    'placeholder' => 'Username Lama',
    'disabled' => true,
    'value' => $user['User']['username']
));

echo $this->Form->input('username', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'username',
    'placeholder' => 'Username Baru'
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
                'data[User][username]': {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: '<?php echo Router::url('/users/isUsernameBelongsToUser.json', true); ?>',
                        type: 'post',
                        data: {//this variabel sent to server in format key: value
                            username: function () {
                                return $('#username').val();
                            }
                        }
                    }
                }
            },
            messages: {
                'data[User][username]': {
                    remote: 'Username tersebut telah ada'
                }
            }
        });
    });
</script>