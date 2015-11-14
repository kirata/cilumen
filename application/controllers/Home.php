<?php 
/**
* 
*/
class Home extends CI_Controller
{
	public function index()
	{
		$this->main();
	}
	public function main()
	{

		$data['title'] = 'CILUMEN';
		$data['bookz'] = json_decode(file_get_contents("http://localhost:8000/api/v1/book"));
		$i=0;
		if (empty($data['bookz'])) {
			$data['bookz_empty'] = true;
		}
		else {
			$data['bookz_empty'] = false;
		}
		foreach ($data['bookz'] as $key => $val) {
			$data['books'][$i++] = array(
				'id'     => $val->id,
				'title'  => $val->title,
				'author' => $val->author,
				'isbn'   => $val->isbn,
			);
		}
		$this->load->view('main',$data,false);
	}

}