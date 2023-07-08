<?php

if (isset($_POST["name"])) {
    
    ## create product
    $create = createProduct($mysqli,$_POST);
    if ($create) {
        header("Location: http://".$_SERVER['HTTP_HOST']);
        exit;
    }

}

$categories = getallCategory($mysqli);

?>

<br>
<div class="container">
    <h2>Create Product</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Product Name</label>
            <input required type="text" class="form-control" id="formGroupExampleInput" placeholder="Product Name" name="name">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input required type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description" name="description">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">URL Image</label>
            <input value="https://via.placeholder.com/150.png" required type="text" class="form-control" id="formGroupExampleInput2" placeholder="Image Url" name="image">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Category</label>
            <select class="form-control" aria-label="Default select example" name="category_id" required>
                <?php
                while ($row = $categories->fetch_assoc()) {
                ?>
                    <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form> 
</div>