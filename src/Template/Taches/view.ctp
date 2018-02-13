<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Tach'), ['action' => 'edit', $tach->id]) ?> </li>
       <!-- <li><?= $this->Form->postLink(__('Delete Tach'), ['action' => 'delete', $tach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tach->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Taches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tach'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Etapes'), ['controller' => 'Etapes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Etape'), ['controller' => 'Etapes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="taches view large-12 medium-8 columns content act">
    <h3><?= h($tach->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Designation') ?><br></div>
                <div class="ref"><?= h($tach->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Etape') ?><br></div>
               <!-- <div class="ref"><?= $tach->has('etape') ? $this->Html->link($tach->etape->id, ['conlioller' => 'Etapes', 'action' => 'view', $tach->etape->id]) : '' ?></div>-->
                <div class="ref"><?= h($tach->etape->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Delai Jour') ?><br></div>
                <div class="ref"><?= $this->Number->format($tach->delai_jour) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Delai Heure') ?><br></div>
                <div class="ref"><?= $this->Number->format($tach->delai_heure) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Delai Minute') ?><br></div>
                <div class="ref"><?= $this->Number->format($tach->delai_minute) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Fin Mois') ?><br></div>
                <div class="ref"><?= h($tach->fin_mois) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($tach->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($tach->modified) ?></div>
            </li>
        </ul>
    <div>
</div>
