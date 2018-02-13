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
                ['action' => 'delete', $operationEtapeTach->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operationEtapeTach->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Operation Etape Taches'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Etapes'), ['controller' => 'Etapes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Etape'), ['controller' => 'Etapes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Taches'), ['controller' => 'Taches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tach'), ['controller' => 'Taches', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="operationEtapeTaches form large-12 medium-8 columns content act">
    <?= $this->Form->create($operationEtapeTach) ?>
    <fieldset>
        <legend><?= __('Edit Operation Etape Tach') ?></legend>
        <?php
            echo $this->Form->control('date_relance', ['empty' => true]);
            echo $this->Form->control('date_fin', ['empty' => true]);
            echo $this->Form->control('utilisateur_id', ['options' => $utilisateurs]); 
            echo $this->Form->control('operation_id', ['options' => $operations]);
            echo $this->Form->control('etape_id', ['options' => $etapes, 'disabled' => 'disabled']);
            echo $this->Form->control('tache_id', ['options' => $taches, 'disabled' => 'disabled']); 
            echo $this->Form->control('remarque'); 
        ?>
    </fieldset>
    <span class="boutton"><?= $this->Html->link(__('Etapes suivante'), ['controller' => 'operationEtapeTaches', 'action' => 'add', $operationEtapeTach->operation_id, $operationEtapeTach->id]) ?></span>
    <?= $this->Form->button(__('Mise à jour')) ?>
    <?= $this->Form->end() ?>
</div>
