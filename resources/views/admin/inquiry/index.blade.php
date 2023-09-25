@extends('admin.includes.main')
@section('title')Post Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">

                            <a href="{{route('homebanner.create')}}" class="btn btn-success d-inline">New Inquiries</a>
                            <a href="{{route('homebanner.create')}}" class="btn btn-success d-inline">Old Inquiries</a>

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
                                    <th>Name</th>
                                    <th>Email </th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Date</th>
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
                                @if(count($inquiries)>0)
                                    @foreach ($inquiries as $inquiry)

                                    <tr>
                                        {{-- <td><input type="checkbox" class="sub_chk" name="posts_id[{{$post->id}}]" value="{{$post->id}}"></td> --}}
                                        <td> {{$loop->iteration}} </td>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->phone }}</td>
                                        <td>{{ $inquiry->country }}</td>
                                        <td>{{ $inquiry->arrival_date }}</td>
                                        <td>{{ $inquiry->departure_date }}</td>
                                        <td><a class="inquiry-view btn btn-primary" data-id="{{ $inquiry->id }}"> <i class="fas {{ $inquiry->status == 0 ? 'fa-eye-slash' : 'fa-eye' }}"></i> view</a>
                                        <a href="{{ route('inquiry.delete',$inquiry->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt">delete</i></a>
                                    </td>

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
        {{-- view modal --}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Inquiry Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <p><b>Full Name</b> : <span id="full_name"></span></p>
                    <p><b>Phone</b> : <span id="phone"></span></p>
                    <p><b>E-mail</b> : <span id="email"></span></p>
                    <p><b>Room Type</b> : <span id="room-type"></span></p>
                    <p><b>Airport Pickup</b> : <span id="pickup"></span></p>
                    <p><b>Arrival Date</b> : <span id="arrival-date"></span></p>
                    <p><b>Departure Date</b> : <span id="departure-date"></span></p>
                    <p><b>No of Member : </b> : <span id="adults"></span></p>
                    <p><b>No of Children : </b> : <span id="children"></span></p>
                    <p><b>Country : </b> : <span id="country"></span></p>
                    <p><b>Message : </b> : <span id="message"></span></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
              </div>
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
    $(document).ready(function (e) {
        $('#myTable').DataTable();
        $('.inquiry-view').on('click', function() {
            var user_id = $(this).data('id');
            // alert(user_id);
            $.post('{{ route('inquiry.view') }}',{_token:'{{ csrf_token() }}', user_id:user_id}, function(data){
                $('#exampleModalCenter').modal('show');
                $('#full_name').html(data.data.name);
                $('#phone').html(data.data.phone);
                $('#email').html(data.data.email);
                $('#room-type').html(data.data.room_type);
                $('#pickup').html(data.data.pickup);
                $('#arrival-date').html(data.data.arrival_date);
                $('#departure-date').html(data.data.departure_date);
                $('#country').html(data.data.country);
                $('#adults').html(data.data.adults);
                $('#children').html(data.data.children);
                $('#message').html(data.data.message);
                $('.fa-eye-slash').replaceClass('fa-eye-slash','fa-eye');
                console.log(data);
            });
        });

        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });



        $('.js-feature').change(function () {
            let featured = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let category_id = $(this).data('id');
            //   console.log(category_id);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('post.update_feature') }}',
                data: {'featured': featured, 'cat_id': category_id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 20;
                    toastr.success(data.message);
                }
            });
        });

        $('.js-trending').change(function () {
            let trending = $(this).prop('checked') === true ? '1' : '0';
            // console.log(status);
            let post_id = $(this).data('id');
            //   console.log(category_id);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('post.update_trending') }}',
                data: {'trending': trending, 'post_id': post_id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 20;
                    toastr.success(data.message);
                }
            });
        });
        $('.js-banner_news').change(function () {
            let banner = $(this).prop('checked') === true ? 1 : 0;
            // console.log(status);
            let post_id = $(this).data('id');
            //   console.log(category_id);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('post.update_banner_news') }}',
                data: {'banner_news': banner, 'post_id': post_id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 20;
                    toastr.success(data.message);
                }
            });

        });

    });
</script>
@endsection
