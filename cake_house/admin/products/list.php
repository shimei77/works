<?php require_once('../functions/login_check.php'); ?>
<?php require_once('../../connection/connection.php'); ?>
<?php
$limit = 5;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page =1;
}
$start_from = ($page-1) * $limit;

$query = $db->query("SELECT * FROM products WHERE product_categoryID = " .$_GET['categoryID']." ORDER BY productID DESC LIMIT ".$start_from.",".$limit);
$all_products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- <?php $query = $db->query("SELECT * FROM products ORDER BY productID DESC");
$all_products = $query->fetchAll(PDO::FETCH_ASSOC);
?> -->

<!DOCTYPE html>
<html>

<?php require_once('../layouts/head.php'); ?>

<body style="">
  <?php require_once('../layouts/navbar.php'); ?>
  
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1>商品管理</h1>
            </div>
            <div class="card-body">
              <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"> <a href="#">首頁</a> </li>
                <li class="breadcrumb-item active">商品管理</li>
              </ul>
              <div class="row">
                <div class="col-md-12 my-3"><a class="btn btn-primary" href="create.php">新增一筆</a></div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">編號</th>
                      <th scope="col">品名</th>
                      <th scope="col">價格</th>
                      <th scope="col">描述</th>
                      <th scope="col" width="20%">操作</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($all_products as $products){  ?>
                    <tr>
                      <td><?php echo $products['productID']; ?></td>
                      <td><?php echo $products['name']; ?></td>
                      <td><?php echo $products['price']; ?></td>
                      <td><?php echo $products['description']; ?></td> 
                      <td><a class="btn btn-secondary" href="edit.php?productID=<?php echo $products['productID'] ;?>"> <i class="fa fa-pencil-square-o fa-fw"></i>&nbsp;編輯</a>
                          <a class="btn btn-secondary ml-2" onclick="if(!confirm('是否確定刪除此筆資料?刪除後無法回復')){return false;};"  href="delete.php?productID=<?php echo $products['productID'];?>"><i class="fa fa-fw fa-trash-o"></i>&nbsp;刪除</a>
                          </td>
                    </tr>
                  <?php }  ?>
                  </tbody>
                </table>
              </div>
              <ul class="pagination my-3 justify-content-center">
                <li class="page-item"> <a class="page-link" href="#"> <span>«</span></a> </li>
                <li class="page-item active"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">4</a> </li>
                <li class="page-item"> <a class="page-link" href="#"> <span>»</span></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../layouts/footer.php'); ?>

</body>

</html>