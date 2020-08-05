<?php foreach($users as $user): ?>
    <div class="card my-4">
        <div class="card-body">
            <h5 class="card-title">First Name: <strong> <?php echo $user->firstname ?> </strong></h5>
            <h5 class="card-title">Last Name: <strong> <?php echo $user->lastname ?> </strong></h5>
            <p class="card-text">Email: <strong><?php echo $user->email ?> </strong></p>
            <a href="/index.php/dashboard/edit/<?php echo $user->id ?>" class="btn btn-warning">Edit</a>
            <?php if(!$this->User_model->isAdmin($user->id)): ?>
                <a href="/index.php/dashboard/delete/<?php echo $user->id ?>" class="btn btn-danger" class="btn btn-danger">Delete</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>