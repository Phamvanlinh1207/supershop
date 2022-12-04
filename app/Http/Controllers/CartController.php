<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 'uncheckout')->first();
        if ($order == null) {
            $order = Order::create(
                array(
                    'code' => randomOrderCode(),
                    'user_id' => Auth::user()->id,
                    'status' => 'uncheckout',
                )
            );
        }

        $orderDetail = $order->orderDetails()->where('product_id', $request->input('product_id'))->first();
        if ($orderDetail == null) {
            $orderDetail = new OrderDetail();
            $orderDetail->product_id = $request->input('product_id');
            $orderDetail->quantity = $request->input('quantity');
            $order->orderDetails()->save($orderDetail);
        } else {
            $orderDetail->quantity += $request->input('quantity');
            $orderDetail->save();
        }
        return redirect()->route('show.cart');
    }
    public function updateOrderDetail(Request $request){
        $orderDetail = OrderDetail::findOrFail($request->input('orderDetailId'));
        $orderDetail->quantity += $request->input('quantity');
        if($orderDetail->quantity < 1){
            $orderDetail->quantity = 1;
        }
        $orderDetail->save();
        $request->session()->flash('message','Deleted succesfully!'); 

        return redirect()->route('show.cart');
    }
    public function index()
    {
        $user = Auth::user();
        $locationList = Location::all();
        $voucherList = Voucher::all();
        $order = Order::where('user_id', $user->id)->where('status', config('order.uncheckout'))->first();
        $total = 0;

        dd($order);
        // foreach ($order->orderDetails as $orderDetail) {
        //     $total += $orderDetail->product->price * $orderDetail->quantity
        //     ;
        // }
        
        return view('cart', ['order' => $order, 'locationList' => $locationList, 'total' => $total, 'user' => $user, 'voucherList' => $voucherList]);
         
    }

    public function deleteOrderDetail(Request $request)
    {
        $id = $request->input('order_detail_id');
        OrderDetail::destroy($id);
        $request->session()->flash('message', 'Deleted succesfully!');
        return redirect()->route('show.cart');
    }

    public function create()
    {
        $customerList = Customer::all();
        return view('cart.create', array('customerList' => $customerList));
    }

    public function store(Request $request)
    {
        $orderId = $request->input('orderId');
        $order = Order::find($orderId);
        $order->update([
            'status' => 'checkout',
        ]);
        $customer = Customer::create($request->all());

        $request->session()->flash('status', 'them thanh cong');
        return redirect()->route('cart.store');
    }

}
