<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns demande-edit" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
       <!-- <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $operation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?></li>
       <!-- <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ext1kfacture Operations'), ['controller' => 'Ext1kfactureOperations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ext1kfacture Operation'), ['controller' => 'Ext1kfactureOperations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Etape Taches'), ['controller' => 'OperationEtapeTaches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Etape Tach'), ['controller' => 'OperationEtapeTaches', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="operations form large-12 medium-8 columns content act act2">
    <?= $this->Form->create($operation) ?>
    <fieldset>
        <legend><?= __('Edit Operation') ?></legend>
        <?php
            echo $this->Form->control('annonceur');
            echo $this->Form->control('priorite');
            echo $this->Form->control('volume_commande');
            echo $this->Form->control('volume_facture');
            echo $this->Form->control('routage');
            echo $this->Form->control('routeur_id', ['options' => $routeurs]);
            echo $this->Form->control('date_routage', ['empty' => true]);
            echo $this->Form->control('nb_thematique');
            echo $this->Form->control('date_oi_signe', ['empty' => true]);
            echo $this->Form->control('cpm');
            echo $this->Form->control('remise');
            echo $this->Form->control('ht');
            echo $this->Form->control('tva');
            echo $this->Form->control('ttc');
            echo $this->Form->control('demande_id', ['options' => $demandes]);
            echo $this->Form->control('operation_type_id');
            echo $this->Form->control('utilisateur_id', ['options' => $utilisateurs]);
            echo $this->Form->control('statut_id', ['options' => $statuts, 'disabled' => 'disabled']);
            echo $this->Form->control('full_potentiel', ['options' => ['Oui' => 'Oui','Non' => 'Non','Ne sait pas' => 'Ne sait pas', 'Fid' => 'Fid']]);
            echo $this->Form->control('ciblage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
