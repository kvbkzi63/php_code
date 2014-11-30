<?php
class News_model extends CI_Model 
{

	public function __construct()
	{
		$this->load->database();
	}
	
	public function Check_UserData()
	{
			$input	=	$_POST;
			$query	=	$this->db->query("SELECT * FROM news WHERE User='".$input['account']."'");
			if ($query->num_rows() > 0)
			{
  			 $row = $query->row(); 
  			      if($row->password != $input['password'])
  			      {
  			      
  			      	echo "密碼錯誤";
							}
							echo $row->password;
			}
			else
			{
				echo "查無此帳號";
			}
	}
	public	function User_Sign($data)//新增使用者帳號進資料庫
	{
		$query = $this->db->query("INSERT INTO news (User, password) VALUES (".$data['0'].", ".$data['1'].")");
	}
	public function message_insert($message)//新增訊息到留言板裡面
	{
		
		$query = $this->db->query("INSERT INTO guestbook (name, comment) VALUES (".$message['user'].", ".$message['messeg'].")");

	}
	
}