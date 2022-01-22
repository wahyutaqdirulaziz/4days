<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Orderitems;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;
use DB;

class OrderReportControllers extends Controller
{
   public function Orderreport()
   {
       $order = Orderitems::select('order_items.*','orders.discount','orders.customer','orders.date','customers.name as customers_name')->join('orders','orders.id','=','order_items.order')->join('items','items.id','=','order_items.item_id')->join('customers','customers.kode','=','orders.customer')->get();
       return view('report.reportorder',compact('order'));
   }

   public function Ordercustomer()
   {
    $order = Orderitems::select('order_items.*','orders.discount','orders.customer','orders.total as totorder','orders.date','customers.name as customers_name', DB::raw('SUM(order_items.qty) as totalqty'))->join('orders','orders.id','=','order_items.order')->join('items','items.id','=','order_items.item_id')->join('customers','customers.kode','=','orders.customer')->groupBy('order_items.order')->get();
       return view('report.reportcustomer',compact('order'));
   }

   public function Itemsreport()
   {
    $order = Orderitems::select('order_items.*','items.code','items.name as items_name', DB::raw('SUM(order_items.qty) as totalqty'),DB::raw('SUM(order_items.total) as totalprice'),DB::raw('AVG(order_items.total) as totalpriceavg'))->join('items','items.id','=','order_items.item_id')->groupBy('order_items.item_id')->get();
       return view('report.reportitem',compact('order'));
   }
}
