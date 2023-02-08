<?php

namespace App\Controllers;

use Dompdf\Dompdf;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    function html_to_pdf(){
        
        $dompdf = new Dompdf();
        $data = [            
            'name'         => 'John Doe',
            'address'      => 'USA',
            'mobileNumber' => '000000000',
            'email'        => 'john.doe@email.com'
        ];
        $html = view('welcome_message', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('resume.pdf', [ 'Attachment' => false ]);
    }
}
