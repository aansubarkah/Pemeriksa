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
    <small>No Karpeg</small>
    &nbsp;<?php
    if (empty($user['User']['cardnumber'])) {
        $spanDownload = ' <span class="glyphicon glyphicon-pencil"></span>';
    } else {
        $spanDownload = $user['User']['cardnumber'];
    }
    echo $this->Html->link($spanDownload,
        array(
            'controller' => 'users',
            'action' => 'edit',
            $user['User']['id']
        ),
        array('escape' => false));
    ?>
</h4>
<h4>
    <small>Tempat, Tanggal Lahir</small>
    &nbsp;<?php
    if (empty($user['User']['birthplace'])) {
        $spanDownload = ' <span class="glyphicon glyphicon-pencil"></span>';
    } else {
        $spanDownload = $user['User']['birthplace'] . ',&nbsp;' . '<span id="birthdate"></span>';
    }
    echo $this->Html->link($spanDownload,
        array(
            'controller' => 'users',
            'action' => 'edit',
            $user['User']['id']
        ),
        array('escape' => false));
    ?>
</h4>
<h4>
    <small>Pendidikan Terakhir</small>
    <?php
    if (count($education) > 0) {
        echo $education['Education']['description'];
    } else {
        $spanDownload = ' <span class="glyphicon glyphicon-pencil"></span>';
        echo $this->Html->link($spanDownload,
            array(
                'controller' => 'educations',
                'action' => 'indexUser'
            ),
            array('escape' => false));
    }
    ?>
</h4>
<h4>
    <small>Unit Kerja</small>
    &nbsp;<?php echo $departement['Departement']['description']; ?></h4>
<h4>
    <small>Pangkat/Gol</small>
    <?php if (count($level) > 0) echo $level['Userlevelview']['leveldescription'] . '&nbsp;(' . $level['Userlevelview']['levelname'] . ')'; ?>
</h4>
<h4>
    <small>Jenjang</small>
    <?php if (count($level) > 0) echo $level['Userlevelview']['positionlevelname']; ?>
</h4>
<h4>
    <small>Peran</small>
    <?php if (count($role) > 0) echo $role['Role']['description']; ?>
</h4>
<?php
//print_r($level);
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