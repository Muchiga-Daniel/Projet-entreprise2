<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Offre Initiale Operations'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="offreInitialeOperations form large-12 medium-8 columns content act">
    <?= $this->Form->create($offreInitialeOperation) ?>
    <fieldset>
        <legend><?= __('Add Offre Initiale Operation') ?></legend>
        <?php
            echo $this->Form->control('offre_initiale_id', ['options' => $offreInitiales, 'value' => $offreInitiales]);
            echo $this->Form->control('operation_id',['options' => $operations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
