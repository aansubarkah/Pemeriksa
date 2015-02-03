<?php
/**
 * @var View $this
 *
 */
echo $this->element('date_conversion');
?>
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
                                        'zip',
                                        //$activity['Activity']['Evidence'][0]['id']
                                        $activity['Activity']['id']
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