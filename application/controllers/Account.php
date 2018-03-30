<?php
defined('BASE_ADMIN') OR exit('No direct script access allowed');
include "Admin.php";
class Account extends Admin {
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index(){
		
		$data = $this->db->query("select * from account")->result();
		return $this->views->layout("account/dashboard",["data" => $data]);
	}

	public function created($id=false){
		$data = [];
		if($this->input->post("submit") == 1){


				$account_id = $this->input->post("account_id");
				$account_email = $this->input->post("account_email");
				$account_password = $this->input->post("account_password");
				$account_status = $this->input->post("account_status");
				$account_login = $this->input->post("account_login");
				$account_attach = $this->input->post("account_attach");
				$account_lock = $this->input->post("account_lock");
			


			if(intval($id) == 0){
				$this->db->query("insert into account (account_id, account_email, account_password, account_status, account_login, account_attach, account_lock) VALUES ('".$account_id."', '".$account_email."', '".$account_password."', '".$account_status."', '".$account_login."', '".$account_attach."', '".$account_lock."')");
				$this->go(admin_url('account/index'),["msg" => "Tạo thành công"]);
			}else{
				$this->db->query("update account set account_id = '".$account_id."', account_email = '".$account_email."', account_password = '".$account_password."', account_status = '".$account_status."', account_login = '".$account_login."', account_attach = '".$account_attach."', account_lock = '".$account_lock."' where account_id='".$id."'");
				$this->go(admin_url('account/index'),["msg" => "Cập nhập thành công"]);
			}

			
		}
		if(intval($id) > 0){
			$data = $this->db->query("select * from account where account_id = '".$id."'")->row();
		}
		return $this->views->layout("account/created",["data" => $data,"id" => $id]);
	}

	public function delete($id=false){
		if(intval($id) > 0){
			$data = $this->db->query("delete * from account where account_id = '".$id."'");
		}
		$this->go(admin_url('account/index'),["msg" => "Xóa thành công"]);
	} 
}