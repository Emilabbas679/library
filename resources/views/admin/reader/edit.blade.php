@extends('admin.layout')
@section('title','Oxucu məlumatlarını redaktə et')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Oxucu məlumatlarını redaktə et</h6>
        </div>
        <div class="card-body">
            <div class="col-md-8 offset-md-2">
                <form class="user" method="POST" action="{{ route('reader.update', $reader->id) }}">
                    @csrf
                    @method('PUT')


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="code" class='col-form-label'>Ad</label>
                            </div>
                            <div class="col-md-10">
                                <input id="code" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $reader->name}}"
                                       placeholder="Ad">
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
                                <label for="surname" class='col-form-label'>Soyad</label>
                            </div>
                            <div class="col-md-10">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                       name="surname" value="{{ $reader->surname  }}"
                                       placeholder="Soyad">
                                @error('surname')
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
                                <label for="code" class='col-form-label'>E-mail</label>
                            </div>
                            <div class="col-md-10">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ $reader->email }}"
                                       placeholder="E-mail">
                                @error('email')
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
                                <label for="phone" class='col-form-label'>Telefon</label>
                            </div>
                            <div class="col-md-10">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ $reader->phone }}"
                                       placeholder="E-mail">
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
    </div>

@endsection
