<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Links extends CI_Controller
{
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->database();
        
        $this->load->helper('url');
        
        $this->load->model('links_model');
        
        $this->main_url = 'http://short.victorbarcelo.net';
        
        $this->create_url = 'http://short.victorbarcelo.net/create_links';
    }
    
    public function index() {
        
        redirect('');
    }
    
    public function view_links() {
        
        $data['js'] = "main.js";
        
        $data['main_url'] = $this->main_url;
        
        $data['create_url'] = $this->create_url;
        
        $this->load->helper('form');
        
        $this->load->library('form_validation');
        
        $data['title'] = 'Consultar enlaces';
        
        $this->form_validation->set_rules('tag', 'Tag', 'required');
        
        $this->form_validation->set_rules('code', 'Code', '');
        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('links/header', $data);
            
            $this->load->view('links/search', $data);
            
            $this->load->view('links/footer', $data);
        } else {
            
            $tag = $this->input->post('tag');
            
            $code = $this->input->post('code');
            
            $url = $this->input->post('url');
            
            $data['links'] = $this->links_model->get_links($tag, $code, $url);
            
            if (count($data['links']) == 0) {
                
                $data['has_links'] = false;
                
                if ($code) {
                    
                    $data['has_code'] = true;
                } else {
                    
                    $data['has_code'] = false;
                }
                
                $this->load->view('links/header', $data);
                
                $this->load->view('links/search', $data);
                
                $this->load->view('links/footer', $data);
            } else {
                
                $this->load->view('links/header', $data);
                
                $this->load->view('links/view', $data);
                
                $this->load->view('links/footer', $data);
            }
        }
    }
    
    public function create_links() {
        
        $data['js'] = "main.js";
        
        $data['main_url'] = $this->main_url;
        
        $data['create_url'] = $this->create_url;
        
        $this->load->helper('form');
        
        $this->load->library('form_validation');
        
        $data['title'] = 'Insertar enlace';
        
        $this->form_validation->set_rules('tag', 'Tag', 'required');
        
        $this->form_validation->set_rules('code', 'Código', 'required');
        
        $this->form_validation->set_rules('url', 'url', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('links/header', $data);
            
            $this->load->view('links/create');
            
            $this->load->view('links/footer');
        } else {
            
            $tag = $this->input->post('tag');
            
            $code = $this->input->post('code');
            
            $url = prep_url($this->input->post('url'));
            
            $success = $this->links_model->insert_link($tag, $code, $url);
            
            if ($success) {
                
                $this->load->view('links/header', $data);
                
                $this->load->view('links/create', 
                array('success' => true));
                
                $this->load->view('links/footer');
            } else {
                
                $this->load->view('links/header', $data);
                
                $this->load->view('links/create', 
                array('success' => false));
                
                $this->load->view('links/footer');
            }
        }
    }
}
