/*
 Navicat Premium Data Transfer

 Source Server         : eVoting Osis
 Source Server Type    : MySQL
 Source Server Version : 100519 (10.5.19-MariaDB-cll-lve)
 Source Host           : 45.90.230.151:3306
 Source Schema         : u1423982_evotingosis

 Target Server Type    : MySQL
 Target Server Version : 100519 (10.5.19-MariaDB-cll-lve)
 File Encoding         : 65001

 Date: 01/06/2023 10:45:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Admin eVoting', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for calon
-- ----------------------------
DROP TABLE IF EXISTS `calon`;
CREATE TABLE `calon`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `moto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calon
-- ----------------------------
INSERT INTO `calon` VALUES (1, 'Agus Salim', 'X', 'Menjadikan Sekolah yang Unggul di bidang Akademik dan Non Akademik bos', 'https://evotingosis.musky.site/images/c1.png');
INSERT INTO `calon` VALUES (2, 'Solichin', 'XII', 'Menjadikan Sekolah yang Unggul di bidang Akademik dan Non Akademik bos', 'https://evotingosis.musky.site/images/c2.png');
INSERT INTO `calon` VALUES (4, 'Muhammad Ali', 'XI', 'Menjadikan Sekolah yang Unggul di bidang Akademik dan Non Akademik bos', 'https://evotingosis.musky.site/images/60aa8fa5c172e20b73d5b87bb5c3bf7e.jpg');

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_calon` int NULL DEFAULT NULL,
  `id_pemilih` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `waktu` datetime NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (3, 2, 1, 1, '2023-05-31 18:07:22');
INSERT INTO `hasil` VALUES (4, 3, 1, 1, '2023-05-31 18:14:07');
INSERT INTO `hasil` VALUES (5, 2, 1, 1, '2023-05-31 18:14:12');
INSERT INTO `hasil` VALUES (6, 1, 1, 1, '2023-05-31 18:14:15');
INSERT INTO `hasil` VALUES (7, 1, 1, 1, '2023-05-31 18:14:53');
INSERT INTO `hasil` VALUES (8, 1, 1, 1, '2023-05-31 18:14:55');
INSERT INTO `hasil` VALUES (9, 3, 1, 1, '2023-05-31 18:14:59');
INSERT INTO `hasil` VALUES (10, 3, 1, 1, '2023-05-31 18:15:00');

-- ----------------------------
-- Table structure for pemilih
-- ----------------------------
DROP TABLE IF EXISTS `pemilih`;
CREATE TABLE `pemilih`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` char(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nisn` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password_backup` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gambar` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'https://evotingosis.musky.site/images/avatar.png',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemilih
-- ----------------------------
INSERT INTO `pemilih` VALUES (1, 'Bintang', '1216863262', '0', '1216863262', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (2, 'Devi Anggraeni', '1224306262', '0', '1224306262', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (3, 'Dini Andini', '1235033631', '0', '1235033631', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (4, 'Elfiana Sari', '1325175565', '0', '1325175565', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (5, 'Fatma Rizqi', '1216863543', '0', '1216863543', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (6, 'Hermawan', '1224306544', '0', '1224306544', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (7, 'Indah Farita', '1235733234', '0', '1235733234', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (8, 'Intan Nuraini', '1325174765', '0', '1325174765', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (9, 'Bagas Ardiansyah', '1365475565', '0', '1365475565', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (10, 'Rifaldi', '1216876543', '0', '1216876543', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (11, 'Rizky Wahyudi', '1214863782', '0', '1214863782', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (12, 'Putri Lestari', '1289508262', '0', '1289508262', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (13, 'AHMAD RAMADHAN', '1245393631', 'X', '1245393631', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (14, 'Dewi Anggraini', '1329875365', '0', '1329875365', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (15, 'Budi Santoso', '1567763543', '0', '1567763543', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (16, 'Siti Rahmawati', '1224843784', '0', '1224843784', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (17, 'Dika Pratama', '1235735543', '0', '1235735543', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (18, 'Maya Indriani', '1326543765', '0', '1326543765', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (19, 'Rudi Hermawan', '1365432895', '0', '1365432895', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (20, 'Ayu Fitriani', '1216764943', '0', '1216764943', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (21, 'Safitri', '1216863786', '0', '1216863786', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (22, 'Susanti', '1224307452', '0', '1224307452', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (23, 'Sri Utami', '1267233631', '0', '1267233631', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (24, 'Vika alvina', '1098175565', '0', '1098175565', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (25, 'Rudi Prasetyo', '1209263543', '0', '1209263543', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (26, 'Wahyu Hidayat', '1264906544', '0', '1264906544', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (27, 'Rifqi Fauzi', '1235700234', '0', '1235700234', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (28, 'Riska Amalia', '1005174765', '0', '1005174765', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (29, 'Oktaviani', '1365486565', '0', '1365486565', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (30, 'Nabila', '1216898703', '0', '1216898703', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (31, 'Bella Apriani', '1084803782', '0', '1084803782', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (32, 'Irvan Effendi', '1287450262', '0', '1287450262', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (33, 'Rahmat', '1245393000', '0', '1245393000', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (34, 'Sandi Novanto', '1329848065', '0', '1329848065', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');
INSERT INTO `pemilih` VALUES (35, 'Rendi Wijaya', '1503456353', '0', '1503456353', 'efee0e1456fbb6c9f25546972891bde9', 'pemilih', 'https://evotingosis.musky.site/images/avatar.png');

SET FOREIGN_KEY_CHECKS = 1;
