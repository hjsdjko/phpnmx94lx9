<template>
	<div>

	<div class="container" :style='{"minHeight":"100vh","alignItems":"center","background":"url(http://codegen.caihongy.cn/20230918/e4c3de45e8454be08468ba32acc9108f.jpg)","display":"flex","width":"100%","backgroundSize":"cover","backgroundPosition":"center center","backgroundRepeat":"no-repeat","justifyContent":"center"}'>
		<el-form class='rgs-form' v-if="pageFlag=='register'" :style='{"width":"30vw","padding":"0px","margin":"0 0 0 50vw","borderRadius":"0px","background":"#fff","height":"auto"}' ref="registerForm" :model="registerForm" :rules="rules">
			<div v-if="false" :style='{"width":"100%","margin":"0 0 10px 0","lineHeight":"44px","fontSize":"20px","color":"rgba(64, 158, 255, 1)","textAlign":"center"}'>USER / REGISTER</div>
			<div v-if="true" :style='{"width":"80%","margin":"20px auto 10px","lineHeight":"44px","fontSize":"28px","color":"#333","textAlign":"left"}'>基于PHP的律所管理系统设计与实现注册</p></div>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='yonghu'" prop="yonghuzhanghao">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('yonghuzhanghao')?'required':''">用户账号：</div>
				<el-input v-model="registerForm.yonghuzhanghao"  placeholder="请输入用户账号" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='yonghu'" prop="mima">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('mima')?'required':''">密码：</div>
				<el-input v-model="registerForm.mima" type="password" placeholder="请输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='yonghu'" prop="mima">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('mima')?'required':''">确认密码：</div>
				<el-input v-model="registerForm.mima2" type="password" placeholder="请再次输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='yonghu'" prop="yonghuxingming">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('yonghuxingming')?'required':''">用户姓名：</div>
				<el-input v-model="registerForm.yonghuxingming"  placeholder="请输入用户姓名" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='yonghu'" prop="xingbie">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('xingbie')?'required':''">性别：</div>
                <el-select v-model="registerForm.xingbie" placeholder="请选择性别" >
                  <el-option
                      v-for="(item,index) in yonghuxingbieOptions"
                      :key="index"
                      :label="item"
                      :value="item">
                  </el-option>
                </el-select>
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='yonghu'" prop="lianxifangshi">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('lianxifangshi')?'required':''">联系方式：</div>
				<el-input v-model="registerForm.lianxifangshi"  placeholder="请输入联系方式" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='yonghu'" prop="touxiang">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('touxiang')?'required':''">头像：</div>
                <file-upload
					tip="点击上传头像"
					action="file/upload"
					:limit="1"
					:multiple="true"
					:fileUrls="registerForm.touxiang?registerForm.touxiang:''"
					@change="yonghutouxiangUploadChange"
				></file-upload>
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="lvshigonghao">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('lvshigonghao')?'required':''">律师工号：</div>
				<el-input v-model="registerForm.lvshigonghao"  placeholder="请输入律师工号" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="mima">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('mima')?'required':''">密码：</div>
				<el-input v-model="registerForm.mima" type="password" placeholder="请输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="mima">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('mima')?'required':''">确认密码：</div>
				<el-input v-model="registerForm.mima2" type="password" placeholder="请再次输入密码" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="lvshixingming">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('lvshixingming')?'required':''">律师姓名：</div>
				<el-input v-model="registerForm.lvshixingming"  placeholder="请输入律师姓名" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="xingbie">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('xingbie')?'required':''">性别：</div>
                <el-select v-model="registerForm.xingbie" placeholder="请选择性别" >
                  <el-option
                      v-for="(item,index) in lvshixingbieOptions"
                      :key="index"
                      :label="item"
                      :value="item">
                  </el-option>
                </el-select>
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="shiwusuo">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('shiwusuo')?'required':''">事务所：</div>
				<el-input v-model="registerForm.shiwusuo"  placeholder="请输入事务所" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="zhiji">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('zhiji')?'required':''">职级：</div>
				<el-input v-model="registerForm.zhiji"  placeholder="请输入职级" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="lianxidianhua">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('lianxidianhua')?'required':''">联系电话：</div>
				<el-input v-model="registerForm.lianxidianhua"  placeholder="请输入联系电话" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="shenfenzheng">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('shenfenzheng')?'required':''">身份证：</div>
				<el-input v-model="registerForm.shenfenzheng"  placeholder="请输入身份证" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="lvshiyouxiang">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('lvshiyouxiang')?'required':''">律师邮箱：</div>
				<el-input v-model="registerForm.lvshiyouxiang"  placeholder="请输入律师邮箱" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="shanzhanglingyu">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('shanzhanglingyu')?'required':''">擅长领域：</div>
				<el-input v-model="registerForm.shanzhanglingyu"  placeholder="请输入擅长领域" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="feiyong">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('feiyong')?'required':''">费用：</div>
				<el-input v-model="registerForm.feiyong"  placeholder="请输入费用" />
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="touxiang">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('touxiang')?'required':''">头像：</div>
                <file-upload
					tip="点击上传头像"
					action="file/upload"
					:limit="1"
					:multiple="true"
					:fileUrls="registerForm.touxiang?registerForm.touxiang:''"
					@change="lvshitouxiangUploadChange"
				></file-upload>
			</el-form-item>
			<el-form-item :style='{"width":"auto","padding":"0","margin":"0 auto 15px 10%","background":"none","height":"auto"}' v-if="tableName=='lvshi'" prop="jianjie">
				<div v-if="true" :style='{"width":"100%","lineHeight":"36px","fontSize":"14px","color":"#333"}' :class="changeRules('jianjie')?'required':''">简介：</div>
			    <editor
			        :style='{"minHeight":"250px","border":"1px solid #eee","width":"auto","borderRadius":"4px","height":"auto","maxWidth":"400px"}'
			        v-model="registerForm.jianjie" 
			        class="editor" 
			        action="file/upload">
			    </editor>
			</el-form-item>
			<el-button :style='{"border":"0","cursor":"pointer","padding":"0 10px","margin":"20px auto 5px 10%","color":"#fff","display":"block","minWidth":"400px","outline":"none","borderRadius":"4px","background":"#ffc000","width":"auto","fontSize":"16px","height":"44px"}' type="primary" @click="submitForm('registerForm')">注册</el-button>
			<el-button :style='{"border":"0","cursor":"pointer","padding":"0 10px","margin":"0px auto 0px 10%","color":"#666","textAlign":"right","display":"block","minWidth":"400px","outline":"none","borderRadius":"8px","background":"none","width":"auto","fontSize":"16px","height":"44px"}' @click="resetForm('registerForm')">重置</el-button>
			<router-link :style='{"cursor":"pointer","padding":"0 10%","margin":"0 0 40px","color":"rgba(159, 159, 159, 1)","display":"inline-block","lineHeight":"1","fontSize":"14px","textDecoration":"none"}' to="/login">已有账户登录</router-link>
			<div class="idea1" :style='{"width":"100%","background":"red","display":"none","height":"40px"}'></div>
			<div class="idea2" :style='{"width":"100%","background":"blue","display":"none","height":"40px"}'></div>
		</el-form>
    </div>
  </div>
