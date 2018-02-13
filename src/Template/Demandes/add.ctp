<?php
/**
  * @var \App\View\AppView $this
  */
?>


<nav class="large-12 medium-4 columns demande-frm" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <li><?= $this->Html->link(__('List Demandes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partenaire',true),["controller"=>"Partenaires", "action"=>"addpopup"],['class' => 'ajax', 'class' => 'opener']); ?></li>
        <li><?= $this->Html->link(__('New Contact',true),["controller"=>"Contacts", "action"=>"addpopup"],['class' => 'ajax', 'class' => 'opener']); ?></li>
    </ul>
</nav>

<div id="dialog"></div>

<div class="demandes form large-12 medium-8 columns content act"> 
    <?= $this->Form->create($demande, array('type' => 'POST')) ?>
    <fieldset>
        <legend><?= __('Add Demande') ?><?= $this->Html->link(__('New Partenaire'), ['controller' => 'Partenaires', 'action' => 'add']) ?></legend>
        
        <?php
            echo $this->Form->control('code_affaire', ['default' => 'DXXXX','disabled' => true]);
            echo $this->Form->control('ref_externe');
            echo $this->Form->control('partenaire_client_id', ['options' => $partenaireClients, 'onchange'=> 'Controle()']);
            echo $this->Form->control('utilisateur_id', ['options' => $utilisateurs, 'default' => $demande->utilisateurs_id]);
            echo $this->Form->control('partenaire_facture_id', ['options' => $partenaireFactures]);
            echo $this->Form->control('statut_id', ['options' => $statuts, 'disabled' => 'disabled']);
            echo $this->Form->control('contact_client_id', ['options' => $contactClients, 'onchange'=> 'ControleContact()']);
            echo $this->Form->control('contact_facture_id', ['options' => $contactFactures]);
            echo $this->Form->control('commentaire');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
