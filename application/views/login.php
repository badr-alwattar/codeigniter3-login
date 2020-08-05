
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white">
        <div class="container">
            <h3> Login </h3>
            <hr>
            <form method="POST" action="<?php echo base_url('index.php/users/login');?>">
                <div class="form-group">
                    <label for="email"> Email address </label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email')?>"> 
                </div>
                <div class="form-group">
                    <label for="password"> Password </label>
                    <input type="password" class="form-control" name="password" id="password"> 
                </div>
                <?php if(validation_errors()):?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>  
                    </div>
                <?php endif;?>
                <?php if(isset($wrong_cardentials)):?>
                    <div class="alert alert-danger" role="alert">
                        Email or password is incorrect, try again.
                    </div>
                <?php endif;?>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="col-12 col-sm-8 text-right mt-2">
                        <a href="/index.php/users/register"> Don't have an account yet? </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
