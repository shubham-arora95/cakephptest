<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    </ul>
</nav>

<!-- Issue Request div start -->
<div class="requests index large-9 medium-8 columns content">
    <h3><?= __('Issue Requests') ?></h3>
    <!-- <h4><?= __('Pending Actions') ?></h4> --> 
    <?php if($issueRequests->count()): ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('transaction_id') ?></th>
                <th><?= $this->Paginator->sort('book_id') ?></th>
                <th><?= $this->Paginator->sort('borrower_id') ?></th>
                <th><?= $this->Paginator->sort('Weeks') ?></th>
                <th><?= $this->Paginator->sort('ownerAck', 'Status') ?></th>
                <th><?= $this->Paginator->sort('created', 'Created On') ?></th>
                <th><?= $this->Paginator->sort('payment_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($issueRequests as $request): ?>
            <?php 
                if($request->ownerAck == 0):
                    echo "Please take action for order id $request->id";
                endif;
            ?>
            <tr>
                <td><?= $this->Number->format($request->id) ?></td>
                <td><?= $this->Number->format($request->transaction_id) ?></td>
                <td><?= $request->has('book') ? $this->Html->link($request->book->title, ['controller' => 'Books', 'action' => 'view', $request->book->id]) : '' ?></td>
                <td><?= $request->has('borrower') ? $this->Html->link($request->borrower->name, ['controller' => 'Users', 'action' => 'view', $request->borrower->id]) : '' ?></td>
                <td><?= $this->Number->format($request->Weeks) ?></td>
                <td><?php 
                        if($request->ownerAck == 0) echo 'Pending';
                        elseif($request->ownerAck == 1) echo 'Accepted';
                        elseif($request->ownerAck == 2) echo 'Declined';
                    ?>
                </td>
                <td><?= h($request->created) ?></td>
                <td><?= h($request->payment_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    <?= $this->Html->link(__(' | Accept'), ['action' => 'acceptIssueRequest', $request->id]) ?>
                    <?= $this->Form->postLink(__(' | Decline'), ['action' => 'declineIssueRequest', $request->id], ['confirm' => __('Are you sure you want to decline this request for this book?', $request->id)]) ?>
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
    <?php else: echo "Oops! It seems like there is nothing to show here."; endif;?>
</div>

<!-- Issue Request div ends -->


<!-- Borrow Request div start -->

<div class="requests index large-9 medium-8 columns content">
    <h3><?= __('Borrow Requests') ?></h3>
    <?php if($issueRequests->count()): ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('transaction_id') ?></th>
                <th><?= $this->Paginator->sort('book_id') ?></th>
                <th><?= $this->Paginator->sort('owner_id') ?></th>
                <th><?= $this->Paginator->sort('Weeks') ?></th>
                <th><?= $this->Paginator->sort('ownerAck', 'Status') ?></th>
                <th><?= $this->Paginator->sort('created', 'Created On') ?></th>
                <th><?= $this->Paginator->sort('payment_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($borrowRequests as $request): ?>
            <tr>
                <td><?= $this->Number->format($request->id) ?></td>
                <td><?= $this->Number->format($request->transaction_id) ?></td>
                <td><?= $request->has('book') ? $this->Html->link($request->book->title, ['controller' => 'Books', 'action' => 'view', $request->book->id]) : '' ?></td>
                <td><?= $request->has('owner') ? $this->Html->link($request->owner->name, ['controller' => 'Users', 'action' => 'view', $request->owner->id]) : '' ?></td>
                <td><?= $this->Number->format($request->Weeks) ?></td>
                <td><?php 
                        if($request->ownerAck == 0) echo 'Pending';
                        elseif($request->ownerAck == 1) echo 'Accepted';
                        elseif($request->ownerAck == 2) echo 'Declined';
                    ?>
                </td>
                <td><?= h($request->created) ?></td>
                <td><?= h($request->payment_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?>
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
    <?php else: echo "Oops! It seems like there is nothing to show here."; endif;?>
</div>
<!-- Borrow Requests div end -->

