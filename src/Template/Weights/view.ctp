<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Weight'), ['action' => 'edit', $weight->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Weight'), ['action' => 'delete', $weight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weight->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Weights'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weight'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cattles'), ['controller' => 'Cattles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cattle'), ['controller' => 'Cattles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="weights view large-10 medium-8 columns content">
    <h3><?= h($weight->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Cattle') ?></th>
            <td><?= $weight->has('cattle') ? $this->Html->link($weight->cattle->id, ['controller' => 'Cattles', 'action' => 'view', $weight->cattle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $weight->has('user') ? $this->Html->link($weight->user->name, ['controller' => 'Users', 'action' => 'view', $weight->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($weight->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($weight->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($weight->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($weight->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($weight->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($weight->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($weight->description)); ?>
    </div>
</div>
