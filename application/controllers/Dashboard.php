<?php
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
    }


    function index()
    {
        $this->template->load('layouts/index', 'dashboard/index');
    }
}
