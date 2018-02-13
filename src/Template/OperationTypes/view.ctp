<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Operation Type'), ['action' => 'edit', $operationType->id]) ?> </li>
      <!--  <li><?= $this->Form->postLink(__('Delete Operation Type'), ['action' => 'delete', $operationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationType->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Operation Types'), ['action' => 'index']) ?> </li>
       <!-- <li><?= $this->Html->link(__('New Operation Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="operationTypes view large-12 medium-8 columns content act">
    <h3><?= h($operationType->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Designation') ?><br></div>
                <div class="ref"><?= h($operationType->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Id') ?><br></div>
                <div class="ref"><?= $this->Number->format($operationType->id) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($operationType->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($operationType->modified) ?></div>
            </li>
        </ul>
    </div>
    <!--
    <div class="related">
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($operationType->operations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>

                <th scope="col"><?= __('id') ?></th>
                <th scope="col"><?= __('Code_affaire') ?></th>
                <th scope="col"><?= __('Création') ?></th>
                <th scope="col"><?= __('Modification') ?></th>
                <th scope="col"><?= __('Partenaire Client') ?></th>
                <th scope="col"><?= __('annonceur') ?></th>
                <th scope="col"><?= __('Date de shoot') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Etape tâche') ?></th>
                <th scope="col"><?= __('Priorité') ?></th>
                <th scope="col"><?= __('Utilisateur') ?></th>
                <th scope="col"><?= __('Volume shooté') ?></th>
                <th scope="col"><?= __('Volume Facturé') ?></th>
                <th scope="col"><?= __('Nb de CI') ?></th>
                <th scope="col"><?= __('CPM') ?></th>
                <th scope="col"><?= __('Total HT') ?></th>
                <th scope="col"><?= __('tva') ?></th>
                <th scope="col"><?= __('Total TTC') ?></th>
                <th scope="col"><?= __('Routeur') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($operationType->operations as $operations): ?>
                
            <tr>

                <td><?= $this->Number->format($operation->id) ?></td>
                <td><?= h($operation->demande->code_affaire) ?></td>
                <td><?= h($operation->created) ?></td>
                <td><?= h($operation->modified) ?></td>
                <td><?= h($operation->demande->partenaire_client->nom) ?></td>
                <td><?= h($operation->annonceur) ?></td>
                <td><?= h($operation->date_routage) ?></td>
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
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Operations', 'action' => 'view', $operations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Operations', 'action' => 'edit', $operations->id]) ?>
                   <?= $this->Form->postLink(__('Delete'), ['controller' => 'Operations', 'action' => 'delete', $operations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
</div>
