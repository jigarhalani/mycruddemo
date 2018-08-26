<?php


namespace app\Repositories;

use App\User;
use App\Upload;


class UserRepository implements UserInterface{

	public $user;
	public $upload;

	function __construct(User $user,Upload $u){

		$this->user=$user;
		$this->upload=$u;

	}

	public function getUser(){
		return $this->user->all();
	}

	public function upload($data){
		return $this->upload->insert($data);
	}


} 