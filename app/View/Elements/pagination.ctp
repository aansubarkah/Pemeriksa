<?php
/**
 * @var View $this
 *
 */
if (!isset($summary)) {
    $summary = 'before';
}
?>
<style>
    .pagination .current,
    .pagination .disabled {
        float: left;
        padding: 0 14px;

        color: #999;
        cursor: default;
        line-height: 32px;
        text-decoration: none;

        border: 1px solid #DDD;
        /*border-left-width: 0;*/
    }
</style>
<div class="pull-right <?php echo(!empty($class) ? $class : ''); ?>">
    <?php if ($summary == 'before') { ?>
        <div class="pagination-summary before" style="text-align:right">
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('<small>Halaman {:page} dari {:pages}</small>')
            ));
            ?>
        </div>
    <?php } ?>

    <ul class="pagination">
        <li><?php echo $this->Paginator->first('«', array('escape' => false), null, array('escape' => false, 'class' => 'prev disabled')); ?></li>
        <li><?php echo $this->Paginator->prev('‹', array('escape' => false), null, array('escape' => false, 'class' => 'prev disabled')); ?></li>
        <?php echo $this->Paginator->numbers(array('separator' => '</li><li>', 'before' => '<li>', 'after' => '</li>')); ?>
        <li><?php echo $this->Paginator->next('›', array('escape' => false), null, array('escape' => false, 'class' => 'next disabled')); ?></li>
        <li><?php echo $this->Paginator->last('»', array('escape' => false), null, array('escape' => false, 'class' => 'next disabled')); ?></li>
    </ul>
    <?php if ($summary == 'after') { ?>
        <div class="pagination-summary after" style="text-align:right">
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('<small>Halaman {:page} dari {:pages}</small>')
            ));
            ?>
        </div>
    <?php } ?>
</div><!-- /.pagination -->