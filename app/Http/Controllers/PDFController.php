<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function downloadPDF()
    {
        $tMensual = Ticket::pdfTMensual();
        $tEstado = Ticket::pdfTMensualEstado();
        $tConteo = Ticket::pdfTConteoTP();
        $tZona = Ticket::pdfTConteoZona();
        //dd($test);
        $pdf = PDF::loadView('fileGen.pdf',compact('tMensual','tEstado','tConteo','tZona'));
        return $pdf->download('reporteMensual.pdf');
    }
}
