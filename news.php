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
		
		public function SentMessge()//�����ǰe���T�����
		{
			$input = $_POST;

			
			if($input['user'] != NULL and $input['messeg'] != NULL) 
			{
				$this->news_model->message_insert($input);
			}
			else
			{
					
					echo "�Э��s��J";
			} 
		
		}
		
	
	public function getsign()//�������U���ϥΪ̸��
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
					echo "�⦸��J���G���P";
				}
				else
				$this->news_model->User_Sign($first);
		}
			else
			{
					echo "���o���ťաA�Э��s��J";
			} 
	}

	
}