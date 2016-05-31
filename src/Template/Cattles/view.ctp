<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Chart of this Cattle'), ['action' => 'chart',  $cattle->id]) ?> </li>
        <li><?= $this->Html->link(__('Edit Cattle'), ['action' => 'edit', $cattle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cattle'), ['action' => 'delete', $cattle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cattle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cattles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cattle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weights'), ['controller' => 'Weights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weight'), ['controller' => 'Weights', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cattles view large-10 medium-8 columns content">
    <h3><?= h($cattle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $cattle->has('user') ? $this->Html->link($cattle->user->name, ['controller' => 'Users', 'action' => 'view', $cattle->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($cattle->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($cattle->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Month Old') ?></th>
            <td><?= $this->Number->format($cattle->month_old) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost') ?></th>
            <td><?= $this->Number->format($cattle->cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($cattle->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Sale Price') ?></th>
            <td><?= $this->Number->format($cattle->sale_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Sale Status') ?></th>
            <td><?= $this->Number->format($cattle->sale_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Buy Date') ?></th>
            <td><?= h($cattle->buy_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Sale Date') ?></th>
            <td><?= h($cattle->sale_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($cattle->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($cattle->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cattle->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Blood') ?></h4>
        <?= $this->Text->autoParagraph(h($cattle->blood)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($cattle->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Cattle Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Cost') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cattle->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->name) ?></td>
                <td><?= h($events->cattle_id) ?></td>
                <td><?= h($events->user_id) ?></td>
                <td><?= h($events->description) ?></td>
                <td><?= h($events->cost) ?></td>
                <td><?= h($events->date) ?></td>
                <td><?= h($events->modified) ?></td>
                <td><?= h($events->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Photos') ?></h4>
        <?php if (!empty($cattle->photos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cattle Id') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cattle->photos as $photos): ?>
            <tr>
                <td><?= h($photos->id) ?></td>
                <td><?= h($photos->cattle_id) ?></td>
                <td><?= h($photos->url) ?></td>
                <td><?= h($photos->status) ?></td>
                <td><?= h($photos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Photos', 'action' => 'view', $photos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Photos', 'action' => 'edit', $photos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Photos', 'action' => 'delete', $photos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Weights') ?></h4>
        <?php if (!empty($cattle->weights)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Cattle Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cattle->weights as $weights): ?>
            <tr>
                <td><?= h($weights->id) ?></td>
                <td><?= h($weights->cattle_id) ?></td>
                <td><?= h($weights->name) ?></td>
                <td><?= h($weights->description) ?></td>
                <td><?= h($weights->user_id) ?></td>
                <td><?= h($weights->weight) ?></td>
                <td><?= h($weights->date) ?></td>
                <td><?= h($weights->modified) ?></td>
                <td><?= h($weights->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Weights', 'action' => 'view', $weights->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Weights', 'action' => 'edit', $weights->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Weights', 'action' => 'delete', $weights->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weights->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
