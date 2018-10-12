-- 查询每个电池，最近的10个订单
SELECT *
FROM (
	SELECT battery_sn AS `电池sn`, order_number AS `订单号`, user_id AS `用户id`, start_time AS `借用时间`, return_time AS `归还时间`
		, pay_time AS `支付时间`, return_time - start_time AS `借用时长`, return_store_id AS `归还门店id`, return_store_name AS `归还门店名称`
		, row_number() OVER (PARTITION BY battery_sn ORDER BY create_time DESC) AS rn
	FROM dim_jiedian_order
	WHERE battery_sn IN (
		'C224CB35KM','C234CF32U4','C254CB31AK'
	)
) t
WHERE rn <= 10;

-- 查询20180723开始生效，并且充值时间在20180723以前
SELECT vr.uid as `用户id`, vr.vip_type_id as `vip类型`, from_unixtime(vr.create_time, '%Y-%m-%d %H:%i:%s') as `购买时间`,
from_unixtime(vr.before_effective_time, '%Y-%m-%d %H:%i:%s') as `生效时间`, vr.order_number as `充值订单号`, vr.batch_id as `批次号`,
vr.amount as `月卡充值金额`, o.price_pay as `订单金额`, o.price_pay_revised as `订单初始金额`
FROM `ycn-user`.`vip_record` vr
JOIN `jiedian_sumdb`.`orders` o ON o.order_number = vr.order_number
WHERE vr.before_effective_time >= 1532275200 AND vr.before_effective_time < 1532361600
	AND vr.status = 1 AND vr.create_time < 1532275200;


SELECT battery_sn AS `电池sn`, order_number AS `订单号`
	, from_unixtime(start_time + 28800, "yyyy-MM-dd HH:mm:ss") AS `订单开始时间`
	, from_unixtime(return_time + 28800, "yyyy-MM-dd HH:mm:ss") AS `订单结束时间`
	, from_unixtime(pay_time + 28800, "yyyy-MM-dd HH:mm:ss") AS `支付时间`
	, error_code, price_pay / 100 AS `实际支付金额`, price_pay_revised / 100 AS `订单初始金额`
	, (price_pay_revised - price_pay) / 100 AS `退款金额`
	, from_unixtime(update_time + 28800, "yyyy-MM-dd HH:mm:ss") AS `退款时间`
FROM `bi_kudu_jiedian`.`dim_jiedian_order`
WHERE order_type = 'battery'
	AND price_pay_revised >= 9900
	AND pay_time >= 1532102400
	AND pay_time < 1532188800;

-- 按电池和日期导出最近7天订单数
SELECT battery_sn, start_date, COUNT(order_number) AS `order_cnt`
FROM `bi_kudu_jiedian`.`dim_jiedian_order`
WHERE battery_sn IN ('C407CB3LRM', 'C421CB3A2U', 'C375CB39CT')
	AND start_month >= 201808
	AND start_date >= 20180824
GROUP BY battery_sn, start_date
ORDER BY battery_sn, start_date
