<?php
validateLogin(true, false);//check account login
checkPermission("admin", true);
?>
			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
						<li class="breadcrumb-item active" aria-current="page">Danh sách tài khoản</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
						<div class="card-body">
							<h6 class="card-title">Danh sách tài khoản</h6>
							<p class="card-description">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAccount" data-account="">Tạo tài khoản</button>
								<a id="reloadDataButton" href="javascript:void(0)"> Tải lại </a>
							</p>
							<div class="table-responsive">
							<table id="dataTableExample" class="table">
								<thead>
								<tr>
									<th>ID</th>
									<th>Tài khoản</th>
									<th>Tên</th>
									<th>Chức năng</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							</div>
						</div>
						</div>
					</div>
				</div>

			</div>
			<div class="modal fade" id="createAccount" tabindex="-1" role="dialog" aria-labelledby="createAccountLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createAccountLabel">Tạo tài khoản</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="createAccountForm">
					<div class="form-group">
						<label for="name" class="col-form-label">Họ tên:</label>
						<input type="text" id="name" name="name" class="form-control"/>
					</div>
					<div class="form-group">
						<label for="username" class="col-form-label">Tài khoản:</label>
						<input type="text"  id="username" name="username" class="form-control" data-inputmask-regex="[a-zA-Z0-9]{4,40}"/>
					</div>
					<div class="form-group">
						<label for="imageurl" class="col-form-label">Ảnh đại diện:</label>
						<input type="text" class="form-control" id="imageurl" name="imageurl"/>
					</div>
					<div class="form-group">
						<label for="role" class="col-form-label">Quyền hạn:</label>
						<select class="form-control" name="role" required>
	                        	<option value="user">Nhân viên</option>
	                        	<option value="admin">Trưởng phòng</option>
						</select>
					</div>
					<div class="form-group">
						<label for="active" class="col-form-label">Khoá tài khoản:</label>
						<select class="form-control" name="active" required>
	                        	<option value="0">Không khoá</option>
	                        	<option value="1">Khoá tài khoản</option>
						</select>
					</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
					<button type="button" class="btn btn-primary" id="createAccountSaveButton">Tạo tài khoản</button>
				</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="editAccountLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editAccountLabel">Sửa tài khoản</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="editAccountForm">
					<div class="form-group">
						<label for="id" class="col-form-label">ID:</label>
						<input type="text" class="form-control" id="id" name="id" readonly>
					</div>
					<div class="form-group">
						<label for="username" class="col-form-label">Tài khoản:</label>
						<input type="text" id="username" name="username" class="form-control" data-inputmask-regex="[a-zA-Z0-9]{4,40}" readonly/>
					</div>
					<div class="form-group">
						<label for="imageurl" class="col-form-label">Ảnh đại diện:</label>
						<input type="text" class="form-control" id="imageurl" name="imageurl"/>
					</div>
					<div class="form-group">
						<label for="role" class="col-form-label">Quyền hạn:</label>
						<select class="form-control" name="role" required>
	                        	<option value="user">Nhân viên</option>
	                        	<option value="admin">Trưởng phòng</option>
						</select>
					</div>
					<div class="form-group">
						<label for="active" class="col-form-label">Khoá tài khoản:</label>
						<select class="form-control" name="active" required>
	                        	<option value="0">Không khoá</option>
	                        	<option value="1">Khoá tài khoản</option>
						</select>
					</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
					<button type="button" class="btn btn-primary" id="editAccountSaveButton">Lưu</button>
				</div>
				</div>
			</div>
		</div>

		<div id="confirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">modalTitle Demo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<span>modalTitle body content!</span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
						<button type="button" class="btn btn-primary">Xác nhận</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Extra large modal -->
