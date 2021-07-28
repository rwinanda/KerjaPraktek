<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;
class pdf extends CI_Controller {

    public function __construct()
    {  
        parent::__construct();
        $this->load->model('Koleksi_model');
    
    }
    
    public function exportPdf($id)
	{
        $data['judul'] = "Export PDF";
        $data['exportpdf'] = $this->Koleksi_model->getKoleksiByIdUpdate($id);
        $data['id_koleksi'] = $id;

		$html = $this->load->view('pdf/view_pdf',$data,TRUE);
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portarit');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('document',['Attachment'=>false]);
        
	}
}
?>