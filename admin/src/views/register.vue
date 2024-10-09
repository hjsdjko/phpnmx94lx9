<template>
	<div>
		<div class="container" :style='{"minHeight":"100vh","alignItems":"center","background":"url(http://codegen.caihongy.cn/20230805/7915a0067dde42b286859569f586368e.jpg)","display":"flex","width":"100%","backgroundSize":"cover","backgroundPosition":"center center","backgroundRepeat":"no-repeat","justifyContent":"center"}'>
			<el-form v-if="pageFlag=='register'" :style='{"border":"1px solid #f6f6f6","minHeight":"720px","padding":"50px 20px 20px","boxShadow":"0 6px 20px rgba(0, 0, 0, .2)","margin":"0","borderRadius":"0px","textAlign":"center","background":"#fff","width":"660px","fontSize":"16px","position":"relative","height":"auto"}' ref="rgsForm" class="rgs-form" :model="rgsForm" :rules="rules">
				<div v-if="true" :style='{"padding":"0px","margin":"0px auto 50px","borderColor":"#eee","color":"#fff","display":"inline-block","top":"-80px","left":"-30%","background":"none","borderWidth":"0px","width":"160%","lineHeight":"40px","fontSize":"48px","position":"absolute","borderStyle":"solid","fontWeight":"600"}' class="title">基于PHP的律所管理系统设计与实现注册</div>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('yonghuzhanghao')?'required':''">用户账号：</div>
					<el-input  v-model="ruleForm.yonghuzhanghao"  autocomplete="off" placeholder="用户账号"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('mima')?'required':''">密码：</div>
					<el-input  v-model="ruleForm.mima"  autocomplete="off" placeholder="密码"  type="password"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('mima')?'required':''">确认密码：</div>
					<el-input  v-model="ruleForm.mima2" autocomplete="off" placeholder="确认密码" type="password" />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('yonghuxingming')?'required':''">用户姓名：</div>
					<el-input  v-model="ruleForm.yonghuxingming"  autocomplete="off" placeholder="用户姓名"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('xingbie')?'required':''">性别：</div>
                    <el-select v-model="ruleForm.xingbie" placeholder="请选择性别" >
                        <el-option
                            v-for="(item,index) in yonghuxingbieOptions"
                            v-bind:key="index"
                            :label="item"
                            :value="item">
                        </el-option>
                    </el-select>
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('lianxifangshi')?'required':''">联系方式：</div>
					<el-input  v-model="ruleForm.lianxifangshi"  autocomplete="off" placeholder="联系方式"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='yonghu'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('touxiang')?'required':''">头像：</div>
                    <file-upload
                        tip="点击上传头像"
                        action="file/upload"
                        :limit="3"
                        :multiple="true"
                        :fileUrls="ruleForm.touxiang?ruleForm.touxiang:''"
                        @change="yonghutouxiangUploadChange"
                    ></file-upload>
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('lvshigonghao')?'required':''">律师工号：</div>
					<el-input  v-model="ruleForm.lvshigonghao"  autocomplete="off" placeholder="律师工号"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('mima')?'required':''">密码：</div>
					<el-input  v-model="ruleForm.mima"  autocomplete="off" placeholder="密码"  type="password"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('mima')?'required':''">确认密码：</div>
					<el-input  v-model="ruleForm.mima2" autocomplete="off" placeholder="确认密码" type="password" />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('lvshixingming')?'required':''">律师姓名：</div>
					<el-input  v-model="ruleForm.lvshixingming"  autocomplete="off" placeholder="律师姓名"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('xingbie')?'required':''">性别：</div>
                    <el-select v-model="ruleForm.xingbie" placeholder="请选择性别" >
                        <el-option
                            v-for="(item,index) in lvshixingbieOptions"
                            v-bind:key="index"
                            :label="item"
                            :value="item">
                        </el-option>
                    </el-select>
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('shiwusuo')?'required':''">事务所：</div>
					<el-input  v-model="ruleForm.shiwusuo"  autocomplete="off" placeholder="事务所"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('zhiji')?'required':''">职级：</div>
					<el-input  v-model="ruleForm.zhiji"  autocomplete="off" placeholder="职级"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('lianxidianhua')?'required':''">联系电话：</div>
					<el-input  v-model="ruleForm.lianxidianhua"  autocomplete="off" placeholder="联系电话"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('shenfenzheng')?'required':''">身份证：</div>
					<el-input  v-model="ruleForm.shenfenzheng"  autocomplete="off" placeholder="身份证"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('lvshiyouxiang')?'required':''">律师邮箱：</div>
					<el-input  v-model="ruleForm.lvshiyouxiang"  autocomplete="off" placeholder="律师邮箱"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('shanzhanglingyu')?'required':''">擅长领域：</div>
					<el-input  v-model="ruleForm.shanzhanglingyu"  autocomplete="off" placeholder="擅长领域"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('feiyong')?'required':''">费用：</div>
					<el-input  v-model="ruleForm.feiyong"  autocomplete="off" placeholder="费用"  type="text"  />
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('touxiang')?'required':''">头像：</div>
                    <file-upload
                        tip="点击上传头像"
                        action="file/upload"
                        :limit="3"
                        :multiple="true"
                        :fileUrls="ruleForm.touxiang?ruleForm.touxiang:''"
                        @change="lvshitouxiangUploadChange"
                    ></file-upload>
				</el-form-item>
				<el-form-item :style='{"padding":"0 0px","margin":"0 auto 10px","textAlign":"left","width":"60%","fontSize":"inherit","position":"relative","height":"auto"}' class="list-item" v-if="tableName=='lvshi'">
					<div v-if="true" :style='{"padding":"0 8px","color":"#666","textAlign":"right","left":"-120px","width":"120px","lineHeight":"40px","fontSize":"16px","position":"absolute"}' class="lable" :class="changeRules('jianjie')?'required':''">简介：</div>
					<editor
						style="min-width: 200px; max-width: 600px;"
						:style='{"width":"100%","height":"auto"}'
						v-model="ruleForm.jianjie" 
						class="editor" 
						action="file/upload">
					</editor>
				</el-form-item>
				<button :style='{"border":"1px solid #fff","cursor":"pointer","padding":"0 0 0 30px","boxShadow":"0 0 0px rgba(64, 158, 255, .5)","margin":"30px auto 5px","color":"#fff","display":"block","letterSpacing":"30px","outline":"none","borderRadius":"12px","background":"#1d4264","width":"60%","fontSize":"24px","height":"66px"}' type="button" class="r-btn" @click="login()">注册</button>
				<div :style='{"cursor":"pointer","padding":"0","margin":"20px 0 0","color":"rgba(159, 159, 159, 1)","textAlign":"right","display":"inline-block","width":"60%","lineHeight":"1","fontSize":"14px"}' class="r-login" @click="close()">已有账号，直接登录</div>
			</el-form>
			
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			ruleForm: {
			},

            pageFlag : '',
			tableName:"",
			rules: {},
            yonghuxingbieOptions: [],
            lvshixingbieOptions: [],
		};
	},
	mounted(){
        this.pageFlag = this.$storage.get("pageFlag");
		let table = this.$storage.get("loginTable");
		this.tableName = table;
		if(this.tableName=='yonghu'){
			this.ruleForm = {
                yonghuzhanghao: '',
                mima: '',
                yonghuxingming: '',
                xingbie: '',
                lianxifangshi: '',
                touxiang: '',
			}
		}
		if(this.tableName=='lvshi'){
			this.ruleForm = {
                lvshigonghao: '',
                mima: '',
                lvshixingming: '',
                xingbie: '',
                shiwusuo: '',
                zhiji: '',
                lianxidianhua: '',
                shenfenzheng: '',
                lvshiyouxiang: '',
                shanzhanglingyu: '',
                feiyong: '',
                touxiang: '',
                jianjie: '',
                clicktime: '',
                clicknum: '',
                storeupnum: '',
			}
		}
		if ('yonghu' == this.tableName) {
			this.rules.yonghuzhanghao = [{ required: true, message: '请输入用户账号', trigger: 'blur' }]
		}
		if ('yonghu' == this.tableName) {
			this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
		}
		if ('yonghu' == this.tableName) {
			this.rules.yonghuxingming = [{ required: true, message: '请输入用户姓名', trigger: 'blur' }]
		}
		if ('lvshi' == this.tableName) {
			this.rules.lvshigonghao = [{ required: true, message: '请输入律师工号', trigger: 'blur' }]
		}
		if ('lvshi' == this.tableName) {
			this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
		}
		if ('lvshi' == this.tableName) {
			this.rules.lvshixingming = [{ required: true, message: '请输入律师姓名', trigger: 'blur' }]
		}
        this.yonghuxingbieOptions = "男,女".split(',')
        this.lvshixingbieOptions = "男,女".split(',')
	},
	created() {},
	destroyed() {
		  	},
	methods: {
		changeRules(name){
			if(this.rules[name]){
				return true
			}
			return false
		},
		// 获取uuid
		getUUID () {
			return new Date().getTime();
		},
		close(){
			this.$router.push({ path: "/login" });
		},
        yonghutouxiangUploadChange(fileUrls) {
            this.ruleForm.touxiang = fileUrls;
        },
        lvshitouxiangUploadChange(fileUrls) {
            this.ruleForm.touxiang = fileUrls;
        },

        // 多级联动参数


		// 注册
		login() {
			var url=this.tableName+"/register";
					if((!this.ruleForm.yonghuzhanghao) && `yonghu` == this.tableName){
						this.$message.error(`用户账号不能为空`);
						return
					}
					if((!this.ruleForm.mima) && `yonghu` == this.tableName){
						this.$message.error(`密码不能为空`);
						return
					}
					if((this.ruleForm.mima!=this.ruleForm.mima2) && `yonghu` == this.tableName){
						this.$message.error(`两次密码输入不一致`);
						return
					}
					if((!this.ruleForm.yonghuxingming) && `yonghu` == this.tableName){
						this.$message.error(`用户姓名不能为空`);
						return
					}
					if(`yonghu` == this.tableName && this.ruleForm.lianxifangshi &&(!this.$validate.isMobile(this.ruleForm.lianxifangshi))){
						this.$message.error(`联系方式应输入手机格式`);
						return
					}
            if(this.ruleForm.touxiang!=null) {
                this.ruleForm.touxiang = this.ruleForm.touxiang.replace(new RegExp(this.$base.url,"g"),"");
            }
					if((!this.ruleForm.lvshigonghao) && `lvshi` == this.tableName){
						this.$message.error(`律师工号不能为空`);
						return
					}
					if((!this.ruleForm.mima) && `lvshi` == this.tableName){
						this.$message.error(`密码不能为空`);
						return
					}
					if((this.ruleForm.mima!=this.ruleForm.mima2) && `lvshi` == this.tableName){
						this.$message.error(`两次密码输入不一致`);
						return
					}
					if((!this.ruleForm.lvshixingming) && `lvshi` == this.tableName){
						this.$message.error(`律师姓名不能为空`);
						return
					}
					if(`lvshi` == this.tableName && this.ruleForm.lianxidianhua &&(!this.$validate.isMobile(this.ruleForm.lianxidianhua))){
						this.$message.error(`联系电话应输入手机格式`);
						return
					}
					if(`lvshi` == this.tableName && this.ruleForm.shenfenzheng &&(!this.$validate.checkIdCard(this.ruleForm.shenfenzheng))){
						this.$message.error(`身份证应输入身份证格式`);
						return
					}
					if(`lvshi` == this.tableName && this.ruleForm.lvshiyouxiang &&(!this.$validate.isEmail(this.ruleForm.lvshiyouxiang))){
						this.$message.error(`律师邮箱应输入邮件格式`);
						return
					}
					if(`lvshi` == this.tableName && this.ruleForm.feiyong &&(!this.$validate.isNumber(this.ruleForm.feiyong))){
						this.$message.error(`费用应输入数字`);
						return
					}
            if(this.ruleForm.touxiang!=null) {
                this.ruleForm.touxiang = this.ruleForm.touxiang.replace(new RegExp(this.$base.url,"g"),"");
            }
			this.$http({
				url: url,
				method: "post",
				data:this.ruleForm
			}).then(({ data }) => {
				if (data && data.code === 0) {
					this.$message({
						message: "注册成功",
						type: "success",
						duration: 1500,
						onClose: () => {
							this.$router.replace({ path: "/login" });
						}
					});
				} else {
					this.$message.error(data.msg);
				}
			});
		}
	}
};
</script>

