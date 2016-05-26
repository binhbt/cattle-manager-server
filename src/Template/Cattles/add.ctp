<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cattles'), ['action' => 'index']) ?></li>
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
<div class="cattles form large-10 medium-8 columns content">
    <?= $this->Form->create($cattle) ?>
    <fieldset>
        <legend><?= __('Add Cattle') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('blood');
            echo $this->Form->input('weight');
            echo $this->Form->input('buy_date');
            echo $this->Form->input('month_old');
            echo $this->Form->input('cost');
            echo $this->Form->input('status');
            echo $this->Form->input('sale_date');
            echo $this->Form->input('sale_price');
            echo $this->Form->input('sale_status');
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
