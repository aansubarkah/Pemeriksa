<?php
/**
 * @var View $this
 */
?>
    <div class="page-header">
        <h1>Berikan Saran</h1>
    </div>
<?php
echo $this->Form->create('Comment', array(
    "role" => "form"
));

if (!AuthComponent::user('id')) {
    echo $this->Form->input('name', array(
        'type' => 'text',
        'label' => false,
        'div' => 'form-group col-sm-9',
        'class' => 'form-control',
        'id' => 'name',
        'placeholder' => 'Nama (boleh dikosongkan)'
    ));
}

echo $this->Form->input('content', array(
    'type' => 'textarea',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'content',
    'placeholder' => 'Komentar/Saran'
));

echo '<p class="center-submit">';
echo $this->Form->button('Reset', array(
    'type' => 'reset',
    'class' => 'btn btn-default'
));
echo ' ';

$options = array(
    'label' => 'Kirim',
    'div' => false,
    'class' => 'btn btn-primary'
);
echo $this->Form->end($options);
echo '</p>';
?>