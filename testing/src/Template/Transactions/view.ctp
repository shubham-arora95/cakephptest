<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Owners'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Owner'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Book') ?></th>
            <td><?= $transaction->has('book') ? $this->Html->link($transaction->book->title, ['controller' => 'Books', 'action' => 'view', $transaction->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Owner') ?></th>
            <td><?= $transaction->has('owner') ? $this->Html->link($transaction->owner->name, ['controller' => 'Users', 'action' => 'view', $transaction->owner->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Borrower') ?></th>
            <td><?= $transaction->has('borrower') ? $this->Html->link($transaction->borrower->name, ['controller' => 'Users', 'action' => 'view', $transaction->borrower->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Random') ?></th>
            <td><?= h($transaction->random) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Request Id') ?></th>
            <td><?= $this->Number->format($transaction->request_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($transaction->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Issue Date') ?></th>
            <td><?= h($transaction->issue_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Return Date') ?></th>
            <td><?= h($transaction->return_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requests') ?></h4>
        <?php if (!empty($transaction->requests)): ?>
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
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transaction->requests as $requests): ?>
            <tr>
                <td><?= h($requests->id) ?></td>
                <td><?= h($requests->transaction_id) ?></td>
                <td><?= h($requests->book_id) ?></td>
                <td><?= h($requests->borrower_id) ?></td>
                <td><?= h($requests->owner_id) ?></td>
                <td><?= h($requests->Weeks) ?></td>
                <td><?= h($requests->ownerAck) ?></td>
                <td><?= h($requests->rentPaid) ?></td>
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
</div>
