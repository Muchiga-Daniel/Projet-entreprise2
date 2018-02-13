<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Demande'), ['action' => 'edit', $demande->id]) ?> </li>
        <li><?= $this->Html->link(__('List Demande'), ['controller' => 'demandes', 'action' => 'index']) ?> </li>
       <!-- <li><?= $this->Form->postLink(__('Delete Demande'), ['action' => 'delete', $demande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $demande->id)]) ?> </li>-->
       <!-- <li><?= $this->Html->link(__('New Demande'), ['action' => 'add']) ?> </li>-->
        <li><?= $this->Html->link(__('List Operation'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add', $demande->id]) ?></li>
        <li><?= $this->Html->link(__('New offre initiale'), ['controller' => 'OffreInitiales', 'action' => 'addlesoperations', $demande->id, $demande->partenaire_facture_id ]) ?> </li>
        <!-- <li><?= $this->Html->link(__('New Demande'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="demandes view large-12 medium-8 columns content act">
    <h3><?= h($demande->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Code Affaire') ?><br></div>
                <div class="ref"><?= h($demande->code_affaire) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Ref Externe') ?><br></div>
                <div class="ref"><?= h($demande->ref_externe) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Utilisateur') ?><br></div>
                <div class="ref"><?= h($demande->utilisateur->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($demande->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($demande->modified) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Statut') ?><br></div>
                <div class="ref"><?= h($demande->statut->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Partenaire Client Id') ?><br></div>
                <div class="ref"><?= h($demande->partenaire_client->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Contact Client Id') ?><br></div>
                <div class="ref"><?= h($demande->contact_client->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Partenaire Facture Id') ?><br></div>
                <div class="ref"><?= h($demande->partenaire_facture->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Contact Facture Id') ?><br></div>
                <div class="ref"><?= h($demande->contact_facture->nom) ?></div>
            </li>

        </ul>
    </div>
    <div class="row cmt">
        <h4><?= __('Commentaire') ?></h4>
        <?= $this->Text->autoParagraph(h($demande->commentaire)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($operations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code affaire') ?></th>
                <th scope="col"><?= __('Création') ?></th>
                <th scope="col"><?= __('Partenaire Client') ?></th>
                <th scope="col"><?= __('annonceur') ?></th>
                <th scope="col"><?= __('Date de shoot') ?></th>
                <th scope="col"><?= __('Date OI signé') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Etape tâche') ?></th>
                <th scope="col"><?= __('Priorité') ?></th>
                <th scope="col"><?= __('Utilisateur') ?></th>
                <th scope="col"><?= __('olume shooté') ?></th>
                <th scope="col"><?= __('Volume Facturé') ?></th>
                <th scope="col"><?= __('Nb de CI') ?></th>
                <th scope="col"><?= __('CPM') ?></th>
                <th scope="col"><?= __('Total HT') ?></th>
                <th scope="col"><?= __('tva') ?></th>
                <th scope="col"><?= __('Total TTC') ?></th>
                <th scope="col"><?= __('Routeur') ?></th>
                <th scope="col"><?= __('Full potentiel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($demande->operations as $operation): ?>
            <tr>
                <td><?= $this->Number->format($operation->id) ?></td>
                <td><?= h($demande->code_affaire) ?></td>
                <td><?= h($operation->created) ?></td>
                <td><?= h($demande->partenaire_client->nom) ?></td>
                <td><?= h($operation->annonceur) ?></td>
                <td><?= h($operation->date_routage) ?></td>
                <td><?= h($operation->date_OI_signe) ?></td>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Operations', 'action' => 'view', $operation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Operations', 'action' => 'edit', $operation->id]) ?>
                  <!--  <?= $this->Form->postLink(__('Delete'), ['controller' => 'Operations', 'action' => 'delete', $operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
