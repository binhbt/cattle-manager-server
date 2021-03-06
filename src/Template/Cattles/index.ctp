<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cattle'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weights'), ['controller' => 'Weights', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weight'), ['controller' => 'Weights', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cattles index large-10 medium-8 columns content">
    <h3><?= __('Cattles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('blood') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('buy_date') ?></th>
                <th><?= $this->Paginator->sort('cost') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $totalCost =0;  ?>
            <?php foreach ($cattles as $cattle): ?>
            <?php $totalCost+=$cattle->cost; ?>
            <tr>
                <td><?= $this->Number->format($cattle->id) ?></td>
                <td><?= h($cattle->name) ?></td>
                <td><?= h($cattle->description) ?></td>
                <td><?= h($cattle->blood) ?></td>
                <td><?= $this->Number->format($cattle->weight) ?></td>
                <td><?= h(date('d.m.Y', strtotime($cattle->buy_date))) ?></td>
                <td><?= $this->Number->format($cattle->cost) ?></td>
                <td><?= $this->Number->format($cattle->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cattle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cattle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cattle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cattle->id)]) ?>
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
    <p><b>Total cattles cost: <?= $this->Number->format($totalCost)  ?></b></p>
</div>
