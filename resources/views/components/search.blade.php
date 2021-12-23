<div class="col-12 d-flex justify-content-center mb-4">
    <form action="/" method="get">
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <input type="text" name="{{ $name }}" class="form-control" placeholder="Cari {{ $name }}..." autocomplete="off" value="{{ app('request')->input($name) ? app('request')->input($name) : '' }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary py-0 px-2" type="submit">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>