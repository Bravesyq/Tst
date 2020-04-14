/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : crm

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-04-15 00:17:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) DEFAULT NULL,
  `auth_pid` smallint(6) DEFAULT NULL,
  `auth_c` varchar(32) DEFAULT NULL,
  `auth_a` varchar(32) DEFAULT NULL,
  `auth_path` varchar(32) DEFAULT NULL,
  `auth_level` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES ('100', '管理员管理', '0', '', '', '100', '0');
INSERT INTO `auth` VALUES ('101', '员工', '0', '', '', '101', '0');
INSERT INTO `auth` VALUES ('154', '部门管理', '100', 'Admin', 'bumen_index', '100-154', '1');
INSERT INTO `auth` VALUES ('155', '添加部门', '100', 'Admin', 'ajax_bumen_add', '100-155', '2');
INSERT INTO `auth` VALUES ('107', '用户管理', '100', 'Admin', 'index', '100-107', '1');
INSERT INTO `auth` VALUES ('108', '用户添加', '100', 'Admin', 'addadminuser', '100-108', '2');
INSERT INTO `auth` VALUES ('109', '员工首页', '101', 'Staff', 'index', '101-109', '1');
INSERT INTO `auth` VALUES ('102', '主管管理', null, null, null, null, null);
INSERT INTO `auth` VALUES ('111', '角色管理', '100', 'Role', 'rolelist', '100-111', '1');
INSERT INTO `auth` VALUES ('112', '权限列表', '100', 'Auth', 'authlist', '100-112', '1');
INSERT INTO `auth` VALUES ('156', '部门修改保存', '100', 'Admin', 'ajax_bumen_edit', '100-156', '2');
INSERT INTO `auth` VALUES ('157', '员工的录入', '101', 'Staff', 'add_customer', '101-157', '1');
INSERT INTO `auth` VALUES ('158', '产品', '100', 'Admin', 'product', '100-158', '1');
INSERT INTO `auth` VALUES ('159', '产品修改', '100', 'Admin', 'ajax_chanpin_edit', '100-159', '2');
INSERT INTO `auth` VALUES ('160', '产品状态', '100', 'Admin', 'chanpin_stat_edit', '100-160', '2');
INSERT INTO `auth` VALUES ('161', '主管首页', '0', '', '', '161', '0');
INSERT INTO `auth` VALUES ('162', '主管首页', '161', 'Zhuguan', 'index', '161-162', '1');
INSERT INTO `auth` VALUES ('163', '发货', '0', 'Delivergoods', '', '163', '0');
INSERT INTO `auth` VALUES ('164', 'Boss', '0', 'Boss', '', '164', '0');
INSERT INTO `auth` VALUES ('165', '发货首页', '163', 'Delivergoods', 'index', '163-165', '1');
INSERT INTO `auth` VALUES ('166', 'Boss首页', '164', 'Boss', 'index', '164-166', '1');

-- ----------------------------
-- Table structure for auth_copy
-- ----------------------------
DROP TABLE IF EXISTS `auth_copy`;
CREATE TABLE `auth_copy` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) DEFAULT NULL,
  `auth_pid` smallint(6) DEFAULT NULL,
  `auth_c` varchar(32) DEFAULT NULL,
  `auth_a` varchar(32) DEFAULT NULL,
  `auth_path` varchar(32) DEFAULT NULL,
  `auth_level` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_copy
-- ----------------------------
INSERT INTO `auth_copy` VALUES ('100', '管理员管理', '0', null, null, '100', '0');
INSERT INTO `auth_copy` VALUES ('101', '员工', '0', null, null, '101', '0');
INSERT INTO `auth_copy` VALUES ('154', '部门管理', '100', 'Admin', 'bumen_index', '100-154', '1');
INSERT INTO `auth_copy` VALUES ('155', '添加部门', '100', 'Admin', 'ajax_bumen_add', '100-155', '2');
INSERT INTO `auth_copy` VALUES ('107', '用户管理', '100', 'Admin', 'index', '100-107', '1');
INSERT INTO `auth_copy` VALUES ('108', '用户添加', '100', 'Admin', 'addadminuser', '100-108', '2');
INSERT INTO `auth_copy` VALUES ('109', '员工首页', '101', 'Staff', 'index', '101-109', '1');
INSERT INTO `auth_copy` VALUES ('102', '主管管理', null, null, null, null, null);
INSERT INTO `auth_copy` VALUES ('111', '角色管理', '100', 'Role', 'rolelist', '100-111', '1');
INSERT INTO `auth_copy` VALUES ('112', '权限列表', '100', 'Auth', 'authlist', '100-112', '1');
INSERT INTO `auth_copy` VALUES ('156', '部门修改保存', '100', 'Admin', 'ajax_bumen_edit', '100-156', '2');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) DEFAULT NULL,
  `role_auth_ids` text,
  `role_auth_ac` text,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('10', '员工', '101,109', 'Staff-index');
