<?php
/**
 * @var View $this
 */
if (count($data) > 0) {
    ?>
    <ul class="timeline">
        <?php
        $i = 0;
        for ($i = 0; $i < count($data); $i++) {
            ?>
            <li<?php if ($i % 2 == 0) echo ' class="timeline-inverted"'; ?>>
                <div class="timeline-badge"><i class="glyphicon glyphicon-<?php echo $data[$i]['icon']; ?>"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title"><?php echo $data[$i]['name']; ?></h4>

                        <p>
                            <small class="text-muted"><i
                                    class="glyphicon glyphicon-time"></i> <?php echo $data[$i]['date']; ?></small>
                        </p>
                    </div>
                    <div class="timeline-body">
                        <p><?php echo $data[$i]['description']; ?></p>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
<?php
}
echo $this->Html->script(array('moment-with-locales.min'));
echo $this->Html->css(array('bootstrap-timeline'));
echo $this->fetch('css');
echo $this->fetch('script');
?>
<script type="text/javascript">
    $(function () {
        moment.locale('id');
        $('.timeline li').each(function () {
            var textDate$ = $(this).find('.text-muted');
            var dateToConvert = textDate$.text();
            dateToConvert = moment(dateToConvert, 'YYYY-MM-DD').format('D MMMM YYYY');
            textDate$.text(dateToConvert);
        });
    });
</script>