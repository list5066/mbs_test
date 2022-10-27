<?
/*
У вас есть csv-файл с разделами и товарами интернет-магазина на 50000 строк.
Необходимо получить информацию из файла и внести информацию в базу данных  интернет-магазина 
(опционально с проверкой имеющихся позиций и обновления информации по ней).
Опишите алгоритм решения данной задачи с указанием используемых функций и классов (можно php-кодом).
*/
require "confing.php";

$connection = new PDO($dsn, $username, $password, $options);
$ob = new Importer("path/to/file.csv", $connection);
$ob->run();


class Importer
{
    public $separator = ";";
    public $lines = [];
    public $connection = null;
    public $fieldKeys = [
        "articul" => 0,
        "name" => 1,
        "quantity" => 7, 
        "price" => 6
    ];
    public function __construct($pathToFile, $connection, $separator = ";")
    {
        $this->lines = file($pathToFile);
        $this->connection = $connection;
        $this->separator = $separator;
    }

    public function run()
    {
        foreach ($this->lines as $line)
        {
            $data = explode($this->separator, $line);
            $fields = [];
            foreach ($this->fieldKeys as $field => $key)
            {
                $fields[$field] = trim($data[$key]);
            }

            $this->processOneRow($fields);
        }
    }

    public function processOneRow($fields)
    {
        $existed = [];

        $stmt = $this->connection->query("SELECT * FROM products");
        while ($row = $stmt->fetch())
        {
            $existed[$row["articul"]] = $row["id"];
        }

        $boolExists = isset($existed[$fields["articul"]]);

        if ($boolExists)
        {
            $sql = "UPDATE products SET name=?, quantity=?, price=? WHERE =?";
            $stmt= $this->connection->prepare($sql);
            $stmt->execute([$fields["name"], $fields["quantity"], $fields["price"], $existed[$fields["articul"]]]);
        }
        else
        {
            $sql = "INSERT INTO products (name, quantity, price) VALUES (?,?,?)";
            $stmt= $this->connection->prepare($sql);
            $stmt->execute([$fields["name"], $fields["quantity"], $fields["price"]]);
        }
    }
}