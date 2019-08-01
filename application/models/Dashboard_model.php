<?php 
 ?><?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public $tkehilangan = 'l_kehilangan';
    public $tmenemukan = 'l_menemukan';
    public $tambil = 't_ambil';
    public $tuser = 'user';

    function __construct()
    {
        parent::__construct();
    }
    function countkehilangan(){
    	$this->db->count_all_results($this->tkehilangan);
    }