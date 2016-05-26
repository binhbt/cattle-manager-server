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
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('buy_date') ?></th>
                <th><?= $this->Paginator->sort('month_old') ?></th>
                <th><?= $this->Paginator->sort('cost') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('sale_date') ?></th>
                <th><?= $this->Paginator->sort('sale_price') ?></th>
                <th><?= $this->Paginator->sort('sale_status') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cattles as $cattle): ?>
            <tr>
                <td><?= $this->Number->format($cattle->id) ?></td>
                <td><?= $this->Number->format($cattle->weight) ?></td>
                <td><?= h(date('d.m.Y', strtotime($cattle->buy_date))) ?></td>
                <td><?= $this->Number->format($cattle->month_old) ?></td>
                <td><?= $this->Number->format($cattle->cost) ?></td>
                <td><?= $this->Number->format($cattle->status) ?></td>
                <td><?= h(!empty($cattle->sale_date)?date('d.m.Y', strtotime($cattle->sale_date)):"") ?></td>
                <td><?= $this->Number->format($cattle->sale_price) ?></td>
                <td><?= $this->Number->format($cattle->sale_status) ?></td>
                <td><?= $cattle->has('user') ? $this->Html->link($cattle->user->name, ['controller' => 'Users', 'action' => 'view', $cattle->user->id]) : '' ?></td>
                <td><?= h($cattle->modified) ?></td>
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
</div>
