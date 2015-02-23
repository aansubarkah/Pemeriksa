<?php
/**
 * @var View $this
 */
?>
<div class="row" style="padding-bottom: 20px;">
    <div class="container-fluid">
        <div class="col-md-5">
            <a href="<?php echo Router::url('/levels/addUser'); ?>" class="btn btn-default"
               role="button">Tambah</a>
        </div>
        <div class="col-md-7"></div>
    </div>
</div>
<div class="row">
    <div class="container-fluid">
        <?php
        if (count($levels) > 0) {
            ?>
            <table class="table table-striped">
                <?php
                $no = $this->Paginator->counter('{:start}');
                foreach ($levels as $level) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            $linkName = $level['Userlevelview']['start'] . 's.d.' . $level['Userlevelview']['end'];
                            $link = '/levels/editUser/' . $level['Userlevelview']['id'] . '/' . $level['Userlevelview']['leveldescription'];
                            echo $no . '. ';
                            echo $this->Html->link($linkName, $link);
                            echo '&nbsp;';
                            echo $level['Userlevelview']['leveldescription'];
                            echo '&nbsp;(';
                            echo $level['Userlevelview']['levelname'];
                            echo ')';
                            ?>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </table>
            <?php
            echo $this->element('pagination');
        } else {
            echo 'Daftar kosong!';
        }
        ?>
    </div>
</div>
<?php
echo $this->Html->script(array('moment-with-locales.min'));
echo $this->fetch('script');
?>
<script type="text/javascript">
    $(function () {
        moment.locale('id');
        $('.table tr').each(function () {
            var textDate$ = $(this).find('a');
            var dateToConvert = textDate$.text();
            var arrDateToConvert = dateToConvert.split('s.d.');
            var startDate = moment(arrDateToConvert[0], 'YYYY-MM-DD').format('D MMMM YYYY');

            if (arrDateToConvert[1].length > 0) {
                var endDate = moment(arrDateToConvert[1], 'YYYY-MM-DD').format('D MMMM YYYY');
            } else {
                var endDate = 'Sekarang';
            }
            var combineDate = startDate + ' - ' + endDate;

            textDate$.text(combineDate);
        });
    });
</script>