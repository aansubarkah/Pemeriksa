<?php
/**
 * @var View $this
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    if (isset($metaKeywords)) echo $this->Html->meta('keywords', $metaKeywords);
    if (isset($metaDescription)) echo $this->Html->meta('description', $metaDescription);

    echo $this->Html->meta('icon');

    echo $this->Html->css(array('bootstrap.min', 'bootstrap-theme.min'));
    echo $this->Html->script(array('jquery-2.1.3.min', 'bootstrap.min'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>

    <style>
        #other-menu a {
            color: #5E5E69
        }

        p.center-button {
            margin-left: auto;
            margin-right: auto;
            width: 30%;
        }

        p.center-submit {
            margin-left: auto;
            margin-right: auto;
            width: 30%;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <?php echo $this->Html->link('SP2P', '/', array('class' => 'navbar-brand')); ?>
                </div>
                <?php
                /*echo $this->Form->create('Search', array(
                    "role" => "search",
                    'class' => 'navbar-form navbar-right',
                    "url" => array("controller" => "searches", "action" => "index")
                ));*/
                ?>
                <!--<div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Penugasan" name="data[Search][name]"
                           autocomplete="off">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                </div>
                </form>-->
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="container">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <div class="row">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <?php
                if (AuthComponent::user('id')) {
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo AuthComponent::user('name'); ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <?php
                                    echo $this->Html->link('Profil', array(
                                        'controller' => 'users',
                                        'action' => 'index'
                                    ));
                                    ?>
                                </li>
                                <li>
                                    <?php
                                    echo $this->Html->link('Keluar', array(
                                        'controller' => 'users',
                                        'action' => 'logout'
                                    ));
                                    ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php
                } else {
                    echo $this->Form->create('User', array(
                        "class" => "navbar-form navbar-right form-inline",
                        "role" => "form",
                        "url" => array("controller" => "users", "action" => "login")
                    ));

                    echo $this->Form->input('username', array(
                        'type' => 'username',
                        'label' => false,
                        'div' => false,
                        'before' => '<div class="form-group">',
                        'class' => 'form-control',
                        'id' => 'username',
                        'placeholder' => 'Username'
                    ));

                    echo $this->Form->input('password', array(
                        'type' => 'password',
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control',
                        'id' => 'password',
                        'placeholder' => 'Password'
                    ));

                    $options = array(
                        'label' => 'Masuk',
                        'div' => false,
                        'after' => '</div>',
                        'class' => 'btn btn-default'
                    );
                    echo $this->Form->end($options);
                }
                ?>
            </div>
        </nav>
    </div>
    <div class="row" id="other-menu">
        <div>
            <?php
            echo '<p class="center-button">';
            echo '<small>';
            if (!AuthComponent::user('id')) {
                echo $this->Html->link('Daftar', '/register');
                echo ' ';
                echo '&sdot;';
                echo ' ';
            }
            echo $this->Html->link('Beri komentar/saran', '/comment');
            echo '</small>';
            echo '</p>';
            ?>
        </div>
    </div>
</div>
</body>
</html>