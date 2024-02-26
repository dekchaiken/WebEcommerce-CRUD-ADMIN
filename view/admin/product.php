<?php
// ในแต่ละหน้า เรียกใช้ 3 ไฟล์นี้ทุกครั้ง และ footer อยู่ด้านล่าง
include('function/head.php');
include('function/navbar.php');
include('function/sildebar.php');
?>

<div class="card table-card p-3">
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h5>Product</h5>
            </div>
            <div class="col-12 col-lg-6" style="display: flex;justify-content: end;">
                <button class="btn btn-primary " onclick="insertProduct()">Add Product</button>
            </div>
        </div>

    </div>
    <div class="card-block">
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-hover " id="example">
                    <thead>
                        <tr>
                            <th width="10%">Number</th>
                            <th>Photo</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Item</th>
                            <th>Shipping cost</th>
                            <th>Status</th>
                            <th width="16%">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $all_product = $conn->query("SELECT * FROM tb_product");
                        foreach ($all_product as $product) :
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><img  src="assets/<?php echo $product['img'] ?>" width="109" height="103" alt=""></td>
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo number_format($product['price']) ?></td>
                                <td><?php echo number_format($product['count']) ?></td>
                                <td><?php echo number_format($product['delivery']) ?></td>
                                <td><button onclick="toggleStatus(<?php echo $product['Product_ID']?>)" class="btn btn-sm <?php echo $product['status'] == 1 ? 'btn-success' : 'btn-secondary' ?>"><?php echo $product['status'] == 1 ? 'เปิดใช้งาน' : 'ปิดใช้งาน' ?></button></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary" onclick="showProduct(<?php echo $product['Product_ID']?>)"><i class="ti-eye"></i></button>
                                        <button class="btn btn-sm btn-outline-warning" onclick="editProduct(<?php echo $product['Product_ID']?>)"><i class="ti-pencil-alt2" ></i></button>
                                        <button class="btn btn-sm btn-outline-danger" onclick="delProduct(<?php echo $product['Product_ID']?>)"><i class="ti-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="text">Add Product </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formProduct">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="old_img" id="old_img" required>
                    <div class="mb-2">
                        <label for="">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="" disabled selected>Select category</option>
                        <?php 
                        $all_category = $conn->query("SELECT * FROM tb_category");
                        foreach($all_category as $category):
                        ?>    
                        <option value="<?php echo $category['Category_ID']?>"><?php echo $category['category_name']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">Type</label>
                        <select name="sub_category" id="sub_category" class="form-control" disabled >
                            <option value="" disabled selected></option>
                        <?php 
                        $all_sub_category = $conn->query("SELECT * FROM tb_sub_category");
                        foreach($all_sub_category as $sub_category):
                        ?>    
                            <option value="<?php echo $sub_category['Sub_ID']?>"><?php echo $sub_category['sub_name']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">Name Product</label>
                        <input type="text" name="product" id="product" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Details</label>
                        <textarea name="detail" id="detail" class="form-control" cols="10" rows="3" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="">Price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Item</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Shipping cost</label>
                        <input type="number" name="delivery" id="delivery" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Price category</label>
                        <select name="type" id="type" class="form-control" required>
                        <?php 
                        $all_type = $conn->query("SELECT * FROM tb_type");
                        foreach($all_type as $type):
                        ?>    
                        <option value="<?php echo $type['Type_ID']?>"><?php echo $type['type']?></option>
                        <?php endforeach;?>
                        </select>
                        
                    </div>
                    <div id="discount_input" class="mb-2 d-none">
                            <input type="number" name="price_discount" id="price_discount" class="form-control" placeholder="ราคาลด">
                        </div>
                    <div class="mb-2">
                        <label for="">Photo</label>
                        <input accept="image/*" type='file' id="imgInp" class="form-control" />
                        <img id="blah" src="#" alt="your image" class="img-fluid d-none" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save</button>
                </form>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="ModalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <td>Name Product</td>
                <td id="productShow"></td>
            </tr>
            <tr>
                <td>Details</td>
                <td id="detailShow"></td>
            </tr>
            <tr>
                <td>Category</td>
                <td id="categoryShow"></td>
            </tr>
            <tr>
                <td>Type</td>
                <td id="subcategoryShow"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td id="priceShow"></td>
            </tr>
            <tr>
                <td>Item</td>
                <td id="countShow"></td>
            </tr>
            <tr>
                <td>Shipping cost</td>
                <td id="deliveryShow"></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td ><img src="" alt="" id="imgShow" class="img-fluid"></td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<?php include('function/footer.php'); ?>
<script src="assets/jquery/product.js"></script>