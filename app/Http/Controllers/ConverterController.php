<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NumberFormatter;

class ConverterController extends Controller
{
    public function money(Request $request){
        $jsonBody = $request->getContent();
        $req = json_decode($jsonBody);
        $number = $req->number ?? 0;
        $currency = $req->currency ?? 'AMD';
        $lang = $req->language ?? 'hy_AM';
        $fmt = new NumberFormatter( 'hy_AM', NumberFormatter::CURRENCY );
        $result = [
            'number' =>  $fmt->formatCurrency($number, 'AMD'),
            'currency' => $currency,
            'language' => $lang,
        ];
        return response()->json($result);
    }
}
