
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white">
        <div class="container">
            <h3> Register </h3>
            <hr>
            <form method="POST" action="<?php echo base_url('index.php/users/register');?>">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="email"> First Name </label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname')?>"> 
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="email"> Last Name </label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname')?>"> 
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email"> Email address </label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email')?>"> 
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" class="form-control" name="password" id="password"> 
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="password_confirm"> Confirm Password </label>
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm"> 
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
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <div class="col-12 col-sm-8 text-right mt-2">
                        <a href="/index.php/users/"> Already have an account </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
