<?php require_once('../../connection/connection.php'); ?>
<?php

if(isset($_POST['EditForm']) && $_POST['EditForm'] == "EDIT"){
  $sql= "UPDATE members SET name=:name, birthday=:birthday, phone=:phone, email=:email, address=:address where memberID=:memberID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":birthday", $_POST['birthday'], PDO::PARAM_STR);
  $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
//  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();
  //  echo $_POST['EditForm'];
  //  echo '<br>';
  //  print_r($sql);
  //  echo '<br>';
  //  print_r($_POST);
 header('Location: list.php');
}  else{
    $query = $db->query("SELECT * FROM members WHERE memberID=".$_GET['memberID']);
    $members = $query->fetch(PDO::FETCH_ASSOC);
} 
?>
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
                  <form id="EditForm" class="text-right" method="post" action="edit.php">
                    <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">姓名</label>
                                                <div class="col-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $members['name']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">生日</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="birthday" name="birthday"  value="<?php echo $members['birthday']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">電話</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="phone" name="phone"  value="<?php echo $members['phone']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">Email</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $members['email']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">地址</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $members['address']; ?>"> </div>
                </div>
                
                    <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="EditForm" value="EDIT">
                    <input type="hidden" name="memberID" value="<?php echo $_GET['memberID']; ?>">
                <button a href="list.php" class="btn mr-3 btn-primary">取消並回上一頁</button>
                <button type="submit" class="btn btn-secondary">確定送出</button>
                </div>

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