<style lang="scss" scoped>
	.container {
	  position: relative;
	  background: url(http://codegen.caihongy.cn/20230805/7915a0067dde42b286859569f586368e.jpg);

		.el-date-editor.el-input {
		  width: 100%;
		}
		
		.rgs-form .el-input /deep/ .el-input__inner {
						border-radius: 0px;
						padding: 0 10px;
						box-shadow: 0 0px 0px rgba(60, 60, 60, .1);
						outline: none;
						color: #666;
						background: none;
						width: calc(100% - 0px);
						font-size: 14px;
						border-color: #bfbfbf;
						border-width: 1px;
						border-style: solid;
						height: 44px;
					}
		
		.rgs-form .el-select /deep/ .el-input__inner {
						border-radius: 0px;
						padding: 0 10px;
						box-shadow: 0 0px 0px rgba(60, 60, 60, .1);
						outline: none;
						color: #666;
						background: none;
						width: 100%;
						font-size: 14px;
						border-color: #bfbfbf;
						border-width: 1px;
						border-style: solid;
						height: 44px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border-radius: 0px;
						padding: 0 10px 0 30px;
						box-shadow: 0 0px 0px rgba(60, 60, 60, .1);
						outline: none;
						color: #666;
						background: none;
						width: 288px;
						font-size: 14px;
						border-color: #bfbfbf;
						border-width: 1px;
						border-style: solid;
						height: 44px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border-radius: 0px;
						padding: 0 10px 0 30px;
						box-shadow: 0 0px 0px rgba(60, 60, 60, .1);
						outline: none;
						color: #666;
						background: none;
						width: 288px;
						font-size: 14px;
						border-color: #bfbfbf;
						border-width: 1px;
						border-style: solid;
						height: 44px;
					}
		
		.rgs-form /deep/ .el-upload--picture-card {
			background: transparent;
			border: 0;
			border-radius: 0;
			width: auto;
			height: auto;
			line-height: initial;
			vertical-align: middle;
		}
		
		.rgs-form /deep/ .upload .upload-img {
		  		  cursor: pointer;
		  		  color: #666;
		  		  font-size: 32px;
		  		  border-color: #bfbfbf;
		  		  line-height: 80px;
		  		  border-radius: 0px;
		  		  box-shadow: 0 0px 0px rgba(60, 60, 60, .1);
		  		  background: none;
		  		  width: 160px;
		  		  border-width: 1px;
		  		  border-style: solid;
		  		  text-align: center;
		  		  height: 80px;
		  		}
		
		.rgs-form /deep/ .el-upload-list .el-upload-list__item {
		  		  cursor: pointer;
		  		  color: #666;
		  		  font-size: 32px;
		  		  border-color: #bfbfbf;
		  		  line-height: 80px;
		  		  border-radius: 0px;
		  		  box-shadow: 0 0px 0px rgba(60, 60, 60, .1);
		  		  background: none;
		  		  width: 160px;
		  		  border-width: 1px;
		  		  border-style: solid;
		  		  text-align: center;
		  		  height: 80px;
		  		}
		
		.rgs-form /deep/ .el-upload .el-icon-plus {
		  		  cursor: pointer;
		  		  color: #666;
		  		  font-size: 32px;
		  		  border-color: #bfbfbf;
		  		  line-height: 80px;
		  		  border-radius: 0px;
		  		  box-shadow: 0 0px 0px rgba(60, 60, 60, .1);
		  		  background: none;
		  		  width: 160px;
		  		  border-width: 1px;
		  		  border-style: solid;
		  		  text-align: center;
		  		  height: 80px;
		  		}
	}
	.required {
		position: relative;
	}
	.required::after{
				color: red;
				position: absolute;
				right: 5px;
				content: "*";
			}
	.editor>.avatar-uploader {
		line-height: 0;
		height: 0;
	}
</style>
