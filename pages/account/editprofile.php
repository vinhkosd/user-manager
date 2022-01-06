<?php
    use Models\Users;
    validateLogin(true, false);//check account login
    // $accountInfo = Users::where('username', $_SESSION['username'])->first();
?>

<div class="page-content d-flex align-items-center justify-content-center">
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-12 pl-md-3">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="ui-logo logo-light d-block mb-2">HỆ THỐNG QUẢN LÝ NHÂN SỰ</a>
              <h5 class="text-muted font-weight-normal mb-4">Sửa thông tin tài khoản.</h5>
              <form id="loginForm" class="needs-validation" method="post">
                <div class="form-group has-feedback">
                  <label for="username">Tài khoản</label>
                  <input value="<?php echo $_SESSION['username'];?>" type="text" class="form-control" id="username" name="username" autocomplete="current-username" placeholder="Tài khoản" readonly/>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                  <label for="name">Họ tên</label>
                  <input value="<?php echo $_SESSION['accountName'];?>" type="text" class="form-control" id="name" name="name" autocomplete="current-name" placeholder="Họ và tên" readonly/>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                  <label for="role">Quyền hạn</label>
                  <input value="<?php echo roleTitle[$_SESSION['role']];?>" type="text" class="form-control" id="role" name="role" autocomplete="current-role" placeholder="Quyền hạn" readonly/>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                  <label for="imageurl">Ảnh đại diện</label>
                  <!-- <input value="<?php echo calculateImageUrl();?>" type="text" pattern="^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)$" class="form-control" id="imageurl" name="imageurl" autocomplete="current-imageurl" placeholder="Ảnh đại diện" required/> -->
                  <input class="form-control" type="file" id="imageurl" name="imageurl" class="border" accept="image/*"/>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
                <div class="form-group has-feedback">
                  <label for="password">Mật khẩu</label>
                  <input value="<?php echo $_SESSION['username'];?>" type="password" pattern="^[_A-z0-9]{1,}$" maxlength="60" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password" required/>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                </div>
                <!--div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                  </label>
                </div-->
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">
                    Sửa
                  </button>
                </div>
                <!--a href="<?php homePath()?>pages/auth/register" class="d-block mt-3 text-muted">Not a user? Sign up</a-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$().ready(function() {
  $('#loginForm').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
      // handle the invalid form...
      return false;
    }
    
    var formData = new FormData();
    var currentForm = $( "#loginForm" ).serializeArray()
    console.log(currentForm)
    console.log(Object.values(currentForm))
    currentForm.map(item => {
      formData.append(item.name, item.value);
    })

    attachment_data= $("#imageurl")[0].files[0];
    formData.append("imageurl", attachment_data);
    // return false;
    console.log(formData)
    // return false;
    // $.post("<?php homePath()?>ajax/editprofile.php", formData, (data) => {
    //   console.log(data)
    //   if(data.success) {
    //     // window.location = "<?php homePath()?>";
    //     Lobibox.notify("success", {
    //       msg: data["success"]
    //     });
    //   } else {
    //     Lobibox.notify("error", {
    //       msg: data["error"]
    //     });
    //   }
    // }, "json");

    $.ajax({
      url : "<?php homePath()?>ajax/editprofile.php",
      type : 'POST',
      data : formData,
      processData: false,  // tell jQuery not to process the data
      contentType: false,  // tell jQuery not to set contentType
      success : function(data) {
        var result = JSON.parse(data)
        if(result.success) {
          Lobibox.notify("success", {
            msg: result["success"]
          });
        } else {
          Lobibox.notify("error", {
            msg: result["error"]
          });
        }
      }
    });

    return false;
  });
});
</script>