INSERT INTO `role` VALUES ('11', '主管', '101,109,161,162', 'Staff-index,Zhuguan-index');
INSERT INTO `role` VALUES ('12', '发货', null, null);
INSERT INTO `role` VALUES ('13', 'BOSS', null, null);

-- ----------------------------
-- Table structure for st_bumen
-- ----------------------------
DROP TABLE IF EXISTS `st_bumen`;
CREATE TABLE `st_bumen` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `bumen_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of st_bumen
-- ----------------------------
INSERT INTO `st_bumen` VALUES ('1', '聊');
INSERT INTO `st_bumen` VALUES ('2', '德州');
INSERT INTO `st_bumen` VALUES ('3', 'aa');
INSERT INTO `st_bumen` VALUES ('4', 'nb');
INSERT INTO `st_bumen` VALUES ('5', '60');

-- ----------------------------
-- Table structure for st_information
-- ----------------------------
DROP TABLE IF EXISTS `st_information`;
CREATE TABLE `st_information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL COMMENT '姓名',
  `lxfs` char(11) DEFAULT NULL COMMENT '联系方式',
  `product` varchar(30) DEFAULT NULL COMMENT '产品',
  `number` varchar(6) DEFAULT NULL COMMENT '数量',
  `address` varchar(100) DEFAULT NULL COMMENT '地址',
  `earnest_money` varchar(10) DEFAULT NULL COMMENT '定金',
  `pay_type` char(20) DEFAULT NULL COMMENT '支付方式',
  `ds_money` varchar(10) DEFAULT NULL COMMENT '代收款',
  `verification_dsk` char(3) DEFAULT NULL COMMENT '核验代收款',
  `express` varchar(10) DEFAULT NULL COMMENT '物流',
  `express_number` varchar(30) DEFAULT NULL COMMENT '物流单号',
  `express_stat` varchar(10) DEFAULT NULL COMMENT '物流状态',
  `is_purchase` char(1) DEFAULT NULL COMMENT '是否复购',
  `line_time` varchar(25) DEFAULT NULL COMMENT '进线日期',
  `deal_time` varchar(25) DEFAULT NULL COMMENT '成交日期',
  `datesigning` varchar(25) DEFAULT NULL COMMENT '签收日期',
  `is_jiesuan` tinyint(1) DEFAULT NULL COMMENT '是否结算',
  `is_duizhang` tinyint(1) DEFAULT NULL COMMENT '是否对账',
  `is_qingzhang` tinyint(1) DEFAULT NULL COMMENT '是否签收',
  `remarks` text COMMENT '备注',
  `user_id` int(6) DEFAULT NULL COMMENT '用户ID',
  `add_luru_time` varchar(20) DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of st_information
-- ----------------------------
INSERT INTO `st_information` VALUES ('1', '商勇旗', '1786515177', '地方', '1.5', '山东省济南市历城区花园路168号二建融基商务打算', '150', '支付宝', '200', '已通过', '顺丰', 'S8651566161', '已发货', '是', '2020-04-09', '2020-04-09', '2020-04-09 12:00:00', '1', '2', '3', null, '101009', '1586787562', '1');
INSERT INTO `st_information` VALUES ('2', '张三', '15966291215', 'OK', '2', '北京北京东城区是的是的', '200', '微信支付', '200', '已拒绝', '顺丰', null, null, '否', '2020-04-15', '2020-04-17', null, null, null, null, '是的是的', '888888', '1586787562', '1');

