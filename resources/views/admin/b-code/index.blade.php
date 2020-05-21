@extends('admin.layout')
@section('title','Kitab nömrələri')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Kitab nömrələri</h6>
            <a href="{{ route('book-code.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Yeni nömrə əlavə et</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kitab</th>
                        <th>Kod</th>
                        <th>Status</th>
                        <th>Əlavə edildi</th>
                        <th>Dəyişildi</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Kitab</th>
                        <th>Kod</th>
                        <th>Status</th>
                        <th>Əlavə edildi</th>
                        <th>Dəyişildi</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    <tr>
                        @foreach($codes as $code)
                            <td>{{$code->id}}</td>
                            <td>{{$code->book->name}}</td>
                            <td>{{$code->code}}</td>
                            <td>{{$code->status}}</td>
                            <td>{{$code->created_at}}</td>
                            <td>{{$code->updated_at}}</td>
                            <td>
                                <form id="delete-form" action="{{ route('book-code.destroy', $code->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('book-code.edit', $code->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>

                            </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
@endsection
