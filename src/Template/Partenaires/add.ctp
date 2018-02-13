<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Partenaires'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="partenaires form large-12 medium-8 columns content act">
    <?= $this->Form->create($partenaire) ?>
    <fieldset>
        <legend><?= __('Add Partenaire') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('adresse');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
