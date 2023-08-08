<x-app-layout>
    @push('styles')
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    @endpush
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $product->name }}
        </h2>
    </x-slot>
    <div class="mt-6 mx-60 swiper mySwiper">
        <div class="swiper-wrapper">
            
          {{-- @if (isset($product->image1))
          <div class="swiper-slide">
            <img
              class="object-cover w-full h-full"
              src="{{ $product->image1 }}"
              alt=""
            />
          </div>
          @endif --}}
          <div class="swiper-container" x-ref="container">
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="swiper-slide p-4">
                <div class="flex flex-col rounded shadow overflow-hidden">
                  <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
                  </div>
                </div>
              </div>
                      
              <div class="swiper-slide p-4">
                <div class="flex flex-col rounded shadow overflow-hidden">
                  <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1598951092651-653c21f5d0b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="">
                  </div>
                </div>
              </div>
              
              <div class="swiper-slide p-4">
                <div class="flex flex-col rounded shadow overflow-hidden">
                  <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1598946423291-ce029c687a42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="">
                  </div>
                </div>
              </div>
        


        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
      @push('scripts')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
      });
    </script>
    @endpush
    
</x-app-layout>