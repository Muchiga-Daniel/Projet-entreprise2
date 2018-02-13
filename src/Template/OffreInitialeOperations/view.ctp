<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Offre Initiale Operation'), ['action' => 'edit', $offreInitialeOperation->id]) ?> </li>
       <!-- <li><?= $this->Form->postLink(__('Delete Offre Initiale Operation'), ['action' => 'delete', $offreInitialeOperation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offreInitialeOperation->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Offre Initiale Operations'), ['action' => 'index']) ?> </li>
        <!--<li><?= $this->Html->link(__('New Offre Initiale Operation'), ['action' => 'add']) ?> </li>-->
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?> </li>
        <!--<li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="offreInitialeOperations view large-12 medium-8 columns content act">
    <h3><?= h($offreInitialeOperation->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Offre Initiale') ?><br></div>
                <div class="ref"><?= $offreInitialeOperation->has('offre_initiale') ? $this->Html->link($offreInitialeOperation->offre_initiale->id, ['controller' => 'OffreInitiales', 'action' => 'view', $offreInitialeOperation->offre_initiale->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Operation') ?><br></div>
                <div class="ref"><?= h($offreInitialeOperation->operation_id) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Id') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitialeOperation->id) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($offreInitialeOperation->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($offreInitialeOperation->modified) ?></div>
            </li>
        </ul>
    </div>
</div>
