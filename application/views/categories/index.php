<div class="row">

    <div class="col-3"></div>
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">
                <p class="text-right">الاسم</p>
                </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category): ?>
                    <tr>
                    <td><?php echo $category->englishCategory ?></td>
                    <td>
                    <p class="text-right"> <?php echo $category->arabicCategory ?></td> </p>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-3"></div>

</div>