@extends('admin.includes.main')
@section('title')Post Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2">
                            @can('create-post')
                                <a href="{{route('food.create')}}" class="btn btn-success btn-sm">Add New Item</a>
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
                                    <th>Image</th>
                                    <th>Food Name </th>
                                    <th>Category</th>
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
                                @if(count($foods)>0)
                                    @foreach ($foods as $food)

                                    <tr>
                                        {{-- <td><input type="checkbox" class="sub_chk" name="posts_id[{{$post->id}}]" value="{{$post->id}}"></td> --}}
                                        <td> {{$loop->iteration}} </td>
                                        <td>
                                            @if(empty($food->image))
                                                <img src="{{asset('public/category/no-image.png')}}" alt="no-image" width="80px" height="80px" class="img-fluid">
                                            @else
                                                <img src="{{asset('public/uploads/food/'.$food->image)}}" alt="{{$food->name}}" width="80px" height="80px" class="img-fluid">
                                            @endif
                                        </td>
                                        <td>
                                            {{$food->name}}
                                        </td>


                                        <td>
                                            {{-- {{ dd($food->category->name) }} --}}
                                            @if($food->food_category_id != null)
                                            {{$food->category->name}}
                                            @endif

                                        </td>
                                        <form action="{{route('food.delete',$food->id)}}" method="POST">
                                            @csrf
                                            {{-- @method('delete') --}}
                                            <td class="project-actions">

                                            <a class="btn btn-info btn-sm" href="{{route('food.edit',$food->id)}}">
                                                <i class="fas fa-edit"></i>
                                                </i>

                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{route('food.delete',$food->id)}}">
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
<script>
    let featured = Array.prototype.slice.call(document.querySelectorAll('.js-feature'));
        featured.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
<script>
    let trending = Array.prototype.slice.call(document.querySelectorAll('.js-trending'));
        trending.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
<script>
    let banner = Array.prototype.slice.call(document.querySelectorAll('.js-banner_news'));
        banner.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
@endsection
@section('scripts')



<script type="text/javascript">
    // function filter(el) {
    //     $('#sort_orders').submit();
    // }
    // function author_filter(el){
    //     $('#author_filter').submit();
    // }
    // function status_filter(el){
    //     $('#status_filter').submit();
    // }
    // function del(el){
    //     $('#del').submit();
    // }
    // $(document).ready(function (e) {
    //     $('#myTable').DataTable();
    //     $('#category_id').on('change', function() {
    //         var category_id = $('#category_id').val();
    //         $.post('{{ route('subcat.get_subcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
    //         $('#sub_cat').html(null);
    //             for (var i = 0; i < data.length; i++) {
    //                 $('#sub_cat').append($('<option>', {
    //                     value: data[i].id,
    //                     text: data[i].name
    //                 }));
    //             $('.demo-select2').select2();
    //             }
    //         });
    //     });

    //     $('#master').on('click', function(e) {
    //      if($(this).is(':checked',true))
    //      {
    //         $(".sub_chk").prop('checked', true);
    //      } else {
    //         $(".sub_chk").prop('checked',false);
    //      }
    //     });



    //     $('.js-feature').change(function () {
    //         let featured = $(this).prop('checked') === true ? 1 : 0;
    //         // console.log(status);
    //         let category_id = $(this).data('id');
    //         //   console.log(category_id);

    //         $.ajax({
    //             type: "GET",
    //             dataType: "json",
    //             url: '{{ route('post.update_feature') }}',
    //             data: {'featured': featured, 'cat_id': category_id},
    //             success: function (data) {
    //                 toastr.options.closeButton = true;
    //                 toastr.options.closeMethod = 'fadeOut';
    //                 toastr.options.closeDuration = 20;
    //                 toastr.success(data.message);
    //             }
    //         });
    //     });

    //     $('.js-trending').change(function () {
    //         let trending = $(this).prop('checked') === true ? '1' : '0';
    //         // console.log(status);
    //         let post_id = $(this).data('id');
    //         //   console.log(category_id);

    //         $.ajax({
    //             type: "GET",
    //             dataType: "json",
    //             url: '{{ route('post.update_trending') }}',
    //             data: {'trending': trending, 'post_id': post_id},
    //             success: function (data) {
    //                 toastr.options.closeButton = true;
    //                 toastr.options.closeMethod = 'fadeOut';
    //                 toastr.options.closeDuration = 20;
    //                 toastr.success(data.message);
    //             }
    //         });
    //     });
    //     $('.js-banner_news').change(function () {
    //         let banner = $(this).prop('checked') === true ? 1 : 0;
    //         // console.log(status);
    //         let post_id = $(this).data('id');
    //         //   console.log(category_id);

    //         $.ajax({
    //             type: "GET",
    //             dataType: "json",
    //             url: '{{ route('post.update_banner_news') }}',
    //             data: {'banner_news': banner, 'post_id': post_id},
    //             success: function (data) {
    //                 toastr.options.closeButton = true;
    //                 toastr.options.closeMethod = 'fadeOut';
    //                 toastr.options.closeDuration = 20;
    //                 toastr.success(data.message);
    //             }
    //         });

    //     });

    // });
</script>
@endsection
