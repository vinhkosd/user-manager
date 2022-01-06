<?php
validateLogin(true, false);//check account login
checkPermission("user", true);
?>
			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Phòng ban</a></li>
						<li class="breadcrumb-item active" aria-current="page">Danh sách phòng ban</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
						<div class="card-body">
							<h6 class="card-title">Danh sách phòng ban</h6>
							<p class="card-description">
              <?php if (checkPermission("admin"))
                  {
                ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPhongBan" data-phongban="">Tạo nhiệm vụ</button>
                <?php
                  }
                ?>

								<a id="reloadDataButton" href="javascript:void(0)"> Tải lại </a>
							</p>
							<div class="table-responsive">
							<table id="dataTableExample" class="table">
								<thead>
								<tr>
									<th>ID</th>
									<th>Tên</th>
									<th>Mô tả</th>
									<th>Người giao</th>
                  <th>Người được giao</th>
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
			<div class="modal fade" id="createPhongBan" tabindex="-1" role="dialog" aria-labelledby="createPhongBanLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createPhongBanLabel">Tạo nhiệm vụ</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="createPhongBanForm">
					<div class="form-group">
						<label for="ten" class="col-form-label">Tên phòng ban:</label>
						<input type="text" id="ten" name="ten" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="mo_ta" class="col-form-label">Mô tả:</label>
						<input type="text"  id="mo_ta" name="mo_ta" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="so_phong" class="col-form-label">Số phòng:</label>
						<input type="text" class="form-control" id="so_phong" name="so_phong" data-inputmask-regex="[0-9]{1,40}" required/>
					</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
					<button type="button" class="btn btn-primary" id="createPhongBanSaveButton">Tạo nhiệm vụ</button>
				</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="editPhongBan" tabindex="-1" role="dialog" aria-labelledby="editPhongBanLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editPhongBanLabel">Sửa phòng ban</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="editPhongBanForm">
					<div class="form-group">
						<label for="id" class="col-form-label">ID:</label>
						<input type="text" class="form-control" id="id" name="id" readonly>
					</div>
					<div class="form-group">
						<label for="ten" class="col-form-label">Tên phòng ban:</label>
						<input type="text" id="ten" name="ten" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="mo_ta" class="col-form-label">Mô tả:</label>
						<input type="text"  id="mo_ta" name="mo_ta" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="so_phong" class="col-form-label">Số phòng:</label>
						<input type="text" class="form-control" id="so_phong" name="so_phong" data-inputmask-regex="[0-9]{1,40}" required/>
					</div>
					<div class="form-group">
						<label for="manager_id" class="col-form-label">Quản lý:</label>
						<select class="form-control" name="manager_id" required>
							<option value="0">Không chọn</option>
						</select>
					</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
					<button type="button" class="btn btn-primary" id="editPhongBanSaveButton">Lưu</button>
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
		        "ajax": "<?php homePath()?>ajax/listtask.php",
		        "order": [[ 0, "desc" ]],
		        "columns": [
		            { "data": "id" },
		            { "data": "ten" },
		            { "data": "mo_ta" },
                { "data": "owner" },
                { "data": "assign" },
		            {
		                "class":          "function-button",
		                "orderable":      false,
		                "data":           null,
		                "defaultContent": `	<div>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editPhongBan" data-phongban="">Edit</button>
						</div>`
		            },
		        ]
			});

			 dt.on( 'draw', function () {
		        // $('#dataTableExample tbody button').trigger( 'click' );
	        	$('#dataTableExample tbody').on( 'click', 'tr td.function-button', function () {
			        var tr = $(this).closest('tr');
			        var row = $('#dataTableExample').DataTable().row( tr );
			        $(this).find('button').attr('data-phongban', JSON.stringify(row.data()));
			    });


		    });
		}

		loadAccountList();
		getUserList();

		$('#reloadDataButton').click(function(e,t) {
			$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
		})

		$('#editPhongBan').on('show.bs.modal', function (event) {
			console.log('onShow');
			var button = $(event.relatedTarget) // Button that triggered the modal

			var phongbanData = (button.data('phongban')) // Extract info from data-* attributes
			var modal = $(this);
			Object.keys(phongbanData).map(item => {
				if(item !== 'password') {
					modal.find('.modal-body input[name='+item+']').val(phongbanData[item]);
					modal.find('.modal-body select[name='+item+']').val(phongbanData[item]);
				}
			})
			modal.find('.modal-title').text('Edit phongban : ' + phongbanData['username'])
		});

		$('#editPhongBanSaveButton').click(function () {
			$.post("<?php homePath()?>ajax/editphongban.php",$('#editPhongBanForm').serialize(), (data) => {
				if(data.success) {
					Lobibox.notify("success", {
						msg: data.success
					});
				} else {
					Lobibox.notify("error", {
						msg: data.error
					});
				}
				$('#editPhongBan').modal('hide');
			}, "json")
			.always(function() {
				$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
			});
			return false;
		});

		$('#createPhongBanSaveButton').click(function () {
			$.post("<?php homePath()?>ajax/createphongban.php",$('#createPhongBanForm').serialize(), (data) => {
				if(data.success) {
					Lobibox.notify("success", {
						msg: data.success
					});
				} else {
					Lobibox.notify("error", {
						msg: data.error
					});
				}
				$('#createPhongBan').modal('hide');
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

		function getUserList() {
			$.get("<?php homePath()?>ajax/userlist.php", {}, (data) => {
				// console.log(data)
				// $('select[name="manager_id"]');
				$.each(data, function(key, value) {
					$('select[name="manager_id"]')
						.append($("<option></option>")
									.attr("value", value.id)
									.text(value.name));
				});
			}, "json");
		}
	});

</script>