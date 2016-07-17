<section class="content-header">
      <h1>
        Home
        <small>This page shows all books available.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="col-md-3" style="width:100%">

          <!-- Book info -->
          <div class="box box-primary">
            <div class="box-body box-profile" style="width:100%">
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
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php if($book->status == 0) echo "Available"; 
                    elseif($book->status == 1) echo "Requested"; 
                    elseif($book->status == 2) echo "Not Available"; 
                    ?></a>
                </li>
                <li class="list-group-item">
                <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Description
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      <?= $this->Text->autoParagraph(h($book->description)); ?>
                    </div>
                  </div>
                </div>
                </div>
                </li>
                <!-- Reviews -->
                <li class="list-group-item">
                <div class="box-group" id="accordionTwo">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordionTwo" href="#collapseReviews">
                        Related Reviews
                      </a>
                    </h4>
                  </div>
                  <div id="collapseReviews" class="panel-collapse collapse in">
                    <div class="box-body">
                        <?php foreach ($reviews as $reviewDom): ?>
                            <?= $this->Text->autoParagraph(h($reviewDom->review)); ?><br/>
                            <b><?= $this->Html->link("-".$reviewDom->user->name, ['controller' => 'Users', 'action' => 'view', $reviewDom->user_id], ['class' => 'pull-right'])?></b>
                            <hr/>
                        <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                </div>
                </li>
              </ul>
                <?php if($book->user_id == $user_id): ?>
                    <a href="/books/edit/<?php echo $book->id ?>" class="btn btn-primary btn-block"><b>Edit</b></a><br/>
                    <?= $this->Form->postButton(__('Delete'), ['controller' => 'Books', 'action' => 'delete', $book->id], ['class' => 'btn btn-primary btn-block', 'confirm' => __('Are you sure you want to delete this book?')]) ?>
                <?php else: ?>
                    <a href="#" class="btn btn-primary btn-block"><b>Borrow</b></a>
                <?php endif; ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>     
    </section>
    <!-- /.content -->
