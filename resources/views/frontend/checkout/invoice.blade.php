<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{getSystemSetting('type_name') ?? 'Manyvendor' }}</title>

        <!-- favicon -->
        <link
            rel="icon"
            href=""
            sizes="16x16"
            type="image/png"
        />

        <!-- Stylesheet Link -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/invoice.css') }}" media="all"/>
     
<style>

        </style>

    </head>
    <body class="t-bg-white">
        <div class="fk-print t-pt-30 t-pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                       
                        <span class="d-block fk-print-text fk-print-text--bold text-uppercase fk-print__title text-center">
                            {{getSystemSetting('type_name') ?? null }}
                        </span>

                  
                        <p class="mb-0 xsm-text fk-print-text text-center text-capitalize">
                            {{getSystemSetting('type_mail') ?? null }}
                        </p>

                        <p class="mb-0 xsm-text fk-print-text text-center text-capitalize">
                            call: {{getSystemSetting('type_number') ?? null }}
                        </p>

                        <hr>

                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            invoice no: #{{ $invoice_number }}
                        </p>

                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            Order Date: {{ $order->created_at->format('M d, Y') }}
                        </p>

                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            customer name: {{ $name != null ? $name : 'Guest Customer' }}
                        </p>

                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            customer email: {{ $email }}
                        </p>
                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            customer phone number: {{ $order->phone }}
                        </p>

                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            customer address: {{ $order->address }}, {{ $order->division->district_name }}, {{ $order->area->thana_name }}
                        </p>


                        <table class="table mb-0 table-borderless" style="margin:5px 0;">
                            <thead>
                                <tr>
                                  <th scope="col" class="fk-print-text fk-print-text--bold sm-text text-capitalize">B. code</th>
                                  <th scope="col" class="fk-print-text fk-print-text--bold sm-text text-capitalize text-center">Image</th>
                                  <th scope="col" class="fk-print-text fk-print-text--bold sm-text text-capitalize text-center">Item</th>
                                  <th scope="col" class="fk-print-text fk-print-text--bold sm-text text-capitalize text-center">Shop</th>
                                  <th scope="col" class="fk-print-text fk-print-text--bold sm-text text-capitalize text-center">Qty</th>
                                  <th scope="col" class="fk-print-text fk-print-text--bold sm-text text-capitalize text-center">Price</th>
                         
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($order->order_product as $product)
                             
                                <tr style="margin:5px 0;">
                                  <td class="fk-print-text xsm-text text-capitalize text-left">{{ $product->booking_code }}</td>
                                  <td class="fk-print-text xsm-text text-capitalize text-center"><img src="{{ filePath( $product->product->product->image ) }}" width="40px"></td>
                                  <td class="fk-print-text xsm-text text-capitalize text-center">{{ $product->product->product->name }}</td>
                                  <td class="fk-print-text xsm-text text-capitalize text-center">{{ $product->shop->shop_name ?? '' }}</td>
                                  <td class="fk-print-text xsm-text text-capitalize text-center">{{ $product->quantity }}</td>
                                  <td class="fk-print-text xsm-text text-capitalize text-center">{{ formatPrice($product->product_price) }}</td>
                                
                                </tr>
                                
                                @endforeach
                            
                            </tbody>
                        </table>



                        <hr class="m-0">
                        
                   
                      
                  
                        
                        
                        
                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            Logistic: {{ $order->logistic->name }}({{ formatPrice($order->logistic_charge) }})
                        </p>
                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            payment method: {{ $order->payment_type }}
                        </p>
                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            Coupon: {{ $order->applied_coupon ?? 'N/A' }}
                        </p>
                        
                        
                        <hr class="mt-0">
                        
                        <table class="table mb-0 table-borderless">
                            <tbody>
                                <tr>
                                  <th class="fk-print-text xsm-text text-capitalize">
                                      <span class="d-block">
                                          Total
                                      </span>
                                  </th>
                                  <td class="fk-print-text xsm-text text-capitalize text-right">{{ formatPrice($order->pay_amount) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <hr class="mt-0">
                        
                        
                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            prepared by: {{getSystemSetting('type_name')}}
                        </p>
                        
                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            contact email: {{getSystemSetting('type_mail')}}
                        </p>
                        
                        
                        <p class="mb-0 xsm-text fk-print-text text-capitalize">
                            website:  <a href="{{url('/')}}" target="_blank">{{url('/')}}</a>
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </body>


    


</html>