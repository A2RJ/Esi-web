@if (url()->current() == env('URL'))
<div class="col-12 d-flex justify-content-center mb-4 mt-1">
    <form action="{{url()->current()}}" method="get">
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <input type="text" name="{{ $name }}" class="form-control" placeholder="Cari {{ $name }}..." autocomplete="off" value="{{ app('request')->input($name) ? app('request')->input($name) : '' }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary py-0 px-2" type="submit">
                            Cari
                        </button>
                        <button class="btn btn-outline-secondary py-0 px-2" onclick="window.location.href = '/';" type="button">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@elseif (url()->current() == env('URL') . '/home')
<div class="col-12 mb-4 mt-3">
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            <form action="{{url()->current()}}" method="get" class=" col-sm-6">
                <div class="input-group">
                    <input type="text" name="{{ $name }}" class="form-control" placeholder="Cari {{ $name }}..." autocomplete="off" value="{{ app('request')->input($name) ? app('request')->input($name) : '' }}">
                    <button class="btn btn-outline-info py-0 px-2 mr-1" type="submit">
                        Cari
                    </button>
                    <button class="btn btn-outline-warning py-0 px-2" type="reset">
                        <a href="{{url()->current()}}">
                            Cancel
                        </a>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@else
<div class="col-12 mb-4 mt-3">
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-end">
            <form action="{{url()->current()}}" method="get" class=" col-sm-6">
                <div class="input-group">
                    <input type="text" name="{{ $name }}" class="form-control" placeholder="Cari {{ $name }}..." autocomplete="off" value="{{ app('request')->input($name) ? app('request')->input($name) : '' }}">
                    <button class="btn btn-outline-info py-0 px-2 mr-1" type="submit">
                        Cari
                    </button>
                    <button class="btn btn-outline-warning py-0 px-2" type="reset">
                        <a href="{{url()->current()}}">
                            Cancel
                        </a>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endif