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
                        <th>#</th>
                        <td>{{$book->id}}</td>

                    </tr>
                    <tr>
                        <th>Ad</th>
                        <td>{{$book->name}}</td>
                    </tr>
                    <tr>
                        <th>Nəşriyyat</th>
                        <td>{{$book->publish->name}}</td>
                    </tr>
                    <tr>
                        <th>Səhifə</th>
                        <td>{{$book->pages}}</td>
                    </tr>
                    <tr>
                        <th>Haqqinda</th>
                        <td>{!! $book->description !!}</td>
                    </tr>
                    <tr>
                        <th>Müəlliflər</th>
                        <td>
                            <ol>
                                @foreach($book->authors as $rel)
                                    <li>
                                        {{$rel->author->name }} {{$rel->author->surname}}
                                    </li>
                                    @endforeach

                            </ol>
                         </td>
                    </tr>
                    <tr>
                        <th>Kateqoriyalar</th>
                        <td>
                            <ol>
                                @foreach($book->categories as $rel)
                                    <li>
                                        {{$rel->category->name }}
                                    </li>
                                @endforeach

                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <th>Nəşr tarixi</th>
                        <td>{{$book->publish_date}}</td>
                    </tr>

                    <tr>
                        <th>Şəkil</th>
                        <td>
                            <img src="{{asset('/upload/books/'.$book->img)}}" width="200" alt="">
                        </td>
                    </tr>

                    <tr>
                        <th>Əlavə edildi</th>
                        <td>{{$book->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Dəyişildi</th>
                        <td>{{$book->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Əməliyyatlar</th>
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

                </table>
            </div>
        </div>
    </div>
    @endsection
