<?php
require(APPPATH.'libraries/REST_Controller.php');
class Example_api extends REST_Controller{
	function user_get(){
		if(!$this->get('id')){
			$this->response(NULL,400);
		}
		$user = $this->user_model->get($this->get('id'));

		if($user){
			$this->response($user,200);
		} else {
			$this->response(NULL,404);
		}
	}

	function user_put(){
		$data = array('returned: '.$this->put('id'));
		$this->response($data);
	}

	function user_post(){
		$result = $this->user_model->update($this->post('id'),array(
			'name'=>$this->post('name'),
			'email'=>$this->post('email')
			));
		if($result === FALSE){
			$this->response(array('status'=>'failed'));
		} else {
			$this->response(array('status'=>'sucess'));
		}
	}

	function user_delete(){
		$data = array('returned: '.$this->delete('id'));
		$this->response($data);
	}

	function users_get(){
		$users = $this->user_model->get_all();

		if($users){
			$this->response($users,200);
		} else {
			$this->response(NULL,404);
		}
	}
}