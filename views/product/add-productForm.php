<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
include '../layout/navbar.php';
include "../../models/category.php";
include "../../guard/adminAuth.php";
  adminAuth("../auth/login-form.php");
  
  if($_GET){ 
      $errors = json_decode($_GET['errors']);
      $old = json_decode($_GET['old']);
      $errors = (array) $errors;
      $oldValues = (array) $old;
  }else $oldValues = [];
?>
<section class="ftco-section ">
<div class="container">
    <div class="col-md-6 ">
            <form method="post" action="../../controller/product/add-product.php" enctype="multipart/form-data" class="contact-form">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Product Name" name='name'>
	                </div>
	                <div class="form-group">
	                  <input type="number" class="form-control" placeholder="Product Price" name='price'>
	                </div>
                  <div class="form-group">
	                  <input type="number" class="form-control" placeholder="Product Price" name='available'>
	                </div>
                    <div class="form-group">
                    <label for="category">Product Category</label>
                    <select id="category" name="category" class="form-control" name='category'>
                        <?php
                            $category = new Category();
                            $categories = $category->selectCategories();
                            foreach ($categories as $category) {
                                echo "<option value='{$category->id}' style='background-color:gray'>{$category->name}</option>";
                            }
                        ?>
                    </select>
                </div>
               <div class="form-group">
                <input type="file" class="form-control" placeholder="image" name="product_image">
              </div>
              <div class="form-group">
                <input type="submit" value="Add Product " class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
</section>
<?php
include '../layout/footer.php';
?>