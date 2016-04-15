<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cattles'), ['controller' => 'Cattles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cattle'), ['controller' => 'Cattles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['controller' => 'Costs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['controller' => 'Costs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weights'), ['controller' => 'Weights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weight'), ['controller' => 'Weights', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $this->Number->format($user->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($user->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($user->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Email') ?></h4>
        <?= $this->Text->autoParagraph(h($user->email)); ?>
    </div>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($user->password)); ?>
    </div>
    <div class="row">
        <h4><?= __('Avatar Url') ?></h4>
        <?= $this->Text->autoParagraph(h($user->avatar_url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($user->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Token') ?></h4>
        <?= $this->Text->autoParagraph(h($user->token)); ?>
    </div>
    <div class="row">
        <h4><?= __('Full Name') ?></h4>
        <?= $this->Text->autoParagraph(h($user->full_name)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cattles') ?></h4>
        <?php if (!empty($user->cattles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code Tag') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Blood') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Buy Date') ?></th>
                <th><?= __('Month Old') ?></th>
                <th><?= __('Cost') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Sale Date') ?></th>
                <th><?= __('Sale Price') ?></th>
                <th><?= __('Sale Status') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->cattles as $cattles): ?>
            <tr>
                <td><?= h($cattles->id) ?></td>
                <td><?= h($cattles->code_tag) ?></td>
                <td><?= h($cattles->description) ?></td>
                <td><?= h($cattles->blood) ?></td>
                <td><?= h($cattles->weight) ?></td>
                <td><?= h($cattles->buy_date) ?></td>
                <td><?= h($cattles->month_old) ?></td>
                <td><?= h($cattles->cost) ?></td>
                <td><?= h($cattles->status) ?></td>
                <td><?= h($cattles->sale_date) ?></td>
                <td><?= h($cattles->sale_price) ?></td>
                <td><?= h($cattles->sale_status) ?></td>
                <td><?= h($cattles->user_id) ?></td>
                <td><?= h($cattles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cattles', 'action' => 'view', $cattles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cattles', 'action' => 'edit', $cattles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cattles', 'action' => 'delete', $cattles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cattles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Costs') ?></h4>
        <?php if (!empty($user->costs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Cost') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->costs as $costs): ?>
            <tr>
                <td><?= h($costs->id) ?></td>
                <td><?= h($costs->name) ?></td>
                <td><?= h($costs->description) ?></td>
                <td><?= h($costs->cost) ?></td>
                <td><?= h($costs->date) ?></td>
                <td><?= h($costs->user_id) ?></td>
                <td><?= h($costs->modified) ?></td>
                <td><?= h($costs->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Costs', 'action' => 'view', $costs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Costs', 'action' => 'edit', $costs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Costs', 'action' => 'delete', $costs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($user->events)): ?>
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
            <?php foreach ($user->events as $events): ?>
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
        <h4><?= __('Related Weights') ?></h4>
        <?php if (!empty($user->weights)): ?>
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
            <?php foreach ($user->weights as $weights): ?>
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
