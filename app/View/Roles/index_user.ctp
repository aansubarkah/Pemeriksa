<?php
/**
 * @var View $this
 */
?>
<div class="row" style="padding-bottom: 20px;">
    <div class="container-fluid">
        <div class="col-md-5">
            <a href="<?php echo Router::url('/roles/addUser'); ?>" class="btn btn-default"
               role="button">Tambah</a>
        </div>
        <div class="col-md-7"></div>
    </div>
</div>
<div class="row">
    <div class="container-fluid">
        <?php
        if (count($roles) > 0) {
            ?>
            <table class="table table-striped">
                <?php
                $no = $this->Paginator->counter('{:start}');
                foreach ($roles as $role) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            $linkName = $role['Userroleview']['start'] . 's.d.' . $role['Userroleview']['end'];
                            $link = '/roles/editUser/' . $role['Userroleview']['id'] . '/' . $role['Userroleview']['roledescription'];
                            echo $no . '. ';
                            echo $this->Html->link($linkName, $link);
                            echo '&nbsp;';
                            echo $role['Userroleview']['roledescription'];
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