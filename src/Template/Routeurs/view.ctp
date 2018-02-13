<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Routeur'), ['action' => 'edit', $routeur->id]) ?> </li>
        <!--<li><?= $this->Form->postLink(__('Delete Routeur'), ['action' => 'delete', $routeur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routeur->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Routeurs'), ['action' => 'index']) ?> </li>
        <!-- <li><?= $this->Html->link(__('New Routeur'), ['action' => 'add']) ?> </li>
       <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="routeurs view large-12 medium-8 columns content act">
    <h3><?= h($routeur->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Designation') ?><br></div>
                <div class="ref"><?= h($routeur->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Id') ?><br></div>
                <div class="ref"><?= $this->Number->format($routeur->id) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($routeur->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($routeur->modified) ?></div>
            </li>
        </ul>
    </div>
    <div class="related">
        <h4><?= __('Related Offre Initiales') ?></h4>
        <?php if (!empty($routeur->offre_initiales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Volume Commande') ?></th>
                <th scope="col"><?= __('Volume Facture') ?></th>
                <th scope="col"><?= __('Routage') ?></th>
                <th scope="col"><?= __('Routeur Id') ?></th>
                <th scope="col"><?= __('Nb Thematique') ?></th>
                <th scope="col"><?= __('Cpm') ?></th>
                <th scope="col"><?= __('Ht') ?></th>
                <th scope="col"><?= __('Tva') ?></th>
                <th scope="col"><?= __('Ttc') ?></th>
                <th scope="col"><?= __('Partenaire Id') ?></th>
                <th scope="col"><?= __('Demande Id') ?></th>
                <th scope="col"><?= __('Utilisateur Id') ?></th>
                <th scope="col"><?= __('Statut Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($routeur->offre_initiales as $offreInitiales): ?>
            <tr>
                <td><?= h($offreInitiales->id) ?></td>
                <td><?= h($offreInitiales->created) ?></td>
                <td><?= h($offreInitiales->modified) ?></td>
                <td><?= h($offreInitiales->volume_commande) ?></td>
                <td><?= h($offreInitiales->volume_facture) ?></td>
                <td><?= h($offreInitiales->routage) ?></td>
                <td><?= h($offreInitiales->routeur_id) ?></td>
                <td><?= h($offreInitiales->nb_thematique) ?></td>
                <td><?= h($offreInitiales->cpm) ?></td>
                <td><?= h($offreInitiales->ht) ?></td>
                <td><?= h($offreInitiales->tva) ?></td>
                <td><?= h($offreInitiales->ttc) ?></td>
                <td><?= h($offreInitiales->partenaire_id) ?></td>
                <td><?= h($offreInitiales->demande_id) ?></td>
                <td><?= h($offreInitiales->utilisateur_id) ?></td>
                <td><?= h($offreInitiales->statut_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OffreInitiales', 'action' => 'view', $offreInitiales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OffreInitiales', 'action' => 'edit', $offreInitiales->id]) ?>
                   <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'OffreInitiales', 'action' => 'delete', $offreInitiales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offreInitiales->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Operations') ?></h4>
        <?php if (!empty($routeur->operations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Annonceur') ?></th>
                <th scope="col"><?= __('Priorite') ?></th>
                <th scope="col"><?= __('Ciblage') ?></th>
                <th scope="col"><?= __('Volume') ?></th>
                <th scope="col"><?= __('Routage') ?></th>
                <th scope="col"><?= __('Routeur Id') ?></th>
                <th scope="col"><?= __('Date Routage') ?></th>
                <th scope="col"><?= __('Nb Thematique') ?></th>
                <th scope="col"><?= __('Cpm') ?></th>
                <th scope="col"><?= __('Ht') ?></th>
                <th scope="col"><?= __('Tva') ?></th>
                <th scope="col"><?= __('Ttc') ?></th>
                <th scope="col"><?= __('Demande Id') ?></th>
                <th scope="col"><?= __('Operation Type Id') ?></th>
                <th scope="col"><?= __('Utilisateur Id') ?></th>
                <th scope="col"><?= __('Statut Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($routeur->operations as $operations): ?>
            <tr>
                <td><?= h($operations->id) ?></td>
                <td><?= h($operations->created) ?></td>
                <td><?= h($operations->modified) ?></td>
                <td><?= h($operations->annonceur) ?></td>
                <td><?= h($operations->priorite) ?></td>
                <td><?= h($operations->ciblage) ?></td>
                <td><?= h($operations->volume) ?></td>
                <td><?= h($operations->routage) ?></td>
                <td><?= h($operations->routeur_id) ?></td>
                <td><?= h($operations->date_routage) ?></td>
                <td><?= h($operations->nb_thematique) ?></td>
                <td><?= h($operations->cpm) ?></td>
                <td><?= h($operations->ht) ?></td>
                <td><?= h($operations->tva) ?></td>
                <td><?= h($operations->ttc) ?></td>
                <td><?= h($operations->demande_id) ?></td>
                <td><?= h($operations->operation_type_id) ?></td>
                <td><?= h($operations->utilisateur_id) ?></td>
                <td><?= h($operations->statut_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Operations', 'action' => 'view', $operations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Operations', 'action' => 'edit', $operations->id]) ?>
                   <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'Operations', 'action' => 'delete', $operations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operations->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
