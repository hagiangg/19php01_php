c�u 1:
SELECT * FROM products 
INNER JOIN categories 
ON products.categoryID = categories.categoryID 
WHERE categories.categoryName = 'Guitars' AND listPrice > 500

c�u 2:
SELECT * FROM products 
WHERE dateAdded LIKE '2014-07-%' AND listPrice > 300 
ORDER BY listPrice DESC

c�u 3:
SELECT * FROM products 
INNER JOIN categories 
ON products.categoryID = categories.categoryID 
WHERE productName LIKE '%o%' AND categories.categoryName = 'Basses' 
ORDER BY productName DESC

c�u 4:
SELECT * FROM products 
INNER JOIN orderitems ON products.productID = orderitems.productID
INNER JOIN orders ON orderitems.orderID = orders.orderID
INNER JOIN customers ON orders.customerID = customers.customerID
WHERE customers.emailAddress LIKE '%gmail'
c�u 5:
SELECT * FROM products 
WHERE listPrice > 300 AND dateAdded LIKE '2014-%-%' 
ORDER BY listPrice DESC 
LIMIT 4

c�u 6:
SELECT city, productName FROM addresses
INNER JOIN customers ON addresses.addressID = customers.shipAddressID  
INNER JOIN orders ON customers.customerID =orders.customerID  
INNER JOIN orderitems ON orders.orderID = orderitems.orderID
INNER JOIN products ON orderitems.productID = products.productID
WHERE products.productName LIKE 'Yamaha FG700S'