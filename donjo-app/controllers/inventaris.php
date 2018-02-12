<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Inventaris extends CI_Controller{

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		if($grup!=1 AND $grup!=2) {
			$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			redirect('siteman');
		}
		$this->load->model('header_model');
		$this->load->model('inventaris_model');
		$this->load->model('referensi_model');
		$this->modul_ini = 15;
		$this->tab_ini = 5;
		$this->controller = 'inventaris';
	}

	function clear(){
		unset($_SESSION['cari']);
		unset($_SESSION['filter']);
		redirect('dokumen_sekretariat');
	}

	function index($p=1,$o=0){

		$data['p']        = $p;
		$data['o']        = $o;

		if(isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if(isset($_POST['per_page']))
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['paging']  = $this->inventaris_model->paging_jenis($p, $o);
		$data['main']    = $this->inventaris_model->list_jenis($o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->inventaris_model->autocomplete();

		$header = $this->header_model->get_data();
		$this->load->view('header', $header);
		$this->load->view('sekretariat/nav',$nav);
		$this->load->view('inventaris/table',$data);
		$this->load->view('footer');
	}

	function form_jenis($p=1,$o=0,$id=''){
		$data['p'] = $p;
		$data['o'] = $o;

		if($id){
			$data['jenis'] = $this->inventaris_model->get_jenis($id);
			$data['form_action'] = site_url("inventaris/update_jenis/$p/$o/$id");
		}
		else{
			$data['jenis'] = null;
			$data['form_action'] = site_url("inventaris/insert_jenis");
		}

		$header = $this->header_model->get_data();
		$this->load->view('header', $header);
		$this->load->view('sekretariat/nav',$nav);
		$this->load->view('inventaris/form_jenis',$data);
		$this->load->view('footer');
	}

	function insert_jenis(){
		$this->inventaris_model->insert_jenis();
		redirect("inventaris/index/");
	}

	function update_jenis($p=1,$o=0,$id=''){
		$this->inventaris_model->update_jenis($id);
		redirect("inventaris/index/$p/$o");
	}

	function delete_jenis($p=1,$o=0,$id=''){
		$this->inventaris_model->delete_jenis($id);
		redirect("inventaris/index/$p/$o");
	}

	function search_jenis(){
		$cari = $this->input->post('cari');
		if($cari!='')
			$_SESSION['cari']=$cari;
		else unset($_SESSION['cari']);
		redirect("inventaris/index/");
	}

	function rincian($id,$p=1,$o=0){
		$data['p']        = $p;
		$data['o']        = $o;

		if(isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if(isset($_POST['per_page']))
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['jenis']	 = $this->inventaris_model->get_jenis($id);
		$data['paging']  = $this->inventaris_model->paging($p, $o);
		$data['main']    = $this->inventaris_model->list_data($id, $o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->inventaris_model->autocomplete();

		$header = $this->header_model->get_data();
		$this->load->view('header', $header);
		$this->load->view('sekretariat/nav',$nav);
		$this->load->view('inventaris/rincian',$data);
		$this->load->view('footer');
	}

	function form($id_jenis,$p=1,$o=0,$id=''){

		$data['p'] = $p;
		$data['o'] = $o;

		if($id){
			$data['inventaris']  = $this->inventaris_model->get_inventaris($id);
			$data['form_action'] = site_url("inventaris/update/$id_jenis/$p/$o/$id");
		}
		else{
			$data['dokumen']     = null;
			$data['form_action'] = site_url("inventaris/insert/$id_jenis");
		}

		$data['jenis_mutasi'] = $this->referensi_model->list_kode_array(JENIS_MUTASI);
		$data['asal_inventaris'] = $this->referensi_model->list_kode_array(ASAL_INVENTARIS);
		$data['jenis_penghapusan'] = $this->referensi_model->list_kode_array(JENIS_PENGHAPUSAN);
		$header = $this->header_model->get_data();
		$this->load->view('header', $header);
		$this->load->view('sekretariat/nav',$nav);
		$this->load->view('inventaris/form',$data);
		$this->load->view('footer');
	}

	function search(){
		$cari = $this->input->post('cari');
		$kat = $this->input->post('kategori');
		if($cari!='')
			$_SESSION['cari']=$cari;
		else unset($_SESSION['cari']);
		redirect("dokumen_sekretariat/index/$kat");
	}

	function filter(){
		$filter = $this->input->post('filter');
		$kat = $this->input->post('kategori');
		if($filter!=0)
			$_SESSION['filter']=$filter;
		else unset($_SESSION['filter']);
		redirect("dokumen_sekretariat/index/$kat");
	}

	function insert($id_jenis){
		$this->inventaris_model->insert();
		redirect("inventaris/rincian/$id_jenis");
	}

	function update($id_jenis,$p=1,$o=0,$id=''){
		$this->inventaris_model->update($id);
		redirect("inventaris/rincian/$id_jenis/$p/$o");
	}

	function delete($id_jenis,$p=1,$o=0,$id=''){
		$this->inventaris_model->delete($id);
		redirect("inventaris/rincian/$id_jenis/$p/$o");
	}

}
