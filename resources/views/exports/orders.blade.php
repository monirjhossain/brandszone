<table>
    <thead>
        <tr>
            <th>SL</th>
            <th>Booking Code</th>
            <th>Order Number</th>
            <th>Logistic</th>
            <th>Payment Type</th>
            <th>Coupon</th>
            <th>Shipping Charge</th>
            <th>Total</th>
            <th>Quantity</th>
            <th>Product Price</th>
            <th>Customer Name</th>
            <th>Customer Phone</th>
            <th>Customer Address</th>
            <th>Order Note</th>
            <th>Shop Name</th>
            <th>Shop Email</th>
            <th>Shop Phone</th>
            <th>Shop Address</th>
            <th>Product Name</th>
            <th>Product SKU</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->index++ + 1 }}</td>
            <td>{{ $order->booking_code }}</td>
            <td>{{ $order->order_number }}</td>
            <td>{{ $order->order->logistic->name ?? 'N/A'}}</td>
            <td>{{ $order->payment_type }}</td>
            <td> {{ $order->order->applied_coupon ?? 'N/A'}}</td>
            <td> {{ formatPrice($order->order->logistic_charge) }}</td>
            <td> {{ formatPrice($order->order->pay_amount) }} </td>
            <td> {{ $order->quantity }}</td> 
            <td> {{ formatPrice($order->product_price) }}</td>
            <td>{{ $order->user ? $order->user->name : 'Guest Order' }}</td>
            <td>{{ $order->order->phone }}</td>
            <td>{{ $order->order->address }}, {{ $order->order->area->thana_name }},{{ $order->order->division->district_name }}</td>
            <td>{{ $order->order->note ?? 'N/A' }}</td>


            <td>{{ $order->seller->shop_name ?? '' }}</td>
            <td>{{ $order->seller->email ?? '' }}</td>
            <td> {{ $order->seller->phone ?? '' }}</td>
            <td>{{ $order->seller->adrress ?? 'N/A' }}</td>
            <td>{{ $order->product->product->name }} - {{ $order->vendor_product_stock->product_variants }}</td>
            <td>{{ $order->product->product->sku }}</td>
            <td>

                @if (isset($order->comment) || isset($order->commentedBy))
                {{ $order->comment ?? 'N/A' }}
                @else
                No Comment
                @endif

            </td>
        </tr>

        @endforeach


    </tbody>
</table>