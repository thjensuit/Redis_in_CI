<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Gallery_redis extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }
	
	function checkDB(){
//            var_dump($this->redis);die;
		$result = $this->redis->command('PING');
		if($result == 'PONG'){
			return true;
		} else {
			return false;
		}
	}
	
	function getFields(){
		$data = array();
		$data['orange_click'] = $this->redis->get('orange_click');
		$data['orange_show'] = $this->redis->get('orange_show');
		$data['green_click'] = $this->redis->get('green_click');
		$data['green_show'] = $this->redis->get('green_show');
		$data['blue_click'] = $this->redis->get('blue_click');
		$data['blue_show'] = $this->redis->get('blue_show');
		return $data;
	}
	
	function increaseShow($color){
		$this->redis->incr($color.'_show');
	}
	
	function increaseClick($color){
		$this->redis->incr($color.'_click');
	}
	
	function resetDB(){
		$this->redis->set('orange_click','1');
		$this->redis->set('orange_show','1');
		$this->redis->set('green_click','1');
		$this->redis->set('green_show','1');
		$this->redis->set('blue_click','1');
		$this->redis->set('blue_show','1');
	}
 
}