/*
 Navicat Premium Data Transfer

 Source Server         : MariaDBConnection
 Source Server Type    : MariaDB
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : lesson2

 Target Server Type    : MariaDB
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 17/07/2022 11:58:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for action
-- ----------------------------
DROP TABLE IF EXISTS `action`;
CREATE TABLE `action`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of action
-- ----------------------------
INSERT INTO `action` VALUES (1, 'view_user', 'Xem danh sách nhân viên');
INSERT INTO `action` VALUES (2, 'add_user', 'Thêm nhân viên mới');
INSERT INTO `action` VALUES (3, 'edit_user', 'Cập nhật thông tin nhân viên');
INSERT INTO `action` VALUES (4, 'delete_user', 'Xóa nhân viên');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Admin');
INSERT INTO `role` VALUES (2, 'User');

-- ----------------------------
-- Table structure for role_action
-- ----------------------------
DROP TABLE IF EXISTS `role_action`;
CREATE TABLE `role_action`  (
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`, `action_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_action
-- ----------------------------
INSERT INTO `role_action` VALUES (1, 1);
INSERT INTO `role_action` VALUES (1, 2);
INSERT INTO `role_action` VALUES (1, 3);
INSERT INTO `role_action` VALUES (1, 4);
INSERT INTO `role_action` VALUES (2, 1);
INSERT INTO `role_action` VALUES (2, 3);

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES (1, 'Nguyễn Đình Khôi Nguyên', 'khoinguyen1942001@gmail.com', 'ebb81c37b2415831f4af19d3a3793a39', 1);
INSERT INTO `staff` VALUES (2, 'Intern', 'intern@gmail.com', 'ebb81c37b2415831f4af19d3a3793a39', 2);
INSERT INTO `staff` VALUES (3, 'fresher', 'fresher@gmail.com', 'ebb81c37b2415831f4af19d3a3793a39', 2);
INSERT INTO `staff` VALUES (4, 'junior', 'junior@gmail.com', 'ebb81c37b2415831f4af19d3a3793a39', 2);
INSERT INTO `staff` VALUES (5, 'senior', 'senior@gmail.com', 'ebb81c37b2415831f4af19d3a3793a39', 2);
INSERT INTO `staff` VALUES (6, 'teamlead', 'teamlead@gmail.com', 'ebb81c37b2415831f4af19d3a3793a39', 2);
INSERT INTO `staff` VALUES (7, 'CTO', 'cto@gmail.com', 'ebb81c37b2415831f4af19d3a3793a39', 1);

SET FOREIGN_KEY_CHECKS = 1;
