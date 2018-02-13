<?php

    $cakeDescription = 'Gestion Commerciale Wedata';
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
    <?= $this->Html->css('stylesCell.css') ?>
    <?= $this->Html->css('popups.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
     <script type="text/javascript">
    <!--
    function open_infos()
    {
        window.open('<?= $this->Url->build(['controller' => 'Contacts','action' => 'add']); ?>','nom_de_ma_popup','menubar=no, scrollbars=no, top=100, left=100, width=1600, height=800');
    }
--></script>

</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php if($IsAuthorized !== null): ?>
                <li><?= $this->Html->link(__('Home'), ['controller' => 'Demandes','action' => 'index']) ?> </li>
                <?php endif; ?>
                <li><?= $this->Html->link(__('Logout'), ['controller' => 'utilisateurs','action' => 'logout']) ?> </li>
                <!--<li><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></li>-->
            </ul>
        </div>
    </nav>
    <div class="menunav">
        <?php if($IsAuthorized !== null): ?>
        <?= $this->cell('Menus'); ?>
        <?php endif; ?>
    </div>
    <div id="popupmessage"></div>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->Html->css('http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css'); ?>
    <?= $this->Html->script('http://code.jquery.com/jquery-3.2.1.min.js'); ?>
    <?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js'); ?>
    <?= $this->Html->script('scriptCell'); ?>
    <?= $this->Html->script('popups'); ?>
    <?= $this->Html->script('addpopup'); ?>
    <?= $this->Html->script('mathematique'); ?>
    <?= $this->Html->script('submit'); ?>
</body>
</html>

