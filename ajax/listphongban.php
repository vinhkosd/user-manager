<?php
include __DIR__.'/../app/index.php';
use Models\PhongBan;
use Carbon\Carbon;
validateLogin(true, false);//check account login
requirePerm("god");

$accountList = PhongBan::query();

$accountList->leftJoin('users', 'users.id', '=', 'phongban.manager_id');

$limit = $_GET['length'] ?? null;
$offset = $_GET['start'] ?? null;
$searchText = $_GET['search']['value'] ?? null;
$page = floor($offset/$limit) + 1;

$fromDate = !empty($_GET['fromDate']) ? Carbon::createFromFormat('d/m/Y', $_GET['fromDate'])->startOfDay()->timestamp : false;
$toDate = !empty($_GET['toDate']) ? Carbon::createFromFormat('d/m/Y', $_GET['toDate'])->endOfDay()->timestamp : false;

$columns = $_GET['columns'] ?? [];
$orderBy = !empty($_GET['order']) && !empty($_GET['order'][0]) ? $columns[$_GET['order'][0]['column']] : false;
$typeOrder = !empty($_GET['order']) && !empty($_GET['order'][0]) && !empty($_GET['order'][0]['dir']) && $_GET['order'][0]['dir'] == 'asc' ? 'asc' : 'desc';
if(!empty($searchText)) {
    $whereClause = [];
    foreach($columns as $key => $value) {
        if(isset($value['searchable']) && filter_var($value['searchable'], FILTER_VALIDATE_BOOLEAN) && !empty($value['data'])) {
            $accountList->orWhereRaw("cast(".$value['data']." as CHAR) like '%$searchText%'");
        }
    }
}

if($fromDate && $toDate) {
    $accountList->whereBetween('timestamp', [$fromDate, $toDate]);
}

if(!empty($orderBy) && !empty($orderBy['data']) && $orderBy['orderable']) {
    $columnOrder = $orderBy['data'];
    $accountList->orderBy($orderBy['data'], $typeOrder);
}

// $accountList->distinct('manager_id');

$columns = [
    'phongban.*',
    'users.name',
];

$dataReturn = getPartial($accountList, $limit, $page, $columns);
$dataReturn['draw'] = $_GET['draw'] ?? null;
$dataReturn['recordsTotal'] = $dataReturn['totalRecord'];
$dataReturn['recordsFiltered'] = $dataReturn['totalRecord'];
echo(json_encode($dataReturn));
?>