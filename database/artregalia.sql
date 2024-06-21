-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 10:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artregalia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `apassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `apassword`) VALUES
(1, 'admin', 'admin@gmail.com', '123'),
(2, 'Hady', 'Hadyayman955@gmail.com', 'Codilar0$'),
(3, 'Hady Hossam', 'hadyhossam350@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `artisans`
--

CREATE TABLE `artisans` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_name` varchar(191) NOT NULL,
  `facebook_link` varchar(191) NOT NULL,
  `linkedin_link` varchar(191) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `password` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`id`, `name`, `brand_name`, `facebook_link`, `linkedin_link`, `email`, `image`, `phone`, `password`, `status`, `admin_id`) VALUES
(1, 'Mohamed Salem', 'Macramé Elegance', 'https://facebook.com/mohamed', 'https://linkedin.com/in/mohamed', 'mohamed@gmail.com', '1718905172-1718895877-42d9f5b9-917d-49d2-9178-1e5bf338ee0a.jpg', '1234567890', 123456789, 1, 1),
(2, 'Heba Naguib', 'Beaded Chic', 'https://facebook.com/heba', 'https://linkedin.com/in/heba', 'heba@gmail.com', '1718905184-1718896037-attachment_151036158.png', '2345678901', 123456789, 1, 1),
(3, 'Ahmed El-Sayed', 'LeatherCraft', 'https://facebook.com/ahmed', 'https://linkedin.com/in/ahmed', 'ahmed_elsayed@gmail.com', '1718905441-1718896167-download.png', '3456789012', 123456789, 1, 1),
(4, 'Nourhan Fawzy', 'Chic Creations', 'https://facebook.com/nourhan', 'https://linkedin.com/in/nourhan', 'nourhan@gmail.com', '1718905496-1718896284-download (1).png', '4567890123', 123456789, 1, 1),
(5, 'Khaled Shoukry', 'HomeArt', 'https://facebook.com/khaled', 'https://linkedin.com/in/khaled', 'khaled@gmail.com', '1718905513-1718895235-curved-seagrass-baskets-q.jpg', '5678901234', 123456789, 1, 1),
(6, 'Yasmin Saeed', 'Textile Art', 'https://facebook.com/yasmin', 'https://linkedin.com/in/yasmin', 'yasmin@gmail.com', '1718905530-1718896579-textile.jfif', '6789012345', 123456789, 1, 1),
(7, 'Tamer Fouad', 'PotteryPro', 'https://facebook.com/tamer', 'https://linkedin.com/in/tamer', 'tamer@gmail.com', '1718905551-1718896518-pottery.jfif', '7890123456', 123456789, 1, 1),
(8, 'Mona Gamal', 'Woodcraft', 'https://facebook.com/mona', 'https://linkedin.com/in/mona', 'mona@gmail.com', '1718905574-1718894953-s-l960 (1).webp', '8901234567', 123456789, 1, 1),
(9, 'Hassan Kamel', 'UrbanArt', 'https://facebook.com/hassan', 'https://linkedin.com/in/hassan', 'hassan@gmail.com', '1718905584-1718896767-painting.png', '9012345678', 123456789, 1, 1),
(10, 'Layla Hamed', 'DigitalArt', 'https://facebook.com/layla', 'https://linkedin.com/in/layla', 'layla@gmail.com', '1718905598-1718896877-wood.png', '0123456789', 123456789, 1, 1),
(11, 'Moataz Ragab', 'Handcrafted Elegance', 'https://facebook.com/moataz', 'https://linkedin.com/moataz', 'moataz@gmail.com', '1718905613-1718896938-bracelet.jfif', '54687924581', 123456789, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Macramé Bags'),
(2, 'Beaded Bags'),
(3, 'Leather Bags'),
(4, 'Canvas Bags'),
(5, 'Macramé Bracelets'),
(6, 'Beaded Bracelets'),
(7, 'Leather Bracelets'),
(8, 'Metal Bracelets'),
(9, 'Charm Bracelets'),
(10, 'Woven Bracelets'),
(11, 'Textiles'),
(12, 'Pottery'),
(13, 'Woodcraft'),
(14, 'Basketry'),
(15, 'Lighting'),
(16, 'Paintings'),
(17, 'Street Art'),
(18, 'Digital Art'),
(19, 'Portrait Artists'),
(20, 'Wood Artists'),
(21, 'Muralists');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `recommend` varchar(191) NOT NULL,
  `share_feedback` varchar(191) NOT NULL,
  `rate` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `order_id`, `name`, `phone`, `email`, `recommend`, `share_feedback`, `rate`, `message`) VALUES
