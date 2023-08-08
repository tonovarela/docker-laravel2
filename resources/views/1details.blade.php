<x-app-layout>
  @push('styles')
  <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
  />
  {{-- <style>
    .swiper-button-prev {
  background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%234c71ae'%2F%3E%3C%2Fsvg%3E") !important;
}

.swiper-button-next {
  background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%234c71ae'%2F%3E%3C%2Fsvg%3E") !important;
}
  </style> --}}
  @endpush
  <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
          {{ $product->name }}
      </h2>
  </x-slot>
  {{-- <div class="absolute inset-y-0 left-0 z-10 flex items-center">
    <button @click="swiper.slidePrev()" 
            class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
      <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
    </button>
  </div> --}}

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
  {{-- <div class="absolute inset-y-0 right-0 z-10 flex items-center">
    <button @click="swiper.slideNext()" 
            class=" bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
      <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
    </button>
  </div> --}}
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