@props(['form_header'])
<div class="card">
    <div class="card-body">
        <h4 class="card-title" align="center">{{ $form_header }}</h4>
        {{-- <p class="card-description"> Horizontal form layout </p> --}}
        {{ $slot }}
    </div>
</div>
</div>