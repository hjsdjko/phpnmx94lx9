import VueRouter from 'vue-router'

//引入组件
import Index from '../pages'
import Home from '../pages/home/home'
import Login from '../pages/login/login'
import Register from '../pages/register/register'
import Center from '../pages/center/center'
import Messages from '../pages/messages/list'
import Storeup from '../pages/storeup/list'
import News from '../pages/news/news-list'
import NewsDetail from '../pages/news/news-detail'
import payList from '../pages/pay'

import yonghuList from '../pages/yonghu/list'
import yonghuDetail from '../pages/yonghu/detail'
import yonghuAdd from '../pages/yonghu/add'
import lvshiList from '../pages/lvshi/list'
import lvshiDetail from '../pages/lvshi/detail'
import lvshiAdd from '../pages/lvshi/add'
import anjianleixingList from '../pages/anjianleixing/list'
import anjianleixingDetail from '../pages/anjianleixing/detail'
import anjianleixingAdd from '../pages/anjianleixing/add'
import yuyuexinxiList from '../pages/yuyuexinxi/list'
import yuyuexinxiDetail from '../pages/yuyuexinxi/detail'
import yuyuexinxiAdd from '../pages/yuyuexinxi/add'
import quxiaoyuyueList from '../pages/quxiaoyuyue/list'
import quxiaoyuyueDetail from '../pages/quxiaoyuyue/detail'
import quxiaoyuyueAdd from '../pages/quxiaoyuyue/add'
import jiaoliuxinxiList from '../pages/jiaoliuxinxi/list'
import jiaoliuxinxiDetail from '../pages/jiaoliuxinxi/detail'
import jiaoliuxinxiAdd from '../pages/jiaoliuxinxi/add'
import anjianxinxiList from '../pages/anjianxinxi/list'
import anjianxinxiDetail from '../pages/anjianxinxi/detail'
import anjianxinxiAdd from '../pages/anjianxinxi/add'
import anjianrizhiList from '../pages/anjianrizhi/list'
import anjianrizhiDetail from '../pages/anjianrizhi/detail'
import anjianrizhiAdd from '../pages/anjianrizhi/add'
import yijianpingjiaList from '../pages/yijianpingjia/list'
import yijianpingjiaDetail from '../pages/yijianpingjia/detail'
import yijianpingjiaAdd from '../pages/yijianpingjia/add'
import richengtixingList from '../pages/richengtixing/list'
import richengtixingDetail from '../pages/richengtixing/detail'
import richengtixingAdd from '../pages/richengtixing/add'
import huiyianpaiList from '../pages/huiyianpai/list'
import huiyianpaiDetail from '../pages/huiyianpai/detail'
import huiyianpaiAdd from '../pages/huiyianpai/add'
import xingchengxinxiList from '../pages/xingchengxinxi/list'
import xingchengxinxiDetail from '../pages/xingchengxinxi/detail'
import xingchengxinxiAdd from '../pages/xingchengxinxi/add'
import feiyongxinxiList from '../pages/feiyongxinxi/list'
import feiyongxinxiDetail from '../pages/feiyongxinxi/detail'
import feiyongxinxiAdd from '../pages/feiyongxinxi/add'
import newstypeList from '../pages/newstype/list'
import newstypeDetail from '../pages/newstype/detail'
import newstypeAdd from '../pages/newstype/add'
import aboutusList from '../pages/aboutus/list'
import aboutusDetail from '../pages/aboutus/detail'
import aboutusAdd from '../pages/aboutus/add'
import systemintroList from '../pages/systemintro/list'
import systemintroDetail from '../pages/systemintro/detail'
import systemintroAdd from '../pages/systemintro/add'

const originalPush = VueRouter.prototype.push
VueRouter.prototype.push = function push(location) {
	return originalPush.call(this, location).catch(err => err)
}

