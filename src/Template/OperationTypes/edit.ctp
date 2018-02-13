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
                ['action' => 'delete', $operationType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operationType->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Operation Types'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="operationTypes form large-12 medium-8 columns content ">
    <?= $this->Form->create($operationType) ?>
    <fieldset>
        <legend><?= __('Edit Operation Type') ?></legend>
        <?php
            echo $this->Form->control('designation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
