<?php
/**
 * @var View $this
 *
 */
?>
<div class="row">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-text">
                <?php echo $this->Html->link('Direktori', '/directory', array('class' => 'navbar-link')); ?>
            </div>
            <?php
            if (AuthComponent::user('id')) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?php
                                echo $this->Html->link('Profil', array(
                                    'controller' => 'users',
                                    'action' => 'profile'
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
                    "url" => array("controller" => "users", "action" => "entry")
                ));

                echo $this->Form->input('email', array(
                    'type' => 'email',
                    'label' => false,
                    'div' => false,
                    'before' => '<div class="form-group">',
                    'class' => 'form-control',
                    'id' => 'email',
                    'placeholder' => 'Email'
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
        echo $this->Html->link('Beri komentar/saran', '/comment');
        echo ' ';
        echo '&sdot;';
        echo ' ';
        echo $this->Html->link('Ketentuan', '/disclaimer');
        echo ' ';
        echo '&sdot;';
        echo ' ';
        echo $this->Html->link('Tentang kami', '/about');
        echo '</small>';
        echo '</p>';
        ?>
    </div>
</div>
</body>
</html>