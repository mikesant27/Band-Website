SELECT 
    transaction_id, 
    users.username AS user_name, 
    products.name AS product_name,
    quantity,
    transaction_date,
    total_amount
FROM 
    transactions
JOIN 
    users ON transactions.user_id = users.id
JOIN 
    products ON transactions.product_id = products.id;
