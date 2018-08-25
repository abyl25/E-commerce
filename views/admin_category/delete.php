<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin panel</a></li>
                    <li><a href="/admin/category">Manage Categories</a></li>
                    <li class="active">Delete Category </li>
                </ol>
            </div>

            <h4>Delete Category #<?php echo $id; ?></h4>

            <p>Are you sure you want to delete it?</p>

            <form method="post">
                <input type="submit" name="submit" value="Delete">
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

