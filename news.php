<?php 
class News extends CI_Controller 
{
public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		
	}
		public function index() 
		{
			$this->load->view('news.html');
			
		}
		public function  sign()
		{
		$this->load->view('sign.html');
		}
		public function GuestBook()
		{
			$this->load->view('GuestBook.html');
		}
		
		public function SentMessge()//接收傳送的訊息資料
		{
			$input = $_POST;

			
			if($input['user'] != NULL and $input['messeg'] != NULL) 
			{
				$this->news_model->message_insert($input);
			}
			else
			{
					
					echo "請重新輸入";
			} 
		
		}
		
	
	public function getsign()//接收註冊的使用者資料
	{

		$input = $_POST;
		
		if($input['account'] != NULL and 
			 $input['password']!= NULL and 
			 $input['Checkaccount']!=  NULL and
			 $input['Checkpassword']!= NULL)
		{
			$first	=	array($input['account'],$input['password']);
			$two	=	array($input['Checkaccount'],$input['Checkpassword']);
				if($first != $two )
				{
					echo "兩次輸入結果不同";
				}
				else
				$this->news_model->User_Sign($first);
		}
			else
			{
					echo "不得有空白，請重新輸入";
			} 
	}

	
}