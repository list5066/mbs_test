<?
/*
11) Необходимо получить все цены товара по его ID.
Напишите код (или алгоритм).
*/

use Bitrix\Main\Loader;
Loader::includeModule("catalog");

$res = \Bitrix\Catalog\PriceTable::getList([
  "filter" => ["PRODUCT_ID" => 7473]
]);
$arr = $res->fetchAll();

print_r($arr);