<x-app-layout>
    <div class="container px-12 py-8 mx-auto">
        <h3 class="text-2xl font-bold text-gray-900">All Products</h3>
        <div class="h-1 bg-gray-800 w-48"></div>
        <div class="grid grid-cols-3 gap-6 mt-6 ">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md">
                <a href="products/{{$product->id}}"><img src="{{ $product->image1 }}" alt="" class="mx-auto max-h-60"></a>
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                        <span class="mt-2 text-gray-500 font-semibold">${{ $product->productPrice }}</span>
                    </div>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-end">
                        @csrf
                        <input type="hidden" value="{{ $product->id.Cart::getTotalQuantity()}}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->productPrice }}" name="price">
                        <input type="hidden" value="{{ $product->image1 }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-1.5 text-white text-sm bg-gray-900 rounded">Add To Cart</button>
                    </form>
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
                          <img src="{{$item->attributes->image}}" class="rounded-t-lg" alt="product-image" >
                          
                        </div>
                        <div class="p-2">
                            <p class="font-bold text-sm mb-2 text-white">{{ substr($item->name,0,15) }}...</p>
                            {{-- <p class="text-gray-200 text-base" >{{ product.description }}</p> --}}
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
                            <div >
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-gray-800">Clear Cart</button>
                                </form>
                            </div>
                            <div class="font-semibold text-2xl">Tax: ${{ Cart::getSubtotal() }}</div>
                            <div class="font-semibold text-2xl">Total: ${{ Cart::getTotal() }}</div>
                        </div>
                    </div>
                    
            </div>
    
    @endif
</x-app-layout>