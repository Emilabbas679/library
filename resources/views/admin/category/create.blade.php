@extends('admin.layout')
@section('title','Kateqoriya əlavə et')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Kateqoriya əlavə et</h6>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form class="user" method="POST" action="{{ route('category.store') }}">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name" class='col-form-label'>Ad</label>
                            </div>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}"
                                       placeholder="Adı">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">
                        Əlavə et
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>


    @endsection
