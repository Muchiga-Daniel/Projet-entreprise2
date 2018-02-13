<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Etapes'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Operation Etape Taches'), ['controller' => 'OperationEtapeTaches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Etape Tach'), ['controller' => 'OperationEtapeTaches', 'action' => 'add']) ?></li>-->
        <li><?= $this->Html->link(__('List Taches'), ['controller' => 'Taches', 'action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('New Tach'), ['controller' => 'Taches', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="etapes form large-12 medium-8 columns content ">
    <?= $this->Form->create($etape) ?>
    <fieldset>
        <legend><?= __('Add Etape') ?></legend>
        <?php
            echo $this->Form->control('designation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
