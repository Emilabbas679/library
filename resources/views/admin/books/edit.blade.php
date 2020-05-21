@extends('admin.layout')
@section('title','Kitablar')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Kitab daxil et</h6>
        </div>
        <div class="card-body">
            <div class="col-md-9 offset-md-1">
                <form class="user" method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="name" class='col-form-label'>Ad</label>
                            </div>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ $book->name}}"
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
                                <label for="publisher" class='col-form-label'>Nəşriyyat</label>
                            </div>
                            <div class="col-md-10">


                                <select name="publisher" id="publisher" class="form-control sel-status  @error('publisher') is-invalid @enderror">
                                <option  disabled>Nəşriyyat</option>
                                @foreach($publishers as $publishing)

                                    <option value="{{$publishing->id}}" @if($publishing->id == $book->publisher) selected  @endif >{{$publishing->name}}</option>
                                @endforeach
                            </select>
                            @error('publisher')
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
                                <label for="authors" class='col-form-label'>Müəlliflər</label>
                            </div>
                            <div class="col-md-10">
                                <select name="authors[]" id="authors" class="form-control sel-status @error('authors') is-invalid @enderror" multiple>
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}" @if(in_array($author->id, $selected_authors)) selected @endif>{{$author->name}} {{$author->surname}}</option>
                                    @endforeach
                                </select>
                                @error('authors')
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
                                <label for="authors" class='col-form-label'>Kateqoriyalar</label>
                            </div>
                            <div class="col-md-10">
                                <select name="categories[]" id="authors" class="form-control sel-status @error('authors') is-invalid @enderror" multiple>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" @if(in_array($cat->id, $selected_cats)) selected @endif>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('categories')
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
                                <label for="page" class='col-form-label'>Səhifə sayı</label>
                            </div>
                            <div class="col-md-10">

                                <input id="page" type="text" class="form-control @error('page') is-invalid @enderror"
                                       name="page" value="{{$book->pages}}"
                                       placeholder="Səhifə sayı">
                                @error('page')
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
                                <label for="publish_date" class='col-form-label'>Nəşr tarixi</label>
                            </div>
                            <div class="col-md-10">

                                <input id="publish_date" type="date" class="form-control @error('publish_date') is-invalid @enderror"
                                       name="publish_date" value="{{$book->publish_date}}"
                                       placeholder="Nəşr tarixi">
                                @error('publish_date')
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
                                <label for="description" class='col-form-label'>Kitab haqqında</label>
                            </div>
                            <div class="col-md-10">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                          name="description" placeholder="Haqqında">
                                   {{$book->description}}
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
                                <label for="img" class='col-form-label'>Şəkil</label>
                            </div>
                            <div class="col-md-10">

                                <img src="{{asset('/upload/books/'.$book->img)}}" alt="" width="300">
                                <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
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
                                <label  class='col-form-label'>Şəkil</label>
                            </div>
                            <div class="col-md-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="1" @if($book->status == 'active') selected @endif > Active</option>
                                    <option value="0" @if($book->status == 'active') selected @endif> Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Redaktə
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