<script type="text/javascript">
	$(document).ready(function() {
		var dt = [];
		function loadAccountList() {
			var currentPage = $('#dataTableExample').DataTable().page.info().page;
			dt = $('#dataTableExample').DataTable().destroy();
			// $('#dataTableExample tbody').html("Loading...");
			dt = $('#dataTableExample').DataTable({
				"aLengthMenu": [
					[10, 30, 50, -1],
					[10, 30, 50, "Tất cả"]
				],
				"iDisplayLength": 10,
				"language": {
					search: ""
				},
				"processing": true,
		        "serverSide": true,
		        "ajax": "<?php homePath()?>ajax/accountlist_serverside.php",
		        "order": [[ 0, "desc" ]],
		        "columns": [
		            { "data": "id" },
		            { "data": "username" },
		            { "data": "name" },
		            {
		                "class":          "function-button",
		                "orderable":      false,
		                "data":           null,
		                "defaultContent": `	<div>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editAccount" data-account="">Edit</button>
						<button type="button" class="btn btn-primary resetPassword">Reset mật khẩu</button>
						</div>`
		            },
		        ]
			});
			
			 dt.on( 'draw', function () {
		        // $('#dataTableExample tbody button').trigger( 'click' );
	        	$('#dataTableExample tbody').on( 'click', 'tr td.function-button', function () {
			        var tr = $(this).closest('tr');
			        var row = $('#dataTableExample').DataTable().row( tr );
			        $(this).find('button').attr('data-account', JSON.stringify(row.data()));
			    });

				$(".resetPassword").click(function() {		
							
					var tr = $(this).closest('tr');
			        var row = $('#dataTableExample').DataTable().row( tr );
					var rowData = row.data();

					confirmModal(`Vui lòng xác nhận reset mật khẩu cho user: ${rowData.username}`, () => resetPassword(rowData));
					
				});
		    });
		}

		function resetPassword(rowData) {
			$.post("<?php homePath()?>ajax/resetpassword.php", rowData, (data) => {
				if(data.success) {
					Lobibox.notify("success", {
						msg: data.success
					});
				} else {
					Lobibox.notify("error", {
						msg: data.error
					});
				}
			}, "json")
			.always(function() {
				$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
			});
		}

		loadAccountList();
		
		$('#reloadDataButton').click(function(e,t) {
			$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
		})

		$('#editAccount').on('show.bs.modal', function (event) {
			console.log('onShow');
			var button = $(event.relatedTarget) // Button that triggered the modal
			
			var accountData = (button.data('account')) // Extract info from data-* attributes
			var modal = $(this);
			Object.keys(accountData).map(item => {
				if(item !== 'password') {
					modal.find('.modal-body input[name='+item+']').val(accountData[item]);
					modal.find('.modal-body select[name='+item+']').val(accountData[item]);
				}
			})
			modal.find('.modal-title').text('Edit account : ' + accountData['username'])
		});

		$('#editAccountSaveButton').click(function () {
			$.post("<?php homePath()?>ajax/editaccount.php",$('#editAccountForm').serialize(), (data) => {
				if(data.success) {
					Lobibox.notify("success", {
						msg: data.success
					});
				} else {
					Lobibox.notify("error", {
						msg: data.error
					});
				}
				$('#editAccount').modal('hide');
			}, "json")
			.always(function() {
				$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
			});
			return false;
		});

		$('#createAccountSaveButton').click(function () {
			$.post("<?php homePath()?>ajax/createaccount.php",$('#createAccountForm').serialize(), (data) => {
				if(data.success) {
					Lobibox.notify("success", {
						msg: data.success
					});
				} else {
					Lobibox.notify("error", {
						msg: data.error
					});
				}
				$('#createAccount').modal('hide');
			}, "json")
			.always(function() {
				$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
			});
			return false;
		});

		function confirmModal(content, nextaction) {
			$('#confirmModal').find('.modal-body span').html(content);
			$('#confirmModal').find('.modal-title').html(content);
			$('#confirmModal').modal();
			
			$('#confirmModal .modal-footer button.btn-primary').bind( "click", function() {
				$('#confirmModal .modal-footer button.btn-primary').unbind( "click" );
				console.log('Xác nhận');
				nextaction();
				$('#confirmModal').modal('hide');
				$('#confirmModal .modal-footer button.btn-primary').off();
				return false;
			});
		}
		
		$('#confirmModal').on('hidden.bs.modal', function () {
			$('#confirmModal .modal-footer button.btn-primary').off();
			$('#confirmModal .modal-footer button.btn-primary').unbind( "click" );
		});
	});

</script>