<?php
include __DIR__.'/../app/index.php';
use Models\PhongBan;
use Illuminate\Support\Collection;
validateLogin(true, false);//check account login

if(isset($_POST)){
    $input = collect($_POST)->only(['id', 'charge_title', 'component_config', 'list_component', 'region'])->toArray();

    $chargeInfo = PhongBan::where('id', $input['id'])->first();

    
    if(!empty($chargeInfo)){
        PhongBan::where('id', $input['id'])->update($input);
        echo(json_encode(['success' => 'Sửa loại nạp thành công']));
    } else {
        
        echo(json_encode(['error' => 'Không tìm thấy loại nạp !']));
    }
}
?>