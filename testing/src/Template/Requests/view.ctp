<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requests view large-9 medium-8 columns content">
    <h3><?= h($request->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Book') ?></th>
            <td><?= $request->has('book') ? $this->Html->link($request->book->title, ['controller' => 'Books', 'action' => 'view', $request->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $request->has('user') ? $this->Html->link($request->user->name, ['controller' => 'Users', 'action' => 'view', $request->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($request->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Borrower Id') ?></th>
            <td><?= $this->Number->format($request->borrower_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weeks') ?></th>
            <td><?= $this->Number->format($request->Weeks) ?></td>
        </tr>
        <tr>
            <th><?= __('OwnerAck') ?></th>
            <td><?= $request->ownerAck ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('RentPaid') ?></th>
            <td><?= $request->rentPaid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
