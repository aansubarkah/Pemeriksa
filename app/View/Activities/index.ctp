<?php
/**
 * @var View $this
 */
?>
<div class="row" style="padding-bottom: 20px;">
    <div class="container-fluid">
        <div class="col-md-5">
            <a href="<?php echo Router::url('/activities/add'); ?>" class="btn btn-default" role="button">Tambah</a>
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
                            $linkName = $letter['Activityuserview']['activityname'];
                            $link = '/activities/view/' . $letter['Activityuserview']['activity_id'] . '/' . $letter['Activityuserview']['activityname'];
                            echo $no . '. ';

                            echo $this->Html->link($linkName, $link);
                            echo '&nbsp;Mengikuti Kegiatan&nbsp;';
                            echo $letter['Activityuserview']['activitydescription'];
                            echo '&nbsp;sebagai&nbsp;';
                            echo '<strong>' . $letter['Activityuserview']['dutyname'] . '</strong>';
                            echo '&nbsp;pada&nbsp;';
                            echo $this->Time->format($letter['Activityuserview']['activitystart'], '%e %B %Y');
                            if ($letter['Activityuserview']['activitystart'] != $letter['Activityuserview']['activityend']) {
                                echo '&nbsp;s.d.&nbsp;';
                                echo $this->Time->format($letter['Activityuserview']['activityend'], '%e %B %Y');
                            }
                            if ($letter['Activityuserview']['evidenceactive']) {
                                $spanDownload = ' <span class="glyphicon glyphicon-download-alt"></span>';
                                echo $this->Html->link($spanDownload,
                                    array(
                                        'controller' => 'evidences',
                                        'action' => 'download',
                                        'zip',
                                        //$activity['Activity']['Evidence'][0]['id']
                                        $letter['Activityuserview']['activity_id']
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