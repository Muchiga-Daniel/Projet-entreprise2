<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Offre Initiale'), ['action' => 'edit', $offreInitiale->id]) ?> </li>
      <!--  <li><?= $this->Form->postLink(__('Delete Offre Initiale'), ['action' => 'delete', $offreInitiale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offreInitiale->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Offre Initiales'), ['action' => 'index']) ?> </li>
        <!--<li><?= $this->Html->link(__('New Offre Initiale'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partenaires'), ['controller' => 'Partenaires', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partenaire'), ['controller' => 'Partenaires', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?> </li>-->
        <li><?= $this->Html->link(__('List Offre Initiale Operations'), ['controller' => 'OffreInitialeOperations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offre Initiale Operation'), ['controller' => 'OffreInitialeOperations', 'action' => 'addfromoffreinites', $offreInitiale->id]) ?> </li>
    </ul>
</nav>
<div class="offreInitiales view large-12 medium-8 columns content act">
    <h3><?= h($offreInitiale->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Partenaire') ?><br></div>
                <div class="ref"><?= $offreInitiale->has('partenaire') ? $this->Html->link($offreInitiale->partenaire->id, ['controller' => 'Partenaires', 'action' => 'view', $offreInitiale->partenaire->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Demande') ?><br></div>
                <div class="ref"><?= $offreInitiale->has('demande') ? $this->Html->link($offreInitiale->demande->id, ['controller' => 'Demandes', 'action' => 'view', $offreInitiale->demande->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Utilisateur') ?><br></div>
                <div class="ref"><?= $offreInitiale->has('utilisateur') ? $this->Html->link($offreInitiale->utilisateur->id, ['controller' => 'Utilisateurs', 'action' => 'view', $offreInitiale->utilisateur->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Statut') ?><br></div>
                <div class="ref"><?= $offreInitiale->has('statut') ? $this->Html->link($offreInitiale->statut->id, ['controller' => 'Statuts', 'action' => 'view', $offreInitiale->statut->id]) : '' ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Volume Commande') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitiale->volume_commande) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Volume Facture') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitiale->volume_facture) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Nb divematique') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitiale->nb_divematique) ?></div> 
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Cpm') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitiale->cpm) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Ht') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitiale->ht) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Tva') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitiale->tva) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Ttc') ?><br></div>
                <div class="ref"><?= $this->Number->format($offreInitiale->ttc) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($offreInitiale->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($offreInitiale->modified) ?></div>
            </li>
        </ul>
    </div>
    <div class="related">
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($offreInitiale->offre_initiale_operations)): ?>
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
                <?php foreach ($offreInitiale->offre_initiale_operations as $OffreInitialeOperations): ?>
                <tr>
                    <td><?= h($OffreInitialeOperations->operation->id) ?></td>
                    <td><?= h($offreInitiale->demande->code_affaire) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->created) ?></td>
                    <td><?= h($offreInitiale->demande->partenaire_client->nom) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->annonceur) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->date_routage) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->date_OI_signe) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->operation_type->designation) ?></td>
                    <td>    
                        <?php foreach ($OffreInitialeOperations->operation->operation_etape_taches as $result): ?>
                            <?= h($result->tach->designation . ' - ' . $result->etape->designation) ?>
                            <?php break ?>
                        <?php endforeach; ?>
                    </td>

                    <td><?= $this->Number->format($OffreInitialeOperations->operation->priorite) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->utilisateur->nom) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperations->operation->volume_commande) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperations->operation->volume_factute) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperations->operation->nb_thematique) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperations->operation->cpm) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperations->operation->ht) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperations->operation->tva) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperations->operation->ttc) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->routeur->designation) ?></td>
                    <td><?= h($OffreInitialeOperations->operation->full_potentiel) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Operations', 'action' => 'view', $OffreInitialeOperations->operation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Operations', 'action' => 'edit', $OffreInitialeOperations->operation->id]) ?>
                      <!--  <?= $this->Form->postLink(__('Delete'), ['controller' => 'Operations', 'action' => 'delete', $OffreInitialeOperation->operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?>-->
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
