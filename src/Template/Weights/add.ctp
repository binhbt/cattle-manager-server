<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Weights'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cattles'), ['controller' => 'Cattles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cattle'), ['controller' => 'Cattles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="weights form large-10 medium-8 columns content">
    <?= $this->Form->create($weight) ?>
    <fieldset>
        <legend><?= __('Add Weight') ?></legend>
        <?php
            echo $this->Form->input('cattle_id', ['options' => $cattles]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('weight');
            echo $this->Form->input('date');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
