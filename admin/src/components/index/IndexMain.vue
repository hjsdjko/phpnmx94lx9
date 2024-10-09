<template>
	<div style="height: 100%;">
		<el-main :style='"vertical" == "vertical" ? (2 == 1 ? {"minHeight":"100%","padding":"0","margin":"0 0 0 210px","position":"relative","display":"block"} : (2 == 2 ? (isCollapse ? {"minHeight":"100%","padding":"70px 0 0 96px","margin":"0","position":"relative","background":"#eaeef3","display":"block"} : {"minHeight":"100%","padding":"70px 0 0 300px","margin":"0","position":"relative","background":"#eaeef3","display":"block"}) : "")) : {"minHeight":"100%","margin":"0","position":"relative"}'>
			<!-- top -->
			<index-header :style='{"boxShadow":"0 6px 0 0 rgba(0,0,0,.01), 0 15px 32px 0 rgba(0,0,0,.06)","padding":"8px 190px 8px 280px","margin":"0 auto","borderColor":"#f6dce0","alignItems":"center","color":"#333","display":"flex","justifyContent":"space-between","top":"0","left":"0","background":"#fff","borderWidth":"0 0 0px","width":"calc(100% - 0px)","fontSize":"16px","position":"fixed","borderStyle":"solid","zIndex":"1002","height":"70px"}'></index-header>
			
			<!-- menu -->
			<template v-if="'vertical' == 'vertical'">
			  <template v-if="2 == 1">
				<index-aside :style='{"boxShadow":"1px 0 6px  rgba(64, 158, 255, .3)","overflow":"hidden","top":"0","left":"0","background":"#304156","bottom":"0","width":"210px","fontSize":"0px","position":"fixed","height":"100%","zIndex":"1001"}'></index-aside>
			  </template>
			  <template v-if="2 == 2">
				<index-aside :is-collapse="isCollapse" @oncollapsechange="collapseChange" :style='isCollapse ? {"boxShadow":"0px 0 0px rgba(255,205,155,1)","padding":"0px 0 0","borderColor":"#f6dce0","bottom":"0","transition":"width 0.3s","overflow":"hidden","top":"0","left":"0","background":"linear-gradient(to bottom, rgba(125,185,232,0.16) 0%,rgba(122,182,230,0.16) 3%,rgba(107,166,217,0.91) 19%,rgba(72,130,188,.8) 56%,rgba(30,87,153,.8) 100%),url(http://codegen.caihongy.cn/20230805/7c527b58609f477e8e95d5ac554d0bbf.jpg) no-repeat 0 0 / cover","borderWidth":"0 0px 0 0","width":"96px","fontSize":"0px","position":"fixed","borderStyle":"solid","height":"100%","zIndex":"1003"} : {"boxShadow":"0px 0 0px rgba(255,205,155,1)","padding":"10px 0px 150px","borderColor":"#f0cad3","bottom":"0px","transition":"width 0.3s","overflow":"hidden","top":"70px","left":"0","background":"linear-gradient(to bottom, rgba(125,185,232,0.16) 0%,rgba(122,182,230,0.16) 3%,rgba(107,166,217,0.91) 19%,rgba(72,130,188,.8) 56%,rgba(30,87,153,.8) 100%),url(http://codegen.caihongy.cn/20230805/7c527b58609f477e8e95d5ac554d0bbf.jpg) no-repeat 0 0 / cover","borderWidth":"0 0px 0 0","width":"300px","fontSize":"16px","position":"fixed","borderStyle":"solid","height":"100%","zIndex":"1003"}'></index-aside>
			  </template>
			</template>
			<template v-if="'vertical' == 'horizontal'">
			  <template v-if="2 == 1">
				<index-aside :style='{"width":"100%","borderColor":"#efefef","borderStyle":"solid","background":"#304156","borderWidth":"0 0 1px 0","height":"auto"}'></index-aside>
			  </template>
			  <template v-if="2 == 2">
				<index-aside :style='{"borderColor":"#efefef","background":"#FFF","borderWidth":"0 0 1px 0","display":"flex","width":"100%","borderStyle":"solid","height":"auto"}'></index-aside>
			  </template>
			</template>
			
			<!-- breadcrumb -->
			<bread-crumbs :title="title" :style='{"padding":"50px 0 0","margin":"0px auto","borderColor":"#eee","borderWidth":"0 0 1px 0","width":"calc(100% - 60px)","fontSize":"16px","borderStyle":"solid"}' class="bread-crumbs"></bread-crumbs>
			
			<!-- TagsView -->
			<tags-view />
			
			<router-view class="router-view"></router-view>
		</el-main>
	</div>
</template>

<script>
	import IndexAside from '@/components/index/IndexAsideStatic'
	import IndexHeader from '@/components/index/IndexHeader'
	import TagsView from '@/components/index/TagsView'
	import menu from "@/utils/menu";
	export default {
		components: {
			IndexAside,
			IndexHeader,
			TagsView
		},
		data() {
			return {
				menuList: [],
				role: "",
				currentIndex: -2,
				itemMenu: [],
				title: '',
				isCollapse: true,
			};
		},
		mounted() {
			let menus = menu.list();
			this.menuList = menus;
			this.role = this.$storage.get("role");
		},
		created() {
			this.init();
		},
		methods: {
			init(){
				this.$nextTick(()=>{
					
				})
			},
			collapseChange(collapse) {
				this.isCollapse = collapse
			},
			menuHandler(menu) {
				this.$router.push({
					name: menu.tableName
				});
				this.title = menu.menu;
			},
			titleChange(index, menus) {
				this.currentIndex = index
				this.itemMenu = menus;
			},
			homeChange(index) {
				this.itemMenu = [];
				this.title = ""
				this.currentIndex = index
				this.$router.push({
					name: 'home'
				});
			},
			centerChange(index) {
				this.itemMenu = [{
					"buttons": ["新增", "查看", "修改", "删除"],
					"menu": "修改密码",
					"tableName": "updatePassword"
				}, {
					"buttons": ["新增", "查看", "修改", "删除"],
					"menu": "个人信息",
					"tableName": "center"
				}];
				this.title = ""
				this.currentIndex = index
				this.$router.push({
					name: 'home'
				});
				
			}
		}
	};
</script>
<style lang="scss" scoped>
	a {
		text-decoration: none;
		color: #555;
	}

	a:hover {
		background: #00c292;
	}
	
	.el-main {
		padding: 0;
		display: block;
	}

	.nav-list {
		width: 100%;
		margin: 0 auto;
		text-align: left;
		margin-top: 20px;

		.nav-title {
			display: inline-block;
			font-size: 15px;
			color: #333;
			padding: 15px 25px;
			border: none;
		}

		.nav-title.active {
			color: #555;
			cursor: default;
			background-color: #fff;
		}
	}

	.nav-item {
		margin-top: 20px;
		background: #FFFFFF;
		padding: 15px 0;

		.menu {
			padding: 15px 25px;
		}
	}
	
	.detail-form-content {
	    background: transparent;
	}
</style>
