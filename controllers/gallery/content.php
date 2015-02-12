<?php

Class Content extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('redis','',TRUE);
        $this->load->model('gallery/gallery_redis','redis_model');
        
    
    }
    //REDIS
    public function redis(){
        if ($this->redis_model->checkDB()){ // check connection to Redis
			$fields = $this->redis_model->getFields();
			if ($fields['orange_click'] == ''){// no fields created so create
				$this->redis_model->resetDB();
				$fields = $this->redis_model->getFields();
			}
			$data = array(
				'fields' => $fields
			);
				$col_rand = rand(1,3);
				if ($col_rand == '1') $method = 'orange';
				if ($col_rand == '2') $method = 'green';
				if ($col_rand == '3') $method = 'blue';
				$data['color_name'] = $method;
                                $data['color_click'] = $fields[$data['color_name'].'_click'];
                                $data['color_show'] = $fields[$data['color_name'].'_show'] +1;
				$data['method'] = 'Random: '.ucfirst($data['color_name']);

                $data['orange_click'] = $fields['orange_click'];
                $data['orange_show'] = $fields['orange_show'];
                $data['green_click'] = $fields['green_click'];
                $data['green_show'] = $fields['green_show'];
                $data['blue_click'] = $fields['blue_click'];
                $data['blue_show'] = $fields['blue_show'];

			$this->redis_model->increaseShow($data['color_name']);
		} else {
			echo 'Your Redis Server does not appear to be switched on.';
		}
        $data['content'] = gallery_url() . 'redis';
        $this->load->view('templates/view_template', $data); 
    }
    public function set_click($color=0)
	{ // value increase on provided colour
		$this->redis_model->increaseClick($color);
		redirect(base_url().gallery_url().'content/redis', 'refresh');
	}
	
	public function skip()
	{ // no value increase
		redirect(base_url().gallery_url().'content/redis', 'refresh');
	}
	
	public function reset_db(){
		$this->redis_model->resetDB();
		redirect(base_url().gallery_url().'content/redis', 'refresh');
	}
     
    
}
