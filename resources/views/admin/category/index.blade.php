@extends('admin.layout')
@section('title','Kateqoriyalar')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Kateqoriyalar cədvəli</h6>
            <a href="{{ route('category.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Kateqorita əlavə et</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ad</th>
                        <th>Əlavə edildi</th>
                        <th>Dəyişildi</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Ad</th>
                        <th>Əlavə edildi</th>
                        <th>Dəyişildi</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    <tr>
                        @foreach($cats as $cat)
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->created_at}}</td>
                            <td>{{$cat->updated_at}}</td>
                            <td>
                                <form id="delete-form" action="{{ route('category.destroy', $cat->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('category.edit', $cat->id) }}">
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
