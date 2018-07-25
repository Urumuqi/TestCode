//index.js
//获取应用实例
const app = getApp()

let lazyload;

Page({
    data: {
        classNote: 'item-',                    // 循环节点前缀
        count: 0,                              // 总共加载到多少张
        img: []                                // 图片列表
    },
    onReady: function () {
        //可以先初始化首屏需要展示的图片
        that.setData({
            count: 5
        })
        //开始监听节点，注意需要在onReady才能监听，此时节点才渲染
        lazyload.observe();
    },
    viewPort: function () {
        const that = this;
        var intersectionObserver = wx.createIntersectionObserver();
        //这里bottom：100，是指显示区域以下 100px 时，就会触发回调函数。
        intersectionObserver.relativeToViewport({bottom: 100}).observe(this.data.classNote + this.data.count, (res) => {
            if(res.boundingClientRect.top > 0){
                intersectionObserver.disconnect()
                that.setData({
                    count: that.data.count + 5
                })
                that.viewPort();
            }
        })
    }
})


