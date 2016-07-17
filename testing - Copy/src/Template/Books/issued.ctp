<section class="content-header">
      <h1>
        Issued Books
        <small>This page shows all books which you have issued.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Books</a></li>
        <li class="active">Issued</li>
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

              <h3 class="profile-username text-center"><?= $this->Html->link("$book->title",['controller' => 'Books', 'action' => 'view', $book->id]) ?></h3>

              <p class="text-muted text-center"><?= h($book->writer) ?></p>

              <ul class="list-group list-group-unbordered">
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
                  <b>Owner</b> <a class="pull-right"><?= $this->Html->link($book->user->name, ['controller' => 'Users', 'action' => 'view', $book->user->id], ['class' => 'pull-right'])?></a>
                </li>
              </ul>

              <a href="/books/borrow/<?php echo $book->id ?>" class="btn btn-primary btn-block"><b>Borrow</b></a>
            </div>
            <!-- /.box-body -->
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
