<section class="content-header">
      <h1>
        My Added Books
        <small>This page shows all books added by you.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Books</a></li>
        <li class="active">My Added</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="row" style="position:relative">
        <?php foreach ($books as $book): ?>
        <div class="col-md-3">

          <!-- Book info -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $this->Html->link($book->title,['controller' => 'Books', 'action' => 'view', $book->id]) ?></h3>

              <p class="text-muted text-center"><?= h($book->writer) ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Book Id</b> <a class="pull-right"><?= h($book->id) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Edition</b> <a class="pull-right"><?= h($book->edition) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Course</b> <a class="pull-right"><?= h($book->course) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Price</b> <a class="pull-right"><?= h($book->price) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php if($book->status == 0) echo "Available"; if($book->status == 1) echo "Not Available" ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <!------ Box Footer -------------------------------------->
            <div class="box-footer">
                <?php if($book->user_id == $user_id): ?>
                    <?php if($book->status == 0): ?>
                        <div class="callout callout-info">
                            <h5>You can edit or add review for this book.</h5>    
                        </div>
                        <a class="btn btn-block btn-warning" href="/books/edit/<?php echo $book->id ?>">Edit Book</a>&nbsp;
                        <?= $this->Html->link(__('Add a Review'), ['controller' => 'reviews', 'action' => 'add', $book->id],['class' => 'btn btn-block btn-info']) ?>
                    <?php elseif($book->status != 0): ?>
                        <div class="callout callout-alert">
                            <h5>You can not edit or delete this book.</h5>    
                        </div>
                        <?= $this->Html->link(__('Add a Review'), ['controller' => 'reviews', 'action' => 'add', $book->id],['class' => 'btn btn-block btn-info']) ?>&nbsp;
                        <?= $this->Html->link(__('Request Return'), ['action' => 'requestReturn', $book->id],['class' => 'btn btn-block btn-primary']) ?>
                    <?php endif; ?>
                <?php endif ?>
            </div> 
          </div>
          <!-- /.box -->
        </div>
        <?php endforeach; ?>
        </div>  
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </section>
    <!-- /.content -->

<!---------------------------------------------------------------------------------------->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
                <td><?= h($book->title) ?></td>
                <td><?= h($book->writer) ?></td>
                <td><?= h($book->edition) ?></td>
                <td><?= h($book->course) ?></td>
                <td><?= $this->Number->format($book->price) ?></td>
                <td><?php if($book->status == 0) echo "Available"; 
                    elseif($book->status == 1) echo "Requeted"; 
                    elseif($book->status == 2) echo "Not Available"; 
                         ?></td>
                <td><?= $book->has('user') ? $this->Html->link($book->user->name, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $book->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id)]) ?>
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
