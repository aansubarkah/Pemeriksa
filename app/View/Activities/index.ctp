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
                            $linkName = $letter['Letteruserview']['lettername'];
                            $link = '/activities/view/' . $letter['Letteruserview']['activity_id'] . '/' . $letter['Letteruserview']['activityname'];
                            echo $no . '. ';

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