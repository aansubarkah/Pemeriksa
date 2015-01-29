<?php
/**
 * @var View $this
 *
 */
?>
<div class="row">
    <ol class="breadcrumb">
        <?php
        if (isset($breadCrumb)) {
            $countBreadCrumb = count($breadCrumb);
            for ($i = 0; $i < $countBreadCrumb; $i++) {
                echo '<li';
                if ($i >= ($countBreadCrumb - 1)) {
                    echo ' class="active">';
                    echo $breadCrumb[$i]['title'];
                } else {
                    echo '>';
                    echo $this->Html->link($breadCrumb[$i]['title'], array(
                        'controller' => $breadCrumb[$i]['controller'],
                        'action' => $breadCrumb[$i]['action']
                    ));
                }

                echo '</li>';

            }
        } else {
            echo '<li class="active">SP2P</li>';
        }
        ?>
    </ol>
</div>