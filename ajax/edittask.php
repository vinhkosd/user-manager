<?php
include __DIR__.'/../app/index.php';
use Models\Tasks;
use Models\Users;
use Illuminate\Support\Collection;
validateLogin(true, false);//check account login
// requirePerm("god");

if(isset($_POST)){
    $input = collect($_POST)->only(['id', 'ten', 'mo_ta', 'so_phong', 'assign_id'])->toArray();
    $input['assign_id'] = intval($input['assign_id']);

    if(!is_numeric($input['assign_id'])) {
        echo(json_encode(['error' => 'Dữ liệu không hợp lệ!']));
    }

    $phongbanInfo = Tasks::where('id', $input['id'])->first();

    // if($input['assign_id'] > 0) {//setup trưởng phòng
    //     $accountInfo = Users::where('id', $input['assign_id'])->first();

    //     if($accountInfo['role'] != "user") {
    //         echo(json_encode(['error' => 'Chỉ có thể giao việc cho nhân viên!']));
    //         die();
    //     }

    //     $phongBanOfManager = Tasks::where('assign_id', $input['assign_id'])->first();

    //     if(!empty($phongBanOfManager)){//nhân viên này đã quản lý 1 phòng ban khác -> xoá user khỏi phòng ban cũ
    //         $updateTasks = [
    //             'assign_id' => 0
    //         ];

    //         $updateUser = [
    //             'phongban_id' => $input['id']
    //         ];

    //         Tasks::where('assign_id', $input['assign_id'])->update($updateTasks);
    //         Users::where('id', $input['assign_id'])->update($updateUser);
    //     }
    // }

    // if($phongbanInfo['assign_id'] > 0 && $input['assign_id'] != $phongbanInfo['assign_id']) {//nhân viên bị tước chức trưởng phòng
    //     $accountInfo = Users::where('id', $input['assign_id'])->first();

    //     // $updateTasks = [
    //     //     'assign_id' => $input['assign_id']
    //     // ];

    //     $updateUserOld = [
    //         'phongban_id' => 0,
    //         'role' => 'user'
    //     ];

    //     // Tasks::where('id', $input['id'])->update($updateTasks);
    //     Users::where('id', $phongbanInfo['assign_id'])->update($updateUserOld);
    //     if ($input['assign_id'] > 0) {
    //         $updateUserNew = [
    //             'phongban_id' => $input['id'],
    //             'role' => 'admin'
    //         ];

    //         Users::where('id', $input['assign_id'])->update($updateUserNew);
    //     }
    // }

    if(empty($phongbanInfo)){
        echo(json_encode(['error' => 'Phòng ban không tồn tại vui lòng thử lại!']));
    } else {
        Tasks::where('id', $input['id'])->update($input);
        echo(json_encode(['success' => 'Sửa phòng ban '.$phongbanInfo['ten'].' thành công']));
    }
}
?>