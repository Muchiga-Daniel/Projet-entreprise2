<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('New Offre Initiale Operation'), ['action' => 'add']) ?></li>
        <!--<li><?= $this->Html->link(__('List Offre Initiales'), ['controller' => 'OffreInitiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Offre Initiale'), ['controller' => 'OffreInitiales', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="offreInitialeOperations index large-12 medium-8 columns content act">
    <h3><?= __('Offre Initiale Operations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('offre_initiale_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operation') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offreInitialeOperations as $offreInitialeOperation): ?>
            <tr>
                <td><?= $this->Number->format($offreInitialeOperation->id) ?></td>
                <td><?= h($offreInitialeOperation->created) ?></td>
                <td><?= h($offreInitialeOperation->modified) ?></td>
                <td><?= $offreInitialeOperation->has('offre_initiale') ? $this->Html->link($offreInitialeOperation->offre_initiale->id, ['controller' => 'OffreInitiales', 'action' => 'view', $offreInitialeOperation->offre_initiale->id]) : '' ?></td>
                <td><?= h($offreInitialeOperation->operation_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $offreInitialeOperation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offreInitialeOperation->id]) ?>
                    <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offreInitialeOperation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offreInitialeOperation->id)]) ?>-->
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
