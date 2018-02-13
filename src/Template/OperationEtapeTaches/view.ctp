<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading btn-li"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Operation Etape Tache'), ['action' => 'edit', $operationEtapeTach->id]) ?> </li>
        <!--<li><?= $this->Form->postLink(__('Delete Operation Etape Tach'), ['action' => 'delete', $operationEtapeTach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationEtapeTach->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Operation Etape Taches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Etape Tach'), ['action' => 'add']) ?> </li>
        <!--<li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Etapes'), ['controller' => 'Etapes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Etape'), ['controller' => 'Etapes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Taches'), ['controller' => 'Taches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tach'), ['controller' => 'Taches', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="operationEtapeTaches view large-12 medium-8 columns content act">
    <h3><?= h($operationEtapeTach->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Utilisateur') ?><br></div>
                <!--<div class="ref"><?= $operationEtapeTach->has('utilisateur') ? $this->Html->link($operationEtapeTach->utilisateur->id, ['controller' => 'Utilisateurs', 'action' => 'view', $operationEtapeTach->utilisateur->id]) : '' ?></div>-->
                <div class="ref"><?= h($operationEtapeTach->utilisateur->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Operation') ?><br></div>
                <div class="ref"><?= $operationEtapeTach->has('operation') ? $this->Html->link($operationEtapeTach->operation->id, ['controller' => 'Operations', 'action' => 'view', $operationEtapeTach->operation->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Etape') ?><br></div>
                <!--<div class="ref"><?= $operationEtapeTach->has('etape') ? $this->Html->link($operationEtapeTach->etape->id, ['controller' => 'Etapes', 'action' => 'view', $operationEtapeTach->etape->id]) : '' ?></div>-->
                <div class="ref"><?= h($operationEtapeTach->etape->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Tach') ?><br></div>
                <!--<div class="ref"><?= $operationEtapeTach->has('tach') ? $this->Html->link($operationEtapeTach->tach->id, ['controller' => 'Taches', 'action' => 'view', $operationEtapeTach->tach->id]) : '' ?></div>-->
                <div class="ref"><?= h($operationEtapeTach->tach->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($operationEtapeTach->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($operationEtapeTach->modified) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Date Relance') ?><br></div>
                <div class="ref"><?= h($operationEtapeTach->date_relance) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Date Fin') ?><br></div>
                <div class="ref"><?= h($operationEtapeTach->date_fin) ?></div>
            </li>
        </ul>
    </div>
    <div class="row cmt">
        <h4><?= __('Remarque') ?></h4>
        <?= $this->Text->autoParagraph(h($operationEtapeTach->remarque)); ?>
    </div>
</div>
