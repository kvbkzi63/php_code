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
  			      
  			      	echo "�K�X���~";
							}
							echo $row->password;
			}
			else
			{
				echo "�d�L���b��";
			}
	}
	public	function User_Sign($data)//�s�W�ϥΪ̱b���i��Ʈw
	{
		$query = $this->db->query("INSERT INTO news (User, password) VALUES (".$data['0'].", ".$data['1'].")");
	}
	public function message_insert($message)//�s�W�T����d���O�̭�
	{
		
		$query = $this->db->query("INSERT INTO guestbook (name, comment) VALUES (".$message['user'].", ".$message['messeg'].")");

	}
	
}