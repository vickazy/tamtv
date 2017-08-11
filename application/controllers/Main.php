<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Web 
{
	public $data;

	public function __construct()
	{
		parent::__construct();

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -s
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->meta_tags->set_meta_tag('title', $this->options->get('sitename') );
		$this->meta_tags->set_meta_tag('canonical', current_url() );
		$this->meta_tags->set_meta_tag('type', 'article' );
		$this->meta_tags->set_meta_tag('news_keywords', '' );
		$this->meta_tags->set_meta_tag('description', $this->options->get('sitedescription') );

		$this->data = array(
			'title' => $this->options->get('sitename')	
		);

		$this->template->view('index', $this->data);
	}


	public function update($value='')
	{
		foreach ($this->db->get('posts')->result() as $row) 
		{
			$this->db->update('posts', array('post_slug' => $this->slug->create_slug($row->post_title)), array('ID' => $row->ID));
		}
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */