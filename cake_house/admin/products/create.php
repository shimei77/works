<?php require_once('../../connection/connection.php'); ?>
<?php
if(isset($_POST['AddForm']) && $_POST['AddForm'] == "INSERT"){
  $sql= "INSERT INTO products  (name, description, price) VALUES ( :name, :description, :price)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_INT);
//  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();

 header('Location: list.php');
} ?>
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
              <form id="AddForm" class="text-right" method="post" action="create.php">
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">品名</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="name" name="name"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">價格</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="price" name="price"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">描述</label></label>
                  <div class="col-10">
                    <textarea rows="5" class="form-control" name="description" id="description"></textarea> </div>
                    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="AddForm" value="INSERT">
                </div>
                <button type="submit" class="btn mr-3 btn-primary">取消並回上一頁</button><button type="submit" class="btn btn-secondary">確定送出</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('../layouts/footer.php'); ?>
  <script>
  $(function(){
      $( "#published_date" ).datepicker({
      dateFormat: "yy-mm-dd"
      });
  });
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'description' );

  ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
</body>

</html>