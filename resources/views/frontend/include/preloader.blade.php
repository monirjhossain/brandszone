@if (env('PRELOADER') == 'true')

<!-- Preloader -->
<div class="preloader" style="background: {{ config('preloader.preloader_bg') }}">
  <div class="preloader__content">
    @switch(config('manyvendor.preloader_layout'))
    @case('1')
    <div class="loader">

      @foreach (str_split(getSystemSetting('type_name')) as $item)
      <span>{{ $item }}</span>
      @endforeach

    </div>
    @break

    @case('2')
    <div class="loader2">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @break

    @case('3')

    <div class="loader3" >
      <img 
      src="{{ asset(config('preloader.preloader_icon')) }}" 
      class="{{ config('preloader.preloader_active_class') }}" 
      width="{{ config('preloader.preloader_icon_witdh') }}"
      alt="">
    </div>
    @break

    @default
    
    <div class="loader3" >
      <img 
      src="{{ asset(config('preloader.preloader_icon')) }}" 
      class="{{ config('preloader.preloader_active_class') }}" 
      width="{{ config('preloader.preloader_icon_witdh') }}"
      alt="">
    </div>

    @endswitch


  </div>

</div>
<!-- Preloader End -->


<!-- Preloader -->
@endif
