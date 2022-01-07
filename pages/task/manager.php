<?php
validateLogin(true, false);//check account login
checkPermission("user", true);
?>
			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Task</a></li>
						<li class="breadcrumb-item active" aria-current="page">Quản lý task</li>
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
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTask" data-phongban="">Tạo nhiệm vụ</button>
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
									<th>Người giao</th>
                  					<th>Người được giao</th>
									<th>Thời hạn</th>
									<th>Trạng thái</th>
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
			<div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="createTaskLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createTaskLabel">Tạo task</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="createTaskForm">
					<div class="form-group">
						<label for="ten" class="col-form-label">Tên:</label>
						<input type="text" id="ten" name="ten" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="mo_ta" class="col-form-label">Mô tả:</label>
						<textarea type="text" class="form-control" name="mo_ta" rows="8" cols="50" required>
                		</textarea>
						<!-- <input type="text"  id="mo_ta" name="mo_ta" class="form-control" required/> -->
					</div>
					<div class="form-group">
						<label for="deadlinedate" class="col-form-label">Deadline:</label>
						<!-- <input type="text" class="form-control" id="deadlinedate" name="deadlinedate" required/> -->
						<div class="input-group date timepicker" id="deadlinedate" data-target-input="nearest">
							<input type="text" name="time" class="form-control datetimepicker-input" data-target="#deadlinedate"/>
							<div class="input-group-append" data-target="#deadlinedate" data-toggle="datetimepicker">
								<div class="input-group-text"><i data-feather="clock"></i></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="assign_id" class="col-form-label">Người được giao:</label>
						<select class="form-control" name="assign_id" required>
							<option value="0">Không chọn</option>
						</select>
					</div>
					</form>
					<div >
						<form id="createTaskFileDropZone" action="<?php homePath();?>/ajax/uploadtaskattachment.php" class="dropzone" ></form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
					<button type="button" class="btn btn-primary" id="createTaskSaveButton">Tạo nhiệm vụ</button>
				</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="editTask" tabindex="-1" role="dialog" aria-labelledby="editTaskLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editTaskLabel">Sửa task</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="editTaskForm">
					<div class="form-group">
						<label for="id" class="col-form-label">ID:</label>
						<input type="text" class="form-control" id="id" name="id" readonly>
					</div>
					<?php if (checkPermission("admin"))
					{
					?>
						<div class="form-group">
							<label for="ten" class="col-form-label">Tên:</label>
							<input type="text" id="ten" name="ten" class="form-control" required/>
						</div>
					<?php
					}
					?>
					
					<div class="form-group">
						<label for="mo_ta" class="col-form-label">Mô tả:</label>
						<textarea type="text" class="form-control" name="mo_ta" rows="8" cols="50" required>
                		</textarea>
						<!-- <input type="text"  id="mo_ta" name="mo_ta" class="form-control" required/> -->
					</div>

					<?php if (checkPermission("admin"))
					{
					?>
						<div class="form-group">
							<label for="deadlinedate" class="col-form-label">Deadline:</label>
							<!-- <input type="text" class="form-control" id="deadlinedate" name="deadlinedate" required/> -->
							<div class="input-group date timepicker" id="deadlinedateedit" data-target-input="nearest">
								<input type="text" name="time" class="form-control datetimepicker-input" data-target="#deadlinedateedit"/>
								<div class="input-group-append" data-target="#deadlinedateedit" data-toggle="datetimepicker">
									<div class="input-group-text"><i data-feather="clock"></i></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="assign_id" class="col-form-label">Người được giao:</label>
							<select class="form-control" name="assign_id" required>
								<option value="0">Không chọn</option>
							</select>
						</div>
						<div class="form-group">
							<label for="status" class="col-form-label">Trạng thái task:</label>
							<select class="form-control" name="status" required>
								<option value="0">New</option>
								<option value="1">In progress</option>
								<option value="2">Canceled</option>
								<option value="3">Waiting</option>
								<option value="4">Rejected</option>
								<option value="5">Completed</option>
							</select>
						</div>
					<?php
					}
					?>
					</form>
					<div >
						<form id="fileDropZone" action="<?php homePath();?>/ajax/uploadtaskattachment.php" class="dropzone" ></form>
					</div>
					<div class="downloadlinks">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
					<button type="button" class="btn btn-primary" id="editTaskSaveButton">Lưu</button>
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
		function initDatePicker(idElement, subMonth = 0) {
			if($(`#${idElement}`).length) {
				$(`#${idElement}`).datetimepicker({
					format: 'YYYY-MM-DD HH:mm',
					
				});
			}
		}

		initDatePicker('deadlinedate');
		initDatePicker('deadlinedateedit');

		$("#fileDropZone").dropzone({
			dictDefaultMessage: 'Bạn có thể kéo file hoặc click để chọn file',
			init: function () {
				this.on("success", function (file, response) {
					console.log(file)
					var fileresponse = { nome: file.name, link: response[0] };
					file.previewElement.classList.add("dz-success");
				});

				this.on("error", function (file, error, xhr) {
					var fileresponse = { nome: file.name, status: xhr.status, statusText: xhr.statusText, erro: error.message };
				});
			}
		})
		
		$("#createTaskFileDropZone").dropzone({
			dictDefaultMessage: 'Bạn có thể kéo file hoặc click để chọn file',
			init: function () {
				this.on("success", function (file, response) {
					console.log(file)
					var fileresponse = { nome: file.name, link: response[0] };
					file.previewElement.classList.add("dz-success");
				});

				this.on("error", function (file, error, xhr) {
					var fileresponse = { nome: file.name, status: xhr.status, statusText: xhr.statusText, erro: error.message };
				});
			}
		})

		function limitCharacter (str, max, suffix = '...') {
			if (str.length <= max) return str;
			
			let strGioiHan ='';
			let nextStr = '';
			if(typeof(max) === 'number'){
				strGioiHan = str.substr(0,max);
				nextStr = str.substr(str.length - 3 < max ? str.length : str.length - 3, 3)
			}
			else{
				strGioiHan = str.substr(0,30);
			}
			return strGioiHan + suffix + nextStr;
		}


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
                	{ "data": "owner" },
                	{ "data": "assign" },
					{ "data": "time" },
					{ "data": "status",
						render: function(data, type, row, meta) {
							var returnText = "";
    	                    switch(row.status) {
								case 0:
									returnText = "Chưa nhận";
									break;
								case 1:
									returnText = "Đã nhận";
									break;
								case 2:
									returnText = "Đã huỷ";
									break;
								case 3:
									returnText = "Đang chờ";
									break;
								case 4:
									returnText = "Từ chối";
									break;
								case 5:
									returnText = "Đã xong";
									break;
							}
							return returnText;
    	                }
					},
		            {
		                "class":          "function-button",
		                "orderable":      false,
		                "data":           null,
						render: function(data, type, row, meta) {
    	                    var buttonText = row.status == 0 && row.assign_id == <?php echo $_SESSION['accountId']?> ? "Start" : "Edit";
							var buttonCls = row.status == 0 && row.assign_id == <?php echo $_SESSION['accountId']?> ? "btn-start" : "btn-edit";
    	                    return `	<div>
										<button type="button" class="btn btn-primary ${buttonCls}" ${(row.status == 0 && row.assign_id == <?php echo $_SESSION['accountId']?>) || 'data-toggle="modal" data-target="#editTask"'} data-phongban="">${buttonText}</button>
										<?php if (checkPermission("admin"))
										{
										?>
											<button type="button" class="btn btn-primary btn-reject" data-phongban="">Reject task</button>
										<?php
										}
										?>
									</div>`;
    	                }
		            },
		        ]
			});

			 dt.on( 'draw', function () {
		        // $('#dataTableExample tbody button').trigger( 'click' );
	        	$('#dataTableExample tbody').on( 'click', 'tr td.function-button', function () {
			        var tr = $(this).closest('tr');
			        var row = $('#dataTableExample').DataTable().row( tr );
					var rowData = row.data();
			        $(this).find('button').attr('data-phongban', JSON.stringify(rowData));
			    });

				$('.btn-start').click(function(e) {
					e.preventDefault();
					var tr = $(this).closest('tr');
					var row = dt.row( tr );
					var rowData = row.data();
					var params = {
						...rowData,
						status: 1
					}
					console.log(params);
					confirmModal(`Vui lòng xác nhận bắt đầu task : ${rowData.ten}`, () => startNewTask(params));
				});

				$('.btn-reject').click(function(e) {
					e.preventDefault();
					var tr = $(this).closest('tr');
					var row = dt.row( tr );
					var rowData = row.data();
					var params = {
						...rowData,
						status: 1
					}
					console.log(params);
					confirmModal(`Vui lòng xác nhận huỷ task : ${rowData.ten}`, () => rejectTask(params));
				});
		    });
		}

		function startNewTask(params) {
			$.post("<?php homePath()?>ajax/starttask.php", params, (data) => {
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

		function rejectTask(params) {
			$.post("<?php homePath()?>ajax/rejecttask.php", params, (data) => {
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
		getUserList();

		$('#reloadDataButton').click(function(e,t) {
			$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
		})

		$('#editTask').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal

			var taskInfo = (button.data('phongban')) // Extract info from data-* attributes
			var modal = $(this);
			Object.keys(taskInfo).map(item => {
				if(item !== 'password') {
					modal.find('.modal-body input[name='+item+']').val(taskInfo[item]);
					modal.find('.modal-body select[name='+item+']').val(taskInfo[item]);
					modal.find('.modal-body textarea[name='+item+']').val(taskInfo[item]);
				}
				if(item == "attachment") {
					if($(".downloadlinks").length) {
						try {
							$(".downloadlinks").html("");
							var downloadLinks = JSON.parse(taskInfo[item]);
							downloadLinks.map(item => {
								const anchor = document.createElement('a');
								anchor.href = '<?php homePath();?>' + item;
								let filename = item.split("/")[1] ? item.split("/")[1] : item;
								let arr = filename.split(".");
								anchor.innerText = limitCharacter(arr[0], 30) + "." +arr[1];
								const li = document.createElement('li');
								li.appendChild(anchor);
								$(".downloadlinks").append(li);
								// $(".downloadlinks").append(anchor);
							})
							// downloadlinks
						}catch {
							console.log("cant not parse attachment data");
						}
					}
				}
			})
			modal.find('.modal-title').text('Edit task : ' + taskInfo['ten'])
		});

		$('#editTask').on('hidden.bs.modal', function (e) {
			$.post("<?php homePath()?>ajax/resetattachment.php", {}, (data) => {
				var objDZ = Dropzone.forElement("#fileDropZone");
    			objDZ.removeAllFiles(true); 
				var objDZ = Dropzone.forElement("#createTaskFileDropZone");
    			objDZ.removeAllFiles(true); 
			});
		});

		$('#editTaskSaveButton').click(function () {
			$.post("<?php homePath()?>ajax/edittask.php",$('#editTaskForm').serialize(), (data) => {
				if(data.success) {
					Lobibox.notify("success", {
						msg: data.success
					});
				} else {
					Lobibox.notify("error", {
						msg: data.error
					});
				}
				$('#editTask').modal('hide');
			}, "json")
			.always(function() {
				$('#dataTableExample').DataTable().ajax.reload();//reload dữ liệu
			});
			return false;
		});

		$('#createTaskSaveButton').click(function () {
			$.post("<?php homePath()?>ajax/createtask.php",$('#createTaskForm').serialize(), (data) => {
				if(data.success) {
					Lobibox.notify("success", {
						msg: data.success
					});
				} else {
					Lobibox.notify("error", {
						msg: data.error
					});
				}
				$('#createTask').modal('hide');
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
			$.get("<?php homePath()?>ajax/userlist.php", {role: "user"}, (data) => {
				// console.log(data)
				// $('select[name="assign_id"]');
				$.each(data, function(key, value) {
					$('select[name="assign_id"]')
						.append($("<option></option>")
									.attr("value", value.id)
									.text(value.name));
				});
			}, "json");
		}

		$.post("<?php homePath()?>ajax/resetattachment.php", {}, (data) => {
		});
	});

</script>