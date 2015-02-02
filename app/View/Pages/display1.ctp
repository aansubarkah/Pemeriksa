<?php
/**
 * @var View $this
 *
 */
echo $this->element('date_conversion');
?>
<div class="page-header">
    <h3>Penugasan
        <small><a href="<?php echo Router::url('/activities/add'); ?>"><span
                    class="glyphicon glyphicon-plus-sign"></span></a></small>
    </h3>
</div>
<div>
    <?php
    if (count($activities) > 0) {
        ?>
        <table class="table table-striped">
            <?php
            $no = $this->Paginator->counter('{:start}');
            foreach ($activities as $activity) {
                ?>
                <tr>
                    <td>
                        <?php
                        $linkName = $activity['Activity']['name'];
                        $link = '/activities/view/' . $activity['Activity']['id'] . '/' . $activity['Activity']['name'];
                        echo $no . '. ';

                        if (AuthComponent::user('id')) {
                            echo '<strong>';
                            echo $this->Time->format($activity['Activity']['start'], '%e %B %Y');
                            echo '</strong>';
                            echo ' ';
                        }

                        echo $this->Html->link($linkName, $link);
                        echo ' Kegiatan ';
                        echo $activity['Activity']['description'];

                        if (!AuthComponent::user('id')) {
                            echo ' pada Tanggal ';
                            echo '<strong>';
                            echo $this->Time->format($activity['Activity']['start'], '%e %B %Y');
                            echo '</strong>';
                            if (isset($activity['Evidence'][0]['id'])) {
                                $spanDownload = ' <span class="glyphicon glyphicon-download-alt"></span>';
                                echo $this->Html->link($spanDownload,
                                    array(
                                        'controller' => 'evidences',
                                        'action' => 'download',
                                        $activity['Evidence'][0]['id']
                                    ),
                                    array('escape' => false));
                            }
                        } else {
                            if (isset($activity['Activity']['Evidence'][0]['id'])) {
                                $spanDownload = ' <span class="glyphicon glyphicon-download-alt"></span>';
                                echo $this->Html->link($spanDownload,
                                    array(
                                        'controller' => 'evidences',
                                        'action' => 'download',
                                        $activity['Activity']['Evidence'][0]['id']
                                    ),
                                    array('escape' => false));
                            }
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