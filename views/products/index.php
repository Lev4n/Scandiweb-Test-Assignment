<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="" class="navbar-brand">Product List</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
            <div class="d-grid gap-2 d-md-flex">
                <a href="/products/create" type="button" class="btn btn-outline-success">ADD</a>
                <button type="submit" name="delete" value="Delete" class="btn btn-outline-danger" form="product_form">MASS DELETE</button>
            </div>
        </div>
    </div>
</nav>

<hr>
<form action="/products/delete" method="POST" id="product_form">
    <div class="row d-flex">
        <div class="row justify-content-center align-items-center">
            <?php foreach ($products as $product) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card border-secondary m-3 text-center shadow bg-body-tertiary rounded">
                    <div class="card-body">
                        <div class="form-check">
                            <input type="checkbox" name="checkedProducts[]" class="delete-checkbox form-check-input" value="<?php echo $product['id'] ?>">
                        </div>
                        <p id="sku"><?php echo $product['sku'] ?></p>
                        <p id="name"><?php echo $product['name'] ?></p>
                        <p id="price"><?php echo $product['price'], " $" ?></p>
                        <p><?php echo $product['value'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</form>