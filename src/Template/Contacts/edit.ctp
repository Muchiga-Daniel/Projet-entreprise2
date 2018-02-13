<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
         <!--<li class="heading"><?= __('Actions') ?></li>-->
       <!--<li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contact->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Partenaires'), ['controller' => 'Partenaires', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partenaire'), ['controller' => 'Partenaires', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="contacts form large-12 medium-8 columns content act">
    <?= $this->Form->create($contact) ?>
    <fieldset>
        <legend><?= __('Edit Contact') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('email');
            echo $this->Form->control('mobile');
            echo $this->Form->control('fixe');
            echo $this->Form->control('commentaire');
            echo $this->Form->control('partenaire_id', ['options' => $partenaires]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
