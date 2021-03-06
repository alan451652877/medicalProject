<?php
/**

 * Author: admin

 * Create Time: 11/23/15 11:51 下午

 * RegisterModel.php

 */

class Register_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 注册用户
     * @param array $user
     * @return string
     * @throws Exception
     */
    public function registerUser($user = array()){
        $guid = $this->get_guid();
        if($user){
            if(!empty($user["captcha"])){
                unset($user["captcha"]);
            }
            $registerUser = array();
            $registerUser["guid"] = $guid;
            $registerUser["userId"] = $user["userId"];
            $registerUser["password"] = $user["pwd"];
            //设置管理员账号 账号默认为admin的默认为管理员
            if($registerUser["userId"] == "admin"){
                $registerUser["isAdmin"] = 1;
            }
            $this->db->insert('user', $registerUser);
        }else{
            throw new Exception("注册信息不完善，请填写正确",1004);
        }
        return $guid;
    }

}
 