</div>
</template>

<script>

export default {
    //数据集合
    data() {
		return {
            pageFlag : '',
			tableName: '',
			registerForm: {},
			rules: {},
			requiredRules: {},
            yonghuxingbieOptions: [],
            lvshixingbieOptions: [],
		}
    },
	mounted() {
		this.tableName = this.$route.query.role;
		if(this.tableName=='yonghu'){
			this.registerForm = {
                yonghuzhanghao: '',
                mima: '',
                yonghuxingming: '',
                xingbie: '',
                lianxifangshi: '',
                touxiang: '',
			}
		}
		if(this.tableName=='lvshi'){
			this.registerForm = {
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
			this.requiredRules.yonghuzhanghao = [{ required: true, message: '请输入用户账号', trigger: 'blur' }]
		}
		if ('yonghu' == this.tableName) {
			this.requiredRules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
		}
		if ('yonghu' == this.tableName) {
			this.requiredRules.yonghuxingming = [{ required: true, message: '请输入用户姓名', trigger: 'blur' }]
		}
		if ('lvshi' == this.tableName) {
			this.requiredRules.lvshigonghao = [{ required: true, message: '请输入律师工号', trigger: 'blur' }]
		}
		if ('lvshi' == this.tableName) {
			this.requiredRules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }]
		}
		if ('lvshi' == this.tableName) {
			this.requiredRules.lvshixingming = [{ required: true, message: '请输入律师姓名', trigger: 'blur' }]
		}
	},
    created() {
      this.pageFlag = this.$route.query.pageFlag;
      if ('yonghu' == this.tableName) {
        this.rules.yonghuzhanghao = [{ required: true, message: '请输入用户账号', trigger: 'blur' }];
      }
      if ('yonghu' == this.tableName) {
        this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }];
      }
      if ('yonghu' == this.tableName) {
        this.rules.yonghuxingming = [{ required: true, message: '请输入用户姓名', trigger: 'blur' }];
      }
        this.yonghuxingbieOptions = "男,女".split(',');
      if ('yonghu' == this.tableName) {
        this.rules.lianxifangshi = [{ required: true, validator: this.$validate.isMobile, trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.lvshigonghao = [{ required: true, message: '请输入律师工号', trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.mima = [{ required: true, message: '请输入密码', trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.lvshixingming = [{ required: true, message: '请输入律师姓名', trigger: 'blur' }];
      }
        this.lvshixingbieOptions = "男,女".split(',');
      if ('lvshi' == this.tableName) {
        this.rules.lianxidianhua = [{ required: true, validator: this.$validate.isMobile, trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.shenfenzheng = [{ required: true, validator: this.$validate.isIdCard, trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.lvshiyouxiang = [{ required: true, validator: this.$validate.isEmail, trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.feiyong = [{ required: true, validator: this.$validate.isNumber, trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.clicknum = [{ required: true, validator: this.$validate.isIntNumer, trigger: 'blur' }];
      }
      if ('lvshi' == this.tableName) {
        this.rules.storeupnum = [{ required: true, validator: this.$validate.isIntNumer, trigger: 'blur' }];
      }
    },
    //方法集合
    methods: {
		changeRules(name){
			if(this.requiredRules[name]){
				return true
			}
			return false
		},
      // 获取uuid
      getUUID () {
        return new Date().getTime();
      },
        // 下二随
      yonghutouxiangUploadChange(fileUrls) {
          this.registerForm.touxiang = fileUrls.replace(new RegExp(this.$config.baseUrl,"g"),"");
      },
      lvshitouxiangUploadChange(fileUrls) {
          this.registerForm.touxiang = fileUrls.replace(new RegExp(this.$config.baseUrl,"g"),"");
      },

        // 多级联动参数


      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            var url=this.tableName+"/register";
				if((!this.registerForm.yonghuzhanghao) && `yonghu` == this.tableName){
					this.$message.error(`用户账号不能为空`);
					return
				}
               if(`yonghu` == this.tableName && this.registerForm.mima!=this.registerForm.mima2) {
                this.$message.error(`两次密码输入不一致`);
                return
               }
				if((!this.registerForm.mima) && `yonghu` == this.tableName){
					this.$message.error(`密码不能为空`);
					return
				}
				if((!this.registerForm.yonghuxingming) && `yonghu` == this.tableName){
					this.$message.error(`用户姓名不能为空`);
					return
				}
					if(`yonghu` == this.tableName && this.registerForm.lianxifangshi &&(!this.$validate.isMobile2(this.registerForm.lianxifangshi))){
						this.$message.error(`联系方式应输入手机格式`);
						return
					}
				if((!this.registerForm.lvshigonghao) && `lvshi` == this.tableName){
					this.$message.error(`律师工号不能为空`);
					return
				}
               if(`lvshi` == this.tableName && this.registerForm.mima!=this.registerForm.mima2) {
                this.$message.error(`两次密码输入不一致`);
                return
               }
				if((!this.registerForm.mima) && `lvshi` == this.tableName){
					this.$message.error(`密码不能为空`);
					return
				}
				if((!this.registerForm.lvshixingming) && `lvshi` == this.tableName){
					this.$message.error(`律师姓名不能为空`);
					return
				}
					if(`lvshi` == this.tableName && this.registerForm.lianxidianhua &&(!this.$validate.isMobile2(this.registerForm.lianxidianhua))){
						this.$message.error(`联系电话应输入手机格式`);
						return
					}
					if(`lvshi` == this.tableName && this.registerForm.shenfenzheng &&(!this.$validate.isIdCard2(this.registerForm.shenfenzheng))){
						this.$message.error(`身份证应输入身份证格式`);
						return
					}
					if(`lvshi` == this.tableName && this.registerForm.lvshiyouxiang &&(!this.$validate.isEmail2(this.registerForm.lvshiyouxiang))){
						this.$message.error(`律师邮箱应输入邮件格式`);
						return
					}
				if(`lvshi` == this.tableName && this.registerForm.feiyong &&(!this.$validate.isNumber2(this.registerForm.feiyong))){
					this.$message.error(`费用应输入数字`);
					return
				}
            this.$http.post(url, this.registerForm).then(res => {
              if (res.data.code === 0) {
                this.$message({
                  message: '注册成功',
                  type: 'success',
                  duration: 1500,
                  onClose: () => {
                    this.$router.push('/login');
                  }
                });
              } else {
                this.$message.error(res.data.msg);
              }
            });
          } else {
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      }
    }
  }
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
	.container {
		position: relative;
		background: url(http://codegen.caihongy.cn/20230918/e4c3de45e8454be08468ba32acc9108f.jpg);
		
		.el-input {
		  width: auto;
		}
		
		.el-date-editor.el-input {
			width: auto;
		}
		
		.el-form-item /deep/ .el-form-item__content {
						display: block;
						width: 100%;
					}
		
		.rgs-form .el-input /deep/ .el-input__inner {
						border: 1px solid #ddd;
						border-radius: 4px;
						padding: 0 10px;
						outline: none;
						color: #666;
						width: 100%;
						font-size: 14px;
						min-width: 400px;
						height: 40px;
					}
		
		.rgs-form .el-select /deep/ .el-input__inner {
						border: 1px solid #ddd;
						border-radius: 4px;
						padding: 0 10px;
						outline: none;
						color: #666;
						width: 100%;
						font-size: 14px;
						min-width: 400px;
						height: 40px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border: 1px solid #ddd;
						border-radius: 4px;
						padding: 0 10px 0 30px;
						outline: none;
						color: #666;
						width: 1;
						font-size: 14px;
						min-width: 400px;
						height: 40px;
					}
		
		.rgs-form .el-date-editor /deep/ .el-input__inner {
						border: 1px solid #ddd;
						border-radius: 4px;
						padding: 0 10px 0 30px;
						outline: none;
						color: #666;
						width: 1;
						font-size: 14px;
						min-width: 400px;
						height: 40px;
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
		  		  border: 1px solid #ddd;
		  		  cursor: pointer;
		  		  border-radius: 4px;
		  		  color: #999;
		  		  width: 160px;
		  		  font-size: 32px;
		  		  line-height: 80px;
		  		  text-align: center;
		  		  height: 80px;
		  		}
		
		.rgs-form /deep/ .el-upload-list .el-upload-list__item {
		  		  border: 1px solid #ddd;
		  		  cursor: pointer;
		  		  border-radius: 4px;
		  		  color: #999;
		  		  width: 160px;
		  		  font-size: 32px;
		  		  line-height: 80px;
		  		  text-align: center;
		  		  height: 80px;
		  		}
		
		.rgs-form /deep/ .el-upload .el-icon-plus {
		  		  border: 1px solid #ddd;
		  		  cursor: pointer;
		  		  border-radius: 4px;
		  		  color: #999;
		  		  width: 160px;
		  		  font-size: 32px;
		  		  line-height: 80px;
		  		  text-align: center;
		  		  height: 80px;
		  		}
	}
	.required {
		position: relative;
	}
	.required::after{
				color: red;
				left: -10px;
				position: absolute;
				content: "*";
			}
</style>
