<?php

namespace App\Http\Controllers\qrcode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrcodeController extends Controller
{
    public function index(){
        return QrCode::generate('hi');
        return view('admin.qrcode.index');
    }
}
