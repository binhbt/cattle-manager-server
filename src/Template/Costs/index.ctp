<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cost'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="costs index large-10 medium-8 columns content">
    <h3><?= __('Costs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('cost') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
                <?php $totalCost =0;  ?>
            <?php foreach ($costs as $cost): ?>
                        <?php $totalCost+=$cost->cost; ?>
            <tr>
                <td><?= $this->Number->format($cost->id) ?></td>
                <td><?= $this->Number->format($cost->cost) ?></td>
                <td><?= h($cost->date) ?></td>
                <td><?= $cost->has('user') ? $this->Html->link($cost->user->name, ['controller' => 'Users', 'action' => 'view', $cost->user->id]) : '' ?></td>
                <td><?= h($cost->modified) ?></td>
                <td><?= $this->Number->format($cost->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cost->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cost->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cost->id)]) ?>
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
            <p><b>Total cost: <?= $this->Number->format($totalCost)  ?></b></p>
</div>
