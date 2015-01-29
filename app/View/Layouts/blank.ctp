<?php
/**
 * @var View $this
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min'));
    echo $this->Html->script(array('jquery-2.1.3.min', 'bootstrap.min'));
    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    ?>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
</div>
</body>
</html>