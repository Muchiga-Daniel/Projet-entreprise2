<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn-li">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Edit Etape'), ['action' => 'edit', $etape->id]) ?> </li>
       <!-- <li><?= $this->Form->postLink(__('Delete Etape'), ['action' => 'delete', $etape->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etape->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Etapes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Etape'), ['action' => 'add']) ?> </li>
       <!-- <li><?= $this->Html->link(__('List Operation Etape Taches'), ['controller' => 'OperationEtapeTaches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Operation Etape Tach'), ['controller' => 'OperationEtapeTaches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Taches'), ['controller' => 'Taches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tach'), ['controller' => 'Taches', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="etapes view large-12 medium-8 columns content act">
    <h3><?= h($etape->id) ?></h3>
    <div class="vertical-table">
        <ul class="rang-1">
            <li>
                <div scope="row" class="absolute"><?= __('Designation') ?><br></div>
                <div class="ref"><?= h($etape->designation) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Created') ?><br></div>
                <div class="ref"><?= h($etape->created) ?></div>
            </li>
            <li>
                <div scope="row" class="absolute"><?= __('Modified') ?><br></div>
                <div class="ref"><?= h($etape->modified) ?></div>
            </li>
        </ul>
    </div>
    <!--<div class="related">
        <h4><?= __('Related Operation Etape Taches') ?></h4>
        <?php if (!empty($etape->operation_etape_taches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Date Relance') ?></th>
                <th scope="col"><?= __('Date Fin') ?></th>
                <th scope="col"><?= __('Remarque') ?></th>
                <th scope="col"><?= __('Utilisateur Id') ?></th>
                <th scope="col"><?= __('Operation Id') ?></th>
                <th scope="col"><?= __('Etape Id') ?></th>
                <th scope="col"><?= __('Tache Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($etape->operation_etape_taches as $operationEtapeTaches): ?>
            <tr>
                <td><?= h($operationEtapeTaches->id) ?></td>
                <td><?= h($operationEtapeTaches->created) ?></td>
                <td><?= h($operationEtapeTaches->modified) ?></td>
                <td><?= h($operationEtapeTaches->date_relance) ?></td>
                <td><?= h($operationEtapeTaches->date_fin) ?></td>
                <td><?= h($operationEtapeTaches->remarque) ?></td>
                <td><?= h($operationEtapeTaches->utilisateur_id) ?></td>
                <td><?= h($operationEtapeTaches->operation_id) ?></td>
                <td><?= h($operationEtapeTaches->etape_id) ?></td>
                <td><?= h($operationEtapeTaches->tache_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OperationEtapeTaches', 'action' => 'view', $operationEtapeTaches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OperationEtapeTaches', 'action' => 'edit', $operationEtapeTaches->id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['controller' => 'OperationEtapeTaches', 'action' => 'delete', $operationEtapeTaches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $operationEtapeTaches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
    <div class="related">
        <h4><?= __('Related Taches') ?></h4>
        <?php if (!empty($etape->taches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Designation') ?></th>
                <th scope="col"><?= __('Delai Jour') ?></th>
                <th scope="col"><?= __('Delai Heure') ?></th>
                <th scope="col"><?= __('Delai Minute') ?></th>
                <th scope="col"><?= __('Etape Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($etape->taches as $taches): ?>
            <tr>
                <td><?= h($taches->id) ?></td>
                <td><?= h($taches->created) ?></td>
                <td><?= h($taches->modified) ?></td>
                <td><?= h($taches->designation) ?></td>
                <td><?= h($taches->delai_jour) ?></td>
                <td><?= h($taches->delai_heure) ?></td>
                <td><?= h($taches->delai_minute) ?></td>
                <td><?= h($etape->designation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Taches', 'action' => 'view', $taches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Taches', 'action' => 'edit', $taches->id]) ?>
                   <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'Taches', 'action' => 'delete', $taches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taches->id)]) ?>-->
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
