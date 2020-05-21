@extends('admin.layout')
@section('title','Nömrə əlavə et')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Nömrə əlavə et</h6>
        </div>
        <div class="card-body">
            <div class="col-md-8 offset-md-2">
                <form class="user" method="POST" action="{{ route('book-code.store') }}">
                    @csrf

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="book" class='col-form-label'>Kateqoriyalar</label>
                            </div>
                            <div class="col-md-10">
                                <select name="book" id="book" class="form-control sel-status @error('book') is-invalid @enderror" >
                                    <option value="" selected>Kitab seçin</option>
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{$book->name}}</option>
                                    @endforeach
                                </select>
                                @error('book')
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
                                <label for="code" class='col-form-label'>Kod</label>
                            </div>
                            <div class="col-md-10">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror"
                                       name="code" value="{{ old('code') }}"
                                       placeholder="Adı">
                                @error('code')
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
                                    <option value="active" selected> Active</option>
                                    <option value="inactive" > Inactive</option>
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
