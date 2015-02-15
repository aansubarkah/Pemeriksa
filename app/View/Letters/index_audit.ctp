<?php
/**
 * @var View $this
 */
?>
<div class="row" style="padding-bottom: 20px;">
    <div class="container-fluid">
        <div class="col-md-5">
            <a href="<?php echo Router::url('/letters/addAudit'); ?>" class="btn btn-default" role="button">Buat
                Draft</a>
        </div>
        <div class="col-md-7">
            <form class="pull-right">
                <select class="form-control" id="dataOption">
                    <option value="">Semua</option>
                    <option value="onlyDraft">Hanya Draft</option>
                    <option value="noDraft">Tanpa Draft</option>
                </select>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="container-fluid">
        <?php
        if (count($letters) > 0) {
            ?>
            <table class="table table-striped">
                <?php
                $no = $this->Paginator->counter('{:start}');
                foreach ($letters as $letter) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            $linkName = $letter['Letteruserview']['lettername'];
                            $link = '/activities/view/' . $letter['Letteruserview']['activity_id'] . '/' . $letter['Letteruserview']['activityname'];
                            echo $no . '. ';

                            if ($letter['Letteruserview']['activitydraft']) echo '[Draft]&nbsp;';

                            echo $this->Html->link($linkName, $link);
                            echo '&nbsp;Mengikuti Kegiatan&nbsp;';
                            echo $letter['Letteruserview']['activitydescription'];
                            echo '&nbsp;sebagai&nbsp;';
                            echo '<strong>' . $letter['Letteruserview']['dutyname'] . '</strong>';
                            echo '&nbsp;pada&nbsp;';
                            echo $this->Time->format($letter['Letteruserview']['activitystart'], '%e %B %Y');
                            if ($letter['Letteruserview']['activitystart'] != $letter['Letteruserview']['activityend']) {
                                echo '&nbsp;s.d.&nbsp;';
                                echo $this->Time->format($letter['Letteruserview']['activityend'], '%e %B %Y');
                            }
                            echo '.';

                            if ($letter['Letteruserview']['activitydraft']) {
                                echo '&nbsp;';
                                echo $this->Html->link('Beri Nomor pada Draft ini', array(
                                    'controller' => 'letters',
                                    'action' => 'addAuditNumber',
                                    $letter['Letteruserview']['id']
                                ));
                            }

                            if ($letter['Letteruserview']['evidenceid'] != null) {
                                $spanDownload = ' <span class="glyphicon glyphicon-download-alt"></span>';
                                echo $this->Html->link($spanDownload,
                                    array(
                                        'controller' => 'evidences',
                                        'action' => 'download',
                                        'zip',
                                        $letter['Letteruserview']['activity_id']
                                    ),
                                    array('escape' => false));
                            }
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
<script type="text/javascript">
    $(function () {
        if (window.location.href.indexOf('onlyDraft') > -1) {
            $('#dataOption').val('onlyDraft');
        } else if (window.location.href.indexOf('noDraft') > -1) {
            $('#dataOption').val('noDraft');
        } else {
            $('#dataOption').val('');
        }

        var url = '<?php echo Router::url('/letters/indexAudit/', true); ?>';
        $('#dataOption').on('change', function () {
            url += $(this).val();
            window.open(url, "_self");
        })
    });
</script>