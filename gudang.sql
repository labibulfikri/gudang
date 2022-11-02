/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : gudang

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 02/11/2022 19:10:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  `stok` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sisa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (2, 'OT120 (BARU)', 10000, '0', '0');
INSERT INTO `barang` VALUES (3, 'OT150 (BARU)', 10000, '0', '0');
INSERT INTO `barang` VALUES (4, 'OT200 (BARU)', 10000, '0', '0');
INSERT INTO `barang` VALUES (5, 'OT60 (BARU)    ', 10000, '0', '0');
INSERT INTO `barang` VALUES (6, 'TK200 R2S (BARU) ', 10000, '0', '0');
INSERT INTO `barang` VALUES (7, 'TK200 R2 (BARU)', 10000, '0', '0');
INSERT INTO `barang` VALUES (8, 'TK200 SINGLE (BARU) ', 10000, '0', '0');
INSERT INTO `barang` VALUES (9, 'JERIGEN KAPSUL TINGGI 35L ', 10000, '0', '0');
INSERT INTO `barang` VALUES (10, 'JERIGEN KAPSUL 30L ', 10000, '0', '0');
INSERT INTO `barang` VALUES (11, 'OT200 (BEKAS)', 10000, '0', '0');
INSERT INTO `barang` VALUES (12, 'OT150 ', 10000, '0', '0');
INSERT INTO `barang` VALUES (13, 'OT120 ', 10000, '0', '0');
INSERT INTO `barang` VALUES (14, 'OT60 ', 10000, '0', '0');
INSERT INTO `barang` VALUES (15, 'TK200 R2S ', 10000, '0', '0');
INSERT INTO `barang` VALUES (16, 'TK200 R2 ', 10000, '0', '0');
INSERT INTO `barang` VALUES (17, 'TK200 SINGLE ', 10000, '0', '0');
INSERT INTO `barang` VALUES (18, 'JERIGEN KAPSUL 30L ', 10000, '0', '0');
INSERT INTO `barang` VALUES (19, 'JERIGEN H2O 30L ', 10000, '10', '0');
INSERT INTO `barang` VALUES (20, 'JERIGEN AS 30L ', 10000, '20', NULL);
INSERT INTO `barang` VALUES (21, 'JERIGEN ACID 30L ', 10000, '50', '0');
INSERT INTO `barang` VALUES (22, 'JERIGEN H2O KREM 30L ', 10000, '20', '0');
INSERT INTO `barang` VALUES (23, 'KEMPU 1000L ', 10000, '0', '0');
INSERT INTO `barang` VALUES (24, 'SENG TK200 ', 10000, '0', '0');
INSERT INTO `barang` VALUES (25, 'SENG OT200 ', 10000, '0', NULL);

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_pelanggan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (1, 'HENDRA', 'DIMANA SAJA');
INSERT INTO `pelanggan` VALUES (2, 'KOBRA', 'DISNI');
INSERT INTO `pelanggan` VALUES (6, 'INDAH LAGI ', '123456');
INSERT INTO `pelanggan` VALUES (7, 'AGUS 123', 'KENJERAN');
INSERT INTO `pelanggan` VALUES (12, 'coba pelanggan ', 'asemrowo');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_transaksi` int NOT NULL AUTO_INCREMENT,
  `surat_jalan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pelanggan` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `grand_total` int NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 106 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (102, 'SJ-001', '1', 700000, ' ', NULL, '2022-10-01', 'bri', 'masuk');
INSERT INTO `transaksi` VALUES (103, 'SJ-002', '1', 250000, ' ', NULL, '2022-10-31', 'bri', 'keluar');
INSERT INTO `transaksi` VALUES (104, 'SJ-003', '2', 340000, ' ', NULL, '2022-10-13', 'bcaplatinum', 'masuk');

-- ----------------------------
-- Table structure for transaksi_det
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_det`;
CREATE TABLE `transaksi_det`  (
  `id_det_transaksi` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_barang` varchar(10) CHARACTER SET utf16 COLLATE utf16_croatian_ci NULL DEFAULT NULL,
  `qty` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `det_harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stok_det` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sisa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_det_transaksi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 150 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_det
-- ----------------------------
INSERT INTO `transaksi_det` VALUES (141, '102', '21', '20', '10000', NULL, '200000', '50', '70');
INSERT INTO `transaksi_det` VALUES (142, '102', '20', '20', '10000', NULL, '200000', '1', '21');
INSERT INTO `transaksi_det` VALUES (143, '102', '19', '30', '10000', NULL, '300000', '0', '30');
INSERT INTO `transaksi_det` VALUES (144, '103', '20', '5', '10000', NULL, '50000', '21', '16');
INSERT INTO `transaksi_det` VALUES (145, '103', '22', '20', '10000', NULL, '200000', '40', '20');
INSERT INTO `transaksi_det` VALUES (146, '104', '20', '4', '10000', NULL, '40000', '16', '20');
INSERT INTO `transaksi_det` VALUES (147, '104', '21', '30', '10000', NULL, '300000', '70', '100');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'fikri', 'e10adc3949ba59abbe56e057f20f883e');

SET FOREIGN_KEY_CHECKS = 1;
