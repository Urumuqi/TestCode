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
WHERE rn <= 10