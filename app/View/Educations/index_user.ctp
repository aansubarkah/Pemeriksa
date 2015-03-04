<?php
/**
 * @var View $this
 */
?>
<div class="row" style="padding-bottom: 20px;">
    <div class="container-fluid">
        <div class="col-md-5">
            <a href="<?php echo Router::url('/educations/addUser'); ?>" class="btn btn-default" role="button">Tambah</a>
        </div>
        <div class="col-md-7"></div>
    </div>
</div>
<div class="row">
    <div class="container-fluid">
        <?php
        if (count($educations) > 0) {
            ?>
            <table class="table table-striped">
                <?php
                $no = $this->Paginator->counter('{:start}');
                foreach ($educations as $education) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            $linkName = $education['Usereducationview']['date'];
                            $link = '/educations/editUser/' . $education['Usereducationview']['id'] . '/' . $education['Usereducationview']['educationdescription'];
                            echo $no . '. ';
                            echo $this->Html->link($linkName, $link);
                            echo '&nbsp;';
                            echo $education['Usereducationview']['educationdescription'];
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
            dateToConvert = moment(dateToConvert, 'YYYY-MM-DD').format('D MMMM YYYY');
            textDate$.text(dateToConvert);
        });
    });
</script>