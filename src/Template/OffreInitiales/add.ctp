<?php
/**
  * @var \App\View\AppView $this
  */
?>

<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Offre Initiales'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Partenaires'), ['controller' => 'Partenaires', 'action' => 'index']) ?></li>-->
        <li><?= $this->Html->link(__('New Partenaire'), ['controller' => 'Partenaires', 'action' => 'add']) ?></li>
        <!--<li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?></li>-->
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?></li>
       <!-- <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiale Operations'), ['controller' => 'OffreInitialeOperations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale Operation'), ['controller' => 'OffreInitialeOperations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="offreInitiales form large-12 medium-8 columns content act">
    <?= $this->Form->create($offreInitiale) ?>
    <fieldset>
        <legend><?= __('Add Offre Initiale') ?></legend>
        <?php
            echo $this->Form->control('volume_commande', ['value' => '0']);
            echo $this->Form->control('volume_facture', ['value' => '0']);
            echo $this->Form->control('nb_thematique', ['value' => '0']);
            echo $this->Form->control('cpm', ['value' => '0']);
            echo $this->Form->control('remise', ['value' => '0']);
            echo $this->Form->control('ht', ['value' => '0']);
            echo $this->Form->control('tva', ['value' => '0']);
            echo $this->Form->control('ttc', ['value' => '0']);
            echo $this->Form->control('partenaire_id', ['options' => $partenaires]);
            echo $this->Form->control('demande_id', ['options' => $demandes]);
            echo $this->Form->control('utilisateur_id', ['options' => $utilisateurs]);
            echo $this->Form->control('statut_id', ['options' => $statuts, 'disabled' => 'disabled']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
