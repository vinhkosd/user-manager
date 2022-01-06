<?php
include __DIR__.'/../app/index.php';
use Models\AuctionItem;
validateLogin(true, false);//check account login

if(isset($_POST)){
    $input = collect($_POST)->only(['itemid', 'base_price', 'trade_price', 'zeny_price', 'auction', 'istemp'])->map(function ($item, $key) {
        if(empty($item))
            return null;
        return $item;
    })->toArray();

    $auctionInfo = AuctionItem::where('itemid', $input['itemid'])->first();
    
    if(empty($auctionInfo)){
        echo(json_encode(['error' => 'ItemID không tồn tại. ItemID: '.$input['itemid']]));
    } else {
        AuctionItem::where('itemid', $input['itemid'])->delete();
        echo(json_encode(['success' => 'Xoá AuctionItem thành công. ItemID: '.$input['itemid']]));
    }
}
?>