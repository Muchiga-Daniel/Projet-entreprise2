<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
       <!-- <li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('New Tach'), ['action' => 'add']) ?></li>
        <!--<li><?= $this->Html->link(__('List Etapes'), ['controller' => 'Etapes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Etape'), ['controller' => 'Etapes', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="taches index large-12 medium-8 columns content act">
    <h3><?= __('Taches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delai_jour') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delai_heure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delai_minute') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fin_mois') ?></th>
                <th scope="col"><?= $this->Paginator->sort('etape_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taches as $tach): ?>
            <tr>
                <td><?= $this->Number->format($tach->id) ?></td>
                <td><?= h($tach->created) ?></td>
                <td><?= h($tach->modified) ?></td>
                <td><?= h($tach->designation) ?></td>
                <td><?= $this->Number->format($tach->delai_jour) ?></td>
                <td><?= $this->Number->format($tach->delai_heure) ?></td>
                <td><?= $this->Number->format($tach->delai_minute) ?></td>
                <td><?= h($tach->fin_mois) ?></td>
                <!--<td><?= $tach->has('etape') ? $this->Html->link($tach->etape->id, ['controller' => 'Etapes', 'action' => 'view', $tach->etape->id]) : '' ?></td>-->
                <td><?= h($tach->etape->designation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tach->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tach->id]) ?>
                  <!--  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tach->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tach->id)]) ?>-->
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
