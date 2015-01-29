<?php
/**
 * @var View $this
 */
echo $this->Html->css(array('fullcalendar.min'));
echo $this->Html->script(array('moment-with-locales.min', 'fullcalendar.min'));

echo $this->fetch('css');
echo $this->fetch('script');
?>
<div id="calendar"></div>
<div><br></div>
<style>
    .hover-end {
        padding: 0;
        margin: 0;
        font-size: 75%;
        text-align: center;
        position: absolute;
        bottom: 0;
        width: 100%;
        opacity: .8
    }
</style>
<script type="text/javascript">
    $(function () {
        $('.tooltipevent').hide();
        $('#calendar').fullCalendar({
            height: 450,
            lang: 'id',
            events: '<?php echo Router::url('/activitiesUsers/calendar.json', true); ?>',
            eventMouseover: function (calEvent, jsEvent) {
                var tooltip = '<div class="tooltipevent" style="width:200px;height:200px;position:absolute;z-index:10001;border-radius:0.5em;">' + calEvent.title + '</div>';
                $("body").append(tooltip);
                $(this).mouseover(function (e) {
                    $(this).css('z-index', 10000);
                    $('.tooltipevent').fadeIn('500');
                    $('.tooltipevent').fadeTo('10', 1.9);
                }).mousemove(function (e) {
                    $('.tooltipevent').css('top', e.pageY + 10);
                    $('.tooltipevent').css('left', e.pageX + 20);
                });
            },
            eventMouseout: function (calEvent, jsEvent) {
                $(this).css('z-index', 8);
                $('.tooltipevent').remove();
            }
        });
    });
</script>