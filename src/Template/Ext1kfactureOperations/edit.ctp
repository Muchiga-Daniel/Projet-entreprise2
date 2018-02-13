<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
       <!-- <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ext1kfactureOperation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ext1kfactureOperation->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Ext1kfacture Operations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ext1kfactureOperations form large-12 medium-8 columns content act">
    <?= $this->Form->create($ext1kfactureOperation) ?>
    <fieldset>
        <legend><?= __('Edit Ext1kfacture Operation') ?></legend>
        <?php
            echo $this->Form->control('code_facture_1K');
            echo $this->Form->control('operation_id', ['options' => $operations]);
            echo $this->Form->control('statut_id', ['options' => $statuts, 'disabled' => 'disabled']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
