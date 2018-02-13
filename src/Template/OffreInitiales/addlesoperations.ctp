<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Offre Initiale Operations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="offreInitialeOperations form large-12 medium-8 columns content">
    <fieldset>
    <legend><?= __('Liste Operations') ?></legend>

    <?= $this->Form->create($offreInitiale) ?>
        <?php
            //$this->Form->controle('id');
            $seloperation = array();
            foreach ($operations as $operation) {
                $seloperation[$operation->id] = 'id = '.$operation->id. ' - annonceur = '. $operation->annonceur. ' - type = ' .$operation->operation_type->designation;
            }
            echo $this->Form->select('Operation_id', $seloperation, ['multiple'=> 'checkbox']);
            echo $this->Form->hidden('demande_id',['value' => $demande_id]);
        ?>
    <?= $this->Form->button(__('Submit')) ?>

    <?= $this->Form->end() ?>
    </fieldset>
</div>
