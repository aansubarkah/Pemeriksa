<?php
/**
 * @var View $this
 *
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
if (isset($metaKeywords)) echo $this->Html->meta('keywords', $metaKeywords);
if (isset($metaDescription)) echo $this->Html->meta('description', $metaDescription);

echo $this->Html->meta('icon');

echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min'));
echo $this->Html->script(array('jquery-2.1.3.min', 'bootstrap.min'));

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>