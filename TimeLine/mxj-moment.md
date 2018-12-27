## 开发排期

- 数据表 + 对接SO用户认证接口 1天 7号
- 等待页面 （唤起相机+图片上传+拍摄结果） 2天 10/11号
- 视频页面（分享） 0.5天 12号
- 预留1天左右对接硬件接口
- 总计开发时间一周


## 待确认问题

- 相机拍摄成功 ： 视频拍摄成功, 视频上传成功 （是否能明确标记试一个操作过程）


- 变更 ： 相机上只有启动相机二维码，怎么来让用户保存拍摄结果？（二维码？保存视频？微信收藏？）在哪个环节加入？
- 二维码加入到视频预览页面

### 启动相机二维码接口

```json
    {
        "相机群ID":"A-001",
        "城市ID":"BJ",
        "场地ID":"TX-001",
        "时间":1234567654321
    }
```

### 视频上传接口

- 规范返回数据格式： json {status: integer, url: string}


### 视频二维码

- 永远获取最近一个视频(历史视频列表暂不考虑)