<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Utilisateurs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Utilisateur Types'), ['controller' => 'UtilisateurTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilisateur Type'), ['controller' => 'UtilisateurTypes', 'action' => 'add']) ?></li>
       <!-- <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Etape Taches'), ['controller' => 'OperationEtapeTaches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Etape Tach'), ['controller' => 'OperationEtapeTaches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="utilisateurs form large-12 medium-8 columns content act">
    <?= $this->Form->create($utilisateur) ?>
    <fieldset>
        <legend><?= __('Add Utilisateur') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('mobile');
            echo $this->Form->control('utilisateur_type_id', ['options' => $utilisateurTypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
