<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_page1 extends MX_Controller
{


    public function index()
    {
        $this->template->load('v_template', 'v_dashboard');
    }
}
