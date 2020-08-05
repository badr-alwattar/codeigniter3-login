<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white">
        <div class="container">
            <h3> Edit <?php echo $user->firstname ?> </h3>
            <hr>
            <form method="POST" action="<?php echo base_url('index.php/dashboard/update');?>/<?php echo $user->id ?>">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="email"> First Name </label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user->firstname ?>"> 
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="email"> Last Name </label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user->lastname ?>"> 
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email"> Email address </label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $user->email ?>"> 
                        </div>
                    </div>
                    <?php if(validation_errors()):?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors(); ?>  
                        </div>
                    <?php endif;?>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        
                    </div>
                    <div class="col-12 col-sm-8 text-right mt-2">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>