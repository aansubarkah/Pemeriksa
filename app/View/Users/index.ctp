<?php
/**
 * @var View $this
 * @todo create edit password and username, if username same with number column
 */
?>
<h4>
    <small>Nama</small>
    &nbsp;<?php echo $user['User']['fullname']; ?></h4>
<h4>
    <small>NIP</small>
    &nbsp;<?php echo $user['User']['number']; ?></h4>
<h4>
    <small>Tempat, Tanggal Lahir</small>
    &nbsp;<?php echo $user['User']['birthplace']; ?>,&nbsp;<span
        id="birthdate"></span></h4>
<h4>
    <small>Pendidikan Terakhir</small>
    <?php if (count($education) > 0) echo $education['Education']['description']; ?>
</h4>
<h4>
    <small>Unit Kerja</small>
    &nbsp;<?php echo $departement['Departement']['description']; ?></h4>
<h4>
    <small>Pangkat/Gol</small>
    <?php if (count($level) > 0) echo $level['Level']['description'] . '&nbsp;(' . $level['Level']['name'] . ')'; ?>
</h4>
<h4>
    <small>Jenjang</small>
    <?php if (count($positionlevel) > 0) echo $positionlevel['Positionlevel']['name']; ?>
</h4>
<h4>
    <small>Peran</small>
    <?php if (count($role) > 0) echo $role['Role']['description']; ?>
</h4>
<?php
//print_r($positionlevel);
echo $this->Html->script(array('moment-with-locales.min'));
echo $this->fetch('script');
?>
<script type="text/javascript">
    $(function () {
        moment.locale('id');
        var birthdate = moment("<?php echo $user['User']['birthdate'];?>",
            'YYYY-MM-DD'
        ).
            format('D MMMM YYYY');
        $('#birthdate').html(birthdate);
    });
</script>