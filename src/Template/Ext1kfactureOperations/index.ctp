<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-12 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav btn">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('New Ext1kfacture Operation'), ['action' => 'add']) ?></li>
        <!--<li><?= $this->Html->link(__('List Operations'), ['controller' => 'Operations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Operation'), ['controller' => 'Operations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuts'), ['controller' => 'Statuts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Statut'), ['controller' => 'Statuts', 'action' => 'add']) ?></li>-->
    </ul>
</nav>
<div class="ext1kfactureOperations index large-12 medium-8 columns content act">
    <h3><?= __('Ext1kfacture Operations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code_facture_1K') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statut_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ext1kfactureOperations as $ext1kfactureOperation): ?>
            <tr>
                <td><?= $this->Number->format($ext1kfactureOperation->id) ?></td>
                <td><?= h($ext1kfactureOperation->created) ?></td>
                <td><?= h($ext1kfactureOperation->modified) ?></td>
                <td><?= h($ext1kfactureOperation->code_facture_1K) ?></td>
                <td><?= $ext1kfactureOperation->has('operation') ? $this->Html->link($ext1kfactureOperation->operation->id, ['controller' => 'Operations', 'action' => 'view', $ext1kfactureOperation->operation->id]) : '' ?></td>
                <td><?= $ext1kfactureOperation->has('statut') ? $this->Html->link($ext1kfactureOperation->statut->id, ['controller' => 'Statuts', 'action' => 'view', $ext1kfactureOperation->statut->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ext1kfactureOperation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ext1kfactureOperation->id]) ?>
                   <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ext1kfactureOperation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ext1kfactureOperation->id)]) ?>-->
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
