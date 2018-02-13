<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('New Operation'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="operations index large-12 medium-8 columns content">
    <h3><?= __('Operations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Code_affaire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Création') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Partenaire Client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('annonceur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date de shoot') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date OI signé') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Etape tâche') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Priorité') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Utilisateur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Volume shooté') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Volume Facturé') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nb de CI') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CPM') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total HT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total TTC') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Routeur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Full potentiel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operations as $operation):?>
            <?php //debug($operation->operation_etape_taches); die();?>
            <tr>
                <td><?= $this->Number->format($operation->id) ?></td>
                <td><?= h($operation->demande->code_affaire) ?></td>
                <td><?= h($operation->created) ?></td>
                <td><?= h($operation->demande->partenaire_client->nom) ?></td>
                <td><?= h($operation->annonceur) ?></td>
                <td><?= h($operation->date_routage) ?></td>
                <td><?= h($operation->date_oi_signe) ?></td>
                <td><?= h($operation->operation_type->designation) ?></td>
                <td>    
                    <?php foreach ($operation->operation_etape_taches as $result): ?>
                        <?= h($result->tach->designation . ' - ' . $result->etape->designation) ?>
                        <?php break ?>
                    <?php endforeach; ?>
                </td>
                <td><?= $this->Number->format($operation->priorite) ?></td>
                <td><?= h($operation->utilisateur->nom) ?></td>
                <td><?= $this->Number->format($operation->volume_commande) ?></td>
                <td><?= $this->Number->format($operation->volume_factute) ?></td>
                <td><?= $this->Number->format($operation->nb_thematique) ?></td>
                <td><?= $this->Number->format($operation->cpm) ?></td>
                <td><?= $this->Number->format($operation->ht) ?></td>
                <td><?= $this->Number->format($operation->tva) ?></td>
                <td><?= $this->Number->format($operation->ttc) ?></td>
                <td><?= h($operation->routeur->designation) ?></td>
                <td><?= h($operation->full_potentiel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $operation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $operation->id]) ?>
                   <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?>-->
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
