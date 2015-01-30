<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ftp_controller extends CI_Controller {

	private $Config, $Pagina;

	public function __construct()
	{
		$this->Pagina['pagina'] = '';
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('template/header', $this->Pagina);
		echo "<div class=\"alert alert-success\">Bem Vindo ao FTPlus</div>";
		echo anchor('ftp_controller/login', 'Logar', array(
			"class" => "btn btn-primary btn-lg"
		));
		$this->load->view('template/footer');
	}

	public function login()
	{
		$this->Pagina['pagina'] = "login";
		$this->load->view('template/header', $this->Pagina);
		$this->load->helper('form');
		$this->load->view('ftp_controller/login');
		$this->load->view('template/footer');
	}

	public function connect()
	{
		$this->Pagina['pagina'] = "login";
		$this->load->view('template/header', $this->Pagina);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hostname', 'Hostname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('port', 'Port', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters("<span class=\"label label-warning\">","</span><br>");
		$validacao = $this->form_validation->run();
		
		if ($validacao) {
			$this->Config = array(
				"hostname" => html_escape($this->input->post('hostname')),
				"port" => html_escape($this->input->post('port')),
				"username" => html_escape($this->input->post('username')),
				"password" => html_escape($this->input->post('password')),
				"debug" => FALSE
			);

			$conexao = $this->ftp->connect($this->Config);

			if ($conexao)
			{
				echo "<div class=\"alert alert-success\">Conexão bem sucedida!</div>";
				$list = $this->ftp->list_files('/public_html/');

				print_r($list);
			}
			else
			{
				$this->session->set_flashdata('erro', 'Erro ao conectar. Verifique os dados de conexão e tente novamente!');
				redirect('ftp_controller/login');
			}
		}
		else
			$this->load->view('ftp_controller/login');
		$this->load->view('template/footer');
	}
}

/* End of file ftp.php */
/* Location: ./application/controllers/ftp.php */