<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Partenaire'), ['action' => 'edit', $partenaire->id]) ?> </li>
        <li><?= $this->Html->link(__('List Partenaires'), ['action' => 'index']) ?> </li>
       <!-- <li><?= $this->Form->postLink(__('Delete Partenaire'), ['action' => 'delete', $partenaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partenaire->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('New Partenaire'), ['action' => 'add']) ?> </li>
        <!--<li><?= $this->Html->link(__('List Partenaires'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="partenaires view large-12 medium-8 columns content act">
    <h3><?= h($partenaire->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Nom') ?><br></div>
                <div class="ref"><?= h($partenaire->nom) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Adresse') ?><br></div>
                <div class="ref"><?= h($partenaire->adresse) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Id') ?><br></div>
                <div class="ref"><?= $this->Number->format($partenaire->id) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($partenaire->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($partenaire->modified) ?></div>
            </li>
        </ul>
    </div>
    <div class="related">
        <h4><?= __('Related Contacts') ?></h4>
        <?php if (!empty($partenaire->contacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Fixe') ?></th>
                <th scope="col"><?= __('Commentaire') ?></th>
                <th scope="col"><?= __('Partenaire Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($partenaire->contacts as $contacts): ?>
            <tr>
                <td><?= h($contacts->id) ?></td>
                <td><?= h($contacts->created) ?></td>
                <td><?= h($contacts->modified) ?></td>
                <td><?= h($contacts->nom) ?></td>
                <td><?= h($contacts->email) ?></td>
                <td><?= h($contacts->mobile) ?></td>
                <td><?= h($contacts->fixe) ?></td>
                <td><?= h($contacts->commentaire) ?></td>
                <td><?= h($contacts->partenaire_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contacts', 'action' => 'view', $contacts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contacts', 'action' => 'edit', $contacts->id]) ?>
                  <!--  <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contacts', 'action' => 'delete', $contacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacts->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <!--<div class="related">
        <h4><?= __('Related Offre Initiales') ?></h4>
        <?php if (!empty($partenaire->offre_initiales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Volume Commande') ?></th>
                <th scope="col"><?= __('Volume Facture') ?></th>
                <th scope="col"><?= __('Routage') ?></th>
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
            <?php foreach ($partenaire->offre_initiales as $offreInitiales): ?>
            <tr>
                <td><?= h($offreInitiales->id) ?></td>
                <td><?= h($offreInitiales->created) ?></td>
                <td><?= h($offreInitiales->modified) ?></td>
                <td><?= h($offreInitiales->volume_commande) ?></td>
                <td><?= h($offreInitiales->volume_facture) ?></td>
                <td><?= h($offreInitiales->routage) ?></td>
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
                   <?= $this->Form->postLink(__('Delete'), ['controller' => 'OffreInitiales', 'action' => 'delete', $offreInitiales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offreInitiales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
</div>
