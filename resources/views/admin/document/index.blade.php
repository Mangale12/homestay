@extends('admin.includes.main')
@section('title')Document -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2">
                            @can('create-post')
                                <a href="{{route('document.create')}}" class="btn btn-success btn-sm">Add New Document</a>
                            @endcan

                        </div>
                            {{-- <button class="btn btn-primary delete_all btn-danger" onclick="del()"><i class="fas fa-trash">
                            </i></button> --}}
                        </div>

                    </div>
                </div>
                {{-- {{dd(App\Models\Post::where('status','scheduled')->get())}} --}}
                <div class="card-body p-0">
                    @include('admin.includes.message')
                    <form action="{{route('delete_all')}}" method="POST" id="del">
                        @csrf
                        <table class="table table-striped projects" id="myTable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>Document</th>
                                    <th>Document Name </th>
                                    {{-- <th>Category</th> --}}
                                    <th>Action</th>
                                    {{-- <th>Pdf File</th>
                                    <th>Sub Category</th>
                                    <th>Featured</th>
                                    <th>Trending</th>
                                    <th>Banner News</th>
                                    <th>Status</th>
                                    <th>Author</th>
                                    <th>Published Date</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($documents)>0)
                                    @foreach ($documents as $document)

                                    <tr>
                                        {{-- <td><input type="checkbox" class="sub_chk" name="posts_id[{{$post->id}}]" value="{{$post->id}}"></td> --}}
                                        <td> {{$loop->iteration}} </td>
                                        <td>
                                            @if(empty($document->document))
                                                <img src="{{asset('public/category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid">
                                            @else
                                                <img src="{{asset('public/uploads/document/'.$document->document)}}" alt="{{$document->document}}" width="80px" height="80px" class="img-fluid">
                                            @endif
                                        </td>
                                        <td>
                                            {{$document->name}}
                                        </td>
                                        <form action="{{route('document.delete',$document->id)}}" method="POST">
                                            @csrf
                                            {{-- @method('delete') --}}
                                            <td class="project-actions">

                                            <a class="btn btn-info btn-sm" href="{{route('document.edit',$document->id)}}">
                                                <i class="fas fa-edit"></i>
                                                </i>

                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{route('document.delete',$document->id)}}">
                                                <i class="fas fa-trash-alt"></i>
                                                </i>

                                            </a>
                                                {{-- <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button> --}}
                                            </td>
                                        </form>
                                        {{-- <td><a href="{{ route('homebanner.edit', $homebanner->id) }}"></a>
                                        <a href="{{ route('homebanners.delete', $homebanner->id) }}"></a></td> --}}

                                    </tr>

                                    @endforeach
                                @else
                                    <tr><td colspan="6"><i class="fa fa-exclamation-triangle"></i> {!! trans('No Data Found') !!}</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                </div>
                {{-- {{ $posts->links() }} --}}
            </div>
        </div>

    </section>
</div>
@endsection
