INSERT INTO products (name, price, description) VALUES
('Band Logo T-Shirt', 25.99, 'This is a test item'),
('Vinyl Album', 45.99, 'This is another test item');


INSERT INTO shows (location, show_time) VALUES
('Hartford','2024-12-01 08:00:00'),
('Philadelphia','2024-12-02 08:00:00'),
('Miami','2024-12-03 08:00:00'),
('New Orleans','2024-12-04 08:00:00'),
('Dallas','2024-12-05 08:00:00');

INSERT INTO blog (title, content, author_id) VALUES 
('Test Blog Post', 
 'This is a test blog post content. It is used to demonstrate how blog posts are displayed on the website. The content of this blog post can be as long as needed, but for testing, it will be kept relatively short.',
 1),
 ('Test Post 2',
 'This is another test post. This one is smaller.',
 1);

 INSERT INTO images(title, image_path) VALUES
 ('Test Image',
 '../../../includes/images/SoldierField.jpg');