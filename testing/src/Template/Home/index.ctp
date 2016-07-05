<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <?php if($loggedIn): ?>
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('My Books'), ['controller' => 'Books', 'action' => 'myBooks']) ?></li>
        <li><?= $this->Html->link(__('Share Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
    </ul>
    <?php endif ?>
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
                <th><?= $this->Paginator->sort('user_id', 'Owner') ?></th>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'books','action' => 'view', $book->id]) ?>
                   
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
