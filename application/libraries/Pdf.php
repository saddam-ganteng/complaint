<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
	public function __construct()
	{
		parent::__construct();
		$this->filename = "laporan.pdf";
	}

	protected function ci()
	{
		return get_instance();
	}

	public function load_view($view, $data = array())
	{
		$html = $this->ci()->load->view($view, $data, TRUE);
		$this->load_html($html);
		// Render the PDF
		$this->render();
		// Output the generated PDF to Browser
		$this->stream($this->filename, array("Attachment" => false));
	}
}
