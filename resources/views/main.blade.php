<x-app-layout>
    <div class="container  py-8 mx-auto">
        <h3 class="text-2xl font-bold text-gray-900">All Products</h3>
            <div class="h-1 bg-gray-800 w-36"></div>
        <div class="grid grid-cols-3 gap-6 mt-6 ">
            @foreach ($products as $product)
            <div
                class="relative m-2 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                <a class="relative mx-3 mt-3 flex overflow-hidden rounded-xl" href="/products/{{$product->id}}">
                    <img class="object-contain h-48 w-48" src="{{ $product->image1 }}" alt="product image" />
                    {{-- <span
                        class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">39%
                        OFF</span> --}}
                </a>
                <div class="mt-4 px-5 pb-5">
                    <a href="#">
                        <h5 class="text-lg tracking-tight text-slate-900">{{ $product->name }}</h5>
                    </a>


                    <div class="mt-2 mb-5 flex items-center justify-between">

                        <span class="text-xl font-bold text-slate-900">${{ number_format($product->productPrice, 2)
                            }}</span>
                        {{-- <span class="text-sm text-slate-900 line-through">$699</span> --}}

                    </div>

                    <div
                        class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data"
                            class="flex justify-end">
                            @csrf
                            <input type="hidden" value="{{ $product->id.Cart::getTotalQuantity()}}" name="id">
                            <input type="hidden" value="{{ $product->item_id}}" name="item_id">
                            <input type="hidden" value="{{ $product->productCode}}" name="productCode">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->productPrice }}" name="price">
                            <input type="hidden" value="{{ $product->image1 }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <button class="px-4 py-1.5 text-white text-sm bg-gray-900 rounded">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    @if (Cart::getTotalQuantity() > 0)
    <div class="fixed bottom-0 left-0 z-50 w-full text-gray-800 bg-white shadow-lg ">

        {{-- <h3 class="text-3xl font-bold">Cart</h3> --}}
        <div class="grid grid-cols-5 gap-6 mt-6  w-full p-4">



            @foreach ($cartItems as $item)

            <div class="bg-slate-500 overflow-hidden rounded-lg">
                <div class="grid-cols-2">
                    <img src="{{$item->attributes->image}}" class="rounded-t-lg" alt="product-image">

                </div>
                <div class="p-2">
                    <p class="font-bold text-sm mb-2 text-white">{{ substr($item->name,0,15) }}...</p>
                    {{-- <p class="text-gray-200 text-base">{{ product.description }}</p> --}}
                    <div class="">
                        <div class="">

                            <p class="font-bold text-xl mb-2 text-white">${{ $item->getPriceWithConditions() }}</p>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="px-3 py-1 text-white bg-gray-800 shadow rounded-full">x</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

            @endforeach
            <div class="grid grid-cols-1 gap-4 content-center text-gray-800 bg-white p-4">
                <div>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-gray-800">Clear Cart</button>
                    </form>
                </div>
                <div class="font-semibold text-2xl">Tax: ${{ Cart::getSubtotal() }}</div>
                <div class="font-semibold text-2xl">Total: ${{ Cart::getTotal() }}</div>
                <div>
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-green-800">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>