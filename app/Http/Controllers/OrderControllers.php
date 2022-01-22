<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Orderitems;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;
use DB;

class OrderControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Orders = Order::all();
        return view('order.index',compact('Orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $items = Item::all();
        $cartItems = \Cart::getContent();
        return view('order.create',compact('customer','items','cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
        $input['customer']= $input['customer'];
        $input['subtotal']=$input['total'];
        $input['discount']= $input['discount'];
        if($input['discount'] != 0){
            $input['total']= $input['total'] - ($input['discount']/100 * $input['total']);
        }else{
            $input['total']= $input['total'];
        }
       
        $input['date']= $input['date'];
        $order = Order::create($input);
        // dd($input);
        $input_detail = [];
        for($i = 0; $i < count($request->id_item); $i++)
        {
            $input_detail[] = [
                'order'=>$order->id,
                'item_id'=>$request->id_item[$i],
                'qty'=>$request->qty[$i],
                'price'=>$request->price[$i],
                'total'=>$request->price[$i] * $request->qty[$i],
              
            ];
            $item = Item::find($request->id_item[$i]);
            $qty_update = $item->qty - $request->qty[$i];
            $item->update(['qty'=>  $qty_update]);
        }
        // dd($input_detail);
        Orderitems::insert($input_detail);
        \Cart::clear();
        DB::commit();
        session()->flash('success', 'Orders Successfully !');
        return redirect()->route('Order.index');
    } catch (Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Terjadi kesalahan, silahkan coba lagi nanti');
    }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,   
            'attributes' => array(
                'code' => $request->code,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('Order.create');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'qty' => [
                    'relative' => false,
                    'value' => $request->qty
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('Order.create');
    }
}
