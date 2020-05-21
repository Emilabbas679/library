@extends('admin.layout')
@section('title','Nəşriyyatlar-redaktə et')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Nəşriyyat redaktə et</h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 offset-md-1">
                <form class="user" method="POST" action="{{ route('publishing.update', $publishing->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name" class='col-form-label'>Ad</label>
                            </div>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name"  value="{{ $publishing->name }}"
                                       placeholder="Adı">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="address" class='col-form-label'>Ünvan</label>
                            </div>
                            <div class="col-md-10">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                       name="address"  value="{{ $publishing->address }}"
                                       placeholder="Ünvanı">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="phone" class='col-form-label'>Əlaqə nömrəsi</label>
                            </div>
                            <div class="col-md-10">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ $publishing->phone }}"
                                       placeholder="Əlaqə nömrəsi">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Redaktə et
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
