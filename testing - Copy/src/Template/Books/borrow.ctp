<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?> </li>
        <li><?= $this->Html->link(__('List All Books'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('My Books'), ['action' => 'myBooks']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="books view large-9 medium-8 columns content">
    <h3><?= h($book->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($book->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Writer') ?></th>
            <td><?= h($book->writer) ?></td>
        </tr>
        <tr>
            <th><?= __('Edition') ?></th>
            <td><?= h($book->edition) ?></td>
        </tr>
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= h($book->course) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $book->has('user') ? $this->Html->link($book->user->name, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($book->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($book->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?php if($book->status == 0) echo "Available"; 
                    elseif($book->status == 1) echo "Requeted"; 
                    elseif($book->status == 2) echo "Not Available"; 
                         ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($book->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reviews') ?></h4>
        <?php if (!empty($book->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Review') ?></th>
                <th><?= __('Book Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($book->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->id) ?></td>
                <td><?= h($reviews->review) ?></td>
                <td><?= h($reviews->book_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reviews', 'action' => 'edit', $reviews->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reviews', 'action' => 'delete', $reviews->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reviews->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <?= $this->Form->create(null,['url' => "/books/generateRequest/$book->id", 'method' => 'POST']) ?>
    <fieldset>
        <legend><?= __('Select Weeks') ?></legend>
        <?php
            echo '<b>For how many weeks you want this book? </b>';
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
    <!-- <?= $this->Form->create($book,['url' => "/books/generateRequest/$book->id", $book->id]); ?>

             <?php echo $this->Form->select('Weeks', [
                'select' => 'Select',
                '1 Week' => '1 Week',
                '2 Week' => '2 Week',
                '3 Week' => '3 Week'
                ], 
                /* 3rd parameter used to specify attributes in select */
                [
                'disabled' => ['select'],
                'default' => ['select']
                ]);?>
     <?= $this->Form->postButton(__('Confirm borrow'), ['action' => 'confirmBorrow', $book->id]) ?> -->
    </div>
</div>
