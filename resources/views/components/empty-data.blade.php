@if(count($items) == 0)
<div class="col-12 mt-5 mb-5 d-flex justify-content-center border rounded">
    <div class="card">
        <div class="card-body text-center">
            <h6 class="section-subtitle text-warning m-0 mb-3">{{ app('request')->input($name) ? app('request')->input($name) . ' ' .$name .' tidak ditemukan' :  $name . ' tidak tersedia.'  }}</h6>
            <!-- cancel search button -->
            @if(app('request')->input($name))
            <a href="/">
                <button class="btn btn-outline-warning m-0 p-1">Cancel</button>
            </a>
            @endif
        </div>
    </div>
</div>
@endif