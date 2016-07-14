<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Book Transactions'), ['controller' => 'BookTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book Transaction'), ['controller' => 'BookTransactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= $this->Number->format($user->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Book Transactions') ?></h4>
        <?php if (!empty($user->book_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Book Id') ?></th>
                <th><?= __('Issue Date') ?></th>
                <th><?= __('Return Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->book_transactions as $bookTransactions): ?>
            <tr>
                <td><?= h($bookTransactions->id) ?></td>
                <td><?= h($bookTransactions->user_id) ?></td>
                <td><?= h($bookTransactions->book_id) ?></td>
                <td><?= h($bookTransactions->issue_date) ?></td>
                <td><?= h($bookTransactions->return_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BookTransactions', 'action' => 'view', $bookTransactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BookTransactions', 'action' => 'edit', $bookTransactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BookTransactions', 'action' => 'delete', $bookTransactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookTransactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Books') ?></h4>
        <?php if (!empty($user->books)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Writer') ?></th>
                <th><?= __('Edition') ?></th>
                <th><?= __('Course') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->books as $books): ?>
            <tr>
                <td><?= h($books->id) ?></td>
                <td><?= h($books->title) ?></td>
                <td><?= h($books->writer) ?></td>
                <td><?= h($books->edition) ?></td>
                <td><?= h($books->course) ?></td>
                <td><?= h($books->description) ?></td>
                <td><?= h($books->price) ?></td>
                <td><?= h($books->status) ?></td>
                <td><?= h($books->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Books', 'action' => 'view', $books->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Books', 'action' => 'edit', $books->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Books', 'action' => 'delete', $books->id], ['confirm' => __('Are you sure you want to delete # {0}?', $books->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($user->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->body) ?></td>
                <td><?= h($posts->user_id) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Requests') ?></h4>
        <?php if (!empty($user->requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Transaction Id') ?></th>
                <th><?= __('Book Id') ?></th>
                <th><?= __('Borrower Id') ?></th>
                <th><?= __('Owner Id') ?></th>
                <th><?= __('Weeks') ?></th>
                <th><?= __('OwnerAck') ?></th>
                <th><?= __('RentPaid') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Payment Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->requests as $requests): ?>
            <tr>
                <td><?= h($requests->id) ?></td>
                <td><?= h($requests->transaction_id) ?></td>
                <td><?= h($requests->book_id) ?></td>
                <td><?= h($requests->borrower_id) ?></td>
                <td><?= h($requests->owner_id) ?></td>
                <td><?= h($requests->Weeks) ?></td>
                <td><?= h($requests->ownerAck) ?></td>
                <td><?= h($requests->rentPaid) ?></td>
                <td><?= h($requests->created) ?></td>
                <td><?= h($requests->payment_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($user->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Request Id') ?></th>
                <th><?= __('Book Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Owner Id') ?></th>
                <th><?= __('Borrower Id') ?></th>
                <th><?= __('Issue Date') ?></th>
                <th><?= __('Return Date') ?></th>
                <th><?= __('Random') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->request_id) ?></td>
                <td><?= h($transactions->book_id) ?></td>
                <td><?= h($transactions->status) ?></td>
                <td><?= h($transactions->owner_id) ?></td>
                <td><?= h($transactions->borrower_id) ?></td>
                <td><?= h($transactions->issue_date) ?></td>
                <td><?= h($transactions->return_date) ?></td>
                <td><?= h($transactions->random) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
