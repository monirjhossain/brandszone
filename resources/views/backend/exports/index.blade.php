@extends('backend.layouts.master')
@section('title') @translate(Export Orders) @endsection
@section('content')

    <div class="card card-primary card-outline">
        
        

        

        <!-- /.card-header -->
        <div class="card-body p-2">


            <div class="text-center">

                <h2>Export Total Order</h2>
                <hr>

                <a href="{{ route('export.as.csv', generateUuid()) }}" class="btn btn-primary mt-3">Export as csv</a>
                <a href="{{ route('export.as.xlsx', generateUuid()) }}" class="btn btn-primary mt-3">Export as xlsx</a>
                <a href="{{ route('export.as.xls', generateUuid()) }}" class="btn btn-primary mt-3">Export as xls</a>
                <br>
                <a href="{{ route('export.as.tsv', generateUuid()) }}" class="btn btn-primary mt-3">Export as tsv</a>
                <a href="{{ route('export.as.pdf', generateUuid()) }}" class="btn btn-primary mt-3">Export as pdf</a>

            </div>


            <div class="text-center mt-5">

                <h2>Filter Based Order Export</h2>
                <hr>

                {{-- Find Order --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="m-3" action="{{ route('order.export.filter', generateUuid()) }}" method="GET">
                        <div class="form-row mt-3">


                            <div class="col">
                                <label>@translate(Order From)*</label>
                                <div class="input-group date" id="datetimepicker11" data-target-input="nearest">
                                    <input type="text" name="start_date" value="{{ old('start_date') }}"
                                           class="form-control datetimepicker-input @error('start_date') is-invalid @enderror" data-target="#datetimepicker11"
                                           placeholder="@translate(Order From)"/>
                                    <div class="input-group-append form-group" data-target="#datetimepicker11"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text form-group p-10"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>

                                @error('start_date')
                                    <div class="text-left">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror

                            </div>

                            <div class="col">
                                <label>@translate(Order To)*</label>
                                <div class="input-group date" id="datetimepicker12" data-target-input="nearest">
                                    <input type="text" name="end_date" value="{{ old('end_date') }}"
                                           class="form-control datetimepicker-input @error('end_date') is-invalid @enderror" data-target="#datetimepicker12"
                                           placeholder="@translate(Order To)"/>
                                    <div class="input-group-append form-group" data-target="#datetimepicker12"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text form-group p-10"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>

                                @error('end_date')
                                    <div class="text-left">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror

                            </div>


                            <div class="col">
                                <label>@translate(Order Status)</label>
                                <div class="input-group">
                                    <select name="status" class="form-control">
                                        <option value="">Select Order Status</option>
                                        <option value="pending">@translate(Pending)</option>
                                        <option value="canceled">@translate(Canceled)</option>
                                        <option value="confirmed">@translate(Confirmed)</option>
                                        <option value="processing">@translate(Processing)</option>
                                        <option value="quality_check">@translate(Quality check)</option>
                                        <option value="product_dispatched">@translate(Product dispatched)</option>
                                        <option value="follow_up">@translate(Follow up)</option>
                                        <option value="delivered">@translate(Delivered)</option>
                                    </select>
                                </div>
                            </div>


                        </div>



                        <div class="form-row mt-3">


                            <div class="col">
                                <label>@translate(Payment Status)</label>
                                <div class="input-group">
                                    <select name="payment_type" class="form-control">
                                        <option value="">Select Payment Status</option>
                                        <option value="cod">@translate(Cash On Delivery)</option>
                                        <option value="stripe">@translate(Stripe)</option>
                                        <option value="paypal">@translate(PayPal)</option>

                                        @if (bankActive())
                                            <option value="bank">@translate(Bank)</option>
                                        @endif

                                        @if (paytmActive())
                                            <option value="paytm">@translate(PayTM)</option>
                                        @endif

                                        @if (SslActive())
                                            <option value="ssl-commerz">@translate(SSL Commerz)</option>
                                        @endif


                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <label>@translate(Customer Name)</label>
                                <div class="input-group">
                                    <select name="customer_id" class="form-control">
                                        <option value="">Select Customer Name</option>
                                        @foreach (allCustomer() as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <label>@translate(Shop Name)</label>
                                <div class="input-group">
                                    <select name="shop_id" class="form-control">
                                        <option value="">Select Shop Name</option>
                                        @foreach (allShopName() as $shop)
                                        <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>



                        <div class="form-row mt-3">


                            <div class="col">
                                <label>@translate(Logistic)</label>
                                <div class="input-group">
                                    <select name="logistic_id" class="form-control">
                                        <option value="">Select Logistic</option>
                                        @foreach (allLogisticpName() as $logistic)
                                        <option value="{{ $logistic->id }}">{{ $logistic->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <label>@translate(Product Name)</label>
                                <div class="input-group">
                                    <select name="product_id" class="form-control">
                                        <option value="">Select Product</option>
                                        @foreach (allProductName() as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                  

                        <div class="form-row mt-3">

                            <div class="col-md-6 offset-md-3">
                                <button class="btn btn-primary" type="submit">@translate(EXPORT ORDERS)</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>

            </div>


        </div>

    </div>


@endsection

<script type="text/javascript">
    "use strict"
    $(function () {
        $('#datetimepicker11, #datetimepicker12').datetimepicker({
            pickTime: false
        });
    });
</script>

