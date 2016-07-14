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
                <th><?= $this->Paginator->sort('book_id') ?></th>
                <th><?= $this->Paginator->sort('borrower_id') ?></th>
                <th><?= $this->Paginator->sort('Weeks') ?></th>
                <th><?= $this->Paginator->sort('ownerAck', 'Status') ?></th>
                <th><?= $this->Paginator->sort('created', 'Created On') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($issueRequests as $request): ?>
            <b><?php 
                if($request->ownerAck == 0 && $request->book->status != 0):
                    echo "* Please either accept or decline the request id $request->id";
                endif;
                ?></b>
            <tr>
                <td><?= $this->Number->format($request->id) ?></td>
                <td><?= $request->has('book') ? $this->Html->link($request->book->title, ['controller' => 'Books', 'action' => 'view', $request->book->id]) : '' ?></td>
                <td><?= $request->has('borrower') ? $this->Html->link($request->borrower->name, ['controller' => 'Users', 'action' => 'view', $request->borrower->id]) : '' ?></td>
                <td><?= $this->Number->format($request->Weeks) ?></td>
                <td><?php 
                        if($request->ownerAck == 0) echo 'Pending';
                        elseif($request->ownerAck == 1) echo 'Accepted';
                        elseif($request->ownerAck == 2) echo 'Declined';
                        elseif($request->ownerAck == 3) echo 'Cancelled by borrower';
                        elseif($request->ownerAck == 4) echo 'Issued';
                    ?>
            </td>
                <td><?= h($request->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    <?php 
                        if($request->book->status != 0 && $request->ownerAck == 0):
                            echo $this->Html->link(__(' | Accept'), ['action' => 'acceptIssueRequest', $request->id]);
                            echo $this->Form->postLink(__(' | Decline'), ['action' => 'declineIssueRequest', $request->id], ['confirm' => __('Are you sure you want to decline this request for this book?', $request->id)]);
                        endif;
                    ?>
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
    <?php if($borrowRequests->count()): ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', null, ['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('book_id') ?></th>
                <th><?= $this->Paginator->sort('owner_id') ?></th>
                <th><?= $this->Paginator->sort('Weeks') ?></th>
                <th><?= $this->Paginator->sort('ownerAck', 'Status') ?></th>
                <th><?= $this->Paginator->sort('created', 'Created On') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($borrowRequests as $request): ?>
            <b><?php 
                if($request->ownerAck == 1 && $request->book->status != 0):
                    echo "* Pay rent for request id $request->id from "; 
                    echo "<a href=/requests/pay-rent/$request->id> here.</a>";
                endif;
                ?>
            </b>
            <tr>
                <td><?= $this->Number->format($request->id) ?></td>
                <td><?= $request->has('book') ? $this->Html->link($request->book->title, ['controller' => 'Books', 'action' => 'view', $request->book->id]) : '' ?></td>
                <td><?= $request->has('owner') ? $this->Html->link($request->owner->name, ['controller' => 'Users', 'action' => 'view', $request->owner->id]) : '' ?></td>
                <td><?= $this->Number->format($request->Weeks) ?></td>
                <td><?php 
                        if($request->ownerAck == 0) echo 'Pending';
                        elseif($request->ownerAck == 1) echo 'Accepted';
                        elseif($request->ownerAck == 2) echo 'Declined';
                        elseif($request->ownerAck == 3) echo 'Cancelled by you';
                        elseif($request->ownerAck == 4) echo 'Issued';
                    ?>
            </td>
                <td><?= h($request->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    <?php if($request->ownerAck == 0): ?>
                    <?= $this->Form->postLink(__('Cancel'), ['action' => 'cancelBorrowRequest', $request->id], ['confirm' => __('Are you sure you want to cancel request id # {0}?', $request->id)]) ?>
                    <?php endif; ?>
                    <?php if($request->ownerAck == 1 && $request->book->status != 0): ?>
                    <?= $this->Form->postLink(__('Pay Rent'), ['action' => 'payRent', $request->id]) ?>
                    <?php endif; ?>
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

