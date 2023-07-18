<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="" class="navbar-brand">Product Add</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
            <div class="d-grid gap-2 d-md-flex">
                <button form="product_form" type="submit" name="Save" value="Save" class="btn btn-outline-success">Save</button>
                <a href="/" type="submit" value="Cancel" class="btn btn-outline-danger">Cancel</a>
            </div>
        </div>
    </div>
</nav>
<hr>
<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) : ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="product_form" method="post">
    <div class="mt-5">
        <div id="sku-container" class="row mb-3 col-md-4">
            <label for="sku-container" class="col-3 col-form-label">SKU</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="sku" name="sku" value="<?php echo $_POST['sku'] ?? '' ?>" />
            </div>
        </div>
        <div id="name-container" class="row mb-3 col-md-4">
            <label for="name-container" class="col-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $_POST['name'] ?? '' ?>" />
            </div>
        </div>
        <div id="price-container" class="row mb-5 col-md-4">
            <label for="price-container" class="col-3 col-form-label">Price ($)</label>
            <div class="col-sm-9">
                <input type="number" step=".01" class="form-control" id="price" name="price" value="<?php echo $_POST['price'] ?? '' ?>" />
            </div>
        </div>
        <div class="row mb-4 col-md-4">
            <label for="productType" class="col-6 col-form-label">Type Switcher</label>
            <div class="col-sm-6">
                <select class="form-select"  id="productType" name="productType" >
                    <option value="typeSwitcher">Type Switcher</option>
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>
        </div>
            <div id="DVD">
                <div id="size-container" class="row mb-4 col-md-4">
                    <label for="size-container" class="col-6 col-form-label">Size (MB)</label>
                    <div class="col-sm-6">
                        <input type="number" step=".01" class="form-control" id="size" name="size" value="<?php echo $_POST['size'] ?? '' ?>" />
                    </div>
                </div>
                <p><strong>Please, provide disc space in MB.</strong></p>
            </div>
            <div id="Furniture">
                <div id="height-container" class="row mb-4 col-md-4">
                    <label for="height-container" class="col-6 col-form-label">Height(CM)</label>
                    <div class="col-sm-6">
                        <input type="number" step=".01" class="form-control" id="height" name="height" value="<?php echo $_POST['height'] ?? '' ?>" />
                    </div>
                </div>
                <div id="width-container" class="row mb-4 col-md-4">
                    <label for="width-container" class="col-6 col-form-label">Width(CM)</label>
                    <div class="col-sm-6">
                        <input type="number" step=".01" class="form-control" id="width" name="width" value="<?php echo $_POST['width'] ?? '' ?>" />
                    </div>
                </div>
                <div id="length-container" class="row mb-4 col-md-4">
                    <label for="length-container" class="col-6 col-form-label">Length(CM)</label>
                    <div class="col-sm-6">
                        <input type="number" step=".01" class="form-control" id="length" name="length" value="<?php echo $_POST['length'] ?? '' ?>" />
                    </div>
                </div>
                <p><strong>Please, provide dimensions in HxWxL format.</strong></p>
            </div>
            <div id="Book">
                <div id="weight-container" class="row mb-4 col-md-4">
                    <label for="weight-container" class="col-6 col-form-label">Weight (KG)</label>
                    <div class="col-sm-6">
                        <input type="number" step=".01" class="form-control" id="weight" name="weight" value="<?php echo $_POST['weight'] ?? '' ?>" />
                    </div>
                </div>
                <p><strong>Please, provide weight in KG.</strong></p>
            </div>
    </div>
</form>

