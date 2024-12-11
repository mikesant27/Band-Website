INSERT INTO products (name, price, description) VALUES
('Band Logo T-Shirt', 25.99, 'Soft and comfortable band-themed t-shirts featuring eye-catching designs and the band logo—perfect for any fan’s wardrobe'),
('Band Logo Hoodie', 49.99, 'Cozy and stylish hoodies to keep you warm while repping your favorite band. Available in a variety of colors and sizes.'),
('Poster', 9.99, '18"x24" High-quality posters showcasing unique artwork, album covers, or tour dates to decorate your space in style.'),
('Stickers (Set of 5)', 4.99, 'Fun and vibrant sticker sets featuring iconic designs, perfect for laptops, water bottles, or any surface needing a personal touch.'),
('Signed Setlist', 14.99, 'A unique collectible—a printed setlist from a recent concert, signed by the band members themselves.'),
('CD Album', 14.99, 'Compact and portable, these CD albums include all the hits and come with a booklet of lyrics and photos'),
('Vinyl Album', 45.99, 'A collector’s must-have! Premium vinyl records of the band’s latest or classic albums with exclusive cover art.');


INSERT INTO shows (location, show_time) VALUES
('Hartford','2024-12-01 08:00:00'),
('Philadelphia','2024-12-02 08:00:00'),
('Miami','2024-12-03 08:00:00'),
('New Orleans','2024-12-04 08:00:00'),
('Dallas','2024-12-05 08:00:00');

INSERT INTO blog (title, content, creator) VALUES 
('Test Blog Post', 
 'This is a test blog post content. It is used to demonstrate how blog posts are displayed on the website. The content of this blog post can be as long as needed, but for testing, it will be kept relatively short.',
 'Arbin'),
 ('Test Post 2',
 'This is another test post. This one is smaller.',
 'Arbin');

 INSERT INTO pictures(title, image_path) VALUES
 ('Test Picture', 
 '../../../includes/pictures/Sasuke.jpg');

 INSERT INTO song(title, duration, image_path) VALUES
 ('First', '00:02:25', '../../../includes/images/SoldierField.jpg');