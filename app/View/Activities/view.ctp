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
                    foreach ($files as $file) {
                        empty($file['Evidence']['name']) ? $fileName = $file['Type']['name'] : $fileName = $file['Evidence']['name'];
                        $fileLink = '/evidences/download/file/' . $file['Evidence']['id'] . '/' . $activity['Activity']['name'];
                        echo $this->Html->link($fileName, $fileLink);
                        echo '<br>';
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                if (count($users) > 0) {
                    foreach ($users as $user) {
                        echo $user;
                        echo '<br>';
                    }
                }
                ?>
            </td>
        </tr>
    </table>
</div>