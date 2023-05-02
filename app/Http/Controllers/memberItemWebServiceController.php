<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class memberItemWebServiceController extends Controller
{
     //server side!
   public function index()
   {
       header("Content-Type:application/json");
       $item = Gift::getServerItem();
       if (empty($item)) {
           $this->response(200, "Item Not Found", NULL);
           return;
       } else {
           $this->response(200, " Item Found", $item);
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

    public function update(Request $request, $id)
    {
        $gift = Gift::find($id);
        $gift->update($request->all());
        return $gift;
    }
    public function show($id)
    {
        return Gift::find($id);
    }

}
