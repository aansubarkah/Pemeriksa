<?php
/**
 * @var View $this
 */
?>
<div>
    <table class="table table-striped">
        <tr>
            <thead>
            <h3><?php echo $activity['Activity']['name']; ?></h3>
            </thead>
        </tr>
        <tr>
            <td>
                <?php echo $activity['Activity']['description']; ?>

            </td>
        </tr>
        <tr>
            <td>
                <strong><?php echo $this->Time->format($activity['Activity']['start'], '%e %B %Y'); ?></strong> sampai
                <strong><?php echo $this->Time->format($activity['Activity']['end'], '%e %B %Y'); ?></strong>
            </td>
        </tr>
        <tr>
            <td>
                <p>Dokumen:
                    <small><a href="<?php echo Router::url('/evidences/add/') . $activity['Activity']['id']; ?>"><span
                                class="glyphicon glyphicon-plus-sign"></span></a></small>
                </p>
                <?php
                if (count($files) > 0) {
                    $spanDownloadFileBefore = '<span class="glyphicon glyphicon-file">&nbsp;';
                    $spanDownloadFileAfter = '</span>';

                    foreach ($files as $file) {
                        $fileName = $spanDownloadFileBefore;
                        empty($file['Evidence']['name']) ? $fileName .= $file['Type']['name'] : $fileName .= $file['Evidence']['name'];
                        $fileName .= $spanDownloadFileAfter;

                        $fileLink = '/evidences/download/file/' . $file['Evidence']['id'] . '/' . $activity['Activity']['name'];
                        echo $this->Html->link($fileName, $fileLink, array('escape' => false));
                        echo '<br>';
                    }
                    $spanDownload = '<span class="glyphicon glyphicon-floppy-save">&nbsp;semua</span>';
                    echo $this->Html->link($spanDownload,
                        array(
                            'controller' => 'evidences',
                            'action' => 'download',
                            'zip',
                            $activity['Activity']['id']
                        ),
                        array('escape' => false));
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                if (count($users) > 0) {
                    ?>
                    <table id="employees" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $user) {
                            echo '<tr>';
                            echo '<td class="text-center">' . $no . '</td>';
                            echo '<td>' . $user . '</td>';
                            echo '</tr>';
                            $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                <?php
                }
                ?>

            </td>
        </tr>
    </table>
</div>
<?php
echo $this->Html->css(array('dataTables.bootstrap', 'tableCustom'));
echo $this->Html->script(array('jquery.dataTables.min', 'dataTables.bootstrap'));
echo $this->fetch('script');
echo $this->fetch('css');
?>
<script type="text/javascript">
    $(function () {
        $('#employees').dataTable({
            'lengthMenu': [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
            'language': {
                'url': '<?php echo Router::url('/files/dataTablesIndonesian.json', true); ?>'
            }
        });
    });
</script>