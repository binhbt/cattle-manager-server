<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Weight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cattles'), ['controller' => 'Cattles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cattle'), ['controller' => 'Cattles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="weights index large-9 medium-8 columns content">
    <h3><?= __('Weights') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('cattle_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weights as $weight): ?>
            <tr>
                <td><?= $this->Number->format($weight->id) ?></td>
                <td><?= $weight->has('cattle') ? $this->Html->link($weight->cattle->id, ['controller' => 'Cattles', 'action' => 'view', $weight->cattle->id]) : '' ?></td>
                <td><?= $weight->has('user') ? $this->Html->link($weight->user->name, ['controller' => 'Users', 'action' => 'view', $weight->user->id]) : '' ?></td>
                <td><?= $this->Number->format($weight->weight) ?></td>
                <td><?= h($weight->date) ?></td>
                <td><?= h($weight->modified) ?></td>
                <td><?= $this->Number->format($weight->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $weight->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $weight->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $weight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weight->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
