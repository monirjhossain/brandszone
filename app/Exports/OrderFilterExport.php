<?php

namespace App\Exports;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

use App\User;
use App\Vendor;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\VendorProductVariantStock;


class OrderFilterExport implements FromView
{

    public $start_date  = '';
    public $end_date  = '';
    public $status  = '';
    public $payment_type  = '';
    public $customer_id  = '';
    public $shop_id  = '';
    public $logistic_id  = '';
    public $product_id  = '';

     public function __construct($start_date, $end_date, $status, $payment_type, $customer_id, $shop_id, $logistic_id, $product_id)
     {
         $this->start_date = $start_date;
         $this->end_date = $end_date;
         $this->status = $status;
         $this->payment_type = $payment_type;
         $this->customer_id = $customer_id;
         $this->shop_id = $shop_id;
         $this->logistic_id = $logistic_id;
         $this->product_id = $product_id;
     }

    public function view(): View
    {

        $orders = OrderProduct::latest()
                                ->orderBy('order_number')
                                ->orWhere('status', $this->status)
                                ->orWhere('payment_type', $this->payment_type)
                                ->orWhere('user_id', $this->customer_id)
                                ->orWhere('shop_id', $this->shop_id)
                                ->orWhere('logistic_id', $this->logistic_id)
                                ->orWhere('product_id', $this->product_id)
                                ->whereBetween('created_at', [$this->start_date, $this->end_date])
                                ->get();

        $vendor = Vendor::where('user_id', Auth::id())
                        ->first();

        return view('exports.orders', compact('orders', 'vendor'));
    }
    
}
