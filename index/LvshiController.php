<?php




session_start();
class LvshiController extends CommonController {

    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header('Access-Control-Allow-Headers:Origin,Content-Type,Accept,token,X-Requested-With,device');
    }
    public $columData = [
		'id','addtime'
        ,'lvshigonghao'
        ,'mima'
        ,'lvshixingming'
        ,'xingbie'
        ,'shiwusuo'
        ,'zhiji'
        ,'lianxidianhua'
        ,'shenfenzheng'
        ,'lvshiyouxiang'
        ,'shanzhanglingyu'
        ,'feiyong'
        ,'touxiang'
        ,'jianjie'
        ,'clicktime'
        ,'clicknum'
        ,'storeupnum'
    ];
    /**
     * 登录接口
     * POST
     * */
    public function login(){
        $username = isset($_REQUEST['username'])?$_REQUEST['username']:"";
        $password = isset($_REQUEST['password'])?$_REQUEST['password']:"";


        $sql = "select * from `lvshi` where `lvshigonghao` = '".$username."' and `mima` = '".$password."'";
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                $token_array = [
                    "iat" => time(), //签发时间
                    "exp" => time()+7200, //token 过期时间
                    'tablename'=> 'lvshi',//表名
                    'columData' => $this->columData,
                    'id' => $row['id'],
                        'isAdmin' => 0,
                        "success" => $row,//记录的uid的信息，如果有其它信息，可以再添加数组的键值对
                    'username' => $row['lvshigonghao'],
                ];
                $tokens = base64_encode(json_encode($token_array));
                $_SESSION[$tokens] = $row["id"];
                $colum = "lvshigonghao";
                $md5 = md5($row["id"]."+10086");
                $_SESSION[$md5] = $row[$colum];
				
                $data = ['code' => 0, 'token' => $tokens];
                exit(json_encode($data));
            }
        } else {
            exit(json_encode(['code'=>500,'msg'=>"账号或密码错误"]));
        }
    }


    /**
     * 退出
     * post
     */
    public function logout(){
        $token = $this->token();
        unset($token);
        exit(json_encode(['code'=>0,'msg'=>'退出成功']));
    }
    /**
     * 注册
     * post
     */
    public function register(){
        $tmpData = strval(file_get_contents("php://input"));
        $postData = json_decode($tmpData,true);


        $colum = "lvshigonghao";
        $trues = "select * from `lvshi` where `lvshigonghao` = '".$postData[$colum]."'";
        $result = table_sql($trues);
        if($result->num_rows<1){
			$keyArr = $valArr = array();
			foreach ($postData as $key => $value){
                if (in_array($key, $this->columData) && $value != ''){
                    array_push($keyArr,"`".$key."`");
                    array_push($valArr,"'".$value."'");
                }
            }
			$key = implode(',',$keyArr);
			$v = implode(',',$valArr);
            $sql = "INSERT INTO `lvshi` (`id`,".$key.") VALUES (".time().",".$v.")";
            $result = table_sql($sql);
            if (!$result) exit(json_encode(['code'=>500,'msg'=>'注册失败。']));
            exit(json_encode(['code'=>0]));
        }
        exit(json_encode(['code'=>500,'msg'=>"用户名已存在。"]));
    }
    /**
     * 获取session
     */
    public function session(){
        $token = $this->token();
        $data = json_decode(base64_decode($token),true);
        $dbname = $data['tablename'];
		$uid = $data['id'];
		$sql = "select * from ".$dbname." where id=".$uid;
		$result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
				$arrayData = $row;
			}
		}
        exit(json_encode(['code'=>0,'data'=>$arrayData]));
    }
    /**
     * 找回密码 重置为123456
     **/
    public function resetPass(){
        $username = $_REQUEST['username'];
        $counts = "select * from `lvshi` where lvshigonghao = '".$username."'";
        $cotte = table_sql($counts);
        if($cotte->num_rows<1){
            exit(json_encode(['code'=>500,'msg'=>"用户名错误。"]));
        }
        $sql = "update lvshi set mima = '123456' where lvshigonghao = '".$username."'";
        $result = table_sql($sql);
        exit(json_encode(['code'=>0,'msg'=>"密码已重置为：123456"]));
    }
    /**
     * 分页，列表
     * get
     */
    public function page(){
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $userid = $tokens['id'];
		$where = " where 1 ";//查询条件
        $orwhere = '';
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'lvshi') {
            $where .= " and `lvshigonghao` = '".$tokens['username']."' ";
        }
		
        $page = isset($_REQUEST['page'])?$_REQUEST['page']:"1";
        $limt = isset($_REQUEST['limit'])?$_REQUEST['limit']:"10";
        $sort = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id";
        $order = isset($_REQUEST['order'])?$_REQUEST['order']:"asc";
        foreach ($_REQUEST as $k => $val){
			if(in_array($k, $this->columData)){
                if ($val != ''){
                    $where.= " and ".$k." like '".$val."'";
                }
			}
        }
        $base = json_decode(base64_decode($token),true);
        if ($base['isAdmin']!=1 || ($base['isAdmin']==1 && $base['tablename'] != "users")){
            $md5 = md5($userid."+10086");
            $colum = "lvshigonghao";
            $columData = $base['columData'];
            if (isset($_SESSION[$md5]) && in_array($colum, $columData)){
                if($base['tablename'] == 'lvshi'){
                    $orsign = false;
                        if(!$orsign) {
                        $where .= " and `lvshigonghao` = '".$_SESSION[$md5]."'";
                    }
                }
            }
        }
        
        $sql = "select * from `lvshi` ".$where;
        $count = table_sql($sql);
        if ($count->num_rows < 1){
            $numberCount = 0;
        }else{
            $numberCount = $count->num_rows;
        }
        $page_count = ceil($numberCount/$limt);//页数
        $startCount = ($page-1)*$limt;
            $where .= empty($orwhere) ? '' : "and (".$orwhere.")";
            $lists = "select * from `lvshi` ".$where." order by ".$sort." ".$order." limit ".$startCount.",".$limt;
        
        
        $result = table_sql($lists);
        $arrayData = array();
        if ($result->num_rows > 0) {
            while ($datas = $result->fetch_assoc()){
                array_push($arrayData,$datas);
            }
        }
        exit(json_encode([
            'code'=>0,
            'data' => [
                "total" => $numberCount,
                "pageSize" => $limt,
                "totalPage" => $page_count,
                "currPage" => $page,
                "list" => $arrayData
            ]
        ]));
    }

        /**
     * 分页，列表list
     * get
     */
    public function lists(){
        $sql = "select * from `lvshi`";
        $result = table_sql($sql);
        $arrayData = array();
        if ($result->num_rows > 0) {
            while ($datas = $result->fetch_assoc()){
                array_push($arrayData,$datas);
            }
        }
        exit(json_encode([
            'code'=>0,
            'data' =>$arrayData
        ]));
    }
    /**
     * 分页，列表list
     * get
     */
    public function list(){
        $page = isset($_REQUEST['page'])?$_REQUEST['page']:"1";
        $limt = isset($_REQUEST['limit'])?$_REQUEST['limit']:"10";
        $sort = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id";
        $order = isset($_REQUEST['order'])?$_REQUEST['order']:"asc";
        $refid = isset($_REQUEST['refid']) ? $_REQUEST['refid'] : "0";
		$where = " where 1 ";//查询条件
        if(isset($_REQUEST['goodid'])) {
            $where .= " and goodid = ".$_REQUEST['goodid']." ";
        }
        $sorts = explode(",", $sort);
        $orders = explode(",", $order);
        $sortorders = "";
        foreach ($sorts as $index => $value) {
            if($index == count($sorts)-1){
                $sortorders =$sortorders.$value." ".$orders[$index];
            }else{
                $sortorders =$sortorders.$value." ".$orders[$index].",";
            }
        }
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'lvshi') {
            $where .= " and `lvshigonghao` = '".$tokens['username']."' ";
        }
		foreach ($_REQUEST as $k => $val){
			if(in_array($k, $this->columData)){
				$where.= " and ".$k." like '".$val."'";
			}
        }
        
        $sql = "select * from `lvshi`".$where;
        $count = table_sql($sql);
        if ($count->num_rows < 1){
            $numberCount = 0;
        }else{
            $numberCount = $count->num_rows;
        }
        $page_count = ceil($numberCount/$limt);//页数
        $startCount = ($page-1)*$limt;
        $lists = "select * from `lvshi` ".$where." order by ".$sortorders." limit ".$startCount.",".$limt;
        $result = table_sql($lists);
        $arrayData = array();
        if ($result->num_rows > 0) {
            while ($datas = $result->fetch_assoc()){
                array_push($arrayData,$datas);
            }
        }
        exit(json_encode([
            'code'=>0,
            'data' => [
                "total" => $numberCount,
                "pageSize" => $limt,
                "totalPage" => $page_count,
                "currPage" => $page,
                "list" => $arrayData
            ]
        ]));
    }



    /**
     * 新增数据接口
     * post
     */
    public function save(){
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $uid = $tokens['id'];
        $keyArr = $valArr = array();
        $tmpData = strval(file_get_contents("php://input"));//Content-Type: application/json 需要用到php://input 处理输入流
        
        if (!empty($tmpData)&& isset($tmpData)){
            $postData = json_decode($tmpData,true);
	            foreach ($postData as $key => $value){
                if (in_array($key, $this->columData)){
                    if(!empty($value) || $value === 0) {
                        if ($key == 'id') {
                            continue;
                        }
                        array_push($keyArr,"`".$key."`");
                        if($key == 'clicktime') {
                            array_push($valArr,"'".date('Y-m-d h:i:s', time())."'");
                        } else {
                            array_push($valArr,"'".$value."'");
                        }
                    }
                }
            }
        }
        $k = implode(',',$keyArr);
        $v = implode(',',$valArr);
        $sql = "INSERT INTO `lvshi` (`id`,".$k.") VALUES (".time().",".$v.")";
        $result = table_sql($sql);
        exit(json_encode(['code'=>0]));
    }
    /**
     * 新增数据接口 add
     * post
     */
    public function add(){
        $keyArr = $valArr = array();
        $tmpData = strval(file_get_contents("php://input"));
        if (!empty($tmpData)&& isset($tmpData)){
            $postData = json_decode($tmpData,true);
	            foreach ($postData as $key => $value){
                if (in_array($key, $this->columData)){
                    if(!empty($value) || $value === 0) {
                        if ($key == 'id') {
                            continue;
                        }
                        array_push($keyArr,"`".$key."`");
                        if($key == 'clicktime') {
                            array_push($valArr,"'".date('Y-m-d h:i:s', time())."'");
                        } else {
                            array_push($valArr,"'".$value."'");
                        }
                    }
                }
            }

        }
        $k = implode(',',$keyArr);
        $v = implode(',',$valArr);
        $sql = "INSERT INTO `lvshi` (".$k.") VALUES (".$v.")";
        $result = table_sql($sql);
        exit(json_encode(['code'=>0]));
    }
    /**
     * 更新接口
     * post
     */
    public function update(){
        $tmpData = strval(file_get_contents("php://input"));
        $postData = json_decode($tmpData,true);
        $v = array();
        foreach ($postData as $key => $value){
            if (in_array($key, $this->columData)){
                if ($key == "id"){
                    $id = $value;
                }
                if(!empty($value) || $value === 0) {
                    array_push($v,$key." = '".$value."'");
                }
            }
        }
        $value = implode(',',$v);
        $sql = "UPDATE lvshi SET ".$value." where id = ".$id;
        $result = table_sql($sql);


        exit(json_encode(['code'=>0]));
    }
    /**
     * 删除
     * post
     */
    public function delete(){
        $ids = strval(file_get_contents("php://input"));//发现接收的是字符串
        preg_match_all('/\d+/',$ids,$arr);
        $str = implode(',',$arr[0]);//拼接字符，
        $sql = "delete from lvshi WHERE id in({$str})";
        $result = table_sql($sql);
        exit(json_encode(['code'=>0]));
    }
    /**
     * 查询一条数据
     * get
     */
    public function info($id=false){

        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        if (!isset($tokens['id']) || empty($tokens['id'])) exit(json_encode(['code'=>401,'msg'=>"你还没有登录。"]));
        $userid = $tokens['id'];
        $name = isset($_REQUEST['name'])? $_REQUEST['name']:"";
        if (!empty($id)){
            $where = "`id` = ".$id;
        }else{
            $where = "`name` = ".$name;
        }
        $this->andone('lvshi',$id,$column='clicknum',$num=1);
        $clicktime = "update lvshi set clicktime = ".date('Y-m-d H:i:s',time())." where ".$where;
        table_sql($clicktime);
        $sql = "select * from `lvshi` where ".$where;
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                $lists = $row;
            }
        }
        exit(json_encode([
            'code'=>0,
            'data'=> $lists
        ]));
    }
    /**
     * 查询一条数据
     * get
     */
    public function detail($id=false){
        $name = isset($_REQUEST['name'])? $_REQUEST['name']:"";
        if ($id){
            $where = "`id` = ".$id;
        }else{
            $where = "`name` = ".$name;
        }
        $this->andone('lvshi',$id,$column='clicknum',$num=1);
        $clicktime = "update lvshi set clicktime = '".date('Y-m-d H:i:s',time())."' where ".$where;
        table_sql($clicktime);
        $sql = "select * from `lvshi` where ".$where;
        $result = table_sql($sql);
        if (!$result) exit(json_encode(['code'=>500,'msg'=>"查询数据发生错误。"]));
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                $lists = $row;
            }
        }
        exit(json_encode([
            'code'=>0,
            'data'=> $lists
        ]));
    }

    /**
     * 按值统计接口
     **/
    public function value(){
        $url = explode('?',$_SERVER['REQUEST_URI']);
        $request = explode('/',$url[0]);
        $xColumnName = $request[4];
        $yColumnName = $request[5];
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $where = " where 1 ";
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'lvshi') {
            $where .= " and `lvshigonghao` = '".$tokens['username']."' ";
        }
        $sql = "SELECT ".$xColumnName.",sum(".$yColumnName.") total FROM lvshi ".$where." group by ".$xColumnName." LIMIT 10";
        if(urldecode($request[6]) == '日') {
            $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y-%m-%d') ".$xColumnName.", sum(".$yColumnName.") total FROM lvshi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y-%m-%d') LIMIT 10";
        }
        if(urldecode($request[6]) == '月') {
            $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y-%m') ".$xColumnName.", sum(".$yColumnName.") total FROM lvshi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y-%m') LIMIT 10";
        }
        if(urldecode($request[6]) == '年') {
            $sql = "SELECT DATE_FORMAT(".$xColumnName.", '%Y') ".$xColumnName.", sum(".$yColumnName.") total FROM lvshi ".$where."  GROUP BY DATE_FORMAT(".$xColumnName.", '%Y') LIMIT 10";
        }
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            $total = array();
            while($row = $result->fetch_assoc()) {
                array_push($total,array('total' => intval($row['total']),$xColumnName => $row[$xColumnName]));
            }
        }
        exit(json_encode(['code'=>0,'data'=>$total]));
    }


    public function autoSort(){
		$limt = isset($_REQUEST['limit'])?$_REQUEST['limit']:"5";
		$sort = 'clicknum';
		$lists = "select * from `lvshi` order by ".$sort." desc limit 0,".$limt;
		$result = table_sql($lists);
		$arrayData = array();
		if ($result->num_rows > 0) {
			while ($datas = $result->fetch_assoc()){
				array_push($arrayData,$datas);
			}
		}
		exit(json_encode([
			'code'=>0,
			'data' => [
				"total" => 0,
				"pageSize" => $limt,
				"totalPage" => 0,
				"currPage" => 0,
				"list" => $arrayData
			]
		]));
	}


    /**
     * 获取需要提醒的记录数接口
     * get
     */
    public function remind($columnName,$type){
        $remindStart = isset($_GET['remindstart'])?$_GET['remindstart']:"";
        $remindEnd = isset($_GET['remindend'])?$_GET['remindend']:"";
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $where = " where 1 ";//查询条件
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'lvshi') {
            $where .= " and `lvshigonghao` = '".$tokens['username']."' ";
        }
        if ($type == 1){//数字
            if ($remindStart && $remindEnd){
                $where .= " and ".$columnName."<='".$remindEnd."' and ".$columnName.">='".$remindStart."'";
            }elseif($remindStart){
                $where .= " and ".$columnName.">='".$remindStart."'";
            }elseif($remindEnd){
                $where .= " and ".$columnName."<='".$remindEnd."'";
            }
        }else{
            if ($remindStart && $remindEnd){
                $where .= " and ".$columnName."<='".date("Y-m-d",strtotime("+".$remindEnd." day"))."' and ".$columnName.">='".date("Y-m-d",strtotime("+".$remindStart." day"))."'";
            }elseif($remindStart){
                $where .= " and ".$columnName.">='".date("Y-m-d",strtotime("+".$remindStart." day"))."'";
            }elseif($remindEnd){
                $where .= " and ".$columnName."<='".date("Y-m-d",strtotime("+".$remindEnd." day"))."'";
            }
            
        }
        $sql = "select * from `lvshi` ".$where;
        $result = table_sql($sql);
        exit(json_encode(['code'=> 0 ,'count' => $result->num_rows]));
    }






    public function group($columnName){
        $token = $this->token();
        $tokens = json_decode(base64_decode($token),true);
        $where = " where 1 ";
        if($tokens['isAdmin'] != 1 && $tokens['tablename'] == 'lvshi') {
            $where .= " and `lvshigonghao` = '".$tokens['username']."' ";
        }
        $sql = "SELECT ".$columnName.",count(".$columnName.") as total FROM lvshi ".$where." GROUP BY ".$columnName." ORDER BY $columnName asc LIMIT 10";
        $result = table_sql($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            $total = array();
            while($row = $result->fetch_assoc()) {
                array_push($total,array('total' => $row['total'],$columnName => $row[$columnName]));
            }
        }
        exit(json_encode(['code'=>0,'data'=>$total]));
    }










}

