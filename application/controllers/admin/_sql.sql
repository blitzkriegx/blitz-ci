-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2011 at 02:49 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

DROP TABLE IF EXISTS `tbl_site`;
CREATE TABLE IF NOT EXISTS `tbl_site` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_site`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_menu`
--

DROP TABLE IF EXISTS `tbl_site_menu`;
CREATE TABLE IF NOT EXISTS `tbl_site_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` mediumint(9) unsigned NOT NULL DEFAULT '0',
  `site_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `managed_on` tinyint(3) NOT NULL DEFAULT '0',
  `label` varchar(50) NOT NULL,
  `page_id` int(10) unsigned NOT NULL,
  `url` varchar(200) NOT NULL,
  `width` mediumint(8) unsigned NOT NULL DEFAULT '200',
  `order_by` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_site_menu`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_page`
--

DROP TABLE IF EXISTS `tbl_site_page`;
CREATE TABLE IF NOT EXISTS `tbl_site_page` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `template_id` tinyint(4) unsigned NOT NULL,
  `controller` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL,
  `css` text,
  `javascript` text,
  `jquery` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_site_page`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_page_sections`
--

DROP TABLE IF EXISTS `tbl_site_page_sections`;
CREATE TABLE IF NOT EXISTS `tbl_site_page_sections` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `template_section_id` tinyint(3) unsigned NOT NULL DEFAULT '9',
  `heading` varchar(200) NOT NULL,
  `heading_image` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `has_footer` tinyint(1) NOT NULL DEFAULT '0',
  `order_by` tinyint(3) unsigned DEFAULT '1',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_site_page_sections`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_settings`
--

DROP TABLE IF EXISTS `tbl_site_settings`;
CREATE TABLE IF NOT EXISTS `tbl_site_settings` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` tinyint(4) unsigned NOT NULL,
  `path` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `google_analytics` varchar(20) DEFAULT NULL,
  `twitter` varchar(100) NOT NULL,
  `under_maintanace` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_site_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_tempalte`
--

DROP TABLE IF EXISTS `tbl_site_tempalte`;
CREATE TABLE IF NOT EXISTS `tbl_site_tempalte` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_site_tempalte`
--

INSERT INTO `tbl_site_tempalte` (`id`, `name`) VALUES
(1, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_template_sections`
--

DROP TABLE IF EXISTS `tbl_site_template_sections`;
CREATE TABLE IF NOT EXISTS `tbl_site_template_sections` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `template_id` tinyint(4) unsigned NOT NULL,
  `parent_id` tinyint(4) unsigned NOT NULL,
  `label` varchar(100) NOT NULL,
  `tag_id` varchar(50) NOT NULL,
  `container_tag_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_site_template_sections`
--

INSERT INTO `tbl_site_template_sections` (`id`, `template_id`, `parent_id`, `label`, `tag_id`, `container_tag_id`) VALUES
(1, 1, 0, 'Page', '#page', '#page-container'),
(2, 1, 1, 'Header', '#header', '#header-container'),
(3, 1, 1, 'Billboard', '#billboard', '#billboard-container'),
(4, 1, 1, 'Content', '#content', '#content-container'),
(5, 1, 1, 'Footer', '#footer', '#footer-container'),
(6, 1, 2, 'Logo', '#header-logo', '#header'),
(7, 1, 2, 'Menu', '#header-menu', '#header'),
(8, 1, 2, 'Top Menu', '#header-top-menu', '#header'),
(9, 1, 4, 'Left Column', '#content-left-column', '#content'),
(10, 1, 4, 'Right Column', '#content-right-column', '#content'),
(11, 1, 5, 'Menu', '#footer-menu', '#footer'),
(12, 1, 5, 'Submenu', '#footer-submenu', '#footer'),
(13, 1, 5, 'Copyright', '#footer-copyright', '#footer'),
(14, 1, 5, 'Logo', '#footer-logo', '#footer'),
(15, 1, 3, 'Default', '#default-billboard', '#billboard');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_user`
--

DROP TABLE IF EXISTS `tbl_site_user`;
CREATE TABLE IF NOT EXISTS `tbl_site_user` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` tinyint(4) unsigned NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `site_permission_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_site_user`
--

INSERT INTO `tbl_site_user` (`id`, `site_id`, `email`, `username`, `password`, `first_name`, `last_name`, `site_permission_id`) VALUES
(1, 1, 'seanjhomer@gmail.com', 'shomer', 'blarp007', 'Sean', 'Homer', 100);
