<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $routeur->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $routeur->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Routeurs'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="routeurs form large-12 medium-8 columns content">
    <?= $this->Form->create($routeur) ?>
    <fieldset>
        <legend><?= __('Edit Routeur') ?></legend>
        <?php
            echo $this->Form->control('designation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
