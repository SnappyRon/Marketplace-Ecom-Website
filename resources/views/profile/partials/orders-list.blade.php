@if($orders && count($orders) > 0)
    <div style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px;">
        <!-- Navigation Tabs -->
        <div style="display: flex; border-bottom: 2px solid #ddd; margin-bottom: 20px;">
            <span style="margin-right: 20px; font-weight: bold; color: #e53935; border-bottom: 2px solid #e53935; padding-bottom: 10px;">All</span>
            {{-- <span style="margin-right: 20px; color: #555;">To Pay</span>
            <span style="margin-right: 20px; color: #555;">To Ship</span>
            <span style="margin-right: 20px; color: #555;">To Receive</span>
            <span style="margin-right: 20px; color: #555;">Completed</span>
            <span style="color: #555;">Cancelled</span> --}}
        </div>

        <!-- Orders List -->
        @foreach($orders as $order)
            <div style="border: 1px solid #ddd; border-radius: 10px; margin-bottom: 20px; padding: 15px;">
                <!-- Header -->
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="font-weight: bold; color: #333;">
                        📦 Store Name: {{ $order->store_name }}
                    </div>
                    <div style="color: red; font-weight: bold;">
                        {{ strtoupper($order->status) }}
                    </div>
                </div>

                <!-- Items -->
                @foreach($order->orderItems as $item)
                    <div style="display: flex; margin-top: 15px;">
                        <!-- Product Image -->
                        <div style="margin-right: 15px;">
                            <img src="{{ asset('img/' . $item->image) }}" 
                                alt="{{ $item->product->name ?? 'Product Image' }}"
                                style="width: 80px; height: 80px; border-radius: 5px; border: 1px solid #ddd;">
                        </div>

                        <!-- Item Details -->
                        <div style="flex: 1;">
                            <div style="font-weight: bold; color: #333;">
                                {{ $item->product->name ?? 'Product Removed' }}
                            </div>
                            <div style="color: #777; font-size: 14px;">
                            </div>
                            <div style="margin-top: 5px; color: #333;">
                                Quantity: x{{ $item->quantity }} 
                            </div>
                        </div>
                        <!-- Item Price -->
                        <div style="color: red; font-weight: bold;">
                            ₱{{ number_format($item->price, 2) }}
                        </div>
                    </div>
                @endforeach

                <!-- Footer -->
                <div style="margin-top: 15px; text-align: right; font-weight: bold; color: #333;">
                    Order Total: <span style="color: red; font-size: 18px;">₱{{ number_format($order->total_amount, 2) }}</span>
                </div>

                <!-- Actions -->
                <div style="margin-top: 15px; display: flex; justify-content: flex-end; gap: 10px;">
                    @if($order->status === 'cancelled')
                        <span style="color: #777;">Cancelled by you</span>
                    @else
                        <form method="POST" action="{{ route('orders.updateStatus', $order) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                                Mark as Received
                            </button>
                        </form>
                    @endif
                    <button onclick="window.location.href='{{ url('shop') }}';" 
                            style="background-color: #e53935; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                        Buy Again
                    </button>
                    <button style="background-color: #ddd; color: #333; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                        Contact Seller
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p style="color: #555555;">You currently have no orders.</p>
@endif
