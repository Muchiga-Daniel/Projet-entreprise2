<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('List Etape Tache'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation Etape Tache'), ['action' => 'add']) ?></li>
       <!-- <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Etapes'), ['controller' => 'Etapes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Etape'), ['controller' => 'Etapes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Taches'), ['controller' => 'Taches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tach'), ['controller' => 'Taches', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="operationEtapeTaches index large-12 medium-8 columns content act">
    <h3><?= __('Operation Etape Taches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('Code Affaire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date création') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date modification') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_relance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_fin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Partenaire Client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Annonceur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('etape_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Priorité') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Utilisateur') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operationEtapeTaches as $operationEtapeTach): ?>
            <tr>
                <td><?= h($operationEtapeTach->operation->demande->code_affaire) ?></td>
                <td><?= h($operationEtapeTach->created) ?></td>
                <td><?= h($operationEtapeTach->modified) ?></td>
                <td><?= h($operationEtapeTach->date_relance) ?></td>
                <td><?= h($operationEtapeTach->date_fin) ?></td>
                <td><?= h($operationEtapeTach->operation->demande->partenaire_client->nom) ?></td>
                <td><?= h($operationEtapeTach->operation->annonceur) ?></td>
                <td><?= h($operationEtapeTach->operation->operation_type->designation) ?></td>
                <td><?= h($operationEtapeTach->etape->designation) ?></td>
                <td><?= h($operationEtapeTach->operation->priorite) ?></td>
                <td><?= h($operationEtapeTach->utilisateur->nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $operationEtapeTach->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operationEtapeTach->id]) ?>
                   <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operationEtapeTach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationEtapeTach->id)]) ?>-->
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
