<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('New Demande'), ['action' => 'add']) ?></li>
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
<div class="demandes index large-12 medium-8 columns content">
    <h3><?= __('Demandes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('code_affaire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date création') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date Modification') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Partenaire Client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Annonceur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date de shoot') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total HT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total TTC') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($demandes as $demande): ?>
                <?php ?>
            <tr>
                <td><?= h($demande->code_affaire) ?></td>
                <td><?= h($demande->created) ?></td>
                <td><?= h($demande->modified) ?></td>
                <td><?= h($demande->partenaire_client->nom) ?></td>

                <td>    
                    <?php foreach ($demande->operations as $result): ?>
                        <?= h($result->annonceur) ?>
                        <?php break ?>
                    <?php endforeach; ?>
                </td>
                <td>    
                    <?php foreach ($demande->operations as $result): ?>
                        <?= h($result->date_routage) ?>
                        <?php break ?>
                    <?php endforeach; ?>
                </td>
                <td>    
                    <?php foreach ($demande->operations as $result): ?>
                        <?= h($result->ht) ?>
                        <?php break ?>
                    <?php endforeach; ?>
                </td>
                <td>    
                    <?php foreach ($demande->operations as $result): ?>
                        <?= h($result->ttc) ?>
                        <?php break ?>
                    <?php endforeach; ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $demande->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $demande->id]) ?>
                    <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $demande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demande->id)]) ?>-->
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
