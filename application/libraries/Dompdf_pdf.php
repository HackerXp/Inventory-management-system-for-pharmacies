<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Dompdf_pdf extends Dompdf {

    function __construct() {
        parent::__construct();
    }

}

/* End of file Pdf.php */
/* L */