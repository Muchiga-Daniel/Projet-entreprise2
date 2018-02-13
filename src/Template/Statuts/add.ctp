<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Statuts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?></li>
       <!-- <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ext1kfacture Operations'), ['controller' => 'Ext1kfactureOperations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ext1kfacture Operation'), ['controller' => 'Ext1kfactureOperations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>-->
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="statuts form large-12 medium-8 columns content ">
    <?= $this->Form->create($statut) ?>
    <fieldset>
        <legend><?= __('Add Statut') ?></legend>
        <?php
            echo $this->Form->control('designation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
