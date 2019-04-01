class Payment {

    /**
     * 统一下单接口.
     *
     * @param request
     * @param response
     *
     * @return JSONObject json_return
     */
    @Override
    public JSONObject createUnifiedOrder(HttpServletRequest request,HttpServletResponse response) {
        logger.info("微信 统一下单 接口调用");
        //设置最终返回对象
        JSONObject resultJson = new JSONObject();
        //创建条件
        Criteria criteria = new Criteria();

        //接受参数(金额)
        String amount = request.getParameter("amount");
        //接受参数(openid)
        String openid = request.getParameter("openid");
        //接口调用总金额单位为分换算一下(测试金额改成1,单位为分则是0.01,根据自己业务场景判断是转换成float类型还是int类型)
        //String amountFen = Integer.valueOf((Integer.parseInt(amount)*100)).toString();
        //String amountFen = Float.valueOf((Float.parseFloat(amount)*100)).toString();
        String amountFen = "1";
        //创建hashmap(用户获得签名)
        SortedMap<String, String> paraMap = new TreeMap<String, String>();
        //设置body变量 (支付成功显示在微信支付 商品详情中)
        String body = "啦啦啦测试";
        //设置随机字符串
        String nonceStr = Utils.getUUIDString().replaceAll("-", "");
        //设置商户订单号
        String outTradeNo = Utils.getUUIDString().replaceAll("-", "");


        //设置请求参数(小程序ID)
        paraMap.put("appid", APPLYID);
        //设置请求参数(商户号)
        paraMap.put("mch_id", MCHID);
        //设置请求参数(随机字符串)
        paraMap.put("nonce_str", nonceStr);
        //设置请求参数(商品描述)
        paraMap.put("body", body);
        //设置请求参数(商户订单号)
        paraMap.put("out_trade_no", outTradeNo);
        //设置请求参数(总金额)
        paraMap.put("total_fee", amountFen);
        //设置请求参数(终端IP)
        paraMap.put("spbill_create_ip", WebUtils.getIpAddress(request, response));
        //设置请求参数(通知地址)
        paraMap.put("notify_url", WebUtils.getBasePath()+"wechat/wechatAppletGolf/payCallback");
        //设置请求参数(交易类型)
        paraMap.put("trade_type", "JSAPI");
        //设置请求参数(openid)(在接口文档中 该参数 是否必填项 但是一定要注意 如果交易类型设置成'JSAPI'则必须传入openid)
        paraMap.put("openid", openid);
        //调用逻辑传入参数按照字段名的 ASCII 码从小到大排序（字典序）
        String stringA = formatUrlMap(paraMap, false, false);
        //第二步，在stringA最后拼接上key得到stringSignTemp字符串，并对stringSignTemp进行MD5运算，再将得到的字符串所有字符转换为大写，得到sign值signValue。(签名)
        String sign = MD5Util.MD5(stringA+"&key="+KEY).toUpperCase();
        //将参数 编写XML格式
        StringBuffer paramBuffer = new StringBuffer();
        paramBuffer.append("<xml>");
        paramBuffer.append("<appid>"+APPLYID+"</appid>");
        paramBuffer.append("<mch_id>"+MCHID+"</mch_id>");
        paramBuffer.append("<nonce_str>"+paraMap.get("nonce_str")+"</nonce_str>");
        paramBuffer.append("<sign>"+sign+"</sign>");
        paramBuffer.append("<body>"+body+"</body>");
        paramBuffer.append("<out_trade_no>"+paraMap.get("out_trade_no")+"</out_trade_no>");
        paramBuffer.append("<total_fee>"+paraMap.get("total_fee")+"</total_fee>");
        paramBuffer.append("<spbill_create_ip>"+paraMap.get("spbill_create_ip")+"</spbill_create_ip>");
        paramBuffer.append("<notify_url>"+paraMap.get("notify_url")+"</notify_url>");
        paramBuffer.append("<trade_type>"+paraMap.get("trade_type")+"</trade_type>");
        paramBuffer.append("<openid>"+paraMap.get("openid")+"</openid>");
        paramBuffer.append("</xml>");

        try {
            //发送请求(POST)(获得数据包ID)(这有个注意的地方 如果不转码成ISO8859-1则会告诉你body不是UTF8编码 就算你改成UTF8编码也一样不好使 所以修改成ISO8859-1)
            Map<String,String> map = doXMLParse(getRemotePortData(URL, new String(paramBuffer.toString().getBytes(), "ISO8859-1")));
            //应该创建 支付表数据
            if(map!=null){
                //清空
                criteria.clear();
                //设置openId条件
                criteria.put("openId", openid);
                //获取数据
                List<WechatAppletGolfPayInfo> payInfoList = appletGolfPayInfoMapper.selectByExample(criteria);
                //如果等于空 则证明是第一次支付
                if(CollectionUtils.isEmpty(payInfoList)){
                    //创建支付信息对象
                    WechatAppletGolfPayInfo appletGolfPayInfo = new  WechatAppletGolfPayInfo();
                    //设置主键
                    appletGolfPayInfo.setPayId(outTradeNo);
                    //设置openid
                    appletGolfPayInfo.setOpenId(openid);
                    //设置金额
                    appletGolfPayInfo.setAmount(Long.valueOf(amount));
                    //设置支付状态
                    appletGolfPayInfo.setPayStatus("0");
                    //插入Dao
                    int sqlRow = appletGolfPayInfoMapper.insert(appletGolfPayInfo);
                    //判断
                    if(sqlRow == 1){
                        logger.info("微信 统一下单 接口调用成功 并且新增支付信息成功");
                        resultJson.put("prepayId", map.get("prepay_id"));
                        resultJson.put("outTradeNo", paraMap.get("out_trade_no"));
                        return resultJson;
                    }
                }else{
                    //判断 是否等于一条
                    if(payInfoList.size() == 1){
                        //获取 需要更新数据
                        WechatAppletGolfPayInfo wechatAppletGolfPayInfo = payInfoList.get(0);
                        //更新 该条的 金额
                        wechatAppletGolfPayInfo.setAmount(Long.valueOf(amount));
                        //更新Dao
                        int sqlRow = appletGolfPayInfoMapper.updateByPrimaryKey(wechatAppletGolfPayInfo);
                        //判断
                        if(sqlRow == 1){
                            logger.info("微信 统一下单 接口调用成功 修改支付信息成功");
                            resultJson.put("prepayId", map.get("prepay_id"));
                            resultJson.put("outTradeNo", paraMap.get("out_trade_no"));
                            return resultJson;
                        }
                    }
                }
            }
            //将 数据包ID 返回

            System.out.println(map);
        } catch (UnsupportedEncodingException e) {
            logger.info("微信 统一下单 异常："+e.getMessage());
            e.printStackTrace();
        } catch (Exception e) {
            logger.info("微信 统一下单 异常："+e.getMessage());
            e.printStackTrace();
        }
        logger.info("微信 统一下单 失败");
        return resultJson;
    }

    /**
     * 方法名: getRemotePortData
     * 描述: 发送远程请求 获得代码示例
     * 参数：  @param urls 访问路径
     * 参数：  @param param 访问参数-字符串拼接格式, 例：port_d=10002&port_g=10007&country_a=
     * 创建人: Xia ZhengWei
     * 创建时间: 2017年3月6日 下午3:20:32
     * 版本号: v1.0
     * 返回类型: String
    */
    private String getRemotePortData(String urls, String param){
        logger.info("开始执行http请求");
        try {
            URL url = new URL(urls);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();
            // 设置连接超时时间
            conn.setConnectTimeout(30000);
            // 设置读取超时时间
            conn.setReadTimeout(30000);
            conn.setRequestMethod("POST");
            // if(StringUtil.isNotBlank(param)) {
            //     conn.setRequestProperty("Origin", "https://sirius.searates.com");// 主要参数
            //     conn.setRequestProperty("Referer", "https://sirius.searates.com/cn/port?A=ChIJP1j2OhRahjURNsllbOuKc3Y&D=567&G=16959&shipment=1&container=20st&weight=1&product=0&request=&weightcargo=1&");
            //     conn.setRequestProperty("X-Requested-With", "XMLHttpRequest");// 主要参数
            // }
            // 需要输出
            conn.setDoInput(true);
            // 需要输入
            conn.setDoOutput(true);
            // 设置是否使用缓存
            conn.setUseCaches(false);
            // 设置请求属性
            conn.setRequestProperty("Content-Type", "application/x-www-form-urlencoded");
            conn.setRequestProperty("Connection", "Keep-Alive");// 维持长连接
            conn.setRequestProperty("Charset", "UTF-8");

            if(StringUtil.isNotBlank(param)) {
                // 建立输入流，向指向的URL传入参数
                DataOutputStream dos=new DataOutputStream(conn.getOutputStream());
                dos.writeBytes(param);
                dos.flush();
                dos.close();
            }
            // 输出返回结果
            InputStream input = conn.getInputStream();
            int resLen =0;
            byte[] res = new byte[1024];
            StringBuilder sb=new StringBuilder();
            while((resLen=input.read(res))!=-1){
                sb.append(new String(res, 0, resLen));
            }
            return sb.toString();
        } catch (MalformedURLException e) {
            e.printStackTrace();
            logger.info("url请求异常 : " + e.getMessage());
        } catch (IOException e) {
            e.printStackTrace();
            logger.info("url 请求IO异常 : " + e.getMessage());
        }
        logger.info("返回结果为空");
        return "";
    }
}