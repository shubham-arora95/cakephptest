<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List All Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="books form large-9 medium-8 columns content">
    <?= $this->Form->create($book) ?>
    <fieldset>
        <legend><?= __('Add Book') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('writer');
            echo $this->Form->input('edition');
            echo $this->Form->input('course');
            echo $this->Form->input('description');
            echo $this->Form->input('price');
            echo $this->Form->input('is_borrowed');
            
            echo $this->Form->select('Weeks', [
                'select' => 'Select',
                '1' => '1 Week',
                '2' => '2 Week',
                '3' => '3 Week'
                ], 
                /* 3rd parameter used to specify attributes in select */
                [
                'disabled' => ['select'],
                'default' => ['select']
                ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>