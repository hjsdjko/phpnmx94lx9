import Vue from 'vue';
//配置路由
import VueRouter from 'vue-router'
Vue.use(VueRouter);
//1.创建组件
import Index from '@/views/index'
import Home from '@/views/home'
import Login from '@/views/login'
import NotFound from '@/views/404'
import UpdatePassword from '@/views/update-password'
import pay from '@/views/pay'
import register from '@/views/register'
import center from '@/views/center'
    import news from '@/views/modules/news/list'
    import aboutus from '@/views/modules/aboutus/list'
    import lvshi from '@/views/modules/lvshi/list'
    import yijianpingjia from '@/views/modules/yijianpingjia/list'
    import yuyuexinxi from '@/views/modules/yuyuexinxi/list'
    import xingchengxinxi from '@/views/modules/xingchengxinxi/list'
    import feiyongxinxi from '@/views/modules/feiyongxinxi/list'
    import anjianxinxi from '@/views/modules/anjianxinxi/list'
    import richengtixing from '@/views/modules/richengtixing/list'
    import quxiaoyuyue from '@/views/modules/quxiaoyuyue/list'
    import anjianleixing from '@/views/modules/anjianleixing/list'
    import systemintro from '@/views/modules/systemintro/list'
    import yonghu from '@/views/modules/yonghu/list'
    import messages from '@/views/modules/messages/list'
    import anjianrizhi from '@/views/modules/anjianrizhi/list'
    import config from '@/views/modules/config/list'
    import huiyianpai from '@/views/modules/huiyianpai/list'
    import jiaoliuxinxi from '@/views/modules/jiaoliuxinxi/list'
    import newstype from '@/views/modules/newstype/list'


//2.配置路由   注意：名字
export const routes = [{
    path: '/',
    name: '系统首页',
    component: Index,
    children: [{
      // 这里不设置值，是把main作为默认页面
      path: '/',
      name: '系统首页',
      component: Home,
      meta: {icon:'', title:'center', affix: true}
    }, {
      path: '/updatePassword',
      name: '修改密码',
      component: UpdatePassword,
      meta: {icon:'', title:'updatePassword'}
    }, {
      path: '/pay',
      name: '支付',
      component: pay,
      meta: {icon:'', title:'pay'}
    }, {
      path: '/center',
      name: '个人信息',
      component: center,
      meta: {icon:'', title:'center'}
    }
      ,{
	path: '/news',
        name: '律所公告',
        component: news
      }
      ,{
	path: '/aboutus',
        name: '关于我们',
        component: aboutus
      }
      ,{
	path: '/lvshi',
        name: '律师',
        component: lvshi
      }
      ,{
	path: '/yijianpingjia',
        name: '意见评价',
        component: yijianpingjia
      }
      ,{
	path: '/yuyuexinxi',
        name: '预约信息',
        component: yuyuexinxi
      }
      ,{
	path: '/xingchengxinxi',
        name: '行程信息',
        component: xingchengxinxi
      }
      ,{
	path: '/feiyongxinxi',
        name: '费用信息',
        component: feiyongxinxi
      }
      ,{
	path: '/anjianxinxi',
        name: '案件信息',
        component: anjianxinxi
      }
      ,{
	path: '/richengtixing',
        name: '日程提醒',
        component: richengtixing
      }
      ,{
	path: '/quxiaoyuyue',
        name: '取消预约',
        component: quxiaoyuyue
      }
      ,{
	path: '/anjianleixing',
        name: '案件类型',
        component: anjianleixing
      }
      ,{
	path: '/systemintro',
        name: '系统简介',
        component: systemintro
      }
      ,{
	path: '/yonghu',
        name: '用户',
        component: yonghu
      }
      ,{
	path: '/messages',
        name: '律所留言',
        component: messages
      }
      ,{
	path: '/anjianrizhi',
        name: '案件日志',
        component: anjianrizhi
      }
      ,{
	path: '/config',
        name: '轮播图管理',
        component: config
      }
      ,{
	path: '/huiyianpai',
        name: '会议安排',
        component: huiyianpai
      }
      ,{
	path: '/jiaoliuxinxi',
        name: '交流信息',
        component: jiaoliuxinxi
      }
      ,{
	path: '/newstype',
        name: '律所公告分类',
        component: newstype
      }
    ]
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {icon:'', title:'login'}
  },
  {
    path: '/register',
    name: 'register',
    component: register,
    meta: {icon:'', title:'register'}
  },
  {
    path: '*',
    component: NotFound
  }
]
//3.实例化VueRouter  注意：名字
const router = new VueRouter({
  mode: 'hash',
  /*hash模式改为history*/
  routes // （缩写）相当于 routes: routes
})
const originalPush = VueRouter.prototype.push
//修改原型对象中的push方法
VueRouter.prototype.push = function push(location) {
   return originalPush.call(this, location).catch(err => err)
}
export default router;
