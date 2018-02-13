<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
       <!-- <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $offreInitiale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $offreInitiale->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Offre Initiales'), ['action' => 'index']) ?></li>
       <!-- <li><?= $this->Html->link(__('List Partenaires'), ['controller' => 'Partenaires', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partenaire'), ['controller' => 'Partenaires', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiale Operations'), ['controller' => 'OffreInitialeOperations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale Operation'), ['controller' => 'OffreInitialeOperations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="offreInitiales form large-12 medium-8 columns content act">
    <?= $this->Form->create($offreInitiale) ?>
    <fieldset>
        <legend><?= __('Edit Offre Initiale') ?></legend>
        <?php
            echo $this->Form->control('volume_commande');
            echo $this->Form->control('volume_facture');
            echo $this->Form->control('nb_thematique');
            echo $this->Form->control('cpm');
            echo $this->Form->control('ht');
            echo $this->Form->control('remise');
            echo $this->Form->control('tva');
            echo $this->Form->control('ttc');
            echo $this->Form->control('partenaire_id', ['options' => $partenaires]);
            echo $this->Form->control('demande_id', ['options' => $demandes]);
            echo $this->Form->control('utilisateur_id', ['options' => $utilisateurs]);
            echo $this->Form->control('statut_id', ['options' => $statuts, 'disabled' => 'disabled']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
