<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Photo'), ['action' => 'edit', $photo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Photo'), ['action' => 'delete', $photo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cattles'), ['controller' => 'Cattles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cattle'), ['controller' => 'Cattles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="photos view large-10 medium-8 columns content">
    <h3><?= h($photo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Cattle') ?></th>
            <td><?= $photo->has('cattle') ? $this->Html->link($photo->cattle->id, ['controller' => 'Cattles', 'action' => 'view', $photo->cattle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($photo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($photo->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($photo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($photo->url)); ?>
    </div>
</div>
