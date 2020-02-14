/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : 127.0.0.1:3306
Source Database       : mapo

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2018-01-25 14:03:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('Admin', '32', '1516863819');
INSERT INTO `auth_assignment` VALUES ('Office', '31', '1516846580');
INSERT INTO `auth_assignment` VALUES ('User', '30', '1516845457');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('Admin', '1', 'ผู้ดูแลระบบ', null, null, '1516607709', '1516607709');
INSERT INTO `auth_item` VALUES ('Office', '1', 'ฝ่ายบริหารและหัวหน้างาน', null, null, '1516607709', '1516607709');
INSERT INTO `auth_item` VALUES ('Staff', '1', 'ช่างและผู้ดำเงินงานซ่อม', null, null, '1516607709', '1516607709');
INSERT INTO `auth_item` VALUES ('User', '1', 'เจ้าหน้าที่ทั่วไป', null, null, '1516607709', '1516607709');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('Admin', 'Office');
INSERT INTO `auth_item_child` VALUES ('Office', 'Staff');
INSERT INTO `auth_item_child` VALUES ('Staff', 'User');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for hosinfo_department
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_department`;
CREATE TABLE `hosinfo_department` (
  `depcode` int(11) NOT NULL AUTO_INCREMENT,
  `depname` varchar(100) DEFAULT NULL,
  `depgroup` int(11) DEFAULT NULL,
  `inhospital` varchar(1) DEFAULT 'Y',
  PRIMARY KEY (`depcode`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_department
-- ----------------------------
INSERT INTO `hosinfo_department` VALUES ('1', 'ไม่ทราบฝ่าย', '1', 'Y');
INSERT INTO `hosinfo_department` VALUES ('2', 'งานธุรการ', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('3', 'งานการเจ้าหน้าที่', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('4', 'งานการเงินและบัญชี', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('5', 'งานงานอาคารและซ่อมบำรุง', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('7', 'งานยานพาหนะและขนส่ง', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('8', 'งานรักษาความปลอดภัย', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('9', 'งานเวชระเบียนและสถิติ', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('10', 'งานชันสูตรสาธารณสุข', '3', 'Y');
INSERT INTO `hosinfo_department` VALUES ('11', 'งานรังสีการแพทย์ (X-Ray)', '3', 'Y');
INSERT INTO `hosinfo_department` VALUES ('12', 'งานโภชนศาสตร์', '3', 'Y');
INSERT INTO `hosinfo_department` VALUES ('13', 'งานประกันสุขภาพ', '3', 'Y');
INSERT INTO `hosinfo_department` VALUES ('14', 'งานเทคโนโลยีและสารสนเทศ', '3', 'Y');
INSERT INTO `hosinfo_department` VALUES ('15', 'งานเวชปฏิบัติครอบครัวและชุมชน', '4', 'Y');
INSERT INTO `hosinfo_department` VALUES ('16', 'งานบริการสุขภาพชุมชน', '4', 'Y');
INSERT INTO `hosinfo_department` VALUES ('17', 'งานส่งเสริมสุขภาพ', '4', 'Y');
INSERT INTO `hosinfo_department` VALUES ('18', 'งานสุขาภิบาลและอนามัยสิ่งแวดล้อม', '4', 'Y');
INSERT INTO `hosinfo_department` VALUES ('19', 'งานควบคุมและป้องกันโรค', '4', 'Y');
INSERT INTO `hosinfo_department` VALUES ('20', 'งานสุขศึกษา', '4', 'Y');
INSERT INTO `hosinfo_department` VALUES ('21', 'งานสนับสนุนเครือข่ายบริการปฐมภูมิ', '4', 'Y');
INSERT INTO `hosinfo_department` VALUES ('22', 'งานผู้ป่วยนอก - อายุรกรรม (เฉพาะทาง)', '5', 'Y');
INSERT INTO `hosinfo_department` VALUES ('23', 'งานฑันตสาธารณสุข', '5', 'Y');
INSERT INTO `hosinfo_department` VALUES ('24', 'งานกายภาพบำบัดและเวชกรรมฟื้นฟู', '5', 'Y');
INSERT INTO `hosinfo_department` VALUES ('25', 'งานแพทย์แผนไทยและการแพทย์ทางเลือก', '5', 'Y');
INSERT INTO `hosinfo_department` VALUES ('26', 'งานเภสัชกรรม (ผู้ป่วยนอก)', '6', 'Y');
INSERT INTO `hosinfo_department` VALUES ('27', 'งานคุ้มครองผู้บริโภค', '6', 'Y');
INSERT INTO `hosinfo_department` VALUES ('28', 'งานผู้ป่วยนอก (OPD)', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('29', 'งานผู้ป่วยใน (ยกเลิก)', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('30', 'งานห้องผ่าตัด', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('31', 'งานห้องคลอด', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('32', 'งานผู้ป่วยอุบัติเหตุฉุกเฉิน (ER)', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('33', 'งานผู้ป่วยหนัก', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('34', 'งานหน่วยจ่ายกลาง', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('35', 'งานบริการให้คำปรึกษาด้านสุขภาพ', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('36', 'งานคลินิคพิเศษ โครงการพิเศษ', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('37', 'งานวิสัญญีพยาบาล', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('38', 'งานโรคไม่ติดต่อเรื้อรัง (NCD)', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('39', 'งานบริหาร', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('40', 'องค์กรแพทย์', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('41', 'ผู้ป่วยใน - อายุรกรรมชาย', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('42', 'ผู้ป่วยใน - อายุรกรรมหญิง', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('43', 'ผู้ป่วยใน - ศัลยกรรมชาย', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('44', 'ผู้ป่วยใน - ศัลยกรรมหญิง', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('45', 'ผู้ป่วยใน - ICU', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('46', 'ผู้ป่วยใน - NICU', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('47', 'ผู้ป่วยใน - กุมารเวช (ตึกเด็ก)', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('48', 'ผู้ป่วยใน - จักษุ', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('49', 'ผู้อำนวยการ', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('50', 'ฝ่ายการพยาบาล', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('51', 'สำนักงานสาธารณสุขอำเภอ', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('52', 'รพสต.วังวัด', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('53', 'รพสต.ยางจ่า', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('54', 'รพสต.โคกปรง', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('55', 'รพสต.นาไร่เดียว', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('56', 'รพสต.ท่าโรง', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('57', 'รพสต.พุเตย', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('58', 'รพสต.ซับน้อย', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('59', 'รพสต.บึงกระจับ', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('60', 'รพสต.น้ำร้อน', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('61', 'รพสต.โพทะเล', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('62', 'รพสต.โนนสง่า', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('63', 'รพสต.พุขาม', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('64', 'รพสต.วังไผ่', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('65', 'รพสต.แก่งหินปูน', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('66', 'รพสต.รวมทรัพย์', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('67', 'รพสต.บ่อรัง', '1', 'N');
INSERT INTO `hosinfo_department` VALUES ('68', 'รพสต.วังใหญ่', '1', 'Y');
INSERT INTO `hosinfo_department` VALUES ('69', 'งานผู้ป่วยนอก - COPD', '5', 'Y');
INSERT INTO `hosinfo_department` VALUES ('70', 'งานซักฟอก', '5', 'Y');
INSERT INTO `hosinfo_department` VALUES ('71', 'งานประชาสัมพันธ์', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('72', 'งานฉีดยาทำแผล', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('73', 'งานเภสัชกรรม (ผู้ป่วยใน)', '6', 'Y');
INSERT INTO `hosinfo_department` VALUES ('74', 'งานโรงครัว', '3', 'Y');
INSERT INTO `hosinfo_department` VALUES ('75', 'งานผู้ป่วยนอก จักษุ', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('76', 'งานผู้ป่วยนอก ศัลยกรรมกระดูก', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('77', 'ผู้ป่วยใน - PICU', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('78', 'ผู้ป่วยใน - ตึกพิเศษ', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('79', 'งานสูตินรีเวชกรรม', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('80', 'งานโสตทัศนูปกรณ์', '2', 'Y');
INSERT INTO `hosinfo_department` VALUES ('81', 'คลังเวชภัฑณ์', '6', 'Y');
INSERT INTO `hosinfo_department` VALUES ('82', 'คลินิคโรคไต', '5', 'Y');
INSERT INTO `hosinfo_department` VALUES ('83', 'EKG', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('84', 'คลังเวชภัณฑ์มิใช่ยา', null, 'Y');
INSERT INTO `hosinfo_department` VALUES ('85', 'งานพัสดุ', null, 'Y');
INSERT INTO `hosinfo_department` VALUES ('86', 'ศูนย์คุณภาพ', null, 'Y');
INSERT INTO `hosinfo_department` VALUES ('87', 'ผู้ป่วยใน - หลังคลอด', '7', 'Y');
INSERT INTO `hosinfo_department` VALUES ('88', 'PCU ใน', null, 'Y');
INSERT INTO `hosinfo_department` VALUES ('89', 'คลินิคประกันสังคม', null, 'Y');
INSERT INTO `hosinfo_department` VALUES ('90', 'ตู้ EMS ', null, 'Y');
INSERT INTO `hosinfo_department` VALUES ('91', 'CT', null, 'Y');

-- ----------------------------
-- Table structure for hosinfo_helpdesk
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk`;
CREATE TABLE `hosinfo_helpdesk` (
  `tickets_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `assignee` varchar(100) DEFAULT NULL,
  `raisedby` varchar(100) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `resolution` text,
  `result` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  `completedate` date DEFAULT NULL,
  `messages` text,
  `order_date` date DEFAULT NULL,
  `cause` text,
  `asset_number` varchar(20) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`tickets_id`),
  KEY `department` (`department`),
  CONSTRAINT `dep` FOREIGN KEY (`department`) REFERENCES `hosinfo_department` (`depcode`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk
-- ----------------------------
INSERT INTO `hosinfo_helpdesk` VALUES ('274', 'ทดสอบ line', '1', '', 'ทดสอบ', 'ต่ำ', '', '999', '4', '2017-12-29 00:00:00', null, 'เเเเเ', '2017-12-28', '', '', '5');
INSERT INTO `hosinfo_helpdesk` VALUES ('275', 'โทรศัพท์', '1', '1', 'นวัชรพร', 'ต่ำ', '', '2', '4', '2018-01-24 00:00:00', null, 'ไม่ดัง', '2017-12-29', '', '', '1');
INSERT INTO `hosinfo_helpdesk` VALUES ('276', 'fhfhfhfhf', '1', '', 'test', 'ต่ำ', '', '1', '2', '2017-12-29 00:00:00', null, 'djkfjfjfjfj', '2017-12-29', '', '', '6');
INSERT INTO `hosinfo_helpdesk` VALUES ('278', 'mvlv[', '1', '', 'ffffff', 'สูง', '', '5', '5', '2018-01-23 00:00:00', null, 'fkfkfkfkfkf', '2018-01-23', null, '', '6');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_asset
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_asset`;
CREATE TABLE `hosinfo_helpdesk_asset` (
  `asset_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_number` varchar(20) DEFAULT NULL,
  `asset_serialno` varchar(50) DEFAULT NULL,
  `asset_name` varchar(100) DEFAULT NULL,
  `asset_active` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_asset
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_asset` VALUES ('1', '7440-001-005/301', '-', 'Toshiba Notebok', 'Y');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_images
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_images`;
CREATE TABLE `hosinfo_helpdesk_images` (
  `ticket_id` int(11) NOT NULL,
  `image1` blob,
  `image2` blob,
  `image3` blob,
  `image4` blob,
  `image5` blob,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_images
-- ----------------------------

-- ----------------------------
-- Table structure for hosinfo_helpdesk_line_token
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_line_token`;
CREATE TABLE `hosinfo_helpdesk_line_token` (
  `token_id` int(11) NOT NULL DEFAULT '1',
  `token` varchar(50) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_line_token
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_line_token` VALUES ('1', 'ZcOIJZwdYDS1BLCWVuWyoKCFXl240RH0M5yziShpz5t', '1');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_priority
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_priority`;
CREATE TABLE `hosinfo_helpdesk_priority` (
  `priority` varchar(20) NOT NULL,
  PRIMARY KEY (`priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_priority
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_priority` VALUES ('ต่ำ');
INSERT INTO `hosinfo_helpdesk_priority` VALUES ('ปานกลาง');
INSERT INTO `hosinfo_helpdesk_priority` VALUES ('สูง');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_result
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_result`;
CREATE TABLE `hosinfo_helpdesk_result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `result_name` varchar(50) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_result
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_result` VALUES ('1', 'รอดำเนินการ');
INSERT INTO `hosinfo_helpdesk_result` VALUES ('2', 'อยู่ระหว่างการดำเนินการ');
INSERT INTO `hosinfo_helpdesk_result` VALUES ('3', 'ไม่สามารถซ่อมได้');
INSERT INTO `hosinfo_helpdesk_result` VALUES ('4', 'รออะไหล่');
INSERT INTO `hosinfo_helpdesk_result` VALUES ('5', 'ส่งซ่อมภายนอก');
INSERT INTO `hosinfo_helpdesk_result` VALUES ('6', 'ปฏิเสธการรับซ่อม');
INSERT INTO `hosinfo_helpdesk_result` VALUES ('7', 'อื่นๆ');
INSERT INTO `hosinfo_helpdesk_result` VALUES ('999', 'ซ่อม/ดำเนินการแล้ว');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_role
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_role`;
CREATE TABLE `hosinfo_helpdesk_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of hosinfo_helpdesk_role
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_role` VALUES ('1', 'user');
INSERT INTO `hosinfo_helpdesk_role` VALUES ('2', 'staff');
INSERT INTO `hosinfo_helpdesk_role` VALUES ('4', 'admin');
INSERT INTO `hosinfo_helpdesk_role` VALUES ('3', 'office');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_staff
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_staff`;
CREATE TABLE `hosinfo_helpdesk_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(100) NOT NULL,
  `staff_position` varchar(100) DEFAULT NULL,
  `active` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`staff_id`,`staff_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_staff
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_staff` VALUES ('1', 'พีรกาจ พูลสวัสดิ์', 'นักวิชาการคอมพิวเตอร์', 'Y');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_status
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_status`;
CREATE TABLE `hosinfo_helpdesk_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_status
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_status` VALUES ('1', 'เปิด');
INSERT INTO `hosinfo_helpdesk_status` VALUES ('2', 'ปิด');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_tigger_subject
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_tigger_subject`;
CREATE TABLE `hosinfo_helpdesk_tigger_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_tigger_subject
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_tigger_subject` VALUES ('1', 'เครื่องเสีย');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_type
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_type`;
CREATE TABLE `hosinfo_helpdesk_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_discription` varchar(255) DEFAULT NULL,
  `type_point` int(11) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosinfo_helpdesk_type
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_type` VALUES ('1', 'ซ่อมบำรุง (Hardware)', 'ปริ้นเตอร์เสีย ปริ้นไม่ออก คอมพ์เปิดไม่ติด ติดไวรัส ลงวินโดวส์ใหม่  เป็นต้น', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('2', 'แก้ปัญหาการใช้งาน (Software)', 'แก้ไขปัญหาการใช้งานโปรแกรมต่างๆ เช่น hosxp inventory Pacs เป็นต้น', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('3', 'ติดตั้งระบบ อุปกรณ์ / ลงโปรแกรม', 'ติดตั้งระบบ wifi เดินสาย lan กล้องวงจรปิด ทำ server  update server config switch เป็นต้น', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('4', 'การให้บริการ / ช่วยเหลือ /', 'เปลี่ยนหมึก ถ่ายรูป scan virus เพิ่ม user hosxp wifi เป็นต้น', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('5', 'พัฒนาระบบ', 'ออกแบบพัฒนาระบงาน แก้บั๊ค เป็นต้น', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('6', 'ประชุม / อบรม', 'ไปประชุม อบรม สัมนา เป็นต้น', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('7', 'วิทยากร', 'เชิญเป็นวิทยากร เป็นต้น', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('8', 'รายงาน', 'ขอรายงานต่างๆ', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('9', 'ข้อมูล', 'ส่งข้อมูล 43 แฟ้ม และอื่นๆ ', '0');
INSERT INTO `hosinfo_helpdesk_type` VALUES ('99', 'อื่นๆ', 'ไม่ระบุ', '0');

-- ----------------------------
-- Table structure for hosinfo_helpdesk_user
-- ----------------------------
DROP TABLE IF EXISTS `hosinfo_helpdesk_user`;
CREATE TABLE `hosinfo_helpdesk_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password_hash` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) NOT NULL,
  `auth_key` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0',
  `role` varchar(30) NOT NULL DEFAULT '1',
  `fullname` varchar(255) DEFAULT NULL,
  `hosinfo_department_id` int(11) DEFAULT NULL,
  `cid` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of hosinfo_helpdesk_user
-- ----------------------------
INSERT INTO `hosinfo_helpdesk_user` VALUES ('32', 'admin', '$2y$13$UAjT9Ng/l.g3pDpLlQ3CCex5QIFFwPgoH2sNLm./h0FiNraNLBID.', '', 'admin', 'zr8MrkzFIeGNM3vqQQxlukt9c12aMu5-', '2018-01-25 14:03:39', '2018-01-25 14:03:39', '10', 'Admin', 'admin', '4', '2222222222222');
INSERT INTO `hosinfo_helpdesk_user` VALUES ('31', 'office', '$2y$13$jGGMZ98sG9PtCyiM8nROwOc1X1n2iLs3XZbJU23pWCzGui9A8K2GK', '', 'admin', 'Kj7H4b7EVPCbJt8_q7FABxF1CWe5O7B_', '2018-01-25 09:15:43', '2018-01-25 09:16:20', '10', 'Office', 'office', '5', '2222222222222');
INSERT INTO `hosinfo_helpdesk_user` VALUES ('30', 'user', '$2y$13$xneiJgJpWa4eJ6eqNHATlu8BcP5CCmrCwZ/tWLw14gHwMj09kBOAO', '', 'admin', 'zKYO4woFTb-LRiKQdx2thAGTpcgo_uPh', '2018-01-25 08:57:37', '2018-01-25 08:57:37', '10', 'User', 'user', '5', '2222222222222');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1516606406');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1516606408');
