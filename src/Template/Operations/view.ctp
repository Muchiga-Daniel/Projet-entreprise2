<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Operation'), ['action' => 'edit', $operation->id]) ?> </li>
        <!--<li><?= $this->Form->postLink(__('Delete Operation'), ['action' => 'delete', $operation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operation->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Operations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Etape Tache'), ['controller' => 'OperationEtapeTaches', 'action' => 'addformoperaitons', $operation->demande_id, $operation->id]) ?> </li>
        <li><?= $this->Html->link(__('New offre initiale'), ['controller' => 'OffreInitiales', 'action' => 'addformoperaitons', $operation->demande_id, $operation->id]) ?> </li>
        <li><?= $this->Html->link(__('New Ext1kfacture Operation'), ['controller' => 'Ext1kfactureOperations', 'action' => 'add']) ?> </li>
       <!-- <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Utilisateurs'), ['controller' => 'Utilisateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilisateur'), ['controller' => 'Utilisateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ext1kfacture Operations'), ['controller' => 'Ext1kfactureOperations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ext1kfacture Operation'), ['controller' => 'Ext1kfactureOperations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operation Etape Taches'), ['controller' => 'OperationEtapeTaches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Etape Tach'), ['controller' => 'OperationEtapeTaches', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="operations view large-12 medium-8 columns content act">
    <h3><?= h($operation->id) ?></h3>
    <div class="vertical-div">
        <ul class="rang-1">
        <?php //debug($operation); die(); ?>
            <li>
                <div scope="row" class="absolute"><?= __('Annonceur') ?><br></div>
                <div class="ref"><?= h($operation->annonceur) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Demande') ?><br></div>
                <div class="ref"><?= h($operation->demande->code_affaire) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Utilisateur') ?><br></div>
                <div class="ref"><?= h($operation->utilisateur->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Statut') ?><br></div>
                <div class="ref"><?= h($operation->statut->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Full potentiel') ?><br></div>
                <div class="ref"><?= h($operation->full_potentiel) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Priorite') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->priorite) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Volume Commande') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->volume_commande) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Volume Facture') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->volume_facture) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Nb divematique') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->nb_divematique) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Remise') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->Remise) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Cpm') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->cpm) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Ht') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->ht) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Tva') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->tva) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Ttc') ?><br></div>
                <div class="ref"><?= $this->Number->format($operation->ttc) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Operation Type') ?><br></div>
                <div class="ref"><?= h($operation->operation_type->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($operation->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($operation->modified) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Routage') ?><br></div>
                <div class="ref"><?= $operation->routage ? __('Yes') : __('No'); ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Routeur') ?><br></div>
                <div class="ref"><?= h($operation->routeur->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Date Routage') ?><br></div>
                <div class="ref"><?= h($operation->date_routage) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Date OI signé') ?><br></div>
                <div class="ref"><?= h($operation->date_oi_signe) ?></div>
            </li>
        </ul>
    </div>
    <div class="row cmt">
        <h4><?= __('Ciblage') ?></h4>
        <?= $this->Text->autoParagraph(h($operation->ciblage)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Operation Etape Taches') ?></h4>
        <?php if (!empty($operation->operation_etape_taches)): ?>
        <table cellpadding="0" cellspacing="0">
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
            <?php foreach ($operation->operation_etape_taches as $operationEtapeTache): ?>
            <tr>
                <?php //debug($operation); die();?>
                <td><?= h($operation->demande->code_affaire) ?></td>
                <td><?= h($operationEtapeTache->created) ?></td>
                <td><?= h($operationEtapeTache->modified) ?></td>
                <td><?= h($operationEtapeTache->date_relance) ?></td>
                <td><?= h($operationEtapeTache->date_fin) ?></td>
                <td><?= h($operation->demande->partenaire_client->nom) ?></td>
                <td><?= h($operation->annonceur) ?></td>
                <td><?= h($operation->operation_type->designation) ?></td>
                <td><?= h($operationEtapeTache->etape->designation) ?></td>
                <td><?= h($operation->priorite) ?></td>
                <td><?= h($operationEtapeTache->utilisateur->nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OperationEtapeTaches', 'action' => 'view', $operationEtapeTache->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OperationEtapeTaches', 'action' => 'editfromoperattion', $operation->id, $operationEtapeTache->id]) ?>
                  <!--  <?= $this->Form->postLink(__('Delete'), ['controller' => 'OperationEtapeTaches', 'action' => 'delete', $operationEtapeTache->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationEtapeTache->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?> 
    </div>
    <div class="related">
        <h4><?= __('Related Offre initiales') ?></h4>
        <?php if (!empty($operation->offre_initiale_operations)): ?> 
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
                <?php foreach ($operation->offre_initiale_operations as $OffreInitialeOperation): ?>
                <tr>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->id) ?></td>
                    <td><?= h($OffreInitialeOperation->offre_initiale->created) ?></td>
                    <td><?= h($OffreInitialeOperation->offre_initiale->modified) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->volume_commande) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->volume_facture) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->nb_thematique) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->cpm) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->remise) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->ht) ?></td>
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->tva) ?></td> 
                    <td><?= $this->Number->format($OffreInitialeOperation->offre_initiale->ttc) ?></td>
                    <td><?= h($OffreInitialeOperation->offre_initiale->partenaire->nom) ?></td>
                    <td><?= h($OffreInitialeOperation->offre_initiale->demande->code_affaire) ?></td>
                    <td><?= h($OffreInitialeOperation->offre_initiale->utilisateur->nom) ?></td>
                    <td><?= h($OffreInitialeOperation->offre_initiale->statut->designation) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'OffreInitiales','action' => 'view', $OffreInitialeOperation->offre_initiale->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'OffreInitiales','action' => 'edit', $OffreInitialeOperation->offre_initiale->id]) ?>
                        <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $OffreInitialeOperation->offre_initiale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $OffreInitialeOperation->offre_initiale->id)]) ?>-->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
