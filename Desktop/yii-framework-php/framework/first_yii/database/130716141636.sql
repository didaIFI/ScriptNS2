/*
MySQL Backup
Source Server Version: 5.5.25
Source Database: autodock
Date: 7/16/2013 14:16:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `ligand`
-- ----------------------------
DROP TABLE IF EXISTS `ligand`;
CREATE TABLE `ligand` (
  `ligand_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mw` float(10,2) DEFAULT NULL,
  `hd` int(10) DEFAULT NULL,
  `ha` int(10) DEFAULT NULL,
  `log_p` float(10,2) DEFAULT NULL,
  `psa` float(10,2) DEFAULT NULL,
  `ic50_hep` float(10,2) DEFAULT NULL,
  `ic50_rd` float(10,2) DEFAULT NULL,
  `ic50_fi` float(10,2) DEFAULT NULL,
  `plant_specie` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `plant_part` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bioactivity` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ligand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `waiting_job` int(10) DEFAULT NULL,
  `running_job` int(10) DEFAULT NULL,
  `completed_job` int(10) DEFAULT NULL,
  `failed_job` int(10) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `protein`
-- ----------------------------
DROP TABLE IF EXISTS `protein`;
CREATE TABLE `protein` (
  `protein_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `resolution` float(10,2) DEFAULT NULL,
  `co_crystallized_ligand` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `archive_protein` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `center_x` float(10,2) DEFAULT NULL,
  `center_y` float(10,2) DEFAULT NULL,
  `center_z` float(10,2) DEFAULT NULL,
  `size_x` float(10,2) DEFAULT NULL,
  `size_y` float(10,2) DEFAULT NULL,
  `size_z` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`protein_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `protein_mgr` int(10) DEFAULT '0',
  `ligand_mgr` int(10) DEFAULT '0',
  `docking_mgr` int(10) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `ligand` VALUES ('1','Ligand 01','12345.pdbqt','4.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('2','Ligand 02','12344.pdbqt','3.00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('3','Ligand03','12343.pdbqt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('4','Ligand04','file04.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('5','Ligand05','file05.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('6','Ligand06','file06.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('7','Ligand07','file07.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('8','Ligand08','file08.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('9','Ligand09','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('10','Ligand10','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('11','Ligand11','file11.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('16','af',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('17','aadsfsaf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('20','yyy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('21','ngay','abc.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('22','adsfafs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('23','aaa','abcd.xyz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('24','ttt','25718.txt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('25','iii','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','',''), ('26','New Ligand','22064.docx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','');
INSERT INTO `project` VALUES ('2','SARS','1','1000','20','20','20'), ('3','RUBELLA','3','30','30','30','30'), ('4','HIV','1','10','10','10','10'), ('5','pj 4',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `protein` VALUES ('1','protein tu thit','',NULL,'','','10.00','10.00','10.00','10.00','10.00','10.00'), ('2','protein từ rau','',NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL), ('5','protein từ sữa','',NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL), ('6','protein tổng hợp','',NULL,'ok','ok',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `user` VALUES ('1','user01','user01','1','0','0'), ('2','user02','user02','0','1','0'), ('3','user03','user03','1','1','1'), ('4','root','root','1','1','1');
