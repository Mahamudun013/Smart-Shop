<?php

namespace App\Http\Controllers;

use App\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function createShipment($id){

    	$orderId=$id;
       
       return view('admin.shipment.createShipment',['orderId'=>$orderId]);

    }


    public function saveShipment(Request $request){

        $this->validate($request,[
            'orderId'=>'required|unique:shipments',
        ]);

        $orderId=$request->orderId;
        
    	$shipment=new Shipment();
    	$shipment->orderId=$request->orderId;
    	$shipment->trackingNumber=$request->trackingNumber;
    	$shipment->adminComment=$request->adminComment;
    	$shipment->dateShipped=$request->dateShipped;
    	$shipment->dateDelivered=$request->dateDelivered;
    	$shipment->save();

    	return redirect('/shipment/add/'.$orderId)->with('message','Shipment Info Added Successfully!');
    }


    public function manageShipment(){

    	$shipments=Shipment::all();

    	return view('admin.shipment.manageShipment',['shipments'=>$shipments]);
    }


    public function editShipment($id){

        $shipmentById=Shipment::where('shipmentId',$id)->first();

        return view('admin.shipment.editShipment',['shipmentById'=>$shipmentById]);
    }


    public function updateShipment(Request $request){

        $shipmentId=$request->shipmentId;
        $shipment=Shipment::find($shipmentId);

        $shipment->trackingNumber=$request->trackingNumber;
        $shipment->adminComment=$request->adminComment;
        $shipment->dateShipped=$request->dateShipped;
        $shipment->dateDelivered=$request->dateDelivered;
        $shipment->save();


        return redirect('/shipment/manage')->with('message','Shipment Info Updated Successfully!');
    }


    public function deleteShipment($id){

        $shipment=Shipment::find($id);
        $shipment->delete();


        return redirect('/shipment/manage')->with('message','Shipment Info Deleted Successfully!');
        
    }



}
