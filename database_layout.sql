CREATE TABLE IF NOT EXISTS `authorization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` text NOT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `authorization` (`id`, `password`, `lastlogin`) VALUES
(1, 'qahuNe4afracrastUy542e95juSp55Uzaj2s5ujunuhuRanefuswab3e3RUb5Ubr', '0000-00-00 00:00:00'),
(2, 'H7rUterAst7hutrAcheDrUjem3Druhemuchufra9ak2Ph6brapHetuprejEb2eGu', '0000-00-00 00:00:00'),
(3, 'fabE5rAh9hUxAkEPRacam7pu2hUruSwacReSpa8eKa9ewaD5zAwukes6aPrABewr', '0000-00-00 00:00:00');

CREATE TABLE IF NOT EXISTS `depot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` blob NOT NULL,
  `key` text NOT NULL,
  `name` text NOT NULL,
  `value` int(11) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `depot` (`id`, `hash`, `key`, `name`, `value`, `public`, `image`) VALUES
(1, 0x0bd8e3b7ebf0c54cae9f51c7bfdf78b79cd652496c4abae2b3f16cc60a3c10b34b8b67cfb9cceb2ae152be57dcfc5acaeaf4f6890462587ee5f68908d02e821d, 'cwfgAJxN', 'Water', 15, 1, 'water.png'),
(2, 0x89e3d0abc2fbfc40c191b5c62e7dedb0462c9f449b65edbae9885434db757fa79c64bb3baf2a350f2ccc881a006ac4ef440331a6f251d79b7feafa4538cd48d3, 'uaAI4Qjj', 'Food Rations', 60, 1, 'food.png'),
(3, 0x0c819e240f095f33e600df6c4d66f4986f8a11abf84c3c528269045b67e1e0fef0fb1fd728a60bc6266adc3709af12cd7dfc8ff74108def178df2975768118ff, '4r2Dut19', 'Cardamine', 1855, 0, 'cardamine.png'),
(4, 0x3bb4ad429c4478feb4609adb25db235dc7eeb176e5131f0ec2f95ef86077b2026e09f7d1830e58491d623b372574fe7b8338397c5b6469bac46dc1c81e8c71e4, 'H183uxA9', 'H-Fuel', 73, 1, 'h-fuel.png');
