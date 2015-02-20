<?php
/**
 * @var View $this
 * @todo use momentjs to format birthdate
 */
?>
<h4><small>Nama</small>&nbsp;<?php echo $user['User']['name']; ?></h4>
<h4><small>NIP</small>&nbsp;<?php echo $user['User']['number']; ?></h4>
<h4><small>Tempat, Tanggal Lahir</small>&nbsp;<?php echo $user['User']['birthplace'] . ',&nbsp;' . $user['User']['birthdate']; ?></h4>