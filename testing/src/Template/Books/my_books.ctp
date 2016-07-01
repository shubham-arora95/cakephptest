<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List All Books'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="books index large-9 medium-8 columns content">
    <h3><?= __('Books') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('writer') ?></th>
                <th><?= $this->Paginator->sort('edition') ?></th>
                <th><?= $this->Paginator->sort('course') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $this->Number->format($book->id) ?></td>
                <!-- Creating Book Title Clickable -->
                <td><?= $this->Html->link("$book->title",['action' => 'view', $book->id]) ?><!--<?= h($book->title) ?>--></td>
                <td><?= h($book->writer) ?></td>
                <td><?= h($book->edition) ?></td>
                <td><?= h($book->course) ?></td>
                <td><?= $this->Number->format($book->price) ?></td>
                <td><?php if($book->status == 0) echo "Available"; 
                    elseif($book->status == 1) echo "Requeted"; 
                    elseif($book->status == 2) echo "Not Available"; 
                    ?>
                </td>
                <td><?= $book->has('user') ? $this->Html->link($book->user->name, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                <td class="actions">
                    <!-- Show edit and delete buttons only if the current user has added this book also hide borrow button in this case. -->
                    <?php 
                        $user_id = $this->request->session()->read('Auth.User.id');
                        //echo "$user_id";       
                    ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
                    <?php if($book->user->id == $user_id) echo $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                    <?php if($book->user->id != $user_id) echo $this->Html->link(__('Borrow'), ['action' => 'borrow', $book->id]) ?>
                    <?php if($book->user->id == $user_id) echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
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
