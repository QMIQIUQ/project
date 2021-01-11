<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Mail;
use App\Models\Phone; 
use Auth;

class PDFController extends Controller
{
    public function pdfReport()
    {
        $data = [
            'title' => 'Southern Cart',
            'date' => date('m/d/Y')
        ];
        $products=Phone::where('phones.userID','=',Auth::id())
        ->paginate(5)
        ;
        $pdf = PDF::loadView('myPDF', compact('products'));
    
        $data["email"] = Auth::user()->email;
        $data["title"] = "From MiniBarService.com";
        $data["body"] = "Testing";
        Mail::send('myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "recipt.pdf");
        });

        return $pdf->download('recipt.pdf');
        
    }

    
}