(1, 1, 1, 'hady ayman', '', 'hadyayman955@gmail.com', 'Yes', 'Yes', 1, 'hjfghdyihjhfyy'),
(2, 1, 1, 'israa belgik', '', 'salma@gmail.com', 'Yes', 'Yes', 3, ':\'\r\nlplp[k');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notes` varchar(191) NOT NULL,
  `statues` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `additional_info` varchar(50) DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` int(191) NOT NULL,
  `promo_code` int(191) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `visa` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `notes`, `statues`, `address`, `additional_info`, `phone`, `created_at`, `total_price`, `promo_code`, `admin_id`, `visa`) VALUES
(1, 1, '', 'accepted', '24 ezzat salama', '', '978965563453453', '2024-06-20 04:14:23', 410, 0, 1, '$2y$10$utFAc/Q0Kl8r7K5GPXwtouCwU/lI/Eu7M4/.J3D/DLpCg63JpFedS'),
(2, 1, '', 'in_cart', '', NULL, '', '2024-06-20 09:41:04', 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `o_details_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(191) NOT NULL,
  `additional_information` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`o_details_id`, `product_id`, `order_id`, `quantity`, `additional_information`) VALUES
(1, 1, 1, 1, NULL),
(2, 1, 2, 1, NULL),
(3, 2, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `artisan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `image`, `admin_id`, `artisan_id`, `created_at`) VALUES
(1, 'New Boho Macramé Clutch Bag', 'Introducing our new Boho Macramé Clutch Bag, handcrafted with natural cotton fibers. Perfect for your daily essentials.', '1718893216-Beach-Boho-Macrame-Clutch-Bag-Montipi-5292.jpg', 0, 1, '2024-06-20 11:20:16'),
(2, 'Stylish Macramé Shoulder Bag', 'Check out our stylish macramé shoulder bag featuring intricate knot designs. Ideal for casual outings.', '1718893234-01_59020515_2.jpg', 0, 1, '2024-06-20 11:20:34'),
(3, 'Crafted Leather Bracelets', 'Discover our crafted leather bracelets, handmade with premium quality leather. Perfect for any occasion.', '1718893543-product_2981_1_730.jpeg', 0, 3, '2024-06-20 11:25:43'),
(4, 'Charming Beads Bracelets', 'Our charming beads bracelets are designed with intricate beadwork. Adds a touch of elegance to your style.', '1718893966-mattenaturalagategoldspacers10mm-2__75456.jpg', 0, 3, '2024-06-20 11:32:46'),
(5, 'Woven Wonder Bracelets', 'Experience the artistry of our woven wonder bracelets. Handcrafted with care and attention to detail.', '1718894013-eedb1998f5f0ad6ce2ab79c3fdbaa391.jpg', 0, 3, '2024-06-20 11:33:33'),
(6, 'Textile Art Decor', 'Enhance your home with our textile art decor. Beautifully crafted to add a touch of elegance to any space.', '1718894161-e9f8455ea3573c151c8a37bb2f62327a.jpg', 0, 6, '2024-06-20 11:36:01'),
(7, 'Pottery Perfection', 'Our pottery perfection pieces are handmade with exquisite detail. Perfect for adding a unique touch to your home.', '1718894194-il_794xN.5538451231_abrm.webp', 0, 7, '2024-06-20 11:36:34'),
(8, 'Woodcraft Wonders', 'Discover the beauty of our woodcraft wonders. Handcrafted wood decor to enhance any room in your home.', '1718894259-il_794xN.1928598856_6jes.webp', 0, 8, '2024-06-20 11:37:39'),
(9, 'Urban Street Art', 'Explore our urban street art collection. Bold and vibrant pieces to add an artistic flair to your space.', '1718894311-room45.jpg', 0, 9, '2024-06-20 11:38:31'),
(10, 'Digital Dreams Art', 'Immerse yourself in our digital dreams art. Innovative and modern pieces to inspire and captivate.', '1718894332-do-professional-digital-painting-portrait.jpg', 0, 10, '2024-06-20 11:38:52'),
(11, 'New Boho Macramé Clutch Bag', 'Introducing our new Boho Macramé Clutch Bag, handcrafted with natural cotton fibers. Perfect for your daily essentials.', '1718894387-Beach-Boho-Macrame-Clutch-Bag-Montipi-5292.jpg', 0, NULL, '2024-06-20 11:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `artisan_id` int(11) DEFAULT NULL,
  `category_id` int(255) NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `descreption` text NOT NULL,
  `price` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `artisan_id`, `category_id`, `name`, `image`, `descreption`, `price`) VALUES
