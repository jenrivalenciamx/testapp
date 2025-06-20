<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ventas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function invoice(ventas $sale){

        $shop = Shop::first();
        $pdf = Pdf::loadView('sales.invoice', compact('sale','shop'));
        return $pdf->stream('invoice.pdf');

    }
}
