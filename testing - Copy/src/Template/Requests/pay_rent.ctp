<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(__('Cancel Request'), ['action' => 'cancelIssueRequest', $request->id], ['confirm' => __('Are you sure you want to cancel # {0}?', $request->id)]) ?> </li>
    </ul>
</nav>
<div class="requests view large-9 medium-8 columns content">
    <h3><?php echo "Pay Rent for Request #$request->id" ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Book') ?></th>
            <td><?= $request->has('book') ? $this->Html->link($request->book->title, ['controller' => 'Books', 'action' => 'view', $request->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Borrower') ?></th>
            <td><?= $request->has('borrower') ? $this->Html->link($request->borrower->name, ['controller' => 'Users', 'action' => 'view', $request->borrower->id]) : '' ?></td>
        </tr>
        <!-- <tr>
            <th><?= __('Owner') ?></th>
            <td><?= $request->has('owner') ? $this->Html->link($request->owner->name, ['controller' => 'Users', 'action' => 'view', $request->owner->id]) : '' ?></td>
        </tr> -->
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($request->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weeks') ?></th>
            <td><?= $this->Number->format($request->Weeks) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?php 
                        if($request->ownerAck == 0) echo 'Pending';
                        elseif($request->ownerAck == 1) echo 'Accepted';
                        elseif($request->ownerAck == 2) echo 'Declined';
                        elseif($request->ownerAck == 3) echo 'Cancelled by borrower';
                    ?>
            </td>
        </tr>
        <tr>
            <th><?= __('Rent Paid') ?></th>
            <td><?= $request->rentPaid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <h4>Deposits to be made</h4>
    <table class="vertical-table" >
        <tr>
            <th><?= __('Security Deposit (Will be Refunded)') ?></th>
            <td><?= h($securityDeposit) ?></td>
        <tr>
        <tr>
            <th><?= __('Rent according to number of weeks (Rs. 2 per day) ') ?></th>
            <td><?= h($rent) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><b><?= h($total) ?></b></td>
        </tr>
    </table>
    <?= $this->Form->postButton(__("Pay Rs. $total"), ['action' => 'confirmRentPaid', $request->id]) ?>
</div>
