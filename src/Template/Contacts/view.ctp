<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
        <!--<li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?>
       <!-- <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partenaires'), ['controller' => 'Partenaires', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partenaire'), ['controller' => 'Partenaires', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="contacts view large-12 medium-8 columns content act">
    <h3><?= h($contact->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Nom') ?><br></div>
                <div class="ref"><?= h($contact->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Email') ?><br></div>
                <div class="ref"><?= h($contact->email) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Mobile') ?><br></div>
                <div class="ref"><?= h($contact->mobile) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Fixe') ?><br></div>
                <div class="ref"><?= h($contact->fixe) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Partenaire') ?><br></div>
                <div class="ref"><?= $contact->has('partenaire') ? $this->Html->link($contact->partenaire->nom, ['controller' => 'Partenaires', 'action' => 'view', $contact->partenaire->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($contact->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($contact->modified) ?></div>
            </li>
        </ul>
    </div>
    <div class="row cmt">
        <h4><?= __('Commentaire') ?></h4>
        <?= $this->Text->autoParagraph(h($contact->commentaire)); ?>
    </div>
</div>
