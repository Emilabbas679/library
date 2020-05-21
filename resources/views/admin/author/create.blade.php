@extends('admin.layout')
@section('title','Müəllif əlavə et')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Müəllif daxil et</h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 offset-md-1">
                <form class="user" method="POST" action="{{ route('author.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name" class='col-form-label'>Ad</label>
                            </div>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name')}}"
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
                                <label for="surname" class="col-form-label">Soyad</label>
                            </div>
                            <div class="col-md-10">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                       name="surname" value="{{ old('surname')}}"
                                       placeholder="Soyadı">
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
                                <label for="parent_name" class="col-form-label">Ata adı</label>
                            </div>
                            <div class="col-md-10">
                                <input id="parent_name" type="text" class="form-control @error('parent_name') is-invalid @enderror"
                                       name="parent_name" value="{{old('parent_name')}}"
                                       placeholder="Ata adı">
                                @error('parent_name')
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
                                <label for="hometown" class="col-form-label">Anadan olduğu yer</label>
                            </div>
                            <div class="col-md-10">
                                <input id="hometown" type="text" class="form-control @error('hometown') is-invalid @enderror"
                                       name="hometown" value="{{old('hometown')}}"
                                       placeholder="Anadan olduğu yer">
                                @error('hometown')
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
                                <label for="birthday" class="col-form-label">Doğum tarixi</label>
                            </div>
                            <div class="col-md-10">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                                       name="birthday" value="{{old('birthday')}}"
                                       placeholder="birthday">
                                @error('birthday')
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
                                <label for="deathday" class="col-form-label">Ölüm tarixi</label>
                            </div>
                            <div class="col-md-10">
                                <input id="deathday" type="date" class="form-control @error('deathday') is-invalid @enderror"
                                       name="deathday" value="{{old('deathday')}}"
                                       placeholder="deathday">
                                @error('deathday')
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
                                <label for="description" class="col-form-label">Haqqında</label>
                            </div>
                            <div class="col-md-10">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                          name="description" placeholder="Haqqında">
                                   {{old('description')}}
                                </textarea>
                                @error('description')
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
                                <label for="img">Şəkil</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" name="img" value="{{old('img')}}" class="form-control @error('img') is-invalid @enderror">
                                @error('img')
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
                                <label for="status">Status</label>
                            </div>
                            <div class="col-md-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="1" selected> Active</option>
                                    <option value="0" > Inactive</option>
                                </select>
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
    @endsection

@push('js')

    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {

            $(".sel-status").select2();

        });
    </script>




    @endpush
