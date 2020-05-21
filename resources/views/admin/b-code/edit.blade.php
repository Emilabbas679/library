@extends('admin.layout')
@section('title','Kitab kodunu redaktə et')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Kitab kodunu redaktə et</h6>
        </div>
        <div class="card-body">
            <div class="col-md-8 offset-md-2">
                <form class="user" method="POST" action="{{ route('book-code.update', $code->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="book" class='col-form-label'>Kateqoriyalar</label>
                            </div>
                            <div class="col-md-10">
                                <select name="book" id="book" class="form-control sel-status @error('book') is-invalid @enderror" >
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}" @if($book->id == $code->book_id) selected @endif>{{$book->name}}</option>
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
                                       name="code" value="{{$code->code}}"
                                       placeholder="Kod">
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
                                    <option value="active" @if($book->status == 'active') selected @endif> Active</option>
                                    <option value="inactive" @if($book->status == 'inactive') selected @endif> Inactive</option>
                                </select>
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
