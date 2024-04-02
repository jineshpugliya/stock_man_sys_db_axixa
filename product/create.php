  <?php
    $catdata = $ddb->custom("select * from allcat");
    ?>
  <div class="container border">
      <form action="index.php?module=product&do=store" method="post" enctype="multipart/form-data">
          <div class="alert alert-info h4 text-center">
              Product Form
          </div>
          <?php if (isset($_SESSION['error'])) : ?>
              <div class="alert alert-danger">
                  <?= $_SESSION['error']; ?>
              </div>
              <?php unset($_SESSION['error']); ?>
          <?php endif; ?>
          <?php if (isset($_SESSION['errorname'])) : ?>
              <div class="alert alert-danger">
                  <?= $_SESSION['errorname']; ?>
              </div>
              <?php unset($_SESSION['errorname']); ?>
          <?php endif; ?>

          <div class="mb-3">
              <label for="name">Product Name:</label>
              <input type="text" id="name" name="product_name" class="form-control" required placeholder="Enter Product Name">
          </div>
          <div class="mb-3">
              <label for="price">Price:</label>
              <input type="number" id="price" name="product_price" class="form-control" required placeholder="Enter Product Price" onchange="setprice()">
          </div>
          <div class="mb-3">
              <label for="discount">Discount:</label>
              <input type="number" min="0" max="100" id="discount" onchange="setprice()" name="product_discount" class="form-control" required placeholder="Enter Product Discount">
          </div>
          <div class="mb-3" style="display: none;" id="dfp">
              <label>Price After Discount :</label>
              <input type="text" disabled id="fp" class="form-control">
          </div>
          <div class="mb-3">
              <label for="image">Product Main Image:</label>
              <input type="file" id="image" name="image" class="form-control" accept="image/*">
          </div>

          <div class="mb-3">
              <label for="oimage">Product Other Images/Video:</label>
              <input type="file" id="oimage" name="oimage[]" multiple class="form-control" accept="image/*,video/*">
          </div>
          <div class="mb-3">
              <label for="">Select categories in which you want to insert this product:</label>
              <div class="form-control">
                  <div class="row">
                      <?php foreach ($catdata as $catinfo) {

                        ?>
                          <div class="col-sm-6 col-lg-3 col-md-4">
                              <div class="card">
                                  <div class="card-header" style="cursor:pointer" onclick="$('#cat<?= $catinfo['categories_id']; ?>').slideToggle(1000,()=>{
                                   let  ic=$('#ic<?= $catinfo['categories_id']; ?>');
                                   //alert(ic.attr('class'));
                                    if(ic.attr('class')=='fas fa-arrow-up arrow-up' )
                                    {
                                        ic.removeClass( 'fas fa-arrow-up arrow-up' );
                                        ic.addClass( 'fas fa-arrow-down arrow-down' );
                                          } else { 
                                            ic.removeClass( 'fas fa-arrow-down arrow-down' );
                                        ic.addClass( 'fas fa-arrow-up arrow-up' ); }})">
                                      <h5 class="mb-0 text-primary"> <?= $catinfo['maincat']; ?>
                                          <span class="float-end">
                                              <i class="fas fa-arrow-up arrow-up" id="ic<?= $catinfo['categories_id']; ?>"></i>
                                          </span>
                                      </h5>

                                  </div>
                                  <div id="cat<?= $catinfo['categories_id']; ?>" style="display: none;" class="collapse show">
                                      <div class="card-body">
                                          <?php $cinfo = explode(',', $catinfo['subcat']); ?>
                                          <select class="form-control" name="subcats[]" multiple>
                                              <?php foreach ($cinfo as $cin) {
                                                    $cin = explode('-', $cin);
                                                ?>
                                                  <option value="<?= $cin[0]; ?>"><?= $cin[1]; ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      <?php } ?>
                  </div>
              </div>
          </div>


          <div class="mb-3">
              <label for="description">Description:</label>
              <textarea name="product_description" id="description" class="form-control" placeholder="Enter Description" rows="10"></textarea>
          </div>

          <div class="mb-3 text-center">
              <button class="btn btn-primary">Save</button>
          </div>
      </form>
  </div>

  <script>
      // Initialize CKEditor on the description textarea

      function setprice() {
          let p = Number(price.value);
          let d = Number(discount.value);
          if (p && d <= 100 && d >= 0) {
              dfp.style.display = "block";
              fp.value = p - (p * d / 100);
          } else {
              dfp.style.display = "none";
          }
      }
  </script>