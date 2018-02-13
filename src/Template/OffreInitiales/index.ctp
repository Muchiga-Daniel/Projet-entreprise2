<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('New Offre Initiale'), ['action' => 'add']) ?></li>
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
<div class="offreInitiales index large-12 medium-8 columns content act">
    <h3><?= __('Offre Initiales') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('volume_commande') ?></th>
                <th scope="col"><?= $this->Paginator->sort('volume_facture') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nb_thematique') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remise') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ht') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ttc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('partenaire_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('demande_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utilisateur_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statut_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offreInitiales as $offreInitiale): ?>
            <tr>
                <td><?= $this->Number->format($offreInitiale->id) ?></td> 
                <td><?= h($offreInitiale->created) ?></td>
                <td><?= h($offreInitiale->modified) ?></td>
                <td><?= $this->Number->format($offreInitiale->volume_commande) ?></td>
                <td><?= $this->Number->format($offreInitiale->volume_facture) ?></td>
                <td><?= $this->Number->format($offreInitiale->nb_thematique) ?></td>
                <td><?= $this->Number->format($offreInitiale->cpm) ?></td>
                <td><?= $this->Number->format($offreInitiale->remise) ?></td>
                <td><?= $this->Number->format($offreInitiale->ht) ?></td>
                <td><?= $this->Number->format($offreInitiale->tva) ?></td>
                <td><?= $this->Number->format($offreInitiale->ttc) ?></td>
                <td><?= h($offreInitiale->partenaire->nom) ?></td>
                <td><?= $offreInitiale->has('demande') ? $this->Html->link($offreInitiale->demande->id, ['controller' => 'Demandes', 'action' => 'view', $offreInitiale->demande->id]) : '' ?></td>
                <td><?= h($offreInitiale->utilisateur->nom) ?></td>
                <td><?= h($offreInitiale->statut->designation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $offreInitiale->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offreInitiale->id]) ?>
                  <!--  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offreInitiale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offreInitiale->id)]) ?>-->
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
