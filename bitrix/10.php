<?
/**
 * 10) В инфоблоке новостей необходимо изменить размер изображения анонса новости под размеры контейнера (320 на 240 пикселей).
 * Напишите код.
 */
use Helpers\Iblock;
use Bitrix\Main\Loader;

Loader::includeModule("iblock");

// Вариант 1 (когда это действительно нужно физически изменить в поле)
$newWidth = 320;
$newHeight = 240;
$iblockCode = "news_ibock_code";
$iblockId = Helpers\Iblock::getIblockIdByCode($iblockCode);

$res = \CIBlockElement::GetList([], [], false, false, []);
while ($item = $res->fetch())
{
    $fileId = $item["PREVIEW_PICTURE"];
    if ($fileId)
    {
        $arFile = \CFile::GetFileArray($fileId);

        \CFile::ResizeImage(
            $arFile, // путь к изображению, сюда же будет записан уменьшенный файл
            array(
            "width" => $newWidth,  // новая ширина
            "height" => $newHeight // новая высота
            ),
            BX_RESIZE_IMAGE_EXACT // метод масштабирования. обрезать прямоугольник без учета пропорций
        );
        // сохраняем уменьшенное изображение. 
        $fileIdTmp = \CFile::SaveFile($arFile, $iblockCode);

        
        $r = \CFile::GetByID($fileIdTmp);
        $arFile = $r->Fetch();

        $el = new \CIBlockElement;
        $el->update($item["ID"], ["PREVIEW_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$arFile["SRC"]]));
        \CFile::Delete($fileIdTmp);
    }
}


// Вариант 2 (в момент вывода)
// где-то после выборки нужных элементов новостей
$file = \CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width' => $newWidth, 'height' => $newHeight), BX_RESIZE_IMAGE_PROPORTIONAL, true);
?>
<img src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>"/>

