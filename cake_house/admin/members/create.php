<?php require_once('../../connection/connection.php'); ?>
<?php
if(isset($_POST['AddForm']) && $_POST['AddForm'] == "INSERT"){
  $sql= "INSERT INTO members  (name, birthday, phone, email, address) VALUES ( :name, :birthday, :phone, :email, :address)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":birthday", $_POST['birthday'], PDO::PARAM_STR);
//  $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
//  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();

 header('Location: list.php');
} ?>
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
              <h1>會員管理</h1>
            </div>
            <div class="card-body">
              <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"> <a href="#">首頁</a> </li>
                <li class="breadcrumb-item"><a href="#">會員管理</a></li>
                <li class="breadcrumb-item active">新增一筆</li>
              </ul>
              <div class="row">
                <div class="col-md-12 my-3"><a class="btn btn-primary" href="list.php">回上一頁</a></div>
              </div>
              <form id="AddForm" class="text-right" method="post" action="create.php">
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">姓名</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="name" name="name"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">生日</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="birthday" name="birthday"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">電話</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="phone" name="phone"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">Email</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="email" name="email"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">地址</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="address" name="address"> </div>
                </div>


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
      $( "#birthday" ).datepicker({
      //dateFormat: "yy-mm-dd"
      changeMonth: true,
      changeYear: true
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