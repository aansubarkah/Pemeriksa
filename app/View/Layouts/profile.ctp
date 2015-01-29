<?php
/**
 * @var View $this
 *
 */
echo $this->element('header');
?>
<div id="container">
    <?php echo $this->element('top_menu'); ?>
    <div id="content">
        <div class="row">
            <div class="container">
                <div class="row">
                    <!-- menu di sini -->
                    <?php echo $this->element('profile_menu'); ?>
                    <!-- isi di sini -->
                    <div class="col-md-8">
                        <?php echo $this->element('breadcrumb'); ?>
                        <div class="row">
                            <?php echo $this->Session->flash(); ?>
                        </div>
                        <div class="row">
                            <?php echo $this->fetch('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
    </div>
</div>
</body>
</html>
