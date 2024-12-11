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
('Behind the Scenes: Recording Our Latest Single', 
 'Ever wondered what goes into creating a song? Last week, we spent hours in the studio perfecting the sound of our new single, "Echoes of Midnight." From tweaking guitar riffs to experimenting with vocal harmonies, it was an incredible experience. Stay tuned—this track is dropping soon!',
 'Arbin'),
 ('Merch Drop Alert: New Designs Are Here!',
 'We just launched new merch! From limited-edition hoodies to collectible vinyl, there’s something for everyone. Check out the store before these designs sell out—they’re going fast!',
 'Arbin');

 INSERT INTO pictures(title, image_path) VALUES
 ('Concert','../../../includes/pictures/concert.jpg'),
 ('Band on Stage','../../../includes/pictures/concert_and_band.jpg'),
 ('Stage','../../../includes/pictures/stage.jpg');

 INSERT INTO song(title, duration, image_path) VALUES
 ('Crimson Dawn', '00:04:12', '../../../includes/images/Crimson_Dawn.jpg'),
 ('Through the Looking Glass', '00:05:03', '../../../includes/images/Through_the_Looking_Glass.jpg'),
 ('Eclipsed Memories', '00:03:47', '../../../includes/images/Eclipsed_Memories.jpg');