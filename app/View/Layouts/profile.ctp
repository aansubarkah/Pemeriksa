<?php
/**
 * @var View $this
 */
$currentController = $this->request->params['controller'];
$currentAction = $this->request->params['action'];
$arrMenu = array();//@todo edit this for proper menu list
$arrMenu[0]['title'] = 'Ringkasan';
$arrMenu[0]['controller'] = 'users';
$arrMenu[0]['action'] = 'index';
$arrMenu[1]['title'] = 'Ganti Password';
$arrMenu[1]['controller'] = 'users';
$arrMenu[1]['action'] = 'editPassword';
$arrMenu[2]['title'] = 'Ganti Username';
$arrMenu[2]['controller'] = 'users';
$arrMenu[2]['action'] = 'editUsername';
$arrMenu[3]['title'] = 'Pendidikan';
$arrMenu[3]['controller'] = 'educations';
$arrMenu[3]['action'] = 'indexUser';
$arrMenu[4]['title'] = 'Unit Kerja';
$arrMenu[4]['controller'] = 'departements';
$arrMenu[4]['action'] = 'indexUser';
$arrMenu[5]['title'] = 'Pangkat/Gol';
$arrMenu[5]['controller'] = 'levels';
$arrMenu[5]['action'] = 'indexUser';
$arrMenu[6]['title'] = 'Peran';
$arrMenu[6]['controller'] = 'roles';
$arrMenu[6]['action'] = 'indexUser';
/*$arrMenu[1]['title'] = 'Informasi Dasar';
$arrMenu[1]['action'] = 'basicinfo';
$arrMenu[2]['title'] = 'Pangkat/Golongan';
$arrMenu[2]['action'] = 'level';
$arrMenu[3]['title'] = 'Jabatan';
$arrMenu[3]['action'] = 'positionlevel';
$arrMenu[4]['title'] = 'Unit Kerja';
$arrMenu[4]['action'] = 'departement';
$arrMenu[5]['title'] = 'Atasan';
$arrMenu[5]['action'] = 'chief';
$arrMenu[6]['title'] = 'Ubah Password';
$arrMenu[6]['action'] = 'password';*/

//$countArrMenu = count($arrMenu);
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
            <div class="row">
                <!-- menu di sini -->
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Profil</div>
                        <div class="list-group">
                            <?php
                            for ($i = 0; $i < 2; $i++) {
                                $menuClass = 'list-group-item';
                                if ($currentController == 'users' && $i == 0 && $currentAction == 'index') $menuClass .= ' disabled';
                                if ($currentController == 'users' && $i == 0 && $currentAction == 'edit') $menuClass .= ' disabled';
                                if ($currentController == 'users' && $i == 1 && $currentAction == 'editPassword') $menuClass .= ' disabled';
                                echo $this->Html->link($arrMenu[$i]['title'],
                                    array(
                                        'controller' => $arrMenu[$i]['controller'],
                                        'action' => $arrMenu[$i]['action']
                                    ),
                                    array(
                                        'class' => $menuClass
                                    )
                                );
                            }
                            if(AuthComponent::user('username') !== AuthComponent::user('number')) {
                                $menuClass = 'list-group-item';
                                if ($currentController == 'users' && $i == 2 && $currentAction == 'editUsername') $menuClass .= ' disabled';
                                echo $this->Html->link($arrMenu[2]['title'],
                                    array(
                                        'controller' => $arrMenu[2]['controller'],
                                        'action' => $arrMenu[2]['action']
                                    ),
                                    array(
                                        'class' => $menuClass
                                    )
                                );
                            }
                            ?>
                        </div>
                        <div class="panel-heading">Karir</div>
                        <div class="list-group">
                            <?php
                            //@todo user timeline
                            //https://github.com/juanbrujo/jQuery-Timelinr
                            //https://github.com/technotarek/timeliner
                            for ($i = 3; $i < 7; $i++) {
                                $menuClass = 'list-group-item';
                                if ($currentController == 'educations' && $i == 3) $menuClass .= ' disabled';
                                if ($currentController == 'departements' && $i == 4) $menuClass .= ' disabled';
                                if ($currentController == 'levels' && $i == 5) $menuClass .= ' disabled';
                                if ($currentController == 'roles' && $i == 6) $menuClass .= ' disabled';
                                echo $this->Html->link($arrMenu[$i]['title'],
                                    array(
                                        'controller' => $arrMenu[$i]['controller'],
                                        'action' => $arrMenu[$i]['action']
                                    ),
                                    array(
                                        'class' => $menuClass
                                    )
                                );
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- isi di sini -->
                <div class="col-md-9">
                    <?php echo $this->element('breadcrumb'); ?>
                    <div class="row">
                        <?php
                        if (!empty($this->Session->flash())) {
                            ?>
                            <div class="alert alert-warning alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Ups!</strong> <?php echo $this->Session->flash(); ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
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
                                    echo $this->Html->link('Kegiatan', array(
                                        'controller' => 'activities',
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