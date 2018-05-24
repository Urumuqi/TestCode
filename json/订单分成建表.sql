DROP TABLE `orders`;
-- 订单表明细
CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_no` bigint(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT '订单号',
  `related_order_no` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0' COMMENT '扣款单关联的订单号,扣款订单才有',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单付款类型:支付0;扣款1',
  `store_id` varchar(64) NOT NULL DEFAULT '' COMMENT '借出门店id',
  `provider_id` varchar(64) NOT NULL DEFAULT '' COMMENT '服务商id',
  `provider_type` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '服务商类型:0渠道,1直营BD,2代理商',
  `price_pay` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户支付总额,单位分',
  `price_amount` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '订单总额,单位分',
  `price_discounted` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '折扣掉的金额,单位分',
  `price_pay_revised` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '修订后的支付金额,单位分',
  `deposit_amount` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '订单押金总额，单位分，提现或挂失使用',
  `tax_amount` INT(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '税务总额,单位分',
  `error_code` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '错误代码',
  `device_id` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '借出机柜id',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单开始时间',
  `return_time` INT(11) NOT NULL DEFAULT '0' COMMENT '归还时间',
  `pay_time` int(11) NOT NULL DEFAULT '0' COMMENT '支付时间',
  `order_end_time` int(11) NOT NULL DEFAULT '0' COMMENT '订单结束时间',
  `order_up_time` INT(11) NOT NULL DEFAULT '0' COMMENT '订单更新时间',
  `create_time` INT(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `ext_a` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '扩展字段_a',
  `ext_b` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '扩展字段_b',
  `ext_c` VARCHAR(200) NOT NULL DEFAULT '' COMMENT '扩展字段_c',
  PRIMARY KEY (`id`),
  KEY `idx_order_no` (`order_no`),
  KEY `idx_rel_order` (`related_order_no`),
  KEY `idx_store_id` (`store_id`),
  KEY `idx_provider` (`provider_id`, `provider_type`),
  KEY `idx_pay_time` (`pay_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单明细' ;

DROP TABLE channel_revenue_day;
-- 渠道每日营收数据
CREATE TABLE `channel_revenue_day` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `payable_id` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '应付单号',
  `agent_id` varchar(64) NOT NULL DEFAULT '' COMMENT '渠道商uuid',
  `pay_amount` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '当日订单付款总额',
  `pay_cnt` INT(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '营收订单总数',
  `refund_amount` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '当日订单退款总额',
  `refund_cnt` INT(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '扣款退款总数',
  `percentage` INT(11) NOT NULL DEFAULT '0' COMMENT '渠道商当天分成比例',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `payable_date` int(11) NOT NULL DEFAULT '0' COMMENT '应付单日期eg:20180226',
  PRIMARY KEY (`id`),
  KEY `idx_agent_id` (`agent_id`),
  KEY `idx_date` (`payable_date`),
  KEY `idx_payable` (`payable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='渠道商每天结算单';

-- 门店每天营收明细
-- 预估每月 350000 × 40 = 10500000， 每月增量1000w左右
-- 月内的热数据记录到mysql,并往kudu同步
DROP TABLE store_revenue_day;
CREATE TABLE `store_revenue_day` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '类型:0营收,1扣款',
  `store_id` varchar(64) NOT NULL DEFAULT '' COMMENT '门店uuid',
  `provider_id` varchar(64) NOT NULL DEFAULT '' COMMENT '服务商id',
  `provider_type` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '服务商类型:0渠道,1直营BD,2代理商',
  `pay_amount` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '订单营收总额',
  `pay_cnt` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '营收订单总数',
  `percentage` int(11) NOT NULL DEFAULT '0' COMMENT '门店当天营收分成比例',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `settle_date` INT(11) NOT NULL DEFAULT '0' COMMENT '日期eg:20180226',
  PRIMARY KEY (`id`),
  KEY `idx_store` (`store_id`),
  KEY `idx_date` (`settle_date`),
  KEY `idx_provider` (`provider_id`, `provider_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='每日付款单明细,门店维度' ;

-- 门店每小时营收汇总[营收和扣款]
-- 预估每月“门店小时营收数据” 350000 × 24 × 30 = 252000000
-- 最近几天的数据存mysql,往kudu同步,清除历史数据
DROP TABLE store_revenue_hour;
CREATE TABLE `store_revenue_hour` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `settle_date` int(12) NOT NULL DEFAULT '0' COMMENT '日期eg:20180226',
  `hour` INT(10) NOT NULL DEFAULT '0' COMMENT '小时,24小时格式0-23',
  `type` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '类型:0营收,1扣款',
  `pay_amount` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '小时营收汇总',
  `pay_cnt` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '小时订单总量',
  `percentage` int(11) NOT NULL DEFAULT '0' COMMENT '门店当天营收分成比例',
  `store_id` varchar(64) NOT NULL DEFAULT '' COMMENT '门店uuid',
  `provider_id` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '服务商id',
  `provider_type` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '服务商类型:0渠道,1直营BD,2代理商',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_search_hour` (`settle_date`, `hour`),
  KEY `idx_store` (`store_id`),
  KEY `idx_provider` (`provider_id`, `provider_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='门店按小时营收汇总';

-- 分成比例变更记录
DROP TABLE `profit_change_history`;
CREATE TABLE `profit_change_history` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `percentage` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分成比例',
  `data_id` varchar(64) NOT NULL DEFAULT '' COMMENT '商家id,直营bd,渠道商id',
  `data_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型:0渠道商,1直营bd,2商家,3代理商',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `data_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态:0当前生效,1历史数据',
  `start_time` int(11) NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '结束时间',
  `start_date` int(11) NOT NULL DEFAULT '0' COMMENT '开始日期eg:20180226',
  `end_date` int(11) NOT NULL DEFAULT '0' COMMENT '结束日期eg:20180226',
  PRIMARY KEY (`id`),
  KEY `idx_start_time` (`start_time`),
  KEY `idx_data` (`data_id`,`data_type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='分成比例变更记录' ;
