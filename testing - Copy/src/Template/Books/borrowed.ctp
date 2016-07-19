<section class="content-header">
      <h1>
        Borrowed Books
        <small>This page shows all books which you have borrowed.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Books</a></li>
        <li class="active">Borrowed</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="row" style="position:relative">
        <?php foreach ($transactions as $transaction): ?>
        <div class="col-md-3">

          <!-- Book info -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $this->Html->link($transaction->book->title,['controller' => 'Books', 'action' => 'view', $transaction->book_id]) ?></h3>

              <p class="text-muted text-center"><?= h($transaction->book->writer) ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Edition</b> <a class="pull-right"><?= h($transaction->book->edition) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Course</b> <a class="pull-right"><?= h($transaction->book->course) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Price</b> <a class="pull-right"><?= h($transaction->book->price) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Owner</b> <a class="pull-right"><?= $this->Html->link($transaction->owner->name, ['controller' => 'Users', 'action' => 'view', $transaction->borrower->id], ['class' => 'pull-right'])?></a>
                </li>
              </ul>
              <?= $this->Html->link(__('Add a Review'), ['controller' => 'reviews', 'action' => 'add', $transaction->book->id],['class' => 'btn btn-block btn-info']) ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="/transactions/return-book/<?php echo $transaction->id ?>" class="btn btn-primary btn-block"><b>Return Book</b></a>
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
