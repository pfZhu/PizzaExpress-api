/*
 Navicat Premium Data Transfer

 Source Server         : pizza-express
 Source Server Type    : MySQL
 Source Server Version : 50640
 Source Host           : pizza-express.ccz15ohowdvl.us-east-1.rds.amazonaws.com:3306
 Source Schema         : pizza_express

 Target Server Type    : MySQL
 Target Server Version : 50640
 File Encoding         : 65001

 Date: 12/04/2019 08:58:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `lng` decimal(10,2) DEFAULT NULL,
  `lat` decimal(10,2) DEFAULT NULL,
  `addressDetail` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
BEGIN;
INSERT INTO `address` VALUES (1, 1, '13845244245', '孟鑫', '爹', NULL, NULL, '5-331的厕所', '上海市普陀区3663号', '男', '2019-03-13 13:36:10', '2019-03-23 06:36:19');
INSERT INTO `address` VALUES (2, 2, '13865564654', '猪鹏飞', '祖宗', NULL, NULL, '5-331', '上海市普陀区3664号', '女', '2019-03-13 13:36:26', '2019-03-23 06:36:27');
INSERT INTO `address` VALUES (4, 4, '18621681997', '徐', 'home', 121.51, 31.29, '1号楼101室', '林绿家园', '先生', '2019-03-24 18:09:21', '2019-03-25 02:13:37');
INSERT INTO `address` VALUES (5, 6, '1111111111', 'w', 'school', 121.40, 31.23, '111', '君御茶艺', '先生', '2019-03-27 05:45:12', NULL);
INSERT INTO `address` VALUES (6, 7, '18621681998', '徐', 'school', 121.40, 31.23, '331', '华东师范大学第五宿舍', '先生', '2019-03-27 06:11:20', NULL);
INSERT INTO `address` VALUES (7, 7, '12345678901', '江', 'school', 121.40, 31.23, '理科大楼B519', '吉荣印务', '先生', '2019-03-27 06:29:23', NULL);
INSERT INTO `address` VALUES (8, 12, '15201702258', '李', 'school', 121.41, 31.23, '第五宿舍', '华东师范大学中山北路校区(东北门)', '先生', '2019-04-03 11:50:15', '2019-04-03 19:50:24');
INSERT INTO `address` VALUES (9, 12, '21321321321 23', '请问请问请sdad131****问请问趣味无穷额我去饿我去饿我去额为全额我去饿', 'home', 121.64, 31.22, '21321321', '三林新村29临', '先生', '2019-04-03 11:55:41', NULL);
INSERT INTO `address` VALUES (10, 17, '15201702258', '李', 'home', 121.64, 31.22, '普陀区金沙江路', '三林新村26临', '女士', '2019-04-04 11:26:13', '2019-04-04 19:29:05');
INSERT INTO `address` VALUES (11, 4, '13175191964', '徐', 'home', 121.52, 31.29, '1号101', '海鸿公寓', '先生', '2019-04-05 16:32:08', NULL);
INSERT INTO `address` VALUES (12, 11, '1123', '李', 'school', 121.40, 31.23, '213', '君御茶艺', '先生', '2019-04-10 13:14:49', NULL);
INSERT INTO `address` VALUES (13, 10, '546', '44', 'home', 121.40, 31.23, '45646', '君御茶艺', '先生', '2019-04-10 13:43:16', NULL);
INSERT INTO `address` VALUES (14, 18, '15201702258', '李', 'school', 121.40, 31.23, '5220', '华东师范大学第五宿舍', '先生', '2019-04-10 13:44:51', NULL);
INSERT INTO `address` VALUES (15, 21, '888', '888', '', 121.40, 31.23, '888', '君御茶艺', '先生', '2019-04-10 15:21:39', NULL);
INSERT INTO `address` VALUES (16, 20, '23', '李', 'school', 121.41, 31.23, '13', '华东师范大学中山北路校区第十七宿舍', '先生', '2019-04-10 15:51:17', NULL);
INSERT INTO `address` VALUES (17, 6, '15201702258', '李', 'home', 121.42, 31.22, '001', '明磊图文', '先生', '2019-04-10 16:50:54', NULL);
COMMIT;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES (1, '尊贵管理员', 'passwd', '2019-03-01 08:24:43', '2019-03-01 08:24:42');
INSERT INTO `admin` VALUES (2, '垃圾管理员', 'passwd', '2019-03-01 08:25:39', '2019-03-01 08:25:39');
COMMIT;

-- ----------------------------
-- Table structure for factory
-- ----------------------------
DROP TABLE IF EXISTS `factory`;
CREATE TABLE `factory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `maxOrder` int(255) DEFAULT NULL,
  `lng` decimal(10,2) DEFAULT NULL,
  `lat` decimal(10,2) DEFAULT NULL,
  `openTime` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of factory
-- ----------------------------
BEGIN;
INSERT INTO `factory` VALUES (1, '1号工厂', '上海市1号工厂', 'factory_avatar1.jpg', '021-1234567', 50, NULL, NULL, '8:00,22:00', '2019-03-01 08:25:23', '2019-03-01 08:25:23');
INSERT INTO `factory` VALUES (2, '2号工厂', '上海市2号工厂', 'factory_avatar2.jpg', '021-7654321', 40, NULL, NULL, '9:00,21:00', '2019-03-01 08:25:23', NULL);
INSERT INTO `factory` VALUES (3, '3号工厂', '上海市浦东新区', 'avatar3.jpg', '15877777777', 50, NULL, NULL, '8:00,14:00', '2019-03-06 14:58:48', '2019-03-06 15:36:38');
INSERT INTO `factory` VALUES (4, '4号工厂', '上海市4号工厂', 'factory_avatar2.jpg', '021-7654321', 40, NULL, NULL, '9:00,21:00', '2019-03-01 08:25:23', '2019-03-06 15:36:33');
COMMIT;

-- ----------------------------
-- Table structure for food
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discountPrice` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `expired` int(11) DEFAULT '0',
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `image_path` text,
  `month_sales` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
BEGIN;
INSERT INTO `food` VALUES (6, '美国风情土豆培根比萨', 45.00, 36.00, '美国进口酥香薯角，甄选培根片，旗舰人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:培根、薯角、美乃滋', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-04-10 14:48:00', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/913f9a3a670b91bf621ff41a022958dbjpeg', 242);
INSERT INTO `food` VALUES (7, '美乐嫩汁鸡块', 22.00, 17.60, '下述克重为进烤炉前(生料)的克重: \n115g\n主要原料：鸡块\n主要原料: 其他', 5, 4556528, 0, '2019-03-22 01:30:15', '2019-04-11 00:56:30', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/a0636b6637b657e94531f4b849eebbf4jpeg', 241);
INSERT INTO `food` VALUES (8, '意大利风情肉酱面', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n345g\n主要原料：意大利面、意式肉酱、西兰花、樱桃番茄\n主要原料: 其他', 100, 4556542, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/6dc45a0bd27616c1b423590c69a0db85jpeg', 223);
INSERT INTO `food` VALUES (9, '夏威夷风情比萨', 45.00, 36.00, '进口菠萝和火腿片组合，全球人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:火腿、菠萝', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/9cb407476d609b0acc356ff3f4f39f56jpeg', 164);
INSERT INTO `food` VALUES (10, '单份烤翅-蜜汁味', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n4个/130g\n主要原料：蜜汁风味鸡翅\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/997f4e93aafb59805fc85e7e7af46349jpeg', 142);
INSERT INTO `food` VALUES (11, '奶油蘑菇汤', 16.00, 12.80, '160ML\n主要原料：奶油蘑菇汤\n主要原料: 其他', 100, 4556575, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/6fa1e8c8855f4b6424635972508eb5dejpeg', 142);
INSERT INTO `food` VALUES (12, '招牌蛋挞（2个）', 10.00, 8.00, '下述克重为进烤炉前(生料)的克重: \n45g\n主要原料：蛋挞\n主要原料: 其他', 100, 4556563, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/5bff9b2ad9aee86b853ecf02479aacdbjpeg', 119);
INSERT INTO `food` VALUES (13, '咖喱牛腩焗饭', 29.00, 23.20, '下述克重为进烤炉前(生料)的克重: \n360g\n主要原料：米饭、咖喱牛肉、马苏里拉芝士\n主要原料: 其他', 100, 4556542, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/0896c6081897332f62ba01c62e00fccbjpeg', 98);
INSERT INTO `food` VALUES (14, '酥香薯角', 6.00, 4.80, '下述克重为进烤炉前(生料)的克重: \n125g\n主要原料：薯角\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/bb7b8c6c47ca5d309941243b6f5329edjpeg', 89);
INSERT INTO `food` VALUES (15, '热狗面包卷', 16.00, 12.80, '下述克重为进烤炉前(生料)的克重: \n4个/128g\n主要原料：香肠、面团\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/2d8ea688c25ac7a97abe80ead40d99e2jpeg', 88);
INSERT INTO `food` VALUES (16, '酥香薯角', 6.00, 4.80, '下述克重为进烤炉前(生料)的克重: \n125g\n主要原料：薯角\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/bb7b8c6c47ca5d309941243b6f5329edjpeg', 89);
INSERT INTO `food` VALUES (17, '个人悠享套餐B', 35.00, 28.00, '咖喱牛腩焗饭 1份；蛋香鸡肉卷 1份；浓醇黑糖风味奶茶（325ML） 1杯。', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/7b4e3489d37bc3c3b20b870994e5e8ecjpeg', 29);
INSERT INTO `food` VALUES (18, '个人悠享套餐A', 39.00, 31.20, '嫩香烤肠比萨9英寸（经典手拍） 1个；浓醇黑糖风味奶茶（325ML） 1杯', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/2ea57b7c06baafa9089c4b345d2b5de9jpeg', 39);
INSERT INTO `food` VALUES (19, '肉香四溢比萨12英寸双层芝士多多饼底厚款', 58.50, 46.80, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 12\"(790g)\n主要原料:火腿、意式香肠片、意式香肠丁、培根、番茄、洋葱\n主要原料: 其他', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/dd1a4641d4f3ef70f36a5dbf27e0729ajpeg', 0);
INSERT INTO `food` VALUES (20, '新品比萨套餐', 88.00, 70.40, '黑松露风味菌菇鸡肉比萨9英寸（经典手拍） 1个；美乐嫩汁鸡块 1份；红枣牛奶风味饮（325ML）1杯；浓醇黑糖风味奶茶（325ML） 1杯', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/bc5e551ab8f9b27531e00fd19d03fe8djpeg', 8);
INSERT INTO `food` VALUES (21, '多人分享套餐', 188.00, 150.40, '黑松露风味菌菇鸡肉比萨9英寸（经典手拍） 1个；珠圆富贵虾球比萨9英寸（经典手拍） 1个；海陆拼盘 1份；经典香滑热可可饮（325ML）2杯；红枣牛奶风味饮（325ML）1杯；浓醇黑糖风味奶茶（325ML） 1杯', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/b141d87352d0df648cf080353d16a964jpeg', 5);
INSERT INTO `food` VALUES (22, '嫩香烤肠比萨', 39.00, 31.20, '饱满弹嫩的香肠烤制后，肉香浓郁，口口香腴！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:香肠、番茄、青椒、芝味酱', 100, 1248101699, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/e318539544c5ad72d97bf3171015d3f9jpeg', 33);
INSERT INTO `food` VALUES (26, '黑松露风味菌菇鸡肉比萨', 59.00, 47.20, '黑松露风味酱融入杏鲍菇、白玉菇、烟熏鸡肉丁，鲜美嫩滑。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:烟熏鸡肉丁、培根、菌菇、青豆', 100, 1248101699, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/26e94b7df0c8068b99d3e7647d619a24jpeg', 24);
INSERT INTO `food` VALUES (30, '可可布朗尼比萨', 28.00, 22.40, '绵密松软布朗尼蛋糕粒，细滑可可粉，温热香甜，醇郁顺滑！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 7\"/9\"/12\"(205g/330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:布朗尼蛋糕粒、可可粉', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/bd88d0977ee5bae07d3c3a43fe56f394jpeg', 22);
INSERT INTO `food` VALUES (31, '缤纷水果比萨', 28.00, 22.40, '大块黄桃果肉，搭配香甜椰果、菠萝，缤纷荟萃！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 7\"/9\"/12\"(205g/330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:黄桃、菠萝、椰果、蓝莓果味酱', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/7413dba96f6d197ac0eba34b8ca82d3ajpeg', 34);
INSERT INTO `food` VALUES (32, '橙香酥鸭比萨', 39.00, 31.20, '香酥鸭肉，香橙浸润，酥嫩芝香！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:橙香鸭肉、玉米、香芹片', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/4af4509824dec11fa3cbe7cdb1b20dfdjpeg', 15);
INSERT INTO `food` VALUES (33, '大块酣享嫩肉比萨', 39.00, 31.20, '大块嫩肉，味美肉鲜，交融进口浓醇芝士，大块朵颐！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:嫩肉片、青豆、番茄、美乃滋', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/7596550d651f170629f242893ace6a80jpeg', 16);
INSERT INTO `food` VALUES (34, '美国风情土豆培根比萨', 45.00, 36.00, '美国进口酥香薯角，甄选培根片，旗舰人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:培根、薯角、美乃滋', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/913f9a3a670b91bf621ff41a022958dbjpeg', 242);
INSERT INTO `food` VALUES (35, '夏威夷风情比萨', 45.00, 36.00, '进口菠萝和火腿片组合，全球人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:火腿、菠萝', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/9cb407476d609b0acc356ff3f4f39f56jpeg', 164);
INSERT INTO `food` VALUES (36, '德式图林根风味香肠比萨', 48.00, 38.40, '德式经典的图林根风味香肠，口口喷香！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:图林根风味香肠、青椒、玉米、洋葱、番茄辣椒酱', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/e28b49f2924cd000bdc6854cb5b5d5c3jpeg', 9);
INSERT INTO `food` VALUES (37, '浓香脆鸡菠萝比萨', 48.00, 38.40, '嫩香多汁，人气产品！进口菠萝，甜酸相宜！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:浓香鸡块、番茄、菠萝', 100, 1237932461, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/f3c3d0134bc1fce07a92005ccf1f48eajpeg', 17);
INSERT INTO `food` VALUES (38, '韩式酱香烤肉比萨', 59.00, 47.20, '臻选猪梅花肉，软嫩多汁，搭配韩式烤肉酱，甜鲜微辣，浓香肆溢！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:韩式风味烤猪肉、意式香肠丁、番茄、青豆', 100, 1237935930, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/0fcdb30ea8bf98a87b049cad6e2ba0c0jpeg', 12);
INSERT INTO `food` VALUES (39, '照烧风味牛肉土豆比萨', 59.00, 47.20, '甄选牛肉，香浓蛋黄风味酱，美国进口酥香薯角，经典升级！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:照烧风味牛肉、培根、薯角、青豆、芝味酱', 100, 1237935930, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/95dfd9df8ef47e36a247ef207c57dd50jpeg', 34);
INSERT INTO `food` VALUES (40, '豪华尊享比萨', 59.00, 47.20, '意式香肠片、意式香肠丁、火腿搭配，丰盛享受！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:意式香肠片、意式香肠丁、火腿、青椒、蘑菇、洋葱', 100, 1237935930, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/d1b076a569cdba472e71efba9bafbe6ejpeg', 41);
INSERT INTO `food` VALUES (41, '意式腊肠比萨', 59.00, 47.20, '进口芝士和意式腊肠组合，道地美味！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:意式香肠片', 100, 1237935930, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/4bb7b207259b75e0257e92f0be77e692jpeg', 31);
INSERT INTO `food` VALUES (42, '多重浓芝比萨', 59.00, 47.20, '多重浓醇芝士，绵厚软糯，拉丝丰富，芝香肆溢！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g) \n主要原料:马苏里拉芝士、再制干酪：巴马臣风味芝士、艾蒙塔比萨芝士、车达风味芝士丁', 100, 1237935930, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/3e8085cea6c885b5da99455a6fbb4f37jpeg', 15);
INSERT INTO `food` VALUES (43, 'BBQ鸡肉比萨', 59.00, 47.20, 'BBQ烧烤酱配上烟熏鸡肉丁，嫩滑酥香，喷香肆溢！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:烟熏鸡肉丁、玉米、洋葱、美乃滋', 100, 1237935930, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/326ae4288fc7e624872dbe59ee141725jpeg', 21);
INSERT INTO `food` VALUES (44, '金枪鱼比萨', 59.00, 47.20, '香嫩的金枪鱼，多款香肠火腿，味美肉香！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:金枪鱼、意式香肠片、火腿、意式香肠丁、玉米', 100, 1237935930, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/1c8b5a75a0e2e122c0a35c90fad6b31cjpeg', 25);
INSERT INTO `food` VALUES (45, '果肉榴莲比萨', 69.00, 55.20, '泰国进口金枕榴莲，大块真实果肉，与浓醇芝士交织，甜香浓郁！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:进口金枕头榴莲果肉', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/73c8ae44f8bba22e20bc04da89c594ccjpeg', 26);
INSERT INTO `food` VALUES (46, '珠圆富贵虾球比萨', 69.00, 55.20, '浓郁肉汁的意式肉酱，加上饱满鲜香的猪肉球、虾肉球，融入进口芝士，圆圆满满，新年富贵如意！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:猪肉丸、虾球、番茄、青豆', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/594fed7849b358d2eecea28485972775jpeg', 4);
INSERT INTO `food` VALUES (47, '尊享牛油果芝士鸡比萨', 72.00, 57.60, '秘鲁进口牛油果，搭配芝士风味鸡块，尊享美味！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:牛油果、芝士风味鸡块、培根、番茄、芝味酱', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/62356929081d9b91751acde90fa59fa6jpeg', 6);
INSERT INTO `food` VALUES (48, '照烧风味章鱼虾仁比萨', 72.00, 57.60, '美味章鱼、嫩滑虾仁与香浓的照烧风味酱交融，丝丝入味！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:章鱼、虾仁、蘑菇、洋葱、美乃滋', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/6235887e82439b9dfafb4bbe967b5ff0jpeg', 10);
INSERT INTO `food` VALUES (49, '黑松露风味牛肉比萨', 72.00, 57.60, '黑松露风味底酱，甄选牛肉片，尊享美味！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:牛肉、火腿、蘑菇、玉米、西兰花', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/d24c706487a86f10dd5e4dd170ae01e7jpeg', 7);
INSERT INTO `food` VALUES (50, '法式香焗蜗牛比萨', 72.00, 57.60, '肥美鲜嫩蜗牛，香焗入味, 经典法式烹调，尊享盛宴！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:蜗牛、西兰花、番茄、薯宝', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/2d4fed6ce9c02e86ca75518d687cddfejpeg', 5);
INSERT INTO `food` VALUES (51, '香甜双虾菠萝比萨', 69.00, 55.20, '脆嫩烤虾仁，嫩滑虾仁，进口菠萝，香甜好滋味！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:虾仁、脆嫩烤虾仁、菠萝、美乃滋', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/0c419586c8f11eba62eb612f9f324adcjpeg', 13);
INSERT INTO `food` VALUES (52, '肉香四溢比萨', 69.00, 55.20, '多种肉食与进口芝士融合，肉香肆溢！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:火腿、意式香肠片、意式香肠丁、培根、番茄、洋葱', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:45', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/92930e7f0254e5d4f1f56ebaad7759e2jpeg', 12);
INSERT INTO `food` VALUES (53, '小龙虾酥香嫩鸡比萨', 72.00, 57.60, '十三香小龙虾搭配浓香鸡块，Q弹饱满，喷香肆溢！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n经典手拍饼底 9\"/12\"(330g/580g)\n轻巧薄脆饼底 9\"/12\"(220g/370g)\n主要原料:小龙虾、浓香鸡块、烟熏鸡肉丁、玉米、青椒、番茄辣椒酱', 100, 1238670893, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/020179c7a0d940dd97de237e391babcfjpeg', 8);
INSERT INTO `food` VALUES (54, '美国风情土豆培根比萨（双层芝心卷边）', 64.00, 51.20, '双层芝心卷边，美国进口酥香薯角，甄选培根片，旗舰人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:培根、薯角、美乃滋', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/60f7df314ccbd53a7c458faebfc6eef9jpeg', 73);
INSERT INTO `food` VALUES (55, '夏威夷风情比萨（双层芝心卷边）', 64.00, 51.20, '双层芝心卷边，进口菠萝和火腿片组合，全球人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:火腿、菠萝', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/24fc468dd2697c1597f0c0a3d64f03f8jpeg', 53);
INSERT INTO `food` VALUES (56, '浓香脆鸡菠萝比萨（双层芝心卷边）', 67.00, 53.60, '双层芝心卷边，嫩香多汁，人气产品！进口菠萝，甜酸相宜！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:浓香鸡块、番茄、菠萝', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/81f296f90613d5c5a845f1d50bb33970jpeg', 12);
INSERT INTO `food` VALUES (57, '德式图林根风味香肠比萨（双层芝心卷边）', 67.00, 53.60, '双层芝心卷边，德式经典的图林根风味香肠，口口喷香！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:图林根风味香肠、青椒、玉米、洋葱、番茄辣椒酱', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/3f47bfaac99db585f616112bd261c805jpeg', 13);
INSERT INTO `food` VALUES (58, '豪华尊享比萨（双层芝心卷边）', 78.00, 62.40, '双层芝心卷边，意式香肠片、意式香肠丁、火腿搭配，丰盛享受！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:意式香肠片、意式香肠丁、火腿、青椒、蘑菇、洋葱', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/1a5ea7dd2aa8e904cfe419f1a8e44b1bjpeg', 17);
INSERT INTO `food` VALUES (59, '照烧风味牛肉土豆比萨（双层芝心卷边）', 107.00, 85.60, '双层芝心卷边，甄选牛肉，香浓蛋黄风味酱，美国进口酥香薯角，经典升级！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:照烧风味牛肉、培根、薯角、青豆、芝味酱', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/d8c4be084318169f697967237edca4f2jpeg', 16);
INSERT INTO `food` VALUES (60, '果肉榴莲比萨（双层芝心卷边）', 88.00, 70.40, '双层芝心卷边，泰国进口金枕榴莲，大块真实果肉，与浓醇芝士交织，甜香浓郁！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:进口金枕头榴莲果肉', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/7913add7155ba2ef307451fb68ed3c2cjpeg', 6);
INSERT INTO `food` VALUES (61, '尊享牛油果芝士鸡比萨（双层芝心卷边）', 91.00, 72.80, '双层芝心卷边，秘鲁进口牛油果，搭配芝士风味鸡块，尊享美味！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:牛油果、芝士风味鸡块、培根、番茄、芝味酱', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/8dd046f8e5a3f37fd94ab3e571fc4cfejpeg', 2);
INSERT INTO `food` VALUES (62, '照烧风味章鱼虾仁比萨（双层芝心卷边）', 91.00, 72.80, '双层芝心卷边，美味章鱼、嫩滑虾仁与香浓的照烧风味酱交融，丝丝入味！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:章鱼、虾仁、蘑菇、洋葱、美乃滋', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/842839cdf9bc2d3bda6ea7eaada8df75jpeg', 7);
INSERT INTO `food` VALUES (63, '珠圆富贵虾球比萨（双层芝心卷边）', 88.00, 70.40, '双层芝心卷边，浓郁肉汁的意式肉酱，加上饱满鲜香的猪肉球、虾肉球，融入进口芝士，圆圆满满，新年富贵如意！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:猪肉丸、虾球、番茄、青豆', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:46', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/9005606ba706a504d1d9d8a15876f558jpeg', 2);
INSERT INTO `food` VALUES (64, '肉香四溢比萨（双层芝心卷边）', 88.00, 70.40, '双层芝心卷边，多种肉食与进口芝士融合，肉香肆溢！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝心卷边饼底 9\"/12\"(420g/715g)\n主要原料:火腿、意式香肠片、意式香肠丁、培根、番茄、洋葱', 100, 1236383880, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/a8617240e67229e547d95453515c90f0jpeg', 6);
INSERT INTO `food` VALUES (65, '美国风情土豆培根比萨（芝香烤肠卷边）', 64.00, 51.20, '芝香烤肠卷边，美国进口酥香薯角，甄选培根片，旗舰人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n芝香烤肠卷边饼底 9\"/12\"(440g/745g)\n主要原料:培根、薯角、美乃滋', 100, 14379190, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/8bf7e26ffefaa13d77d535c4ef5b2e5bjpeg', 21);
INSERT INTO `food` VALUES (66, '夏威夷风情比萨（芝香烤肠卷边）', 64.00, 51.20, '芝香烤肠卷边，进口菠萝和火腿片组合，全球人气！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n芝香烤肠卷边饼底 9\"/12\"(440g/745g)\n主要原料:火腿、菠萝', 100, 14379190, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/e45c0301891101b16415d9c6e5a075dcjpeg', 22);
INSERT INTO `food` VALUES (67, '浓香脆鸡菠萝比萨（芝香烤肠卷边）', 67.00, 53.60, '芝香烤肠卷边，嫩香多汁，人气产品！进口菠萝，甜酸相宜！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n芝香烤肠卷边饼底 9\"/12\"(440g/745g)\n主要原料:浓香鸡块、番茄、菠萝', 100, 14379190, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/a3cbbe72c7ae1d1044ed6235fe77a4f6jpeg', 16);
INSERT INTO `food` VALUES (68, '德式图林根风味香肠比萨（芝香烤肠卷边）', 67.00, 53.60, '芝香烤肠卷边，德式经典的图林根风味香肠，口口喷香！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n芝香烤肠卷边饼底 9\"/12\"(440g/745g)\n主要原料:图林根风味香肠、青椒、玉米、洋葱、番茄辣椒酱', 100, 14379190, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/f15b0ae23cf39cdfd486a0a93f478605jpeg', 10);
INSERT INTO `food` VALUES (69, '豪华尊享比萨（芝香烤肠卷边）', 78.00, 62.40, '芝香烤肠卷边，意式香肠片、意式香肠丁、火腿搭配，丰盛享受！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n芝香烤肠卷边饼底 9\"/12\"(440g/745g)\n主要原料:意式香肠片、意式香肠丁、火腿、青椒、蘑菇、洋葱', 100, 14379190, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/c0188a3134cc9ab5f57b87bb1807fffejpeg', 11);
INSERT INTO `food` VALUES (70, '果肉榴莲比萨（芝香烤肠卷边）', 88.00, 70.40, '芝香烤肠卷边，泰国进口金枕榴莲，大块真实果肉，与浓醇芝士交织，甜香浓郁！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n芝香烤肠卷边饼底 9\"/12\"(440g/745g)\n主要原料:进口金枕头榴莲果肉', 100, 14379190, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/88bdd67cee13b3d9e26e0313f23e66aejpeg', 3);
INSERT INTO `food` VALUES (71, '珠圆富贵虾球比萨（芝香烤肠卷边）', 88.00, 70.40, '芝香烤肠卷边，浓郁肉汁的意式肉酱，加上饱满鲜香的猪肉球、虾肉球，融入进口芝士，圆圆满满，新年富贵如意！\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n芝香烤肠卷边饼底 9\"/12\"(440g/745g)\n主要原料:猪肉丸、虾球、番茄、青豆', 100, 14379190, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/0482cb8b00af0e3e2128dac0c33c9120jpeg', 5);
INSERT INTO `food` VALUES (72, '美国风情土豆培根比萨（双层芝士多多饼底）', 64.00, 51.20, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:培根、薯角、美乃滋', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/91972f3d5825514642c4a6e078cd1faajpeg', 33);
INSERT INTO `food` VALUES (73, '夏威夷风情比萨（双层芝士多多饼底）', 64.00, 51.20, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:火腿、菠萝', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/b4acbe553f1699f08d2c4d84c2890876jpeg', 15);
INSERT INTO `food` VALUES (74, '可可布朗尼比萨（双层芝士多多饼底）', 64.00, 51.20, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:布朗尼蛋糕粒、可可粉', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/02f0b5591b95c61a42c855b7f0d2769cjpeg', 3);
INSERT INTO `food` VALUES (75, '缤纷水果比萨（双层芝士多多饼底）', 64.00, 51.20, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:黄桃、菠萝、椰果、蓝莓果味酱', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/5159a07ee2d56600bbd7bba36c2f2e40jpeg', 3);
INSERT INTO `food` VALUES (76, '浓香脆鸡菠萝比萨（双层芝士多多饼底）', 67.00, 53.60, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:浓香鸡块、番茄、菠萝', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/7bfe0b811888327c30f8b31528b17c5djpeg', 5);
INSERT INTO `food` VALUES (77, '德式图林根风味香肠比萨（双层芝士饼底）', 67.00, 53.60, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:图林根风味香肠、青椒、玉米、洋葱、番茄辣椒酱', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/a98f0f13c4aed7e5f6ee5bd28dcedfccjpeg', 2);
INSERT INTO `food` VALUES (78, '豪华尊享比萨（双层芝士多多饼底）', 78.00, 62.40, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:意式香肠片、意式香肠丁、火腿、青椒、蘑菇、洋葱', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/423be831c918b8748941848e2d74a8a1jpeg', 5);
INSERT INTO `food` VALUES (79, '果肉榴莲比萨（双层芝士多多饼底）', 88.00, 70.40, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:进口金枕头榴莲果肉', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/99ce5c7cce0ffcb3bd44586ed29e7331jpeg', 2);
INSERT INTO `food` VALUES (80, '香甜双虾菠萝比萨（双层芝士多多饼底）', 88.00, 70.40, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:虾仁、脆嫩烤虾仁、菠萝、美乃滋', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/5e1b01acdc6294fadcf0a9e04350a3e8jpeg', 7);
INSERT INTO `food` VALUES (81, '法式香焗蜗牛比萨（双层芝士多多饼底）', 120.00, 96.00, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:蜗牛、西兰花、番茄、薯宝', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:47', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/f37eb1790bccdd4488d8a5e31c8623e1jpeg', 5);
INSERT INTO `food` VALUES (82, '照烧风味章鱼虾仁比萨（双层芝士多多饼底）', 91.00, 72.80, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:章鱼、虾仁、蘑菇、洋葱、美乃滋', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/beb8e81f5325b36c6e5db20bbbbfeb75jpeg', 5);
INSERT INTO `food` VALUES (83, '黑松露风味牛肉比萨（双层芝士多多饼底）', 91.00, 72.80, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 9\"/12\"(450g/790g)\n双层芝士多多饼底(薄款) 9\"/12\"(335g/580g)\n主要原料:牛肉、火腿、蘑菇、玉米、西兰花', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/b3700ac710782b30e123cad8fe3a58ecjpeg', 7);
INSERT INTO `food` VALUES (84, '肉香四溢比萨12英寸双层芝士多多饼底厚款', 58.50, 46.80, '芝香浓郁的双层芝士多多饼底：双层饼底加上马苏里拉芝士和芝士酱。\n下述克重为含以下饼底的比萨进烤炉前(生料)的克重: \n双层芝士多多饼底(厚款) 12\"(790g)\n主要原料:火腿、意式香肠片、意式香肠丁、培根、番茄、洋葱\n主要原料: 其他', 100, 1238862688, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/dd1a4641d4f3ef70f36a5dbf27e0729ajpeg', 0);
INSERT INTO `food` VALUES (85, '酥香薯角', 6.00, 4.80, '下述克重为进烤炉前(生料)的克重: \n125g\n主要原料：薯角\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/bb7b8c6c47ca5d309941243b6f5329edjpeg', 89);
INSERT INTO `food` VALUES (86, '酥糯薯宝', 14.00, 11.20, '美国进口薯宝，外酥内糯，绵滑细腻！\n下述克重为进烤炉前(生料)的克重: \n12个/85g\n主要原料：薯宝\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/a81306a4fb7fae51c3313530ff6e8f0bjpeg', 81);
INSERT INTO `food` VALUES (87, '阳光蔬菜色拉', 14.00, 11.20, '高品质芝麻菜、紫甘蓝、番茄、胡萝卜丝等。产品及包装等以实际出品为准，菜品图片仅供参考\n下述克重为进烤炉前(生料)的克重: \n80g\n主要原料：阳光蔬菜沙拉\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/6924771c1cbcc53963a03fb3e52f5880jpeg', 49);
INSERT INTO `food` VALUES (88, '酥香嫩鱼块', 16.00, 12.80, '下述克重为进烤炉前(生料)的克重: \n10块/80g\n主要原料：鱼块\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/62ed15b6e5e6c254c6481f6c1a9988d0jpeg', 30);
INSERT INTO `food` VALUES (89, '热狗面包卷', 16.00, 12.80, '下述克重为进烤炉前(生料)的克重: \n4个/128g\n主要原料：香肠、面团\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/2d8ea688c25ac7a97abe80ead40d99e2jpeg', 88);
INSERT INTO `food` VALUES (90, '蛋香鸡肉卷', 18.00, 14.40, '金黄酥脆外皮，包裹浓浓嫩滑蛋香酱，烟熏鸡肉丁和青豆更添丰盛口感！\n下述克重为进烤炉前(生料)的克重: \n4个/105g\n主要原料：烟熏鸡肉丁、香浓蛋黄风味酱、青豆、面饼\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/79fd94fc3bc6ed9da80fbe298983802djpeg', 36);
INSERT INTO `food` VALUES (91, '酥嫩狭鳕鱼棒', 18.00, 14.40, '下述克重为进烤炉前(生料)的克重: \n4根/80g\n主要原料：狭鳕鱼条\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/9ce242b2b239f74d99ad11538592a4b1jpeg', 43);
INSERT INTO `food` VALUES (92, '脆嫩烤虾仁', 18.00, 14.40, '下述克重为进烤炉前(生料)的克重: \n8个/60g\n主要原料：虾仁\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/49a0de821d3d1bd8659e8588b7657d62jpeg', 32);
INSERT INTO `food` VALUES (93, '美乐嫩汁鸡块', 22.00, 17.60, '下述克重为进烤炉前(生料)的克重: \n115g\n主要原料：鸡块\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/a0636b6637b657e94531f4b849eebbf4jpeg', 241);
INSERT INTO `food` VALUES (94, '藤椒风味嫩香鸡腿', 26.00, 20.80, '扇形大鸡腿，藤椒风味腌制香烤，细腻酥嫩，香麻多汁！\n下述克重为进烤炉前(生料)的克重: \n2个/200g\n主要原料：藤椒风味鸡腿\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/f6783b746183766dfec1455ffbc9514bjpeg', 34);
INSERT INTO `food` VALUES (95, '单份烤翅-孜然味', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n4个/130g\n主要原料：孜然风味鸡翅\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/997f4e93aafb59805fc85e7e7af46349jpeg', 41);
INSERT INTO `food` VALUES (96, '单份烤翅-麻辣味', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n4个/130g\n主要原料：麻辣风味鸡翅\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/997f4e93aafb59805fc85e7e7af46349jpeg', 10);
INSERT INTO `food` VALUES (97, '单份烤翅-蜜汁味', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n4个/130g\n主要原料：蜜汁风味鸡翅\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/997f4e93aafb59805fc85e7e7af46349jpeg', 142);
INSERT INTO `food` VALUES (98, '单份烤翅-奥尔良风味', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n4个/130g\n主要原料：奥尔良风味鸡翅\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/997f4e93aafb59805fc85e7e7af46349jpeg', 63);
INSERT INTO `food` VALUES (99, '烤翅拼盘', 46.00, 36.80, '奥尔良风味、蜜汁、麻辣、孜然，香嫩多汁，一盘丰享四味！\n下述克重为进烤炉前(生料)的克重: \n265g\n主要原料：孜然/麻辣/蜜汁/奥尔良风味烤翅\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:48', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/68cca298d1c62f1f184a0b633b47d30bjpeg', 52);
INSERT INTO `food` VALUES (100, '海陆拼盘', 46.00, 36.80, '热狗面包卷（2个）、美乐嫩汁鸡块（3块）、酥香嫩鱼块（1份）、酥糯薯宝（1份）\n下述克重为进烤炉前(生料)的克重: \n270g\n主要原料：热狗面包卷、美乐嫩汁鸡块、酥香嫩鱼块、酥糯薯宝\n主要原料: 其他', 100, 4556528, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/ba03eec9ae838b33dee16290480fd7b6jpeg', 38);
INSERT INTO `food` VALUES (101, '意大利风情肉酱面', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n345g\n主要原料：意大利面、意式肉酱、西兰花、樱桃番茄\n主要原料: 其他', 100, 4556542, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/6dc45a0bd27616c1b423590c69a0db85jpeg', 223);
INSERT INTO `food` VALUES (102, '罗勒培根面', 26.00, 20.80, '下述克重为进烤炉前(生料)的克重: \n345g\n主要原料：意大利面、奶油罗勒酱、西兰花、培根\n主要原料: 其他', 100, 4556542, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/a0f1521500b0a7b5625867e178dc7aa5jpeg', 73);
INSERT INTO `food` VALUES (103, '椰香咖喱鸡肉意面', 26.00, 20.80, '咖喱遇见椰汁，两种同源的舌尖体会，搭配香嫩鸡肉，飘香四溢！\n下述克重为进烤炉前(生料)的克重: \n345g\n主要原料：意大利面、泰式红咖喱酱、青椒、樱桃番茄、浓香鸡块\n主要原料: 其他', 100, 4556542, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/1122f9d1adafa8a2a0b98de13b37efb9jpeg', 22);
INSERT INTO `food` VALUES (104, '咖喱牛腩焗饭', 29.00, 23.20, '下述克重为进烤炉前(生料)的克重: \n360g\n主要原料：米饭、咖喱牛肉、马苏里拉芝士\n主要原料: 其他', 100, 4556542, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/0896c6081897332f62ba01c62e00fccbjpeg', 98);
INSERT INTO `food` VALUES (105, '鱿鱼虾仁海鲜焗饭', 29.00, 23.20, '鱿鱼，虾仁和青口贝, 搭配鸡肉、猪肉，喷香丰盛，热力迸发！\n下述克重为进烤炉前(生料)的克重: \n360g\n主要原料：米饭、海鲜、马苏里拉芝士\n主要原料: 其他', 100, 4556542, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/f5294c8c786cefbb2dfca8e67aac540fjpeg', 39);
INSERT INTO `food` VALUES (106, '香蒜香烤大面包', 14.00, 11.20, '下述克重为进烤炉前(生料)的克重: \n175g\n主要原料：面团\n主要原料: 其他', 100, 4556554, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/d22fb939f451b3d6707d7acf1b7d61d0jpeg', 39);
INSERT INTO `food` VALUES (107, '起司香烤大面包', 16.00, 12.80, '下述克重为进烤炉前(生料)的克重: \n175g\n主要原料：面团、马苏里拉芝士、车达风味芝士\n主要原料: 其他', 100, 4556554, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/19dc2880cbcba7d525d3462d639be871jpeg', 14);
INSERT INTO `food` VALUES (108, '芝士火腿满溢包', 18.00, 14.40, '下述克重为进烤炉前(生料)的克重: \n190g\n主要原料：面团、马苏里拉芝士、车达风味芝士、火腿\n主要原料: 其他', 100, 4556554, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/7823659cb9dd23e351fdf14b42faff1bjpeg', 42);
INSERT INTO `food` VALUES (109, '招牌蛋挞（2个）', 10.00, 8.00, '下述克重为进烤炉前(生料)的克重: \n45g\n主要原料：蛋挞\n主要原料: 其他', 100, 4556563, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/5bff9b2ad9aee86b853ecf02479aacdbjpeg', 119);
INSERT INTO `food` VALUES (110, '招牌蛋挞礼盒（5个）', 20.00, 16.00, '下述克重为进烤炉前(生料)的克重: \n110g\n主要原料：蛋挞\n主要原料: 其他', 100, 4556563, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/6b242dd468adad30498d75b227c758ddjpeg', 35);
INSERT INTO `food` VALUES (111, '香酥苹果派', 12.00, 9.60, '轻咬酥脆表皮，浓郁果酱顷刻荡漾，清甜绵密！\n下述克重为进烤炉前(生料)的克重: \n4个/90g\n主要原料：苹果派\n主要原料: 其他', 100, 4556563, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/62d95a4f831563829d79cc3692e74597jpeg', 19);
INSERT INTO `food` VALUES (112, '巧克力熔浆蛋糕', 16.00, 12.80, '下述克重为进烤炉前(生料)的克重: \n80g\n主要原料：巧克力熔浆蛋糕\n主要原料: 其他', 100, 4556563, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/423822a43ef5612c72370f0efa1dad09jpeg', 49);
INSERT INTO `food` VALUES (113, '浓醇黑糖风味奶茶（325ML）', 11.00, 8.80, '甜蜜黑糖风味，奶香蔓溢，温暖美好。\n\n主要原料：水、黑糖风味奶茶粉\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/5d58bd864ff59be45c21783825f9277bjpeg', 19);
INSERT INTO `food` VALUES (114, '经典香滑热可可饮（325ML）', 11.00, 8.80, '经典可可风味，醇郁丝滑，香浓回味。\n主要原料：水、巧克力固体饮料粉\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/64bbabd18925a498b6cc642cd73d0f87jpeg', 23);
INSERT INTO `food` VALUES (115, '红枣牛奶风味饮（325ML）', 11.00, 8.80, '真实红枣果肉，奶香延绵，暖热润心。\n主要原料：水、红枣牛奶风味粉\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/210ea60916bd06ca564ce18aeaa4ef89jpeg', 18);
INSERT INTO `food` VALUES (116, '冰露纯悦水（550ML）', 5.00, 4.00, '主要原料：水\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/d4edd4b0f9321efc613f92405a74ca2djpeg', 8);
INSERT INTO `food` VALUES (117, '可口可乐（330ML）', 6.00, 4.80, '主要原料：可口可乐\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:49', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/c01beed13793b0f7563a3817e03c58c5jpeg', 66);
INSERT INTO `food` VALUES (118, '健怡可乐（330ML）', 6.00, 4.80, '主要原料：健怡可乐\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:50', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/5d3a5d5f69a0ce5c14896ec882ca6c5ejpeg', 15);
INSERT INTO `food` VALUES (119, '都乐果汁（240ML）', 9.00, 7.20, '主要原料：都乐果汁\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:50', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/ac89b70b2f39561e6d8f7d80800ea717jpeg', 24);
INSERT INTO `food` VALUES (120, '可口可乐（1.25L）', 13.00, 10.40, '主要原料：可口可乐\n主要原料: 其他', 100, 4556569, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:50', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/3847cb5f54d4d274d471ed830ef6f7d7jpeg', 28);
INSERT INTO `food` VALUES (121, '奶油蘑菇汤', 16.00, 12.80, '160ML\n主要原料：奶油蘑菇汤\n主要原料: 其他', 100, 4556575, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:43', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/6fa1e8c8855f4b6424635972508eb5dejpeg', 142);
INSERT INTO `food` VALUES (122, '黑松露菌菇汤', 18.00, 14.40, '160ML\n主要原料：黑松露菌菇汤\n主要原料: 其他', 100, 4556575, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:50', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/5cfd7ffc7bc1ae98837f924f4460876ejpeg', 26);
INSERT INTO `food` VALUES (123, '经典牛肉罗宋汤', 18.00, 14.40, '经典人气罗宋汤，更添酥嫩牛肉，酸甜鲜美！\n160ML\n主要原料：蔬菜牛肉汤\n主要原料: 其他', 100, 4556575, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:50', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/72191be8406728a74eca9646e9e63b0djpeg', 38);
INSERT INTO `food` VALUES (124, '新品比萨套餐', 88.00, 70.40, '黑松露风味菌菇鸡肉比萨9英寸（经典手拍） 1个；美乐嫩汁鸡块 1份；红枣牛奶风味饮（325ML）1杯；浓醇黑糖风味奶茶（325ML） 1杯', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/bc5e551ab8f9b27531e00fd19d03fe8djpeg', 8);
INSERT INTO `food` VALUES (125, '多人分享套餐', 188.00, 150.40, '黑松露风味菌菇鸡肉比萨9英寸（经典手拍） 1个；珠圆富贵虾球比萨9英寸（经典手拍） 1个；海陆拼盘 1份；经典香滑热可可饮（325ML）2杯；红枣牛奶风味饮（325ML）1杯；浓醇黑糖风味奶茶（325ML） 1杯', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/b141d87352d0df648cf080353d16a964jpeg', 5);
INSERT INTO `food` VALUES (126, '个人悠享套餐A', 39.00, 31.20, '嫩香烤肠比萨9英寸（经典手拍） 1个；浓醇黑糖风味奶茶（325ML） 1杯', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/2ea57b7c06baafa9089c4b345d2b5de9jpeg', 39);
INSERT INTO `food` VALUES (127, '个人悠享套餐B', 35.00, 28.00, '咖喱牛腩焗饭 1份；蛋香鸡肉卷 1份；浓醇黑糖风味奶茶（325ML） 1杯。', 100, 15881976, 0, '2019-03-22 01:30:15', '2019-03-22 09:11:44', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/7b4e3489d37bc3c3b20b870994e5e8ecjpeg', 29);
INSERT INTO `food` VALUES (128, '测试菜品1', 22.22, 11.11, '测试描述1', NULL, 4556528, 0, '2019-04-09 13:36:50', NULL, 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/41058c7df4fcc58629f994f4bd3bb5e8.png', 0);
INSERT INTO `food` VALUES (130, 'ceshi\\', NULL, NULL, NULL, NULL, NULL, 0, '2019-04-09 23:06:42', NULL, NULL, 0);
INSERT INTO `food` VALUES (131, '测试菜品2', 35.00, 30.00, '测试介绍2', NULL, 4556528, 0, '2019-04-09 23:07:57', '2019-04-12 08:15:50', 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/41058c7df4fcc58629f994f4bd3bb5e8.png', 0);
COMMIT;

-- ----------------------------
-- Table structure for foodcategory
-- ----------------------------
DROP TABLE IF EXISTS `foodcategory`;
CREATE TABLE `foodcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `priority` tinyint(4) DEFAULT '3',
  `icon_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1248101700 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foodcategory
-- ----------------------------
BEGIN;
INSERT INTO `foodcategory` VALUES (4556528, '小食', '', '2019-03-22 01:48:58', '2019-03-22 14:25:26', 3, NULL);
INSERT INTO `foodcategory` VALUES (4556542, '面饭', '', '2019-03-22 01:48:58', '2019-03-22 14:25:28', 3, NULL);
INSERT INTO `foodcategory` VALUES (4556554, '面包', '', '2019-03-22 01:48:58', '2019-03-22 14:25:30', 3, NULL);
INSERT INTO `foodcategory` VALUES (4556563, '甜品', '', '2019-03-22 01:48:58', '2019-03-22 14:25:32', 3, NULL);
INSERT INTO `foodcategory` VALUES (4556569, '饮品', '', '2019-03-22 01:48:58', '2019-03-22 14:25:34', 3, NULL);
INSERT INTO `foodcategory` VALUES (4556575, '汤', '', '2019-03-22 01:48:58', '2019-03-22 14:25:36', 3, NULL);
INSERT INTO `foodcategory` VALUES (14379190, '芝香烤肠卷边', '', '2019-03-22 01:48:58', '2019-03-22 14:25:39', 3, NULL);
INSERT INTO `foodcategory` VALUES (15881976, '优惠', '美味又实惠，大家快来抢', '2019-03-22 01:48:58', '2019-03-22 14:53:35', 2, 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/latestfood.png');
INSERT INTO `foodcategory` VALUES (1236383880, '双层芝心卷边', '', '2019-03-22 01:48:58', '2019-03-22 14:25:41', 3, NULL);
INSERT INTO `foodcategory` VALUES (1237932461, '物超所值系列', '', '2019-03-22 01:48:58', '2019-03-22 14:25:43', 3, NULL);
INSERT INTO `foodcategory` VALUES (1237935930, '经典风味系列', '', '2019-03-22 01:48:58', '2019-03-22 14:25:44', 3, NULL);
INSERT INTO `foodcategory` VALUES (1238670893, '甄选尊享系列', '', '2019-03-22 01:48:58', '2019-03-22 14:25:48', 3, NULL);
INSERT INTO `foodcategory` VALUES (1238862688, '双层芝士多多饼底', '加入马苏里拉芝士和芝士酱', '2019-03-22 01:48:58', '2019-03-22 14:35:24', 3, NULL);
INSERT INTO `foodcategory` VALUES (1248101699, '热销', '大家喜欢吃，才叫真好吃', '2019-03-22 01:48:58', '2019-03-22 14:54:29', 1, 'https://pizza-express-app-1252752952.cos.ap-shanghai.myqcloud.com/hot-sale.png');
COMMIT;

-- ----------------------------
-- Table structure for foodmaterial
-- ----------------------------
DROP TABLE IF EXISTS `foodmaterial`;
CREATE TABLE `foodmaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foodId` int(11) DEFAULT NULL,
  `materialName` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foodmaterial
-- ----------------------------
BEGIN;
INSERT INTO `foodmaterial` VALUES (1, 1, '牛肉', 0.50, '2019-03-01 08:31:58', '2019-03-20 13:40:50');
INSERT INTO `foodmaterial` VALUES (2, 1, '鸡肉', 0.25, '2019-03-06 14:18:20', '2019-03-13 13:00:44');
INSERT INTO `foodmaterial` VALUES (3, 1, '面饼', 1.00, '2019-03-20 13:40:46', '2019-03-20 13:41:04');
INSERT INTO `foodmaterial` VALUES (4, 2, '榴莲', 0.75, '2019-03-20 13:41:10', NULL);
INSERT INTO `foodmaterial` VALUES (5, 2, '芝士', 0.25, '2019-03-20 13:41:22', NULL);
INSERT INTO `foodmaterial` VALUES (6, 2, '面饼', 1.00, '2019-03-20 13:41:26', NULL);
INSERT INTO `foodmaterial` VALUES (7, 3, '草莓', 0.25, '2019-03-20 13:41:34', NULL);
INSERT INTO `foodmaterial` VALUES (8, 3, '菠萝', 0.25, '2019-03-20 13:41:39', NULL);
INSERT INTO `foodmaterial` VALUES (9, 3, '桃子', 0.25, '2019-03-20 13:41:49', NULL);
INSERT INTO `foodmaterial` VALUES (10, 3, '面饼', 0.80, '2019-03-20 13:41:54', NULL);
COMMIT;

-- ----------------------------
-- Table structure for foodorder
-- ----------------------------
DROP TABLE IF EXISTS `foodorder`;
CREATE TABLE `foodorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) DEFAULT NULL,
  `foodId` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foodorder
-- ----------------------------
BEGIN;
INSERT INTO `foodorder` VALUES (39, 47, 1, 2, 30.00, '2019-03-20 06:12:12', NULL);
INSERT INTO `foodorder` VALUES (40, 47, 2, 3, 40.00, '2019-03-20 06:12:12', NULL);
INSERT INTO `foodorder` VALUES (41, 47, 3, 2, 30.00, '2019-03-20 06:12:12', NULL);
INSERT INTO `foodorder` VALUES (42, 48, 1, 2, 30.00, '2019-03-20 06:16:15', NULL);
INSERT INTO `foodorder` VALUES (43, 48, 2, 2, 40.00, '2019-03-20 06:16:15', NULL);
INSERT INTO `foodorder` VALUES (44, 50, 26, 1, 59.00, '2019-03-25 06:06:01', NULL);
INSERT INTO `foodorder` VALUES (45, 50, 22, 1, 39.00, '2019-03-25 06:06:01', NULL);
INSERT INTO `foodorder` VALUES (46, 52, 22, 1, 39.00, '2019-03-27 05:47:27', NULL);
INSERT INTO `foodorder` VALUES (47, 52, 26, 1, 59.00, '2019-03-27 05:47:27', NULL);
INSERT INTO `foodorder` VALUES (48, 54, 22, 1, 39.00, '2019-03-27 07:52:23', NULL);
INSERT INTO `foodorder` VALUES (49, 54, 26, 1, 59.00, '2019-03-27 07:52:23', NULL);
INSERT INTO `foodorder` VALUES (50, 55, 26, 1, 59.00, '2019-03-27 17:19:12', NULL);
INSERT INTO `foodorder` VALUES (51, 55, 22, 1, 39.00, '2019-03-27 17:19:12', NULL);
INSERT INTO `foodorder` VALUES (52, 57, 17, 1, 35.00, '2019-03-28 16:11:07', NULL);
INSERT INTO `foodorder` VALUES (53, 58, 22, 1, 39.00, '2019-03-28 16:13:02', NULL);
INSERT INTO `foodorder` VALUES (54, 59, 26, 1, 59.00, '2019-03-28 16:23:50', NULL);
INSERT INTO `foodorder` VALUES (55, 60, 26, 1, 59.00, '2019-03-28 16:25:05', NULL);
INSERT INTO `foodorder` VALUES (56, 60, 17, 1, 35.00, '2019-03-28 16:25:05', NULL);
INSERT INTO `foodorder` VALUES (57, 61, 22, 1, 39.00, '2019-03-28 16:26:33', NULL);
INSERT INTO `foodorder` VALUES (58, 61, 26, 1, 59.00, '2019-03-28 16:26:33', NULL);
INSERT INTO `foodorder` VALUES (59, 61, 17, 1, 35.00, '2019-03-28 16:26:33', NULL);
INSERT INTO `foodorder` VALUES (60, 62, 26, 1, 59.00, '2019-03-28 16:35:04', NULL);
INSERT INTO `foodorder` VALUES (61, 63, 22, 1, 39.00, '2019-03-29 02:08:11', NULL);
INSERT INTO `foodorder` VALUES (62, 64, 22, 1, 39.00, '2019-03-29 02:14:10', NULL);
INSERT INTO `foodorder` VALUES (63, 65, 26, 1, 59.00, '2019-03-29 02:35:36', NULL);
INSERT INTO `foodorder` VALUES (64, 65, 20, 1, 88.00, '2019-03-29 02:35:36', NULL);
INSERT INTO `foodorder` VALUES (65, 65, 125, 1, 188.00, '2019-03-29 02:35:36', NULL);
INSERT INTO `foodorder` VALUES (66, 66, 26, 1, 59.00, '2019-04-03 12:21:52', NULL);
INSERT INTO `foodorder` VALUES (67, 67, 26, 1, 59.00, '2019-04-03 12:30:19', NULL);
INSERT INTO `foodorder` VALUES (68, 67, 22, 1, 39.00, '2019-04-03 12:30:19', NULL);
INSERT INTO `foodorder` VALUES (69, 68, 26, 1, 59.00, '2019-04-03 12:37:22', NULL);
INSERT INTO `foodorder` VALUES (70, 68, 22, 1, 39.00, '2019-04-03 12:37:22', NULL);
INSERT INTO `foodorder` VALUES (71, 69, 26, 1, 59.00, '2019-04-03 17:21:36', NULL);
INSERT INTO `foodorder` VALUES (72, 70, 26, 2, 59.00, '2019-04-04 16:13:56', NULL);
INSERT INTO `foodorder` VALUES (73, 70, 22, 1, 39.00, '2019-04-04 16:13:56', NULL);
INSERT INTO `foodorder` VALUES (74, 71, 22, 1, 39.00, '2019-04-04 19:25:16', NULL);
INSERT INTO `foodorder` VALUES (75, 71, 26, 1, 59.00, '2019-04-04 19:25:16', NULL);
INSERT INTO `foodorder` VALUES (76, 72, 22, 1, 39.00, '2019-04-04 19:28:37', NULL);
INSERT INTO `foodorder` VALUES (77, 72, 26, 1, 59.00, '2019-04-04 19:28:37', NULL);
INSERT INTO `foodorder` VALUES (78, 73, 22, 1, 39.00, '2019-04-04 19:32:31', NULL);
INSERT INTO `foodorder` VALUES (79, 73, 26, 1, 59.00, '2019-04-04 19:32:31', NULL);
INSERT INTO `foodorder` VALUES (80, 74, 22, 1, 39.00, '2019-04-04 19:33:11', NULL);
INSERT INTO `foodorder` VALUES (81, 74, 26, 1, 59.00, '2019-04-04 19:33:11', NULL);
INSERT INTO `foodorder` VALUES (82, 75, 22, 1, 39.00, '2019-04-05 10:05:00', NULL);
INSERT INTO `foodorder` VALUES (83, 75, 26, 1, 59.00, '2019-04-05 10:05:00', NULL);
INSERT INTO `foodorder` VALUES (84, 76, 22, 1, 39.00, '2019-04-05 10:06:21', NULL);
INSERT INTO `foodorder` VALUES (85, 76, 26, 1, 59.00, '2019-04-05 10:06:21', NULL);
INSERT INTO `foodorder` VALUES (86, 77, 22, 1, 39.00, '2019-04-05 10:39:30', NULL);
INSERT INTO `foodorder` VALUES (87, 78, 15, 1, 16.00, '2019-04-05 18:16:01', NULL);
INSERT INTO `foodorder` VALUES (88, 78, 14, 1, 6.00, '2019-04-05 18:16:01', NULL);
INSERT INTO `foodorder` VALUES (89, 79, 26, 2, 59.00, '2019-04-10 13:14:54', NULL);
INSERT INTO `foodorder` VALUES (90, 80, 89, 2, 16.00, '2019-04-10 13:20:24', NULL);
INSERT INTO `foodorder` VALUES (91, 81, 22, 5, 39.00, '2019-04-10 13:43:25', NULL);
INSERT INTO `foodorder` VALUES (92, 82, 22, 5, 39.00, '2019-04-10 13:44:49', NULL);
INSERT INTO `foodorder` VALUES (93, 83, 22, 10, 39.00, '2019-04-10 13:46:31', NULL);
INSERT INTO `foodorder` VALUES (94, 84, 22, 4, 39.00, '2019-04-10 13:51:00', NULL);
INSERT INTO `foodorder` VALUES (95, 85, 94, 4, 26.00, '2019-04-10 13:51:39', NULL);
INSERT INTO `foodorder` VALUES (96, 86, 94, 4, 26.00, '2019-04-10 13:55:12', NULL);
INSERT INTO `foodorder` VALUES (97, 87, 22, 1, 39.00, '2019-04-10 13:57:17', NULL);
INSERT INTO `foodorder` VALUES (98, 88, 22, 4, 39.00, '2019-04-10 14:13:42', NULL);
INSERT INTO `foodorder` VALUES (99, 89, 126, 3, 39.00, '2019-04-10 14:28:53', NULL);
INSERT INTO `foodorder` VALUES (100, 89, 7, 2, 22.00, '2019-04-10 14:28:53', NULL);
INSERT INTO `foodorder` VALUES (101, 89, 10, 2, 26.00, '2019-04-10 14:28:53', NULL);
INSERT INTO `foodorder` VALUES (102, 90, 18, 1, 39.00, '2019-04-10 15:21:44', NULL);
INSERT INTO `foodorder` VALUES (103, 90, 22, 4, 39.00, '2019-04-10 15:21:44', NULL);
INSERT INTO `foodorder` VALUES (104, 91, 22, 1, 39.00, '2019-04-10 15:21:51', NULL);
INSERT INTO `foodorder` VALUES (105, 92, 22, 1, 39.00, '2019-04-10 15:39:35', NULL);
INSERT INTO `foodorder` VALUES (106, 93, 26, 6, 59.00, '2019-04-10 15:51:21', NULL);
INSERT INTO `foodorder` VALUES (107, 93, 17, 3, 35.00, '2019-04-10 15:51:21', NULL);
INSERT INTO `foodorder` VALUES (108, 93, 22, 2, 39.00, '2019-04-10 15:51:21', NULL);
INSERT INTO `foodorder` VALUES (109, 94, 22, 1, 39.00, '2019-04-10 16:02:58', NULL);
INSERT INTO `foodorder` VALUES (110, 95, 22, 1, 39.00, '2019-04-10 16:51:03', NULL);
INSERT INTO `foodorder` VALUES (111, 95, 26, 1, 59.00, '2019-04-10 16:51:03', NULL);
INSERT INTO `foodorder` VALUES (112, 96, 22, 1, 39.00, '2019-04-10 19:08:06', NULL);
INSERT INTO `foodorder` VALUES (113, 97, 26, 2, 59.00, '2019-04-10 19:25:34', NULL);
INSERT INTO `foodorder` VALUES (114, 98, 22, 1, 39.00, '2019-04-11 00:43:49', NULL);
INSERT INTO `foodorder` VALUES (115, 98, 26, 1, 59.00, '2019-04-11 00:43:49', NULL);
INSERT INTO `foodorder` VALUES (116, 99, 26, 1, 59.00, '2019-04-11 00:44:45', NULL);
INSERT INTO `foodorder` VALUES (117, 100, 26, 1, 59.00, '2019-04-11 17:53:05', NULL);
INSERT INTO `foodorder` VALUES (118, 101, 26, 5, 59.00, '2019-04-12 08:26:47', NULL);
COMMIT;

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `supplierId` int(11) DEFAULT NULL,
  `trackId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `checkTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of material
-- ----------------------------
BEGIN;
INSERT INTO `material` VALUES (2, 2, '鸡肉', 50.00, 2, NULL, 1, NULL, '2019-03-01 08:33:21', NULL);
INSERT INTO `material` VALUES (3, 1, '鸡肉', 23.75, 1, 1, 1, NULL, '2019-03-01 08:32:23', '2019-03-13 15:30:32');
INSERT INTO `material` VALUES (4, 2, '榴莲', 50.00, 2, NULL, 1, NULL, '2019-03-13 13:01:37', '2019-03-13 13:01:47');
INSERT INTO `material` VALUES (5, 3, '榴莲', 22.00, 1, NULL, 1, NULL, '2019-03-13 13:01:47', '2019-03-20 06:16:15');
INSERT INTO `material` VALUES (6, 3, '鸡肉', 16.25, 2, NULL, 1, NULL, '2019-03-13 13:01:57', '2019-03-20 06:16:15');
INSERT INTO `material` VALUES (7, 4, '榴莲', 30.00, 1, NULL, 1, NULL, '2019-03-13 13:02:06', NULL);
INSERT INTO `material` VALUES (8, 4, '鸡肉', 50.00, 2, NULL, 1, NULL, '2019-03-13 13:02:16', NULL);
INSERT INTO `material` VALUES (9, 1, '榴莲', -2.00, 1, NULL, 1, NULL, '2019-03-13 14:31:32', '2019-03-13 15:30:32');
INSERT INTO `material` VALUES (10, 1, '草莓', 50.00, 1, NULL, 1, NULL, '2019-03-20 13:43:47', NULL);
INSERT INTO `material` VALUES (11, 2, '菠萝', 50.00, 2, NULL, 1, NULL, '2019-03-20 13:43:54', '2019-03-20 13:43:56');
INSERT INTO `material` VALUES (12, 3, '牛肉', -1.00, 1, NULL, 1, NULL, '2019-03-20 06:12:12', '2019-03-20 06:16:15');
INSERT INTO `material` VALUES (13, 3, '面饼', -4.80, 1, NULL, 1, NULL, '2019-03-20 06:12:12', '2019-03-20 06:16:15');
INSERT INTO `material` VALUES (14, 3, '芝士', -0.50, 1, NULL, 1, NULL, '2019-03-20 06:12:12', '2019-03-20 06:16:15');
INSERT INTO `material` VALUES (15, 3, '草莓', -0.25, 1, NULL, 1, NULL, '2019-03-20 06:12:12', NULL);
INSERT INTO `material` VALUES (16, 3, '菠萝', -0.25, 1, NULL, 1, NULL, '2019-03-20 06:12:12', NULL);
INSERT INTO `material` VALUES (17, 3, '桃子', -0.25, 1, NULL, 1, NULL, '2019-03-20 06:12:12', NULL);
COMMIT;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `factoryId` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `materialId` varchar(255) DEFAULT NULL,
  `payTime` datetime DEFAULT NULL,
  `arriveTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `outTradeId` varchar(128) DEFAULT NULL,
  `refundReason` varchar(256) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
BEGIN;
INSERT INTO `order` VALUES (47, 1, 3, 250.00, '12345678111', 1, '12,6,13,5,14,13,15,16,17,13', NULL, NULL, '2019-03-20 06:12:12', '2019-03-29 00:23:53', NULL, NULL, 1);
INSERT INTO `order` VALUES (48, 1, 3, 240.00, '111', 1, '12,6,13,5,14,13', NULL, NULL, '2019-03-20 06:16:15', '2019-03-29 00:23:54', NULL, NULL, 1);
INSERT INTO `order` VALUES (50, 4, 1, 105.00, '18621681997', -2, '', NULL, NULL, '2019-03-25 06:06:01', '2019-03-31 17:38:50', '155382222707350', NULL, 1);
INSERT INTO `order` VALUES (51, 4, 3, 20.00, '123', -1, '', NULL, NULL, '2019-03-26 18:13:05', '2019-04-05 14:48:27', NULL, '测试', 1);
INSERT INTO `order` VALUES (52, 6, 1, 105.00, '1111111111', 1, '', NULL, NULL, '2019-03-27 05:47:27', '2019-03-29 00:23:57', NULL, NULL, 1);
INSERT INTO `order` VALUES (59, 4, 1, 66.00, '18621681997', -1, '', NULL, NULL, '2019-03-28 16:23:50', '2019-04-05 15:58:04', '155382158653959', '12355541', 1);
INSERT INTO `order` VALUES (60, 4, 1, 101.00, '18621681997', -2, '', NULL, NULL, '2019-03-28 16:25:05', '2019-04-02 07:11:35', '155379049911460', NULL, 1);
INSERT INTO `order` VALUES (61, 4, 1, 140.00, '18621681997', -2, '', NULL, NULL, '2019-03-28 16:26:33', '2019-03-31 17:45:26', '155379039528561', NULL, 1);
INSERT INTO `order` VALUES (62, 4, 1, 66.00, '18621681997', -2, '', NULL, NULL, '2019-03-28 16:35:04', '2019-03-31 17:45:54', '155379090614062', 'suibianshushu', 1);
INSERT INTO `order` VALUES (64, 4, 2, 46.00, '18621681997', -1, '', NULL, NULL, '2019-03-29 02:14:10', '2019-04-05 16:01:03', '155439923880964', '图图', 4);
INSERT INTO `order` VALUES (65, 4, 2, 342.00, '18621681997', -2, '', NULL, NULL, '2019-03-29 02:35:36', '2019-03-31 17:43:38', '155382693858365', NULL, 4);
INSERT INTO `order` VALUES (66, 4, 2, 66.00, '18621681997', 0, '', NULL, NULL, '2019-04-03 12:21:52', '2019-04-03 12:21:54', '155429411354266', NULL, 4);
INSERT INTO `order` VALUES (67, 4, 2, 105.00, '18621681998', -1, '', NULL, NULL, '2019-04-03 12:30:19', '2019-04-05 16:08:44', '155429483428367', '把把', 6);
INSERT INTO `order` VALUES (68, 4, 2, 105.00, '18621681997', 0, '', NULL, NULL, '2019-04-03 12:37:22', '2019-04-03 12:37:24', '155429504354368', NULL, 4);
INSERT INTO `order` VALUES (69, 4, 2, 66.00, '18621681997', 0, '', NULL, NULL, '2019-04-03 17:21:36', '2019-04-04 17:32:52', '155439917200069', NULL, 4);
INSERT INTO `order` VALUES (70, 4, 2, 164.00, '18621681997', -1, '', NULL, NULL, '2019-04-04 16:13:56', '2019-04-05 15:52:18', '155440168070570', '退款测试', 4);
INSERT INTO `order` VALUES (71, 4, 2, 105.00, '18621681997', 0, '', NULL, NULL, '2019-04-04 19:25:16', '2019-04-04 19:25:16', NULL, NULL, 4);
INSERT INTO `order` VALUES (72, 4, 2, 105.00, '18621681997', 0, '', NULL, NULL, '2019-04-04 19:28:37', '2019-04-04 19:28:37', NULL, NULL, 4);
INSERT INTO `order` VALUES (73, 4, 2, 105.00, '18621681997', 0, '', NULL, NULL, '2019-04-04 19:32:31', '2019-04-04 19:32:33', '155440635291173', NULL, 4);
INSERT INTO `order` VALUES (74, 4, 2, 105.00, '18621681997', -2, '', NULL, NULL, '2019-04-04 19:33:11', '2019-04-10 13:39:48', '155440639193274', NULL, 4);
INSERT INTO `order` VALUES (75, 4, 2, 105.00, '18621681997', 0, '', NULL, NULL, '2019-04-05 10:05:00', '2019-04-05 18:42:16', '155448973568875', NULL, 4);
INSERT INTO `order` VALUES (76, 4, 2, 105.00, '18621681997', -2, '', NULL, NULL, '2019-04-05 10:06:21', '2019-04-10 13:37:39', '155445936513176', NULL, 4);
INSERT INTO `order` VALUES (77, 4, 2, 46.00, '18621681997', -2, '', NULL, NULL, '2019-04-05 10:39:30', '2019-04-10 13:32:57', '155446077153377', NULL, 4);
INSERT INTO `order` VALUES (78, 4, 2, 29.00, '18621681997', -2, '', '2019-04-10 19:14:31', NULL, '2019-04-05 18:16:01', '2019-04-10 19:14:31', '155448816336578', NULL, 4);
INSERT INTO `order` VALUES (79, 11, 2, 125.00, '1123', 0, '', NULL, NULL, '2019-04-10 13:14:54', '2019-04-10 13:14:55', '155487329527579', NULL, 12);
INSERT INTO `order` VALUES (80, 11, 2, 39.00, '1123', -2, '', NULL, NULL, '2019-04-10 13:20:24', '2019-04-10 13:32:43', '155487362539380', NULL, 12);
INSERT INTO `order` VALUES (81, 10, 2, 202.00, '546', 0, '', NULL, NULL, '2019-04-10 13:43:25', '2019-04-10 13:54:24', '155487566428681', NULL, 13);
INSERT INTO `order` VALUES (82, 10, 2, 202.00, '546', 0, '', NULL, NULL, '2019-04-10 13:44:49', '2019-04-10 13:44:51', '155487509052382', NULL, 13);
INSERT INTO `order` VALUES (83, 10, 2, 397.00, '546', 0, '', NULL, NULL, '2019-04-10 13:46:31', '2019-04-10 13:46:33', '155487519271683', NULL, 13);
INSERT INTO `order` VALUES (84, 18, 2, 163.00, '15201702258', -2, '', NULL, NULL, '2019-04-10 13:51:00', '2019-04-10 14:12:54', '155487607490784', '无人接单', 14);
INSERT INTO `order` VALUES (85, 18, 2, 111.00, '15201702258', 0, '', NULL, NULL, '2019-04-10 13:51:39', '2019-04-10 13:51:40', '155487550005485', NULL, 14);
INSERT INTO `order` VALUES (86, 18, 2, 111.00, '15201702258', 1, '', NULL, NULL, '2019-04-10 13:55:12', '2019-04-10 14:00:34', '155487571335286', NULL, 14);
INSERT INTO `order` VALUES (87, 10, 2, 46.00, '546', 1, '', NULL, NULL, '2019-04-10 13:57:17', '2019-04-10 13:59:53', '155487583884187', NULL, 13);
INSERT INTO `order` VALUES (88, 18, 2, 163.00, '15201702258', -2, '', NULL, NULL, '2019-04-10 14:13:42', '2019-04-10 14:20:33', '155487682383388', '地址选择错误', 14);
INSERT INTO `order` VALUES (89, 6, 2, 220.00, '1111111111', -2, '', NULL, NULL, '2019-04-10 14:28:53', '2019-04-10 15:34:31', '155487773469289', NULL, 5);
INSERT INTO `order` VALUES (90, 21, 2, 202.00, '888', 1, '', NULL, NULL, '2019-04-10 15:21:44', '2019-04-10 15:40:55', '155488203121790', NULL, 15);
INSERT INTO `order` VALUES (91, 21, 2, 46.00, '888', -2, '', NULL, NULL, '2019-04-10 15:21:51', '2019-04-10 15:34:07', '155488110224591', NULL, 15);
INSERT INTO `order` VALUES (92, 4, 2, 46.00, '13175191964', 1, '', NULL, NULL, '2019-04-10 15:39:35', '2019-04-10 15:39:54', '155488197672292', NULL, 11);
INSERT INTO `order` VALUES (93, 20, 2, 544.00, '23', 0, '', NULL, NULL, '2019-04-10 15:51:21', '2019-04-10 15:51:44', '155488270426893', NULL, 16);
INSERT INTO `order` VALUES (94, 4, 2, 46.00, '18621681997', 1, '', '2019-04-10 19:17:24', NULL, '2019-04-10 16:02:58', '2019-04-10 19:17:24', '155488338015994', NULL, 4);
INSERT INTO `order` VALUES (95, 6, 2, 105.00, '15201702258', 0, '', NULL, NULL, '2019-04-10 16:51:03', '2019-04-10 16:51:05', '155488626479395', NULL, 17);
INSERT INTO `order` VALUES (96, 4, 2, 46.00, '18621681997', 0, '', NULL, NULL, '2019-04-10 19:08:06', '2019-04-10 19:17:59', '155489507940696', NULL, 4);
INSERT INTO `order` VALUES (97, 4, 2, 125.00, '18621681997', 1, '', '2019-04-10 19:25:47', NULL, '2019-04-10 19:25:34', '2019-04-10 19:25:47', '155489553564797', NULL, 4);
INSERT INTO `order` VALUES (98, 4, 2, 105.00, '18621681997', 1, '', '2019-04-11 00:44:13', NULL, '2019-04-11 00:43:49', '2019-04-11 00:44:14', '155491463000998', NULL, 4);
INSERT INTO `order` VALUES (99, 4, 2, 66.00, '18621681997', 1, '', '2019-04-11 00:45:30', NULL, '2019-04-11 00:44:45', '2019-04-11 00:45:30', '155491471612399', NULL, 4);
INSERT INTO `order` VALUES (100, 4, 2, 66.00, '18621681997', -1, '', '2019-04-11 17:53:53', NULL, '2019-04-11 17:53:05', '2019-04-11 17:54:10', '1554976400128100', '点错了', 4);
INSERT INTO `order` VALUES (101, 20, 2, 302.00, '23', 1, '', '2019-04-12 08:27:15', NULL, '2019-04-12 08:26:47', '2019-04-12 08:27:16', '1555028808361101', NULL, 16);
COMMIT;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of supplier
-- ----------------------------
BEGIN;
INSERT INTO `supplier` VALUES (1, '1号供应商', '2019-03-01 08:32:38', NULL);
INSERT INTO `supplier` VALUES (2, '2号供应商', '2019-03-01 08:32:42', NULL);
COMMIT;

-- ----------------------------
-- Table structure for threshold
-- ----------------------------
DROP TABLE IF EXISTS `threshold`;
CREATE TABLE `threshold` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materialName` varchar(255) DEFAULT NULL,
  `num` decimal(10,2) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of threshold
-- ----------------------------
BEGIN;
INSERT INTO `threshold` VALUES (1, '榴莲', 5.00, '2019-03-01 08:33:39', '2019-03-01 08:33:43');
INSERT INTO `threshold` VALUES (2, '鸡肉', 10.00, '2019-03-01 08:33:48', NULL);
INSERT INTO `threshold` VALUES (3, '牛肉', 10.00, '2019-03-20 13:44:13', NULL);
INSERT INTO `threshold` VALUES (4, '面饼', 100.00, '2019-03-20 13:44:57', NULL);
INSERT INTO `threshold` VALUES (5, '芝士', 10.00, '2019-03-20 13:45:03', NULL);
INSERT INTO `threshold` VALUES (6, '草莓', 10.00, '2019-03-20 13:45:07', NULL);
INSERT INTO `threshold` VALUES (7, '菠萝', 5.00, '2019-03-20 13:45:11', NULL);
INSERT INTO `threshold` VALUES (8, '桃子', 10.00, '2019-03-20 13:45:34', NULL);
COMMIT;

-- ----------------------------
-- Table structure for track
-- ----------------------------
DROP TABLE IF EXISTS `track`;
CREATE TABLE `track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `materialId` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of track
-- ----------------------------
BEGIN;
INSERT INTO `track` VALUES (1, 1, '2019-03-01 08:32:50', NULL);
INSERT INTO `track` VALUES (2, 2, '2019-03-01 08:32:54', NULL);
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `qqId` varchar(255) DEFAULT NULL,
  `wxId` varchar(255) DEFAULT NULL,
  `loginTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, '孟鑫', 'deepdark', '15201709132', 'SeniaCiel', 'avatar.jpg', '上海', '1997-07-15', '994859788', 'Blue_Ciel', NULL, '2019-02-27 15:13:23', '2019-03-06 14:12:26');
INSERT INTO `user` VALUES (2, '朱鹏飞', 'fantasies', '15201709123', 'Zhuzhu', 'zhu.jpg', '上海', '1997-01-02', '383854238', 'Zhu_PF', '2019-03-01 08:19:35', '2019-02-27 15:13:23', '2019-03-06 14:12:31');
INSERT INTO `user` VALUES (4, '祈言', '123456', '18621681997', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-21 14:13:33', '2019-04-06 01:23:45');
INSERT INTO `user` VALUES (5, NULL, NULL, '15317307509', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-26 10:51:56', NULL);
INSERT INTO `user` VALUES (6, '123', '1234', '11111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-27 05:40:11', '2019-04-10 14:54:11');
INSERT INTO `user` VALUES (7, NULL, NULL, '18621681998', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-27 05:52:42', NULL);
INSERT INTO `user` VALUES (8, NULL, NULL, '18959733375', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-03 06:28:28', NULL);
INSERT INTO `user` VALUES (9, NULL, NULL, '18915631313', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-03 06:55:38', NULL);
INSERT INTO `user` VALUES (10, NULL, NULL, '13213213213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-03 06:58:07', NULL);
INSERT INTO `user` VALUES (11, NULL, NULL, '#1974531541', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-03 11:37:33', NULL);
INSERT INTO `user` VALUES (12, NULL, '123456123456123456', '21321312323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-03 11:43:51', '2019-04-03 20:01:08');
INSERT INTO `user` VALUES (13, NULL, NULL, '?$1212312as', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-04 06:42:44', NULL);
INSERT INTO `user` VALUES (14, NULL, NULL, '23131323132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-04 09:32:46', NULL);
INSERT INTO `user` VALUES (15, NULL, NULL, '12312321321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-04 10:02:56', NULL);
INSERT INTO `user` VALUES (16, NULL, NULL, '23232132132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-04 10:19:52', NULL);
INSERT INTO `user` VALUES (17, NULL, NULL, '21321321312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-04 11:13:46', NULL);
INSERT INTO `user` VALUES (18, NULL, NULL, '32131212123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-10 13:36:42', NULL);
INSERT INTO `user` VALUES (19, NULL, NULL, '15201702258', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-10 14:43:40', NULL);
INSERT INTO `user` VALUES (20, NULL, NULL, '23232132121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-10 15:02:35', NULL);
INSERT INTO `user` VALUES (21, NULL, NULL, '88888888888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-10 15:18:18', NULL);
INSERT INTO `user` VALUES (22, NULL, NULL, '11121111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-11 21:32:52', NULL);
INSERT INTO `user` VALUES (23, NULL, NULL, '21313123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-12 08:28:33', NULL);
INSERT INTO `user` VALUES (24, NULL, NULL, '12321321212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-12 08:29:43', NULL);
COMMIT;

-- ----------------------------
-- Table structure for warning
-- ----------------------------
DROP TABLE IF EXISTS `warning`;
CREATE TABLE `warning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factoryId` int(11) DEFAULT NULL,
  `materialName` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of warning
-- ----------------------------
BEGIN;
INSERT INTO `warning` VALUES (2, 3, '牛肉', 0, '2019-03-20 06:12:12', NULL);
INSERT INTO `warning` VALUES (3, 3, '面饼', 0, '2019-03-20 06:12:12', NULL);
INSERT INTO `warning` VALUES (4, 3, '芝士', 0, '2019-03-20 06:12:12', NULL);
INSERT INTO `warning` VALUES (5, 3, '草莓', 0, '2019-03-20 06:12:12', NULL);
INSERT INTO `warning` VALUES (6, 3, '菠萝', 0, '2019-03-20 06:12:12', NULL);
INSERT INTO `warning` VALUES (7, 3, '桃子', 0, '2019-03-20 06:12:12', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
