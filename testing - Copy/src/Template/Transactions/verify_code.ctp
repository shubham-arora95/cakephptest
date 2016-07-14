<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?php echo "Verify code for transaction id $transaction->id" ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Book') ?></th>
            <td><?= $transaction->has('book') ? $this->Html->link($transaction->book->title, ['controller' => 'Books', 'action' => 'view', $transaction->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Borrower') ?></th>
            <td><?= $transaction->has('borrower') ? $this->Html->link($transaction->borrower->name, ['controller' => 'Users', 'action' => 'view', $transaction->borrower->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Request Id') ?></th>
            <td><?= $this->Number->format($transaction->request_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td>
                <?php 
                    if($transaction->status == 0) echo "Pending Code Verification"; 
                    if($transaction->status == 1) echo "Code Verified";
                    if($transaction->status == 2) echo "Return Requested";
                    if($transaction->status == 3) echo "Transaction Closed";
                ?>
            </td>
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
    <!-- <b>Please enter the code below which was given by the borrower during pickup.</b> -->
    <?= $this->Form->create(null,['url' => "/transactions/checkEnteredCode/$transaction->id", 'method' => 'POST']) ?>
    <fieldset>
        <legend><?= __('Verify Code') ?></legend>
        <?php
            echo $this->Form->input('Enter verification code ( Case Sensitive)', ['type' => 'text', 'name' => 'enteredCode', 'id' => 'enteredCode', 'required' => 'true']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
