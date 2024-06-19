<?php include(VIEWS.'inc'.DS.'header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <?php if (isset($success)): ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
                <a href="/Product/index" class="btn btn-primary">Back to Products</a>
            <?php elseif (isset($error)): ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
                <a href="/Product/index" class="btn btn-primary">Back to Products</a>
            <?php else: ?>
                <h3 class="text-center">Are you sure you want to delete this product?</h3>
                <form class="text-center" method="POST" action="/Product/destroy/<?php echo $id; ?>">
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <a href="/Product/index" class="btn btn-secondary">No, Cancel</a>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include(VIEWS.'inc'.DS.'footer.php'); ?>
