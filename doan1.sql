/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100605
 Source Host           : localhost:3306
 Source Schema         : doan1

 Target Server Type    : MySQL
 Target Server Version : 100605
 File Encoding         : 65001

 Date: 06/01/2022 19:50:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for phongban
-- ----------------------------
DROP TABLE IF EXISTS `phongban`;
CREATE TABLE `phongban`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mo_ta` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `so_phong` int NULL DEFAULT NULL,
  `manager_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of phongban
-- ----------------------------
INSERT INTO `phongban` VALUES (1, 'Covid19', 'Phòng ban covid 19', 7, 5);
INSERT INTO `phongban` VALUES (2, 'Giám đốc', 'Phòng giám đốc', 1, 0);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `imageurl` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isFirst` bit(1) NULL DEFAULT b'1',
  `old_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `phongban_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'vinh8c059', '71b1abb01462f7c3df4e06ff9e49f119', 'Le Vinh', 'god', 'uploads/vinh8c059-1641404743-Vinh.jpg', b'0', NULL, b'1', NULL);
INSERT INTO `users` VALUES (2, 'vinh8c0592', '71b1abb01462f7c3df4e06ff9e49f119', 'Le Vinh', 'user', '', b'0', NULL, b'1', NULL);
INSERT INTO `users` VALUES (3, 'vinhdeptraj45', '71b1abb01462f7c3df4e06ff9e49f119', 'VinhCB', 'user', '', b'0', NULL, b'1', 0);
INSERT INTO `users` VALUES (4, 'vinhkosd', '71b1abb01462f7c3df4e06ff9e49f119', 'Le Vinh2', 'user', 'http://pngimg.com/uploads/croissant/small/croissant_PNG2.png', b'0', NULL, b'1', 0);
INSERT INTO `users` VALUES (5, 'vinhdeptrai', '71b1abb01462f7c3df4e06ff9e49f119', 'Vinh test3', 'admin', '', b'0', NULL, b'0', 1);
INSERT INTO `users` VALUES (6, 'vinh5122', '71b1abb01462f7c3df4e06ff9e49f119', 'Test TK moi', 'user', 'https://vnn-imgs-f.vgcloud.vn/2019/04/02/16/kha-banh-kiem-duoc-bao-nhieu-tien-tu-mang-xa-hoi.jpg', b'0', NULL, b'0', NULL);

SET FOREIGN_KEY_CHECKS = 1;
