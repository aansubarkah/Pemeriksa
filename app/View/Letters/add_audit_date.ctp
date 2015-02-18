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
                    <td><?php echo $i; ?></td>
                    <td><?php echo $user['Letteruserview']['username']; ?></td>
                    <td><?php echo $user['Letteruserview']['dutyname']; ?></td>
                    <td class="day"><?php echo $days; ?></td>
                    <td><input type="text" class="dateStart"
                               value="<?php echo $user['Letteruserview']['userstart']; ?>"/></td>
                    <td><input type="text" class="dateEnd" value="<?php echo $user['Letteruserview']['userend']; ?>"/>
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
        $('.dateStart').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        $('.dateEnd').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        $('.dateStart').on('change', function () {
            var day = parseInt($(this).closest('tr').children('td.day').text());
            var startArr = $(this).val().split('-');
            var start = new Date(startArr[0], startArr[1]-1, startArr[2]);
            var end = new Date();
            end.setDate(start.getDate() + day - 1);
            console.log(end);
        });
        //@todo try to use momentjs to add end date
    });
</script>