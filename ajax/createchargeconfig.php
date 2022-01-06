<?php
include __DIR__.'/../app/index.php';
use Models\PhongBan;
use Illuminate\Support\Collection;
validateLogin(true, false);//check account login

if(isset($_POST)){
    $input = collect($_POST)->only(['charge_title', 'region', 'img'])->toArray();

    $chargeInfo = PhongBan::where('charge_title', $input['charge_title'])
                                ->where('region', $input['region'])
                                ->first();

    
    if(!empty($chargeInfo)){
        echo(json_encode(['error' => 'Tên loại nạp đã tồn tại ']));
    } else {
        PhongBan::insert($input);
        echo(json_encode(['success' => 'Tạo thành công loại nạp mới !']));
    }
}
?>