(1, 1, 1, 'Macramé Tote Bag', '1718812818-tian-design-handcraft-macrame-tote-bag.webp', 'Handcrafted macramé tote bag made from natural cotton fibers. This spacious tote features intricate knot designs and is perfect for carrying your essentials in style.', 600),
(2, 1, 1, 'Macramé Shoulder Bag', '1718813204-01_59020515_2.jpg', 'Stylish macramé shoulder bag featuring intricate knot designs. This versatile bag adds a bohemian touch to any outfit and is ideal for daily use or outings with friends.', 600),
(3, 1, 1, 'Boho Macramé Clutch', '1718813717-Beach-Boho-Macrame-Clutch-Bag-Montipi-5292.jpg', 'Bohemian-inspired macramé clutch perfect for evenings out or casual outings. This chic clutch adds texture and flair to your look and is spacious enough to hold your essentials while on the go.', 500),
(4, 1, 5, 'Boho Macramé Bracelet', '1718814139-product-image-1488212350_800x.webp', 'Embrace bohemian style with this intricately woven macramé bracelet. Handcrafted with precision, this bracelet features a combination of knots and beads for a unique and eye-catching look.\r\n', 200),
(5, 1, 5, 'Minimalist Macramé Cuff', '1718815035-im-Simple-micro-macrame-bracelet-with-Linhasita-yarn-and-pearls-integration.jpg', 'Elevate your wrist with this minimalist macramé cuff. Crafted with simplicity in mind, this bracelet adds a touch of elegance to any ensemble, whether worn alone or stacked with other bracelets.\r\n', 150),
(6, 2, 6, 'Colorful Beaded Macramé Bracelet', '1718815697-macrame-glass-seed-bead-adjustable-bracelet-559724.png', 'Add a pop of color to your wrist with this vibrant beaded macramé bracelet. Featuring a mix of colorful beads woven into intricate macramé patterns, this bracelet is a fun and playful accessory for any occasion.', 200),
(7, 2, 6, 'Natural Stone Beaded Bracelet', '1718816087-mattenaturalagategoldspacers10mm-2__75456.jpg', 'Crafted with natural stone beads, this beaded bracelet exudes earthy elegance. Each stone is unique, offering a one-of-a-kind look that adds a touch of nature-inspired beauty to your wrist.\r\n\r\n', 250),
(8, 2, 6, 'Minimalist Beaded Bracelet Set', '1718816387-fa610edce611f01bc4882f026c38cc5d.jpg', 'This set of minimalist beaded bracelets features simple yet stylish designs, perfect for everyday wear. Mix and match these versatile bracelets to create your own unique stack or wear them individually for a subtle accent.', 350),
(9, 2, 2, 'Beaded Tote Bag', '1718816666-2cc400a39840616ecb207cfbf9626815.jpg', ' Exquisite beaded tote bag adorned with intricate beadwork. This elegant tote is perfect for adding a touch of sophistication to your everyday look while providing ample space for your essentials.\r\n\r\n', 1100),
(10, 2, 2, 'Beaded Clutch Purse', '1718816944-1000534334_dbcb81b5-58bb-4c1c-894e-c143c040feb9-3X.webp', 'Stunning beaded clutch purse featuring a mesmerizing bead pattern. This versatile clutch adds a pop of color and sparkle to your outfit, making it perfect for special occasions or evenings out.', 1300),
(11, 2, 2, 'Beaded Crossbody Bag', '1718817564-8376921_1669676.jpg', 'Chic beaded crossbody bag with a stylish and functional design. This trendy bag is embellished with colorful beads and offers hands-free convenience, making it ideal for busy days or nights on the town.', 900),
(12, 3, 3, 'Classic Leather Tote', '1718834125-cognac-classic-tote-portland-leather-14.webp', 'Timeless and sophisticated, this classic leather tote is crafted from premium quality leather. With its spacious interior and durable construction, it\'s perfect for daily use or as a travel companion.', 2500),
(13, 3, 3, 'Leather Crossbody Bag', '1718906785-WhatsApp Image 2024-06-20 at 20.56.24_8ce6c4d1.jpg', 'Sleek and versatile, this leather crossbody bag is designed for on-the-go lifestyles. Its adjustable strap allows for comfortable wear, while multiple compartments provide ample storage for your essentials.', 2000),
(14, 3, 3, 'Vintage Leather Satchel', '1718906803-WhatsApp Image 2024-06-20 at 20.56.23_9e044f9a.jpg', 'Embrace retro style with this vintage leather satchel. Handcrafted from supple leather, it features antique hardware and a distressed finish for a unique and timeless look.', 3500),
(15, 3, 3, 'Vintage Leather Satchel', '1718906814-WhatsApp Image 2024-06-20 at 21.01.08_b3d746e2.jpg', 'Men Leather Satchel Bag, Messenger Bag for Men, Laptop Bag for School and Business Computer Bag, Vintage Leather Briefcase Handmade', 3000),
(16, 3, 7, 'Engraved Leather Cuff', '1718835642-product_2981_model_1_730.jpeg', 'This leather cuff bracelet features a sleek and modern design with an engraved pattern. Made from durable leather, it provides a comfortable fit and a bold statement piece for any outfit.', 400),
(17, 3, 7, 'Braided Leather Bracelet', '1718835734-s-l140 (2).webp', 'This braided leather bracelet is handmade with high-quality genuine leather. The intricate braiding adds a touch of elegance and sophistication, making it perfect for both casual and formal occasions.', 300),
(18, 4, 4, 'Canvas Tote Bag', '1718839910-PXL_20221116_055210103_1024x1024.webp', 'Durable and eco-friendly canvas tote bag, perfect for shopping or daily use. This spacious tote features reinforced handles and a simple, minimalist design, making it a versatile addition to your wardrobe.', 400),
(19, 4, 4, 'Canvas Messenger Bag', '1718838741-1036_LD_FKH_LO_02_1800x1800.webp', 'Stylish and functional canvas messenger bag with multiple compartments. Ideal for work, school, or travel, this bag combines practicality with a modern look, featuring an adjustable shoulder strap for comfortable carrying.', 2000),
(20, 4, 4, 'Canvas Backpack', '1718839973--473Wx593H-460022657-brown-OUTFIT2.avif', 'Trendy canvas backpack with a vintage feel. This backpack is perfect for students or adventurers, offering ample storage space, sturdy construction, and comfortable straps for easy carrying.\r\n', 1800),
(21, 4, 4, 'Printed Canvas Bag', '1718839066-1.jpg', 'Eye-catching printed canvas bag featuring unique designs and vibrant colors. This bag is not only practical but also adds a pop of personality to your outfit, making it a perfect accessory for casual outings.', 600),
(22, 4, 8, 'Elegant Metal Bangle', '1718839193-download.jfif', 'This elegant metal bangle features a sleek and modern design, perfect for adding a touch of sophistication to any outfit. Crafted from high-quality stainless steel, it offers durability and a timeless look.', 800),
(23, 4, 8, 'Intricate Metal Cuff', '1718839799-6f126a2d620c089e26f503157a525e9f.jpg', 'The intricate metal cuff bracelet showcases exquisite craftsmanship with detailed patterns and a polished finish. It\'s a statement piece that can elevate both casual and formal attire.', 1000),
(24, 4, 8, 'Geometric Metal Bracelet', '1718839620-images.jfif', 'This geometric metal bracelet features clean lines and modern shapes, creating a contemporary accessory that stands out. Made from high-quality metal, it combines style and durability for a chic addition to your jewelry collection.', 1050),
(25, 11, 9, 'Vintage Charm Bracelet', '1718840907-bracelet-gold-charm-middle-east-1000px.jpg', 'A beautifully crafted charm bracelet featuring a mix of vintage-inspired charms. Each charm tells a unique story, making this bracelet a timeless accessory for any outfit.', 4000),
(26, 11, 9, 'Boho Charm Bracelet', '1718840650-il_794xN.2338363252_oekm.webp', 'Embrace your free spirit with this boho charm bracelet. Adorned with colorful beads and eclectic charms, this bracelet is perfect for adding a touch of bohemian flair to your style.', 800),
(27, 11, 9, 'Nature Charm Bracelet', '1718841057-nature-jewelry_46473b9d-bc4e-4e6d-bba1-3fad9cb12020_470x.webp', 'Celebrate the beauty of nature with this charm bracelet. Featuring charms inspired by leaves, flowers, and animals, this bracelet brings a touch of the outdoors to your wrist.\r\n', 900),
(28, 11, 10, 'Friendship Woven Bracelet', '1718841411-s-l960.webp', 'Classic friendship bracelet with a modern twist, woven with vibrant threads in geometric patterns. A perfect gift for a friend or to wear as a symbol of your own unique style.', 150),
(29, 11, 10, 'Ethnic Woven Bracelet', '1718841577-eedb1998f5f0ad6ce2ab79c3fdbaa391.jpg', 'Handcrafted ethnic woven bracelet featuring bold patterns and rich colors inspired by traditional designs. This bracelet is a statement piece that adds cultural flair to your look.', 90),
(30, 11, 10, 'Minimalist Woven Bracelet', '1718841742-393536004_max.jpg', 'Sleek and simple woven bracelet designed for minimalist style enthusiasts. This bracelet features a subtle pattern and neutral colors, making it versatile for everyday wear.', 130),
(31, 5, 14, 'Handwoven Storage Basket', '1718842374-00337aac479fbc636bb0c0b0dcba8967841d4588.jpg', 'Beautiful handwoven storage basket made from natural materials. This versatile basket is perfect for organizing and storing household items, adding a rustic touch to your home decor.', 550),
(32, 5, 14, 'Decorative Wicker Basket', '1718842722-GUEST_fcf7c95e-2d40-4584-9ef8-af43d997a906.webp', 'This decorative wicker basket features intricate weaving patterns and sturdy handles. Ideal for both storage and decoration, it adds a charming and natural element to any room.', 1200),
(33, 5, 14, 'Picnic Basket with Lid', '1718842969-2.jpg', 'Classic picnic basket with a secure lid, woven from durable materials. Perfect for outdoor gatherings, this basket provides ample space for your picnic essentials while adding a touch of elegance to your outings.', 1200),
(34, 5, 15, 'Rustic Wooden Lantern', '1718843326-il_794xN.1691084083_o1mt.jpg', 'This rustic wooden lantern brings a touch of vintage charm to your decor. Crafted from reclaimed wood, it features a glass enclosure to protect the candle or light inside, making it perfect for indoor or outdoor use.', 1700),
(35, 5, 15, 'Modern Geometric Pendant Light', '1718843540-Geometric-Wooden-Pendant-Light-Solid-Wood-Hanging-Lamp-Livingroom-Kitchen-Store-Decor-arclightsdesign-9263.webp', 'Sleek and stylish, this modern geometric pendant light is a statement piece for any contemporary space. The metal frame creates unique patterns of light and shadow, making it a perfect addition to your dining area or living room.\r\n\r\n', 1300),
(36, 5, 15, 'Handcrafted Bamboo Lamp', '1718843666-617B+2kpEYL._AC_SX342_SY445_.jpg', 'This handcrafted bamboo lamp exudes a natural and eco-friendly vibe. The bamboo strips are meticulously woven to create a beautiful lampshade that casts a warm, diffused light, ideal for creating a cozy atmosphere.', 2500),
(37, 5, 16, 'Abstract Expressionism', '1718845790-290_1512385526VZv3o.jpg', 'A dynamic and vibrant abstract painting that explores the interplay of colors and shapes. This piece is a bold statement that adds a modern and sophisticated touch to any room.', 1700),
(38, 5, 16, 'Floral Bliss', '1718845947-fposter,small,wall_texture,product,750x1000.webp', 'An exquisite painting of blooming flowers that brings the beauty of nature indoors. The intricate details and rich colors make this artwork a focal point in any decor.', 1800),
(39, 5, 16, 'Urban Landscape', '1718847680-Urban-Landscape-Hansen-Hans-oil-painting-1.webp', ' A striking painting of an urban landscape that captures the essence of city life. The detailed portrayal of buildings and streets creates a captivating scene that draws viewers in.', 2000),
(40, 6, 11, 'Handwoven Throw Blanket', '1718849829-il_794xN.3758942480_ag0d.webp', 'Cozy up with this luxurious handwoven throw blanket. Made from soft, natural fibers, this blanket adds warmth and texture to any living space. Perfect for draping over a sofa or cuddling up with on chilly nights.\r\n', 800),
(41, 6, 11, 'Embroidered Pillow Covers', '1718850046-SpringtimeCushionCase_6.webp', 'Add a touch of elegance to your home with these beautifully embroidered pillow covers. Featuring intricate designs and vibrant colors, these covers instantly elevate your decor. Mix and match them to create a custom look for your living room or bedroom.', 600),
(42, 6, 11, 'Hand-Dyed Table Runner', '1718850361-e9f8455ea3573c151c8a37bb2f62327a.jpg', 'Enhance your dining experience with this unique hand-dyed table runner. Crafted from high-quality textiles, this runner adds a pop of color to your table setting. Whether you\'re hosting a dinner party or enjoying a quiet meal at home, this runner is sure to impress.', 1300),
(43, 7, 12, 'Handcrafted Ceramic Vase', '1718850543-3OakProduct180_2000x.webp', 'This elegant handcrafted ceramic vase adds a touch of sophistication to any space. Its sleek design and smooth finish make it a perfect centerpiece for your living room or dining area.', 1800),
(44, 7, 12, 'Artisanal Stoneware Bowl Set', '1718850943-il_794xN.5538451231_abrm.webp', 'Serve your favorite dishes in style with this set of artisanal stoneware bowls. Each bowl is individually crafted with care, showcasing unique glazes and textures that add character to your table.', 1150),
(45, 7, 12, 'Decorative Clay Figurine', '1718851135-s-l640.jpg', 'Add a whimsical touch to your home decor with this decorative clay figurine. Handmade by skilled artisans, this charming piece features intricate details and earthy tones that complement any aesthetic.', 1600),
(46, 8, 13, 'Handcrafted Wooden Bowl', '1718851442-il_794xN.1928598856_6jes.webp', 'This exquisite handcrafted wooden bowl adds a touch of rustic charm to your kitchen or dining table. Made from high-quality hardwood, each bowl is unique in grain and texture, making it a stunning centerpiece for serving salads, fruits, or snacks.', 2000),
(47, 8, 13, 'Wooden Coasters Set', '1718851584-il_794xN.2214458662_haok.webp', 'Protect your furniture in style with this set of wooden coasters. Crafted from sustainably sourced wood, these coasters feature a smooth finish and intricate wood grain patterns. Each set includes four coasters, perfect for entertaining guests or enjoying a quiet evening at home.', 950),
(48, 8, 13, 'Hand-carved Wooden Serving Tray', '1718851851-il_794xN.3373999227_sxgp.jpg', 'Elevate your hosting game with this hand-carved wooden serving tray. Crafted by skilled artisans, this tray showcases intricate floral motifs and smooth, rounded edges. Whether you\'re serving breakfast in bed or appetizers at a dinner party, this elegant tray adds a touch of sophistication to any occasion.', 1400),
(50, 9, 17, 'Street Art Mural Print', '1718910454-WhatsApp Image 2024-06-20 at 21.33.06_367cf434.jpg', 'High-quality print of an original street art mural. This artwork showcases the raw energy and creativity of street artists, making it a perfect addition to modern interiors.', 4000),
(51, 9, 17, 'Spray Paint Art Piece', '1718907057-WhatsApp Image 2024-06-20 at 21.09.10_433b6d04.jpg', 'Original spray paint art piece on canvas, capturing the essence of spontaneous creativity. This artwork is a testament to the bold and expressive nature of street art.', 3200),
(52, 9, 18, 'Geometric Digital Art', '1718910319-WhatsApp Image 2024-06-20 at 21.18.04_163a8732.jpg', 'A captivating piece of geometric digital art featuring bold shapes and contrasting colors. This artwork is perfect for contemporary interiors and adds a modern touch to your decor.', 2500),
(53, 9, 18, 'Digital Portrait', '1718910332-WhatsApp Image 2024-06-20 at 21.19.10_c1c52fe1.jpg', 'A beautifully crafted digital portrait that captures the essence and personality of the subject. This personalized artwork makes an excellent gift or a cherished keepsake.', 3000),
(54, 9, 21, 'Abstract Wall Mural', '1718910381-WhatsApp Image 2024-06-20 at 21.21.00_0ddb2ec9.jpg', 'A vibrant and dynamic abstract wall mural that brings energy and creativity to any space. This mural features bold colors and intricate patterns that create a stunning visual impact.', 3800),
(55, 9, 21, 'Fantasy Landscape Mural', '1718910393-WhatsApp Image 2024-06-20 at 21.21.45_5b0016f5.jpg', 'A whimsical and enchanting fantasy landscape mural that sparks imagination and creativity. Perfect for children\'s rooms, creative studios, or anyone who loves a touch of magic.', 3700),
(56, 10, 19, 'Personalized Family Portrait', '1718910539-WhatsApp Image 2024-06-20 at 21.36.07_55963803.jpg', 'dimensions: 8 x 10.\r\nA custom family portrait hand-drawn with attention to detail. This personalized piece captures the unique characteristics and personalities of each family member, making it a cherished keepsake for years to come.', 1500),
(57, 10, 19, 'Pet portrait', '1718910550-WhatsApp Image 2024-06-20 at 21.40.04_15d5f62c.jpg', 'Dimensions: 8 x 10.\r\nHand-painted portraits of your beloved pets. These detailed and lifelike renderings celebrate the special bond you share with your furry friends, making them a perfect gift for any pet lover.', 900),
(58, 10, 20, 'Handcrafted Wooden Sculpture', '1718910562-WhatsApp Image 2024-06-20 at 21.40.54_6ab0e5af.jpg', 'Exquisite handcrafted wooden sculpture made from high-quality oak. This intricate piece captures the natural beauty of the wood, showcasing detailed craftsmanship and artistic expression. Perfect as a statement piece for your home or office.', 2000),
(59, 10, 20, 'Custom Wooden Furniture', '1718910578-WhatsApp Image 2024-06-20 at 21.41.27_39fdadf0.jpg', 'Custom-made wooden furniture piece designed to fit your space perfectly. Crafted from premium walnut wood, this furniture combines functionality with artistic design, offering both elegance and practicality for your home', 4000),
(60, 10, 21, 'Nature-Inspired Wall Mural', '1718910591-WhatsApp Image 2024-06-20 at 21.55.56_ebd1eedc.jpg', 'A serene and calming nature-inspired wall mural depicting lush landscapes and tranquil scenes. Perfect for creating a peaceful atmosphere in your home or office.', 2750),
(61, 10, 18, 'Abstract Digital Painting', '1718910525-WhatsApp Image 2024-06-20 at 21.35.05_efc7302d.jpg', 'A stunning abstract digital painting that blends vibrant colors and dynamic shapes to create a mesmerizing visual experience. Perfect for modern home decor or as a unique statement piece.', 2300),
(62, 10, 17, 'Urban Graffiti Canvas', '1718910511-WhatsApp Image 2024-06-20 at 21.34.05_cd48235b.jpg', 'Vibrant urban graffiti canvas featuring a dynamic mix of colors and patterns. This piece captures the essence of street culture and adds a bold statement to any space.', 3200),
(63, 9, 19, 'Watercolor Portraits', '1718910353-WhatsApp Image 2024-06-20 at 21.19.48_32f05813.jpg', 'Delicate and vibrant watercolor portraits that bring your loved ones to life on paper. These unique pieces use flowing colors and soft brushstrokes to capture the essence and emotion of the subject.', 3200),
(64, 9, 20, 'Artisan Wooden Wall Art', '1718910368-WhatsApp Image 2024-06-20 at 21.20.27_627aab39.jpg', 'Unique wooden wall art crafted from reclaimed wood pieces. This stunning artwork combines various wood textures and colors to create a captivating visual display. Perfect for adding warmth and character to any room.', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artisan_id` int(11) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `price` int(191) DEFAULT NULL,
  `artisan_status` varchar(191) NOT NULL,
  `user_status` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `artisan_id`, `name`, `description`, `image`, `price`, `artisan_status`, `user_status`) VALUES
(1, 1, 1, '123', '123', '1718799688-bag.jpg', 120, 'accepted', 'pending'),
(2, 1, 1, '123', '1234', '1718803244-bags.jpg', 350, 'pending', 'pending'),
(3, 1, NULL, 'asd', 'asd', '1718803651-craftart.jpg', NULL, 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `phone`, `username`, `password`) VALUES
(1, 'Ahmed Hassan', 'ahmed@gmail.com', 'male', '1234567890', 'ahmed_hassan', '123456789'),
(2, 'Fatima Mohamed', 'fatima@gmail.com', 'female', '2345678901', 'fatima_mohamed', '123456789'),
(3, 'Omar Ali', 'omar@gmail.com', 'male', '3456789012', 'omar_ali', '123456789'),
(4, 'Aisha Ibrahim', 'aisha@gmail.com', 'female', '4567890123', 'aisha_ibrahim', '123456789'),
(5, 'Youssef Mahmoud', 'youssef@gmail.com', 'male', '5678901234', 'youssef_mahmoud', '123456789'),
(6, 'Sara Mostafa', 'sara@gmail.com', 'female', '6789012345', 'sara_mostafa', '123456789'),
(7, 'Khaled Amr', 'khaled@gmail.com', 'male', '7890123456', 'khaled_amr', '123456789'),
(8, 'Mona Tarek', 'mona@gmail.com', 'female', '8901234567', 'mona_tarek', '123456789'),
(9, 'Hussein Salah', 'hussein@gmail.com', 'male', '9012345678', 'hussein_salah', '123456789'),
(10, 'Nadia Samir', 'nadia@gmail.com', 'female', '0123456789', 'nadia_samir', '123456789'),
(11, 'Ali Kamal', 'ali@gmail.com', 'male', '1123456789', 'ali_kamal', '123456789'),
(12, 'Layla Adel', 'layla@gmail.com', 'female', '2234567890', 'layla_adel', '123456789'),
(13, 'Amir Fathy', 'amir@gmail.com', 'male', '3345678901', 'amir_fathy', '123456789'),
(14, 'Hana Wael', 'hana@gmail.com', 'female', '4456789012', 'hana_wael', '123456789'),
(15, 'Karim Yassin', 'karim@gmail.com', 'male', '5567890123', 'karim_yassin', '123456789'),
(16, 'Dina Nasser', 'dina@gmail.com', 'female', '6678901234', 'dina_nasser', '123456789'),
(17, 'Rami Ashraf', 'rami@gmail.com', 'male', '7789012345', 'rami_ashraf', '123456789'),
(18, 'Salma Reda', 'salma@gmail.com', 'female', '8890123456', 'salma_reda', '123456789'),
(19, 'Tamer Ehab', 'tamer@gmail.com', 'male', '9901234567', 'tamer_ehab', '123456789'),
(20, 'Yasmin Osama', 'yasmin@gmail.com', 'female', '1012345678', 'yasmin_osama', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artisans`
--
ALTER TABLE `artisans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`o_details_id`),
  ADD KEY `waste_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `o_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
