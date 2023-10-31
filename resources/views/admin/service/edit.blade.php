@extends('admin.includes.main')
@section('title')Post Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<style>
    .card-footer, .progress {
        display: none;
    }
</style>
<form action="{{route('service.update',$service->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Update Service</h3>
                                    {{-- <a href="{{route('service.index')}}" class="btn btn-success btn-sm float-right"></a> --}}
                                </div>
                                <div class="col-md-12 p-0">
                                    @include('admin.includes.message')
                                </div>


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="headline"> Icon</label> <span class="text-danger"> *
                                                </span>
                                                <input type="text" class="form-control" name="icon"
                                                    value="{{old($service->icon,'icon')}}">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="headline"> Title</label> <span class="text-danger"> *
                                                </span>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{old($service->title,'title')}}">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kicker">Description</label>
                                                <textarea name="description" id="description" class="form-control">{!! $service->description !!}</textarea>

                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="head_img">New Image</label>
                                                <div id="featured_img" class="row">
                                                    <div class="col-md-6 remove">
                                                        <div class="img-upload-preview">
                                                            <img loading="lazy"  src="{{ asset('public/uploads/room/'.$room->image) }}" class="img-responsive" style="max-height:150px;">

                                                            <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}


                                    <hr>



                                    <ul class="post-buttons d-flex">
                                        <li><button type="submit"
                                                class="btn btn-success btn-sm float-right">Submit</button></li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        </div>
    </div>
</form>



<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

</script>
<script>
    let featured = Array.prototype.slice.call(document.querySelectorAll('.js-feature'));
        featured.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
</script>
<!-- Modal -->
<!--<div class="modal bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" >-->
<!--    <div class="modal-dialog modal-lg" style="margin-top: -1%;">-->
<!--@csrf-->
<!--      <div class="modal-content h-100 " style="width:100rem; right:20rem; overflow:auto;" >-->

<!--        <div class="card-body p-5" >-->
{{-- <!--

<!--            <p class="btn btn-primary addfile float-righ" >Add File</p>-->
<!--    </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="    width: 212%; position: absolute; right: -51%;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload from Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('admin.posts.ajax_paginate')
            <div>{!! $posts->links() !!}</div>

        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="button" class="btn btn-primary addfile">Add File</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->

@endsection




<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function (e) {
        let featured_img;
        $('.featured_img').on('change', function() {
            featured_image  = $(this).val();

        });
        $('.addfile').on('click', function(){
            $.post('{{ route('featured_img.get') }}',{_token:'{{ csrf_token() }}',featured_img:featured_image}, function(data){
                document.getElementById('selected-file').value = data;
                $('#view_featured_img').append('<img loading="lazy" class="img-responsive" src="{{asset('uploads/featured_img')}}/'+data+'" width="400" height="400">');

                $('#exampleModal').modal('hide');
            })
        });


        $('.page-link').on('click',function(event) {
            event.preventDefault();
            $('li').removeClass("active");
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page)
        {
            $.ajax({
                type:"get",
                url:"{{ route("ajax.pagination") }}"+"?page="+page,
                success:function(data)
                {
                    $('#paginate_data').html(data);
                }
            });
        }


        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        $("#featured_img").spartanMultiImagePicker({
            fieldName: 'banner_img',
            maxCount: 1,
          	allowedExt:'png|jpg|jpeg|gif|webp',
            rowHeight: '200px',
            groupClassName: 'col-md-12 col-lg-12',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });



        $("#fb_image").spartanMultiImagePicker({
            fieldName: 'fb_image',
            maxCount: 1,
          	allowedExt:'png|jpg|jpeg|gif|webp',
            rowHeight: '200px',
            groupClassName: 'col-md-6',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
        $("#head_image").spartanMultiImagePicker({
            fieldName: 'head_image',
            maxCount: 1,
          	allowedExt:'png|jpg|jpeg|gif|webp',
            rowHeight: '200px',
            groupClassName: 'col-lg-12 col-md-12',
            maxFileSize: '',
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file')
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });

        $('#image').change(function () {

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });


        $('#category_id').on('change', function() {
            var category_id = $('#category_id').val();
            $.post('{{ route('subcat.get_subcat_by_category') }}',{_token:'{{ csrf_token() }}', category_id:category_id}, function(data){
                $('#sub_cat').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#sub_cat').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                    // $('.demo-select2').select2();
                }
            });
        });

        $(function() {
            $('#colorselector').change(function(){
                $('.colors').hide();
                $('#' + $(this).val()).show();
            });
        });

  let browseFile = $('#browseFile');
        let resumable = new Resumable({
            target: '{{ route('files.upload.large') }}',
            query:{_token:'{{ csrf_token() }}'} ,// CSRF token
            fileType: ['mp4'],
            headers: {
                'Accept' : 'application/json'
            },
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function (file) { // trigger when file picked
            showProgress();
            resumable.upload() // to actually start uploading.
        });

        resumable.on('fileProgress', function (file) { // trigger when file progress update
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
            response = JSON.parse(response)
            $('#videoPreview').attr('src', response.path);
            $('.card-footer').show();
        });

        resumable.on('fileError', function (file, response) { // trigger when there is any error
            alert('file uploading error.')
        });


        let progress = $('.progress');
        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.find('.progress-bar').removeClass('bg-success');
            progress.show();
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', `${value}%`)
            progress.find('.progress-bar').html(`${value}%`)
        }

        function hideProgress() {
            progress.hide();
        }

    });

</script>
@endsection



