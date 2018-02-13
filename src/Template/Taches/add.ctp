<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Taches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Etapes'), ['controller' => 'Etapes', 'action' => 'index']) ?></li>
       <!--<li><?= $this->Html->link(__('New Etape'), ['controller' => 'Etapes', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="taches form large-12 medium-8 columns content act">
    <?= $this->Form->create($tach) ?>
    <fieldset>
        <legend><?= __('Add Tach') ?></legend>
        <?php
            echo $this->Form->control('designation');
            echo $this->Form->control('delai_jour', ['value' => '1']);
            echo $this->Form->control('delai_heure', ['value' => '1']);
            echo $this->Form->control('delai_minute', ['value' => '1']);
            echo $this->Form->control('fin_mois', ['value' => '1']);
            echo $this->Form->control('etape_id', ['options' => $etapes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
