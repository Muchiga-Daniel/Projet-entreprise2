<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Ext1kfacture Operation'), ['action' => 'edit', $ext1kfactureOperation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ext1kfacture Operation'), ['action' => 'delete', $ext1kfactureOperation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ext1kfactureOperation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ext1kfacture Operations'), ['action' => 'index']) ?> </li>
        <!--<li><?= $this->Html->link(__('New Ext1kfacture Operation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>-->
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ext1kfactureOperations view large-12 medium-8 columns content act">
    <h3><?= h($ext1kfactureOperation->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Code Facture 1K') ?><br></div>
                <div class="ref"><?= h($ext1kfactureOperation->code_facture_1K) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Operation') ?><br></div>
                <div class="ref"><?= $ext1kfactureOperation->has('operation') ? $this->Html->link($ext1kfactureOperation->operation->id, ['controller' => 'Operations', 'action' => 'view', $ext1kfactureOperation->operation->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Statut') ?><br></div>
                <div class="ref"><?= $ext1kfactureOperation->has('statut') ? $this->Html->link($ext1kfactureOperation->statut->id, ['controller' => 'Statuts', 'action' => 'view', $ext1kfactureOperation->statut->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Id') ?><br></div>
                <div class="ref"><?= $this->Number->format($ext1kfactureOperation->id) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($ext1kfactureOperation->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($ext1kfactureOperation->modified) ?></div>
            </li>
        </ul>
    </div>
</div>
