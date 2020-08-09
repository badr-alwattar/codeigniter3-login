<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white">
        <div class="container">
            <h3> Add Category </h3>
            <hr>
            <form method="POST" action="<?php echo base_url('index.php/categories/store');?>">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="email"> Arabic Name </label>
                            <input type="text" class="form-control" name="arabicName" id="arabicName"> 
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="email"> English Name </label>
                            <input type="text" class="form-control" name="englishName" id="englishName"> 
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php if(validation_errors()):?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo validation_errors(); ?>  
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        
                    </div>
                    <div class="col-12 col-sm-8 text-right mt-2">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>