@extends('admin.layout')
@section('title','Kitablar')
@section('content')
    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Müəllif cədvəli</h6>
            <a href="{{ route('author.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Müəllif əlavə et</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$author->id}}</td>
                    </tr>
                    <tr>
                        <th>Ad</th>
                        <td>{{$author->name}}</td>
                    </tr>
                    <tr>
                        <th>Soyad</th>
                        <td>{{$author->surname}}</td>
                    </tr>
                    <tr>
                        <th>Ata</th>
                        <td>{{$author->parent_name}}</td>
                    </tr>
                    <tr>
                        <th>Haqqinda</th>
                        <td>{!! $author->description !!}</td>
                    </tr>
                    <tr>
                        <th>Doğum tarixi</th>
                        <td>{{$author->birthday}}</td>
                    </tr>
                    <tr>
                        <th>Ölüm tarixi</th>
                        <td>{{$author->deathday}}</td>
                    </tr>
                    <tr>
                        <th>Anadan olduğu yer</th>
                        <td>{{$author->hometown}}</td>
                    </tr>
                    <tr>
                        <th>Şəkil</th>
                        <td>
                            <img src="{{asset('upload/authors/'.$author->img)}}" width="200" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>Əlavə edildi</th>
                        <td>{{$author->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Dəyişildi</th>
                        <td>{{$author->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Əməliyyatlar</th>
                        <td>
                            <form id="delete-form" action="{{ route('author.destroy', $author->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('author.edit', $author->id) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="{{route('author.show',$author->id)}}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="far fa-eye"></i>
                                </a>
                                <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    @endsection
