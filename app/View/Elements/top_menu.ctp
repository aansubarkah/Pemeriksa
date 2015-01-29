<?php
/**
 * @var View $this
 *
 */
?>
<div id="header" class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <?php echo $this->Html->link('SP2P', '/', array('class' => 'navbar-brand')); ?>
                </div>
                <?php
                echo $this->Form->create('Search', array(
                    "role" => "search",
                    'class' => 'navbar-form navbar-right',
                    "url" => array("controller" => "searches", "action" => "index")
                ));
                ?>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Penugasan" name="data[Search][name]"
                           autocomplete="off">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                </div>
                </form>
            </div>
        </nav>
    </div>
</div>