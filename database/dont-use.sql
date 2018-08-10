-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2018 at 04:03 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.31-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mockfire`
--

-- --------------------------------------------------------

--
-- Table structure for table `skemaopsi`
--

CREATE TABLE `skemaopsi` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_grup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_opsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_opsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skemaopsi`
--

INSERT INTO `skemaopsi` (`id`, `option_grup`, `name_opsi`, `value_opsi`, `created_at`, `updated_at`) VALUES
(1, 'Address', 'zipCode', 'Zip Code', NULL, NULL),
(2, 'Address', 'city', 'City', NULL, NULL),
(3, 'Address', 'streetAddress', 'Street Address', NULL, NULL),
(4, 'Address', 'streetAddress', 'Street Address', NULL, NULL),
(5, 'Address', 'county', 'County', NULL, NULL),
(6, 'Address', 'country', 'Country', NULL, NULL),
(7, 'Address', 'state', 'State', NULL, NULL),
(8, 'Address', 'stateAbbr', 'State abbreviated', NULL, NULL),
(9, 'Address', 'latitude', 'Latitude', NULL, NULL),
(10, 'Address', 'longitude', 'Longitude', NULL, NULL),
(11, 'Address', 'color', 'Color', NULL, NULL),
(12, 'Address', 'department', 'Department', NULL, NULL),
(13, 'Address', 'productName', 'Product Name', NULL, NULL),
(14, 'Address', 'price', 'Price', NULL, NULL),
(15, 'Address', 'productAdjective', 'Product Adjective', NULL, NULL),
(16, 'Address', 'productMaterial', 'Product Material', NULL, NULL),
(17, 'Address', 'product', 'Product', NULL, NULL),
(18, 'DATE', 'past', 'Past', NULL, NULL),
(19, 'DATE', 'future', 'Future', NULL, NULL),
(20, 'DATE', 'recent', 'Recent', NULL, NULL),
(21, 'DATE', 'month', 'Month', NULL, NULL),
(22, 'DATE', 'weekday', 'Weekday', NULL, NULL),
(23, 'IMAGE', 'image', 'Image', NULL, NULL),
(24, 'IMAGE', 'avatar', 'Avatar', NULL, NULL),
(25, 'IMAGE', 'daraUri', 'Data URI', NULL, NULL),
(26, 'NAME', 'firstName', 'First Name', NULL, NULL),
(27, 'NAME', 'lastName', 'Last Name', NULL, NULL),
(28, 'NAME', 'fullName', 'Full Name', NULL, NULL),
(29, 'NAME', 'jobTitle', 'Job Title', NULL, NULL),
(30, 'NAME', 'prefix', 'Prefix', NULL, NULL),
(31, 'NAME', 'title', 'Title', NULL, NULL),
(32, 'NAME', 'jobDescriptor', 'Job Descriptor', NULL, NULL),
(33, 'NAME', 'jobArea', 'Job Area', NULL, NULL),
(34, 'NAME', 'jobType', 'Job Type', NULL, NULL),
(35, 'PHONE', 'phoneNumber', 'Phone Number', NULL, NULL),
(36, 'NUMBER', 'Number', 'Number', NULL, NULL),
(37, 'NUMBER', 'uuid', 'UUID', NULL, NULL),
(38, 'NUMBER', 'boolean', 'Boolean', NULL, NULL),
(39, 'NUMBER', 'word', 'Word', NULL, NULL),
(40, 'NUMBER', 'words', 'Words', NULL, NULL),
(41, 'NUMBER', 'locale', 'Locale', NULL, NULL),
(42, 'NUMBER', 'alphaNumeric', 'Alpha Numeric', NULL, NULL),
(43, 'SYSTEM', 'fileName', 'File Name', NULL, NULL),
(44, 'SYSTEM', 'commonFileName', 'Common File Name', NULL, NULL),
(45, 'SYSTEM', 'commonFileExt', 'Common File Extension', NULL, NULL),
(46, 'SYSTEM', 'fileType', 'fileType', NULL, NULL),
(47, 'SYSTEM', 'fileExt', 'File Extension', NULL, NULL),
(48, 'SYSTEM', 'semver', 'Semver', NULL, NULL),
(49, 'OBJECT', 'object', 'Object', NULL, NULL),
(50, 'ARRAY', 'array', 'Array', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skemaopsi`
--
ALTER TABLE `skemaopsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skemaopsi`
--
ALTER TABLE `skemaopsi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;