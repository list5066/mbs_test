<?


?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Тестовое задание</title>
        <link href="./style.css?r=<?=time()?>" rel="stylesheet">
        <script src="./script.js?r=<?=time()?>" type="text/javascript"></script>
    </head>
    <body>
        <h1>Front-End</h1>
        <h2>1)</h2>
        <blockquote>
            Внутри блока <div>  заданной ширины и высоты (200 на 300 пикселей) находится изображение <img>. 
            Необходимо сделать вертикальное и горизонтальное выравнивание картинки внутри блока <div>.
            Размеры изображения не известны. Картинка должна быть обязательно тегом <img>.
            Напишите код реализации (желательно без использования flexbox, grid, table).
        </blockquote>
        <label><input type="radio" name="radio1" class="radio1" value="1" /> image_1</label>
        <label><input type="radio" name="radio1" class="radio1" value="2" /> image_2</label>
        <label><input type="radio" name="radio1" class="radio1" value="3" checked /> image_3</label>
        <div id="image-wrapper">
            <img src="./images/image3.png"/>
        </div>
        <hr>
        
        <h2>2)</h2>
        <blockquote>
            Горизонтальное меню сайта реализовано на тегах ul>li>a. 
            Напишите код (желательно без использования flexbox, grid) равномерного выравнивание пунктов горизонтального меню по ширине (одинаковые отступы между пунктами) контейнера. Количество пунктов меню не известно.
        </blockquote>
        <nav id="menu2">
            <ul>
                <?
                $possible = explode(" ", "Напишите код (желательно без использования flexbox, grid) равномерного выравнивание пунктов горизонтального меню по ширине (одинаковые отступы между пунктами) контейнера. Количество пунктов меню не известно.");
                $possible = array_filter($possible, function ($text) { return strlen($text) > 5; });
                $from = rand(0, 3);
                $len = min(12, rand(4, count($possible)-6));
                $items = array_slice($possible, $from, $len);
                foreach ($items as $item)
                {
                    ?>
                    <li><a href=""><?=$item?></a></li>
                    <?
                }
                ?>
            </ul>
        </nav>
        <hr>
        
        <h2>3)</h2>
        <blockquote>
            Имеется двухуровневое горизонтальное меню.
            Напишите код плавного появления и исчезновения второго (выпадающего) уровня меню при наведении на пункт меню первого уровня.
        </blockquote>
        <nav id="menu3">
            <ul>
                <li><a href="">item __ 1</a>
                    <ul>
                        <li><a href="">subitem __ 1</a></li>
                        <li><a href="">subitem __ 2</a></li>
                        <li><a href="">subitem __ 3</a></li>
                    </ul>
                </li>
                <li><a href="">item __ 2</a>
                    <ul>
                        <li><a href="">subitem __ 1</a></li>
                        <li><a href="">subitem __ 2</a></li>
                        <li><a href="">subitem __ 3</a></li>
                    </ul>
                </li>
                <li><a href="">item __ 3</a>
                    <ul>
                        <li><a href="">subitem __ 1</a></li>
                        <li><a href="">subitem __ 2</a></li>
                        <li><a href="">subitem __ 3</a></li>
                    </ul>
                </li>
                <li><a href="">item __ 4</a>            
                    <ul>
                        <li><a href="">subitem __ 1</a></li>
                        <li><a href="">subitem __ 2</a></li>
                        <li><a href="">subitem __ 3</a></li>
                    </ul>
                </li>
                <li><a href="">item __ 5</a>
                    <ul>
                        <li><a href="">subitem __ 1</a></li>
                        <li><a href="">subitem __ 2</a></li>
                        <li><a href="">subitem __ 3</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <hr>
        
        <h2>4)</h2>
        <blockquote>
            Напишите код, который позволяет получить и вывести в консоль jquery-элементы с data-атрибутом id.
        </blockquote>
        <p>Вывод в консоль data-id = 342</p>
        <div id="task4">
            <div data-id="435">div data-id 435</div>
            <p data-id="342">p data-id 342</p>
            <span data-id="342">span data-id 342</span>
            <br>
            <a href="" data-id="435">a data-id 435</a>
        </div>
        <hr>
        
        <h2>5)</h2>
        <blockquote>
            Необходимо отсортировать элементы класса .class по высоте и вывести их в по убыванию высоты в родителе .parent
            Напишите код.
        </blockquote>
        <input type="button" value="Запуск" id="btn5" />
        <div id="storage5" class="parent">
            <?
            $text = "Необходимо отсортировать элементы класса .class по высоте и вывести их в по убыванию высоты в родителе .parent
            Напишите код.";
            for ($i =0; $i < 10; $i++)
            {
                $txt = mb_substr($text, 0, rand(5, mb_strlen($text)));
                ?><div class="class"><?=$txt?></div><?
            }
            ?>            
        </div>
        <hr>
        
        <h2>6)</h2>
        <blockquote>
            Необходимо скрывать элементы с data-атрибутом noprint при печати страницы. 
            Напишите код.
        </blockquote>
        <div>Элемент для печати</div>
        <div data-noprint="true">Элемент скрыть в печати</div>


        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <body>
</html>