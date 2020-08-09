    <div class="row">
        <?php foreach($items as $item): ?>
            <div class="col-12 col-sm-4">
                <div class="card my-4">
                    <img class="card-img-top" src="/Images/test.jpg" alt="Card image cap" width="500">
                    <div class="card-body">
                    <h5 class="card-title"><strong>Item: </strong> <?php echo $item->englishName ?> <strong> | </strong> <?php echo $item->arabicName ?></h5>
                        <h5 class="card-title">Price <strong> <?php echo $item->price ?> </strong></h5>
                        <h5 class="card-title"><strong>Category: </strong> <?php echo $item->englishCategory ?> <strong> | </strong> <?php echo $item->arabicCategory ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>