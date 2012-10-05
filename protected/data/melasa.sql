-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 05 Paź 2012, 16:27
-- Wersja serwera: 5.5.24-log
-- Wersja PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Baza danych: `melasa`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `asa`
--

CREATE TABLE IF NOT EXISTS `asa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `week` int(2) NOT NULL,
  `hours` int(1) NOT NULL,
  `from` int(2) NOT NULL,
  `project` int(10) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project` (`project`),
  KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `asa`
--

INSERT INTO `asa` (`id`, `day`, `month`, `year`, `week`, `hours`, `from`, `project`, `user`) VALUES
(1, 3, 10, 2012, 40, 8, 9, 1, 1),
(2, 1, 10, 2012, 40, 3, 11, 1, 1),
(3, 4, 10, 2012, 40, 8, 8, 2, 1),
(5, 5, 10, 2012, 40, 3, 13, 2, 1),
(7, 5, 10, 2012, 40, 5, 8, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES
(1, 'Admin', 'Administrator', '0000-00-00'),
(2, 'Demo', 'Demo', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(255) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_bin NOT NULL,
  `wiki` text COLLATE utf8_bin,
  `color` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `projects`
--

INSERT INTO `projects` (`id`, `name`, `wiki`, `color`) VALUES
(1, 'Croire', 'To jest pierwszy akapit.\r\nA to drugi.\r\n\r\nA to trzeci.\r\n\r\n*emfaza* **mocna emfaza**\r\n\r\n`kod`\r\n\r\n test\r\n\r\n* Pierwszy element listy.\r\n* Drugi.	\r\n\r\nNagłówek pierwszego poziomu\r\n===========================\r\n\r\nNagłówek drugiego poziomu\r\n-------------------------\r\n\r\n> Cytat\r\n\r\n    printf("goodbye world!");  /* his suicide note\r\n                                  was in C */\r\ncostam\r\n    <blink>\r\n       You would hate this if it weren''t\r\n       wrapped in a code block.\r\n    </blink>\r\n\r\nbah bah\r\n\r\n~~~\r\nprintf("goodbye world!");  /* his suicide note\r\n                              was in C */\r\n~~~\r\n\r\nxxx\r\n\r\n~~~\r\n[php]\r\necho ''hello world'';\r\n~~~\r\n\r\nPress the `<Tab>` key, then type a `$`.\r\n\r\nHow do I love thee?  \r\nLet me count the ways\r\n\r\n*This is italicized*, and so is _this_.\r\n**This is bold**, and so is __this__.\r\nUse ***italics and bold together*** if you ___have to___.\r\n\r\n\r\nHere''s an inline link to [Google](http://www.google.com/).\r\nHere''s a reference-style link to [Google][1].\r\nHere''s a very readable link to [Yahoo!][yahoo].\r\n\r\n[1]: http://www.google.com/\r\n[yahoo]: http://www.yahoo.com/\r\n\r\nHeader 1\r\n========\r\n\r\nHeader 2\r\n--------\r\n\r\n- Use a minus sign for a bullet\r\n+ Or plus sign\r\n* Or an asterisk\r\n\r\n1. Numbered lists are easy\r\n2. Markdown keeps track of the numbers for you\r\n7. So this will be item 3.\r\n\r\n- This list gets wrapped in <p> tags\r\n\r\n \r\n- So there will be extra space between items\r\n\r\n\r\n> The syntax is based on the way email programs\r\n> usually do quotations. You don''t need to hard-wrap\r\n> the paragraphs in your blockquotes, but it looks much nicer if you do.  Depends how lazy you feel.', 'plum'),
(2, 'Internal', '', 'tomato');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1349430183, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 0, 0, 1);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `asa`
--
ALTER TABLE `asa`
  ADD CONSTRAINT `asa_ibfk_3` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `asa_ibfk_4` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
