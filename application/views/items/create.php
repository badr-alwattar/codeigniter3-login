<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white">
        <div class="container">
            <h3> Add item </h3>
            <hr>
            <?php echo form_open_multipart('/items/store');?>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="arabicName"> Arabic Name </label>
                            <input type="text" class="form-control" name="arabicName" id="arabicName"> 
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="englishName"> English Name </label>
                            <input type="text" class="form-control" name="englishName" id="englishName"> 
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="price"> Price </label>
                            <input type="number" class="form-control" name="price" id="price"> 
                        </div>
                    </div>
                   
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="image"> Image </label>
                            <input type="file" class="form-control" name="image" id="image"> 
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select multiple class="form-control" name="category" id="category">
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category->id ?>"><?php echo $category->englishCategory ?> | <?php echo $category->arabicCategory ?></option>
                            <?php endforeach; ?>
                            </select>
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

            <html>


        </div>
    </div>
</div>