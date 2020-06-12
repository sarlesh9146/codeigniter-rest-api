<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Formatting {
    function __construct() {
        include(APPPATH.'/third_party/Formatting/Format.php');
    }
}