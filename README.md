# CI_CART_APPLICATION
Cart Application using CodeIgniter, Jquery, Ajax, BootStrap
http://localhost/GitHub/CI/CartApplication/index.php/product


///////////////////////////////////////////////////////////////////////////////////

CREATE TABLE IF NOT EXISTS `ci_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `company` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ci_products`
--

INSERT INTO `ci_products` (`id`, `product_name`, `product_image`, `product_description`, `price`, `company`, `created_at`, `updated_at`) VALUES
(1, 'Camera', 'assets/product_image/camera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus aliquam purus sed egestas. Donec tristique eros id mauris sodales dictum. Mauris aliquam congue ligula sit amet gravida. Cras interdum placerat dolor iaculis volutpat. Sed convallis purus eu ultricies ultrices. Proin sit amet sagittis sem, nec blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 12000.00, 'Nikon', '2015-04-01 00:00:00', '2015-04-01 00:00:00'),
(2, 'Tab', 'assets/product_image/camera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus aliquam purus sed egestas. Donec tristique eros id mauris sodales dictum. Mauris aliquam congue ligula sit amet gravida. Cras interdum placerat dolor iaculis volutpat. Sed convallis purus eu ultricies ultrices. Proin sit amet sagittis sem, nec blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 10000.00, 'Lenevo', '2015-04-01 00:00:00', '2015-04-01 00:00:00'),
(3, 'iPad', 'assets/product_image/camera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus aliquam purus sed egestas. Donec tristique eros id mauris sodales dictum. Mauris aliquam congue ligula sit amet gravida. Cras interdum placerat dolor iaculis volutpat. Sed convallis purus eu ultricies ultrices. Proin sit amet sagittis sem, nec blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 80000.00, 'Apple', '2015-04-01 00:00:00', '2015-04-01 00:00:00'),
(4, 'Mobile', 'assets/product_image/camera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus aliquam purus sed egestas. Donec tristique eros id mauris sodales dictum. Mauris aliquam congue ligula sit amet gravida. Cras interdum placerat dolor iaculis volutpat. Sed convallis purus eu ultricies ultrices. Proin sit amet sagittis sem, nec blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 1200.00, 'Samsung', '2015-04-01 00:00:00', '2015-04-01 00:00:00'),
(5, 'Printer', 'assets/product_image/camera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus aliquam purus sed egestas. Donec tristique eros id mauris sodales dictum. Mauris aliquam congue ligula sit amet gravida. Cras interdum placerat dolor iaculis volutpat. Sed convallis purus eu ultricies ultrices. Proin sit amet sagittis sem, nec blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 1525.00, 'HP', '2015-04-01 00:00:00', '2015-04-01 00:00:00'),
(6, 'Laptop', 'assets/product_image/camera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus aliquam purus sed egestas. Donec tristique eros id mauris sodales dictum. Mauris aliquam congue ligula sit amet gravida. Cras interdum placerat dolor iaculis volutpat. Sed convallis purus eu ultricies ultrices. Proin sit amet sagittis sem, nec blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 18000.00, 'Apple', '2015-04-01 00:00:00', '2015-04-01 00:00:00'),
(7, 'Camera', 'assets/product_image/camera.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus aliquam purus sed egestas. Donec tristique eros id mauris sodales dictum. Mauris aliquam congue ligula sit amet gravida. Cras interdum placerat dolor iaculis volutpat. Sed convallis purus eu ultricies ultrices. Proin sit amet sagittis sem, nec blandit lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 120000.00, 'Nikon', '2015-04-01 00:00:00', '2015-04-01 00:00:00');
