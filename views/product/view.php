<!-- This is Product VIEW -->

<?php include ROOT . '/views/layouts/header.php' ?>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            
                            <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                            
                        </div><!--/category-products-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="/template/images/products/<?php echo $product['image']; ?>" width="150px" height="250px"/>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <!-- <img src="/template/images/home/new.jpg" class="newarrival new" width="150px" height="300px"/> -->
                                    <h2><?php echo $product['name']; ?></h2>
                                    <p>Product Code: <?php echo $product['code']; ?></p>
                                    <span>
                                        <span>US $<?php echo $product['price']; ?></span>
                                        <label>Quantity:</label>
                                        <input type="text" value="3" />
                                        <button type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add
                                        </button>
                                    </span>
                                    <p><b>Availability:</b> In stock</p>
                                    <p><b>Status:</b> New</p>
                                    <p><b>Manufacturer:</b> D&amp;G</p>
                                </div><!--/product-information-->
                            </div>
                        </div>
                        <div class="row">                                
                            <div class="col-sm-12">
                                <h5>Product description</h5>
                                <p><?php echo $product['description']; ?></p>                                  
                            </div>
                        </div>
                    </div><!--/product-details-->

                </div>
            </div>
        </div>
    </section>
    

    <br/>
    <br/>
    
<?php include ROOT . '/views/layouts/footer.php' ?>
