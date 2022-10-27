/*
9)  В базе данных есть:
 таблица категорий товаров category (id, name) , 
 таблица товаров product (id,category_id,name,price),
 таблица свойств property (id,name) 
 таблица значений свойств товаров property_value (product_id,property_id,value)
Необходимо: 			
1)получить значения свойств товара, если известно его id;

*/
SELECT t.name, pv.value 
FROM property_value pv 
JOIN product p ON p.id = pv.product_id
JOIN property t ON t.id = pv.property_id
WHERE p.id = '11'

/*
2)получить список названий уникальных свойств товара по названию категории (свойство должно быть только у 1 товара в категории). 
Напишите запросы.
*/

select property_id, count(*) cnt from property_value pv 
join product p on p.id = pv.product_id
join category c on c.id = p.category_id
where c.name like 'название'
group by property_id 
having cnt = 1