//配置路由
export default new VueRouter({
	routes:[
		{
      path: '/',
      redirect: '/index/home'
    },
		{
			path: '/index',
			component: Index,
			children:[
				{
					path: 'home',
					component: Home
				},
				{
					path: 'center',
					component: Center,
				},
				{
					path: 'pay',
					component: payList,
				},
				{
					path: 'messages',
					component: Messages
				},
				{
					path: 'storeup',
					component: Storeup
				},
				{
					path: 'news',
					component: News
				},
				{
					path: 'newsDetail',
					component: NewsDetail
				},
				{
					path: 'yonghu',
					component: yonghuList
				},
				{
					path: 'yonghuDetail',
					component: yonghuDetail
				},
				{
					path: 'yonghuAdd',
					component: yonghuAdd
				},
				{
					path: 'lvshi',
					component: lvshiList
				},
				{
					path: 'lvshiDetail',
					component: lvshiDetail
				},
				{
					path: 'lvshiAdd',
					component: lvshiAdd
				},
				{
					path: 'anjianleixing',
					component: anjianleixingList
				},
				{
					path: 'anjianleixingDetail',
					component: anjianleixingDetail
				},
				{
					path: 'anjianleixingAdd',
					component: anjianleixingAdd
				},
				{
					path: 'yuyuexinxi',
					component: yuyuexinxiList
				},
				{
					path: 'yuyuexinxiDetail',
					component: yuyuexinxiDetail
				},
				{
					path: 'yuyuexinxiAdd',
					component: yuyuexinxiAdd
				},
				{
					path: 'quxiaoyuyue',
					component: quxiaoyuyueList
				},
				{
					path: 'quxiaoyuyueDetail',
					component: quxiaoyuyueDetail
				},
				{
					path: 'quxiaoyuyueAdd',
					component: quxiaoyuyueAdd
				},
				{
					path: 'jiaoliuxinxi',
					component: jiaoliuxinxiList
				},
				{
					path: 'jiaoliuxinxiDetail',
					component: jiaoliuxinxiDetail
				},
				{
					path: 'jiaoliuxinxiAdd',
					component: jiaoliuxinxiAdd
				},
				{
					path: 'anjianxinxi',
					component: anjianxinxiList
				},
				{
					path: 'anjianxinxiDetail',
					component: anjianxinxiDetail
				},
				{
					path: 'anjianxinxiAdd',
					component: anjianxinxiAdd
				},
				{
					path: 'anjianrizhi',
					component: anjianrizhiList
				},
				{
					path: 'anjianrizhiDetail',
					component: anjianrizhiDetail
				},
				{
					path: 'anjianrizhiAdd',
					component: anjianrizhiAdd
				},
				{
					path: 'yijianpingjia',
					component: yijianpingjiaList
				},
				{
					path: 'yijianpingjiaDetail',
					component: yijianpingjiaDetail
				},
				{
					path: 'yijianpingjiaAdd',
					component: yijianpingjiaAdd
				},
				{
					path: 'richengtixing',
					component: richengtixingList
				},
				{
					path: 'richengtixingDetail',
					component: richengtixingDetail
				},
				{
					path: 'richengtixingAdd',
					component: richengtixingAdd
				},
				{
					path: 'huiyianpai',
					component: huiyianpaiList
				},
				{
					path: 'huiyianpaiDetail',
					component: huiyianpaiDetail
				},
				{
					path: 'huiyianpaiAdd',
					component: huiyianpaiAdd
				},
				{
					path: 'xingchengxinxi',
					component: xingchengxinxiList
				},
				{
					path: 'xingchengxinxiDetail',
					component: xingchengxinxiDetail
				},
				{
					path: 'xingchengxinxiAdd',
					component: xingchengxinxiAdd
				},
				{
					path: 'feiyongxinxi',
					component: feiyongxinxiList
				},
				{
					path: 'feiyongxinxiDetail',
					component: feiyongxinxiDetail
				},
				{
					path: 'feiyongxinxiAdd',
					component: feiyongxinxiAdd
				},
				{
					path: 'newstype',
					component: newstypeList
				},
				{
					path: 'newstypeDetail',
					component: newstypeDetail
				},
				{
					path: 'newstypeAdd',
					component: newstypeAdd
				},
				{
					path: 'aboutus',
					component: aboutusList
				},
				{
					path: 'aboutusDetail',
					component: aboutusDetail
				},
				{
					path: 'aboutusAdd',
					component: aboutusAdd
				},
				{
					path: 'systemintro',
					component: systemintroList
				},
				{
					path: 'systemintroDetail',
					component: systemintroDetail
				},
				{
					path: 'systemintroAdd',
					component: systemintroAdd
				},
			]
		},
		{
			path: '/login',
			component: Login
		},
		{
			path: '/register',
			component: Register
		},
	]
})
