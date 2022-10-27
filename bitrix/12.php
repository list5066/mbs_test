<?
/*
12) Через импорт на сайт выгружаются товары (керамическая плитка) с ценой за упаковку (по этой цене товар идет в корзину). 
В товаре есть информация о площади товара (упаковка плитки покрывает площадь 1,8 кв.м). 
Необходимо после добавления/обновления товара автоматически пересчитывать стоимость товара за 1 кв.м, записать значение в пользовательское поле товара для дальнейшего вывода на сайте.
Напишите код (или алгоритм).
*/

// Если подразумевается импорт из 1С, то можно использовать обработчик события
$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('catalog', 'OnBeforeCatalogImport1C', ["ImportFixes", "OnBeforeCatalogImport1C"]);
$eventManager->addEventHandler('catalog', 'OnCompleteCatalogImport1C', ["ImportFixes", "OnBeforeCatalogImport1C"]);
$eventManager->addEventHandler('iblock', 'OnProductUpdate', ["ImportFixes", "OnProductUpdate"]);


class ImportFixes
{
    public static $boolImport = false;
    public static $skipOne = false;

    public static function OnBeforeCatalogImport1C($arParams, $fileName)
    {
        self::$boolImport = true;
    }

    public static function OnCompleteCatalogImport1C($arParams, $fileName)
    {
        self::$boolImport = false;
    }
    
    public static function OnProductUpdate($productId, $arFields)
    {
        if (self::$boolImport == true && self::$skipOne == false)
        {
            self::$skipOne = true;
            $price = $price; /// код получения новой цены из торгоового каталога
            $square = $square; /// код получения новой площади из торгоового каталога
            $priceTypeId = $priceTypeId; // код выбора типа цены для данной операции

            $res = \CPrice::GetList(
                array(),
                array(
                    "PRODUCT_ID" => $productId,
                    "CATALOG_GROUP_ID" => $priceTypeId
                )
            );
        
            if ($arr = $res->Fetch())
            {
                \CPrice::Update($arr["ID"], $arFields);
            }
            else
            {
                \CPrice::Add($arFields);
            }

            self::$skipOne = false;
        }
    }

}