<?php

namespace App\Http\Controllers;

use App\EcomProductVariantStock;
use App\Models\Demo;
use App\Models\EcomOrderProduct;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\VendorProductVariantStock;
use App\User;
use App\VendorProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\ProductVariant;
use App\Models\Variant;
use App\Color;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!vendorActive()) {
            /*if ecommerce*/
            $orderProducts = EcomOrderProduct::latest()->with('logistic')->take(8)->get();
            $PStock = EcomProductVariantStock::all();
            $product_stock = collect();
            foreach ($PStock as $vs) {
                if ($vs->quantity < $vs->alert_quantity) {
                    $vp = Product::where('id', $vs->product_id)->first();
                    if ($vp != null) {
                        $demo_obj = new Demo();
                        $demo_obj->name = $vp->name;
                        $demo_obj->quantity = $vs->quantity;
                        $demo_obj->url = route('product.step.tow.edit', [$vp->id, $vp->slug]);
                        if ($vs->quantity == 0) {
                            $demo_obj->stock = translate('Out of stock');
                        } else {
                            $demo_obj->stock = translate('Limited stock');
                        }
                        $product_stock->push($demo_obj);
                    }
                }
            }
            return view('backend.dashboard.ecommerce_dashboard', compact('orderProducts', 'product_stock'));

        }

        $orderProducts = OrderProduct::latest()->take(8)->get();
        $vPStock = VendorProductVariantStock::all();
        $vps = collect();
        foreach ($vPStock as $vs) {
            if ($vs->quantity < $vs->alert_quantity) {
                $vp = VendorProduct::where('id', $vs->vendor_product_id)->with('product')->with('seller')->first();
                if ($vp != null) {
                    $demo_obj = new Demo();
                    $demo_obj->name = $vp->product->name;
                    $demo_obj->shop_name = $vp->seller->shop_name;
                    $demo_obj->quantity = $vs->quantity;
                    $demo_obj->url = route('seller.products.edit', $vs->vendor_product_id);
                    if ($vs->quantity == 0) {
                        $demo_obj->stock = translate('Out of stock');
                    } else {
                        $demo_obj->stock = translate('Limited stock');
                    }
                    $vps->push($demo_obj);
                }
            }
        }

        return view('backend.dashboard.dashboard', compact('orderProducts', 'vps'));
    }


    public function sellerDashboard()
    {
        $orderProducts = OrderProduct::latest()->take(8)->get();
        $vPStock = VendorProductVariantStock::all();
        $vps = collect();
        foreach ($vPStock as $vs) {
            if ($vs->quantity < $vs->alert_quantity) {
                $vp = VendorProduct::where('user_id', Auth::id())->where('id', $vs->vendor_product_id)->with('product')->first();
                if ($vp != null) {
                    $demo_obj = new Demo();
                    $demo_obj->name = $vp->product->name;
                    $demo_obj->shop_name = $vp->seller->shop_name;
                    $demo_obj->quantity = $vs->quantity;
                    $demo_obj->url = route('seller.products.edit', $vs->vendor_product_id);
                    if ($vs->quantity == 0) {
                        $demo_obj->stock = translate('Out of stock');
                    } else {
                        $demo_obj->stock = translate('Limited stock');
                    }
                    $vps->push($demo_obj);
                }
            }
        }

        return view('backend.dashboard.seller_dashboard', compact('vps'));
    }


    /**
     * DOWNLOAD INVOICE
     */
    public function downloadInvoice($invoice)
    {

        if (env('DEMO_MODE') === "YES") {
        Alert::warning('warning', 'This is demo purpose only');
        return back();
      }


        try {
            return response()->download(invoice_path($invoice));
        } catch (\Throwable $th) {
            Alert::error(translate('Whoops'), translate('Invoice Not Found'));
            return back();
        }
    }

    /**
     * product_search
     */

     public function product_search(Request $request)
     {
        $products = Product::query()
                        ->whereLike('name', $request->search)
                        ->with('variants')
                        ->with('images')
                        ->orderByDesc('name')
                        ->paginate(paginate());

        $variants = Variant::all();
        
        return view('backend.products.product.search', compact('products','variants'));
     }

    /**
     * users_customer
     */

     public function users_customer(Request $request)
     {
        if ($request->search != null){
            $users = User::where('email','LIKE','%'.$request->search.'%')->where('user_type','Customer')->get();
        }else{
            $users = User::where('user_type','Customer')->with('groups')->get();
        }
        return view('backend.common.users.user.customer')->with('users', $users);
     }


     /**
      * VERSION 2.6
      */

      public function theme_color()
      {
          return view('backend.color.index');
      }

      public function theme_color_store(Request $request)
      {
            if (env('DEMO_MODE') === "YES") {
                Alert::warning('warning', 'This is demo purpose only');
                return back();
            }

          $color = Color::where('id', 1)->firstOrNew();
          $color->primary_color = $request->primary_color;
          $color->secondary_color = $request->secondary_color;
          $color->topbar_color = $request->topbar_color;
          $color->topbar_text_color = $request->topbar_text_color;
          $color->footer_color = $request->footer_color;
          $color->footer_text_color = $request->footer_text_color;
          $color->hover_color = $request->hover_color;
          $color->save();
          overWriteEnvFile('PRELOADER', $request->preloader);
          return back();
      }


     /**
      * VERSION 2.6::END
      */

    // END
}
