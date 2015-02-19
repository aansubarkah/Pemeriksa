<?php
/**
 * @var View $this
 */
?>
<div class="col-sm-12">
    <?php
    echo $letter[0]['Letteruserview']['activitydescription'];
    ?>
</div>
<?php
echo $this->Form->create('Letter', array(
    "role" => "form",
    'id' => 'addExposeDate'
));
echo $this->Form->input('id', array(
    'type' => 'hidden',
    'value' => $letter[0]['Letteruserview']['activity_id']
));
?>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Jumlah Hari</th>
            <th>Mulai</th>
            <th>Selesai</th>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($letter as $user) {
                $start = strtotime($user['Letteruserview']['userstart']);
                $end = strtotime($user['Letteruserview']['userend']);
                $dateDiff = $end - $start;
                $days = floor($dateDiff / (60 * 60 * 24)) + 1;
                ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $user['Letteruserview']['username']; ?></td>
                    <td><?php echo $user['Letteruserview']['dutyname']; ?></td>
                    <td class="day text-center"><?php echo $days; ?></td>
                    <td>
                        <?php
                        echo $this->Form->input('start_' . $user['Letteruserview']['user_id'], array(
                            'type' => 'text',
                            'value' => $user['Letteruserview']['userstart'],
                            'label' => false,
                            'class' => 'dateStart'
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('end_' . $user['Letteruserview']['user_id'], array(
                            'type' => 'text',
                            'value' => $user['Letteruserview']['userend'],
                            'label' => false,
                            'class' => 'dateEnd'
                        ));
                        ?>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$options = array(
    'label' => 'Simpan',
    'div' => 'form-group col-sm-12',
    'class' => 'form-control',
    'id' => 'btnSave',
    'type' => 'submit'
);

echo $this->Form->end($options);

echo $this->Html->css(array('datepicker'));
echo $this->Html->script(array('bootstrap-datepicker', 'jquery.validate.min', 'jquery.validate.custom.messages', 'moment'));

echo $this->fetch('script');
echo $this->fetch('css');
?>
<style type="text/css">
    table thead th {
        text-align: center;
    }
    table tbody td .text-center {
        text-align: center;
    }
</style>
<script type="text/javascript">
    $(function () {
        $('.dateStart').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        $('.dateEnd').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        $('.dateStart').on('change', function () {
            var day = parseInt($(this).closest('tr').children('td.day').text()) - 1;
            var end = moment($(this).val()).add(day, 'd').format('YYYY-MM-DD');
            $(this).closest('tr').find('input[class="dateEnd"]').val(end);
        });
        $('.dateEnd').on('change', function () {
            var start = moment($(this).closest('tr').find('input[class="dateStart"]').val());
            //var start = moment($('.dateStart').val());
            var end = moment($(this).val());
            var day = end.diff(start, 'days') + 1;
            if(day < 1) day = 0;
            $(this).closest('tr').children('td.day').text(day);
        });
    });
</script>