-- ----------------------------
-- Table structure for st_liang
-- ----------------------------
DROP TABLE IF EXISTS `st_liang`;
CREATE TABLE `st_liang` (
  `s_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `s_number` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of st_liang
-- ----------------------------
INSERT INTO `st_liang` VALUES ('1', '0.5');
INSERT INTO `st_liang` VALUES ('2', '1');
INSERT INTO `st_liang` VALUES ('3', '1.5');
INSERT INTO `st_liang` VALUES ('4', '2');
INSERT INTO `st_liang` VALUES ('5', '2.5');
INSERT INTO `st_liang` VALUES ('6', '3');
INSERT INTO `st_liang` VALUES ('7', '3.5');
INSERT INTO `st_liang` VALUES ('8', '4');
INSERT INTO `st_liang` VALUES ('9', '4.5');
INSERT INTO `st_liang` VALUES ('10', '5');
INSERT INTO `st_liang` VALUES ('11', '5.5');
INSERT INTO `st_liang` VALUES ('12', '6');
INSERT INTO `st_liang` VALUES ('13', '6.5');
INSERT INTO `st_liang` VALUES ('14', '7');
INSERT INTO `st_liang` VALUES ('15', '7.5');
INSERT INTO `st_liang` VALUES ('16', '8');
INSERT INTO `st_liang` VALUES ('17', '8.5');
INSERT INTO `st_liang` VALUES ('18', '9');
INSERT INTO `st_liang` VALUES ('19', '9.5');
INSERT INTO `st_liang` VALUES ('20', '10');

-- ----------------------------
-- Table structure for st_product
-- ----------------------------
DROP TABLE IF EXISTS `st_product`;
CREATE TABLE `st_product` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) DEFAULT NULL,
  `product_stat` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of st_product
-- ----------------------------
INSERT INTO `st_product` VALUES ('1', '重2', '4');
INSERT INTO `st_product` VALUES ('2', '地方', '1');
INSERT INTO `st_product` VALUES ('3', 'OK', '1');

-- ----------------------------
-- Table structure for st_user
-- ----------------------------
DROP TABLE IF EXISTS `st_user`;
CREATE TABLE `st_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `nickname` varchar(10) DEFAULT NULL,
  `iphone` char(15) DEFAULT NULL,
  `bumen` char(10) DEFAULT NULL,
  `jibie` char(10) DEFAULT NULL,
  `teac_id` int(6) DEFAULT NULL,
  `rou_id` int(11) DEFAULT NULL,
  `addtime` varchar(10) DEFAULT NULL,
  `statu` tinyint(2) DEFAULT NULL,
  `nowsess` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of st_user
-- ----------------------------
INSERT INTO `st_user` VALUES ('1', 'jizhen', 'eb9a45b981cd7b6c659a7cd907087', '冀振', '15054138183', '2', null, '101001', '10', '1553668327', '1', 's1586313475');
INSERT INTO `st_user` VALUES ('2', 'zhuyong', '2a21aebbedfa2da8e41af25f2d746', '朱勇', '15105412320', '2', null, '101002', '13', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('3', 'zhangwen', 'adc3949ba59abbe56e057f20f883e', '张文', '18363066610', '2', null, '101003', '10', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('4', 'suyongfang', '857fcc3709f6d37b470d3f51e44eb', '苏永方', '18906401928', '2', null, '101004', '12', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('5', 'chenyongsheng', 'adc3949ba59abbe56e057f20f883e', '陈勇生', '15063348899', '2', null, '101005', '13', '1553668327', '2', 's1585617009');
INSERT INTO `st_user` VALUES ('66', 'shang', 'eb59466bb659d94e4a0618c742edc', '老商', '17865151770', '5', null, '368142', '10', '1586334282', '1', null);
INSERT INTO `st_user` VALUES ('7', 'chenyang', 'adc3949ba59abbe56e057f20f883e', '陈洋', '18678253161', '5', null, '101007', '11', '1553668327', '1', 's1586789253');
INSERT INTO `st_user` VALUES ('8', 'shizhongyou', '55a5219b2816e17b0ae8272ee9eca', '史中友', '18953145535', '2', null, '101008', '11', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('9', 'xunannan', '341d6f4bfd0f92d1fd8d3654679a7', '徐楠楠', '18954114412', '5', null, '101009', '10', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('10', 'wuchengjian', '7a6f4e974079b09a4290c7d6094c4', '吴成建', '18954119934', '5', null, '101010', '10', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('11', 'zhangyun', 'adc3949ba59abbe56e057f20f883e', '张云', '18906443969', '2', null, '101011', '11', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('12', 'zhaohua', 'adc3949ba59abbe56e057f20f883e', '赵华', '18766135931', '2', null, '101012', '10', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('13', 'zhushiyong', '3b7c48595c4d39f373be819783d29', '朱世勇', '13335105503', '2', null, '101013', '11', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('14', 'zhangzhuangzhuang', 'dd426fe82664141c82604355810a7', '张壮壮', '13356655395', '2', null, '101014', '11', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('15', 'zhangqi', '58a3f0a4a1fec2fe1a81ab7799acf', '张齐', '13808938353', '2', null, '101015', '10', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('16', 'qirui', 'f924445975708a0e403dfc7dd1fcf', '齐瑞', '13853113872', '2', null, '101016', '10', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('17', 'sunjilin', 'c549dbfdec4a0d49baec903648bb4', '孙继林', '15726156661', '2', null, '101017', '11', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('18', 'sunkeke', '8d062d264f0ac3bf3a8872c60a9a7', '孙珂珂', '15153111653', '2', null, '101018', '10', '1553668327', '2', null);
INSERT INTO `st_user` VALUES ('19', 'tanghaiyan', '6a5e0ef72c7e64ce0fb2ee2cf8bd6', '唐海燕', '15165044646', '2', null, '101019', '10', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('20', 'gaotianyi', 'f9b72b6077f16faea7e950672d4d0', '高天一', '15168883215', '2', null, '101020', '10', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('21', 'fengxiaoyu', '25f97bc13ad2852a7a551802feea0', '冯晓宇', '15168885289', '2', null, '101021', '10', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('44', 'lihu', 'adc3949ba59abbe56e057f20f883e', '李虎', '18366199920', '2', null, '101044', '10', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('45', 'wangmengying', '1883320aab73bce98b5195ddb60c4', '王梦迎', '18905415597', '2', null, '101045', '11', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('46', 'liuzhiheng', '73b8b1a2edd39b4099a61b0024e26', '刘智恒', '18766405085', '2', null, '101046', '10', '1553668327', '1', null);
INSERT INTO `st_user` VALUES ('47', 'admin', 'adc3949ba59abbe56e057f20f883e', '管理员', '17865158888', 'wangluobu', null, '888888', '0', '1553668327', '1', 's1586878998');
INSERT INTO `st_user` VALUES ('48', 'jiangyuqiang', 'fa5d8e30ff30eab8c381bb7dc1b50', '蒋玉强', '13808929903', '1', null, '962389', '11', '1555033455', '1', null);
INSERT INTO `st_user` VALUES ('49', 'tianmingkang', 'e8e3ecd3058cc7934fa29c60dd39e', '田明康', '13853117632', '1', null, '258012', '10', '1555404875', '1', null);
INSERT INTO `st_user` VALUES ('52', 'lijiahui', '03df7091b553c7518c779add408da', '李嘉辉', '13808936852', '1', null, '369646', '10', '1556420719', '1', null);
INSERT INTO `st_user` VALUES ('51', 'wanghanhan', '341d6f4bfd0f92d1fd8d3654679a7', '王含含', '13808935523', '1', null, '507671', '10', '1556260342', '1', null);
INSERT INTO `st_user` VALUES ('53', 'shangyongqi', 'adc3949ba59abbe56e057f20f883e', '商勇旗', '17865151770', '1', null, '812812', '10', '1557033709', '1', 's1585016069');
INSERT INTO `st_user` VALUES ('54', 'taoxin', '486a1a7b0cad9f166d27a798132d2', '陶欣', '18954532163', '1', null, '379671', '10', '1557728489', '1', null);
INSERT INTO `st_user` VALUES ('55', 'songcuijing', '6a5805e6585bab87790e66be6230c', '宋翠景', '18953175576', '1', null, '907366', '13', '1557883966', '1', null);
INSERT INTO `st_user` VALUES ('67', 'yong', 'adc3949ba59abbe56e057f20f883e', '勇', '15966291215', '1', null, '708400', '11', '1586334396', '1', null);
