<?php require_once('../../connection/connection.php'); ?>
<?php
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "EDIT"){
  $sql= "UPDATE products SET price=:price, name=:name, description= :description, update_at=:update_at, productID=:productID where productID=:productID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_INT);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":update_at", $_POST['update_at'], PDO::PARAM_STR);
  $sth ->bindParam(":productID", $_POST['productID'], PDO::PARAM_INT);
  $sth ->execute();

  // print_r($sql);
  // echo '<br>';
  // print_r($_POST);
   header('Location: list.php');
}  else{
    $query = $db->query("SELECT * FROM products WHERE productID=".$_GET['productID']);
    $products = $query->fetch(PDO::FETCH_ASSOC);
} 
?>
<!DOCTYPE html>
<html>

    <?php require_once('../layouts/head.php'); ?>
  <style>
    .ck-editor__editable_inline {
  min-height: 300px;
}
  </style>
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
                      <li class="breadcrumb-item"><a href="#">商品管理</a></li>
                      <li class="breadcrumb-item active">新增一筆</li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12 my-3"><a class="btn btn-primary" href="list.php">回上一頁</a></div>
                    </div>
                  <form id="EditForm" class="text-right" method="post" action="edit.php">
                    <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">品名</label>
                                                <div class="col-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $products['name']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">價格</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="price" name="price"  value="<?php echo $products['price']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">描述</label>
                  <div class="col-10">
                    <textarea rows="10" class="form-control" name="description" id="description"><?php echo $products['description']; ?></textarea> </div>
                    <input type="hidden" name="update_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="EditForm" value="EDIT">
                    <input type="hidden" name="productID" value="<?php echo $_GET['productID']; ?>">
                </div>
                <button a href="list.php" class="btn mr-3 btn-primary">取消並回上一頁</button>
                <button type="submit" class="btn btn-secondary">確定送出</button>
              </form>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('../layouts/footer.php'); ?>
  <script>
  // $(function(){
  //     $( "#published_date" ).datepicker({
  //     dateFormat: "yy-mm-dd"
  //     });
  // });
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'description' );

  ClassicEditor
    .create( document.querySelector( '#description' ),{minHeight: '300px'} )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
  </script>
</body>

</html>