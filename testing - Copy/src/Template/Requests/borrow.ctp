<section class="content-header">
      <h1>
        Borrow Requests
        <small>This page shows all borrow requests you have made.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Requests</a></li>
        <li class="active">Borrow</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if($requests->count()): ?>
      <!-- Your Page Content Here -->
        <div class="row" style="position:relative">
        <?php foreach ($requests as $request): ?>
        <div class="col-md-3">

          <!-- Request info -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/img/user4-128x128.jpg" alt="Book Picture">

              <h3 class="profile-username text-center"><?= $this->Html->link($request->book->title,['controller' => 'Books', 'action' => 'view', $request->book_id]) ?></h3>

              <p class="text-muted text-center"><?php echo"Request id - $request->id" ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>No of Weeks</b> <a class="pull-right"><?= $this->Number->format($request->Weeks) ?></a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php 
                        if($request->ownerAck == 0) echo 'Owner response pending';
                        elseif($request->ownerAck == 1) echo 'Accepted';
                        elseif($request->ownerAck == 2) echo 'Declined';
                        elseif($request->ownerAck == 3) echo 'Cancelled by borrower';
                        elseif($request->ownerAck == 4) echo 'Book Issued';
                    ?></a>
                </li>
                <li class="list-group-item">
                  <b>Borrower</b> <a class="pull-right"><?= $this->Html->link($request->borrower->name, ['controller' => 'Users', 'action' => 'view', $request->borrower->id], ['class' => 'pull-right'])?></a>
                </li>
                <li class="list-group-item">
                  <b>Rent Paid</b> <a class="pull-right"><?= h($request->rentPaid)?'Yes':'No' ?></a>
                </li>
                <li class="list-group-item">
                  <b>Created On</b> <a class="pull-right"><?php echo $request->created ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php if($request->ownerAck == 0): ?>
                    <div class="callout callout-info">
                        <h5>Owner response is pending.</h5>    
                    </div>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'cancelBorrowRequest', $request->id],['class' => 'btn btn-block btn-danger']) ?>
                <?php elseif($request->ownerAck == 1): ?>
                    <div class="callout callout-success">
                        <h5>Owner has accepted this request.</h5>    
                    </div>
                    <?= $this->Html->link(__('Pay Rent'), ['action' => 'payRent', $request->id],['class' => 'btn btn-block btn-primary']) ?>
                <?php elseif($request->ownerAck == 2): ?>
                    <div class="callout callout-warning">
                        <h5>Owner has declined this request.</h5>
                    </div>
                    <a class="btn btn-block"> This request is closed.</a>
                <?php elseif($request->ownerAck == 3): ?>
                    <div class="callout callout-warning">
                        <h5>You have cancelled this request.</h5>
                    </div>
                    <a class="btn btn-block"> This request is closed.</a>
                <?php elseif($request->ownerAck == 4): ?>
                    <div class="callout callout-info">
                        <h5>The book is already issued to you.</h5>
                    </div>
                    <a class="btn btn-block"> You may return this book.</a>
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
        <?php else: echo "Oops! It seems like there is nothing to show you here."; endif;?>
    </section>
    <!-- /.content -->