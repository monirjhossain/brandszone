<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\VendorProductVariantStock;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\OrderProduct;

class OrdersExport implements FromView
{

    public function view(): View
    {
        $orders = OrderProduct::latest()->paginate(50);
        $vendor = Vendor::where('user_id', Auth::id())->first();
        return view('exports.orders', compact('orders', 'vendor'));
    }

}
