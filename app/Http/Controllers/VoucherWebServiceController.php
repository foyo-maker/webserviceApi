<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;


class VoucherWebServiceController extends Controller
{
    //server side!
    public function index()
    {
        header("Content-Type:application/json");
        $voucher = Voucher::getServerVoucher();
        if (empty($voucher)) {
            $this->response(200, "Vouchers Not Found", NULL);
            return;
        } else {
            $this->response(200, "Vouchers Found", $voucher);
            return;
        }

        $this->response(400, "Invalid Request", NULL);
    }

    function response($status, $status_message, $data)
    {
        header("HTTP/1.1 {$status} {$status_message}");
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;
        $json_response = json_encode($response);
        echo $json_response;
    }

    public function show($id)
    {
        return Voucher::find($id);
    }

}
