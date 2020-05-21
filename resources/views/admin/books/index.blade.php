@extends('admin.layout')
@section('title','Kitablar')
@section('content')

    <!-- Begin Page Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary">Kitablar cədvəli</h6>
                <a href="{{ route('book.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus text-white-50"></i> Kİtab əlavə et</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Ad</th>
                            <th>Nəşriyyat</th>
                            <th>Səhifə</th>
                            <th>Nəşr tarixi</th>
                            <th>Əlavə edildi</th>
                            <th>Dəyişildi</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Ad</th>
                            <th>Nəşriyyat</th>
                            <th>Səhifə</th>
                            <th>Nəşr tarixi</th>
                            <th>Əlavə edildi</th>
                            <th>Dəyişildi</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </tfoot>
                        <tbody>

                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->publish->name}}</td>
                                    <td>{{$book->pages}}</td>
                                    <td>{{$book->publish_date}}</td>
                                    <td>{{$book->created_at}}</td>
                                    <td>{{$book->updated_at}}</td>
                                    <td>
                                        <form id="delete-form" action="{{ route('book.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-primary btn-circle btn-sm" href="{{ route('book.edit', $book->id) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a href="{{route('book.show',$book->id)}}" class="btn btn-primary btn-circle btn-sm">
                                                <i class="far fa-eye"></i>
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
    <!-- /.container-fluid -->
    </div>


    @endsection
