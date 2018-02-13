<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns demande-edit" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <!--<li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $demande->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $demande->id)]
            )
        ?></li>-->
        <li><?= $this->Html->link(__('List Demandes'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="demandes form large-12 medium-8 columns content act">
    <?= $this->Form->create($demande) ?>
    <fieldset>
        <legend><?= __('Edit Demande') ?></legend>
        <?php
            echo $this->Form->control('code_affaire', ['default' => 'DXXXX','disabled' => true]);
            echo $this->Form->control('ref_externe');
            echo $this->Form->control('partenaire_client_id', ['options' => $partenaireClients]);
            echo $this->Form->control('contact_client_id', ['options' => $contactClients]);
            echo $this->Form->control('partenaire_facture_id', ['options' => $partenaireFactures]);
            echo $this->Form->control('contact_facture_id', ['options' => $contactFactures]);
            echo $this->Form->control('utilisateur_id', ['options' => $utilisateurs]);
            echo $this->Form->control('statut_id', ['options' => $statuts, 'disabled' => 'disabled']);
            echo $this->Form->control('commentaire');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
