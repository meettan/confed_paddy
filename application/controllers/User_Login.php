<?php

	/*************************************************************************************
	 * Controler used for login page ,setting session variables,redirect to dashboard	 *
	 * on successfull login & eventually logout										     *	
	 *************************************************************************************/

	class User_Login extends MX_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Login_Process');
		}

		public function index(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$user_id = $_POST['user_id'];

				$user_pw = $_POST['user_pwd'];

				$kms_yr  = '2020-21';
			
				$result  = $this->Login_Process->f_select_password($user_id);		//fetching db pwd

				$match	 = password_verify($user_pw,$result->password);			   //matching db pwd & pwd supplied by user

				if($match){														  //if pwd matches

					$user_data = $this->Login_Process->f_get_user_inf($user_id);  //Store user information		

					$this->session->set_userdata('loggedin',$user_data);		 //Set session variable as logged in

					$this->session->set_userdata('kms_yr',$kms_yr);				//Set KMS_yr in session variable

					$kms_data 	 = $this->Login_Process->f_get_kms_inf($kms_yr); //Retrieve kms_yr information for the particular kms_yr

					redirect('User_Login/main');								//redirect to dashboard
				
				}else{														//if pwd doesnot match redirect to login page
					redirect('User_Login/login');
				}

			}else{															//if not post request redirect to login page
				redirect('User_Login/login');
			}
			
		}


		public function login(){					//if session variable is logged in then redirect to dashboard else redirect to login page

			if($this->session->userdata('loggedin')){					

				redirect('User_Login/main');

			}else{
			  
				$this->load->view('login/login');

			}
		}

		public function main(){							//If user successfully logged in re-direct to dashboard else to login page

			if($this->session->userdata('loggedin')){

				$_SESSION['sys_date']= date('Y-m-d');

				$this->load->view('post_login/main');
				$this->load->view('post_login/home');
				$this->load->view('post_login/footer');

			}
			else{

				redirect('User_Login/login'); 

			}
			
		}	

		public function logout(){					//After user logsout end session & redirect to login page

			if($this->session->userdata('loggedin')){

				$user_id    =   $this->session->userdata('loggedin')->user_id;

				$this->session->unset_userdata('loggedin');

				$this->session->unset_userdata('sl_no');
				
				redirect('User_Login/login');

			}else{

				redirect('User_Login/login');

			}
		}
	}
?>