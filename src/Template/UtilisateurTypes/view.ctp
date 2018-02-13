<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Utilisateur Type'), ['action' => 'edit', $utilisateurType->id]) ?> </li>
        <!--<li><?= $this->Form->postLink(__('Delete Utilisateur Type'), ['action' => 'delete', $utilisateurType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilisateurType->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Utilisateur Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilisateur Type'), ['action' => 'add']) ?> </li>
       <!-- <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="utilisateurTypes view large-12 medium-8 columns content act">
    <h3><?= h($utilisateurType->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Designation') ?><br></div>
                <div class="ref"><?= h($utilisateurType->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Id') ?><br></div>
                <div class="ref"><?= $this->Number->format($utilisateurType->id) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($utilisateurType->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($utilisateurType->modified) ?></div>
            </li>
        </ul>
    </div>
    <div class="related">
        <h4><?= __('Related Utilisateurs') ?></h4>
        <?php if (!empty($utilisateurType->utilisateurs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Utilisateur Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($utilisateurType->utilisateurs as $utilisateurs): ?>
            <tr>
                <td><?= h($utilisateurs->id) ?></td>
                <td><?= h($utilisateurs->created) ?></td>
                <td><?= h($utilisateurs->modified) ?></td>
                <td><?= h($utilisateurs->nom) ?></td>
                <td><?= h($utilisateurs->email) ?></td>
                <td><?= h($utilisateurs->password) ?></td>
                <td><?= h($utilisateurs->mobile) ?></td>
                <td><?= h($utilisateurs->utilisateur_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Utilisateurs', 'action' => 'view', $utilisateurs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Utilisateurs', 'action' => 'edit', $utilisateurs->id]) ?>
                    <!--<?= $this->Form->postLink(__('Delete'), ['controller' => 'Utilisateurs', 'action' => 'delete', $utilisateurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilisateurs->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
