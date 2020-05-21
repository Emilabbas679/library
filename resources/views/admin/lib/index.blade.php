@extends('admin.layout')
@section('title','Kitabxana işçiləri')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Kitabxana işçiləri</h6>
            <a href="{{ route('lib.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Yeni işçi əlavə et</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Əlavə edildi</th>
                        <th>Dəyişildi</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Əlavə edildi</th>
                        <th>Dəyişildi</th>
                        <th>Əməliyyatlar</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    <tr>
                        @foreach($libs as $lib)
                            <td>{{$lib->id}}</td>
                            <td>{{$lib->name}}</td>
                            <td>{{$lib->surname}}</td>
                            <td>{{$lib->email}}</td>
                            <td>{{$lib->status}}</td>
                            <td>{{$lib->created_at}}</td>
                            <td>{{$lib->updated_at}}</td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::user()->status == 1)
                                <form id="delete-form" action="{{ route('lib.destroy', $lib->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('lib.edit', $lib->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                    @endif

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
