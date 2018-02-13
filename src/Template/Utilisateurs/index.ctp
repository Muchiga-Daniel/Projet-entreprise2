<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('New Utilisateur'), ['action' => 'add']) ?></li>
        <!--<li><?= $this->Html->link(__('List Utilisateur Types'), ['controller' => 'UtilisateurTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilisateur Type'), ['controller' => 'UtilisateurTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operation Etape Taches'), ['controller' => 'OperationEtapeTaches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Etape Tach'), ['controller' => 'OperationEtapeTaches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="utilisateurs index large-12 medium-8 columns content act">
    <h3><?= __('Utilisateurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utilisateur_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $utilisateur): ?>
            <tr>
                <td><?= $this->Number->format($utilisateur->id) ?></td>
                <td><?= h($utilisateur->created) ?></td>
                <td><?= h($utilisateur->modified) ?></td>
                <td><?= h($utilisateur->nom) ?></td>
                <td><?= h($utilisateur->email) ?></td>
                <td><?= h($utilisateur->password) ?></td>
                <td><?= h($utilisateur->mobile) ?></td>
                <td><?= $utilisateur->has('utilisateur_type') ? $this->Html->link($utilisateur->utilisateur_type->designation, ['controller' => 'UtilisateurTypes', 'action' => 'view', $utilisateur->utilisateur_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $utilisateur->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $utilisateur->id]) ?>
                  <!--  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $utilisateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilisateur->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
