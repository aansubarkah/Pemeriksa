<?php
/**
 * @var View $this
 */
?>
<div class="col-sm-9">
    <?php
    echo $letter[0]['Letteruserview']['activitydescription'];
    ?>
</div>
<div class="row">
    <div class="col-sm-9">
        <table class="table table-striped">
            <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Jumlah Hari</th>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach($letter as $user) {
                $start = strtotime($user['Letteruserview']['userstart']);
                $end = strtotime($user['Letteruserview']['userend']);
                $dateDiff = $end - $start;
                $days = floor($dateDiff/(60*60*24));
                ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $user['Letteruserview']['username']; ?></td>
                <td><?php echo $user['Letteruserview']['dutyname']; ?></td>
                <td><?php echo $days; ?></td>
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
//@todo add date input to each users