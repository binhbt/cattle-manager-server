<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
                <?php echo $this->Html->script('http://loudev.com/js/jquery.js'); ?>
                <?php echo $this->Html->script('/lou-multi-select/js/jquery.multi-select.js'); ?>
            <link rel="stylesheet" type="text/css" href="/cattle_manager/lou-multi-select/css/multi-select.css" />
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left">
                <li><?= $this->Html->link(__('Cattles'), ['controller' => 'Cattles', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Weights'), ['controller' => 'Weights', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Costs'), ['controller' => 'Costs', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Graph'), ['controller' => 'Cattles', 'action' => 'graph']) ?></li>
            </ul>
            <ul class="right">
                <?php if (!is_null($this->request->session()->read('Auth.User.email'))){ ?>
                                <li><a target="_blank" href="users/logout">Logout</a></li>
				<?php } else { ?>
								<li><a target="_blank" href="users/login">Login</a></li>
				<?php } ?>

            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
