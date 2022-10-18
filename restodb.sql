/*
 Navicat Premium Data Transfer

 Source Server         : LocalDB
 Source Server Type    : MySQL
 Source Server Version : 80026
 Source Host           : localhost:3307
 Source Schema         : restodb

 Target Server Type    : MySQL
 Target Server Version : 80026
 File Encoding         : 65001

 Date: 03/01/2022 17:09:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Admin', 'admin@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$amVmNDM4ZVlxUG54ekxnbQ$H+mhZxxH6nvuKkKmCkDYtzMo10iqKHDwBCfriMCFigw');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `short_desc` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `long_desc` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (7, 'North Indian', 'This is a popular category in Northern India', 'Indian cuisine encompasses a wide variety of regional cuisine native to India. Given the range of diversity in soil type, climate and occupations, these cuisines vary significantly from each other and use locally available chocolates, herbs, vegetables and fruits. The dishes are then served according to taste in either mild, medium or hot. Indian food is also heavily influenced by religious and cultural choices, like Hinduism and traditions.', 'foodcat1');
INSERT INTO `categories` VALUES (8, 'Chinese', 'Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China.', 'A number of different styles contribute to Chinese cuisine but perhaps the best known and most influential are Cantonese cuisine, Shandong cuisine, Jiangsu cuisine (specifically Huaiyang cuisine) and Sichuan cuisine.', 'foodcat1');
INSERT INTO `categories` VALUES (9, 'South Indian', 'South Indian cuisine includes the cuisines of the five southern states of India Andhra Pradesh, Karnataka, Kerala, Tamil Nadu and Telangana.', 'The cuisines of Andhra Pradesh are the spiciest in all of India. Generous use of chili and tamarind make the dishes tangy and hot. The majority of dishes are vegetable or lentil-based.', 'foodcat1');
INSERT INTO `categories` VALUES (10, 'Snacks', ' A snack is a small portion of food eaten between meals.', 'A snack is a small portion of food eaten between meals. This may be a snack food, such as potato chips or baby carrots, but can also simply be a small amount of any food.', 'foodcat1');
INSERT INTO `categories` VALUES (11, 'Himalayan Food', 'Nepalese cuisine comprises a variety of cuisines based upon ethnicity, soil and climate relating to Nepal cultural diversity and geography.', 'Much of the cuisine is variation on Asian themes. Other foods have hybrid Tibetan, Indian and Thai origins. They were originally filled with buffalo meat but now also with goat or chicken, as well as vegetarian preparations. Special foods such as sel roti, finni roti and patre are eaten during festivals such as Tihar.', 'foodcat1');
INSERT INTO `categories` VALUES (15, 'food', 'foodfood', 'foodfoodfood', 'foodcat1');

-- ----------------------------
-- Table structure for food
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `fname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES (1, 9, 'Dosa', 'I love Dosa very much. Its a South Indian Food and Everybody loves it!', 'food2');
INSERT INTO `food` VALUES (7, 7, 'Egg Role', 'This is a North Indian Pop Food. Everybody likes it so damn very much.', 'food3');
INSERT INTO `food` VALUES (8, 8, 'Chowmin', 'This is a Chinese Pop Food. Everybody likes it so damn very much.', 'food1');
INSERT INTO `food` VALUES (9, 10, 'French Fries', 'This is a Snacks Food. Everybody likes it so damn very much with Tea or Coffee.', 'food2');
INSERT INTO `food` VALUES (10, 11, 'Momos', 'This is a Himalayan Pop Food. Everybody likes it so damn very much. Its comes with different flavors!', 'food3');
INSERT INTO `food` VALUES (11, 8, 'Hakka Noodles', 'This food is so much popular even in India. It tastes like Chowmein but with Gravy. ', 'food1');
INSERT INTO `food` VALUES (12, 12, 'Risotto', 'Risotto is a typical northern Italian dish that can be cooked in an infinite number of ways. Creamy and rich in cheese, it is prepared with rice typical of northern areas, such as the Arborio, Carnaroli, and Vialone varieties, and cooked slowly in broth.', 'food2');
INSERT INTO `food` VALUES (20, 7, 'food', 'foodfood', 'food1');
INSERT INTO `food` VALUES (21, 8, 'Pizza', 'Pizzapiazzapizsdaosdoa', 'pizza');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `food_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `timestamp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createdAt` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'yrys', 'yrys.amanturov@mail.ru', '$argon2i$v=19$m=65536,t=4,p=1$aEt0aU8xUjM4eXk3bmhvQw$//TNTyiWJTdnOIa0O3d90I5/9DAaRNmrFFwsQhJPSAk', '2022-01-02 11:18:38');
INSERT INTO `users` VALUES (2, 'Guliza', 'guliza@mail.ru', '$argon2i$v=19$m=65536,t=4,p=1$VFNFRVJZMHZMLmguNGNKVQ$HMVqP32qTsVQg+CiyoMHaHyrYaDs28RnmSAni1T2FBo', '2022-01-03 10:54:46');

SET FOREIGN_KEY_CHECKS = 1;
