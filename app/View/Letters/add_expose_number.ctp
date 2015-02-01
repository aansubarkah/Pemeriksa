<?php
/**
 * @var View $this
 */
?>
<div class="col-sm-9">
    <?php
    echo $letter['Letteruserview']['activitydescription'];
    echo '&nbsp;pada tanggal&nbsp;<strong>';
    echo $this->Time->format($letter['Letteruserview']['activitystart'], '%e %B %Y');
    if ($letter['Letteruserview']['activitystart'] != $letter['Letteruserview']['activityend']) {
        echo '&nbsp;s.d.&nbsp;';
        echo $this->Time->format($letter['Letteruserview']['activityend'], '%e %B %Y');
    }
    echo '</strong>';
    ?>
</div>
<?php
echo $this->Form->create('Letter', array(
    "role" => "form",
    'id' => 'addExposeNumber'
));

echo $this->Form->input('id', array(
    'type' => 'hidden',
    'value' => $letter['Letteruserview']['id']
));
echo $this->Form->input('name', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'name',
    'placeholder' => 'Nomor SP2',
    'value' => $letter['Letteruserview']['activityname']
));

echo $this->Form->input('date', array(
    'type' => 'text',
    'label' => false,
    'div' => 'form-group col-sm-9',
    'class' => 'form-control',
    'id' => 'date',
    'placeholder' => 'Tanggal SP2 (Jika dikosongkan sistem akan menggunakan Tanggal Mulai)',
    'value' => $letter['Letteruserview']['date']
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
        $('#date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('#addExposeNumber').validate({
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
                    remote: 'SP2 dengan nomor tersebuttersebut telah ada'
                }
            }
        });
    });
</script>