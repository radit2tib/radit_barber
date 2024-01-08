<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['judul']= "Halaman Beranda";
        $this->load->view("layout/header");
        $this->load->view("Dashboard/vw_beranda", $data);
        $this->load->view("layout/footer");
    }
}