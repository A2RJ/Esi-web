@if($items->isEmpty())
<div class="col-12 d-flex justify-content-center mb-4 mt-1">
    <div class="rounded col-sm-6 col-lg-6">
        <div class="card-body text-center">
            <h6 class="section-subtitle text-warning m-0 mb-3">{{ app('request')->input($name) ? app('request')->input($name) . ' ' .$name .' tidak ditemukan' :  $name . ' tidak tersedia.'  }}</h6>
            <!-- cancel search button -->
            @if(app('request')->input($name))
            <button class="btn btn-outline-warning m-0 p-1">
                <a href="{{url()->current()}}">
                    Cancel
                </a>
            </button>
            @endif
        </div>
    </div>
</div>
@endif