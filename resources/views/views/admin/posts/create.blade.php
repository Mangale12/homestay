@extends('admin.includes.main')
@section('title')Post Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<style>
    .card-footer, .progress {
        display: none;
    }
</style>
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Post</h3>
                                    <a href="{{route('posts.index')}}" class="btn btn-success btn-sm float-right">View
                                        Post</a>
                                </div>
                                <div class="col-md-12 p-0">
                                    @include('admin.includes.message')
                                </div>


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="headline">News Title</label> <span class="text-danger"> *
                                                </span>
                                                <input type="text" class="form-control" name="headline"
                                                    value="{{old('headline')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kicker">News Kicker</label>
                                                <input type="text" class="form-control" name="kicker"
                                                    value="{{old('kicker')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control" name="slug"
                                                    value="{{old('slug')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="slug">Upload Pdf File</label>
                                                <input type="file" name="pdf_file" class="form-control" accept=".pdf" title="Upload PDF"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=>Featured/Thumbnail Image(recommended: 650*450)</label>
                                                <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium " >brows</div>
                                                    </div>
                                                    <input type="hidden" name="featured_img" value=" " class="selected-file" id="selected-file">
                                                    <div class="form-control file-amount" data-toggle="modal" data-target="#exampleModal">Choose File from Media</div>
                                                </div>
                                                <div id="view_featured_img"></div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="head_img">New Image</label>
                                                <div id="featured_img" class="row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="excerpt">Excerpt</label>
                                                <textarea name="excerpt" id="" class="form-control" cols="30"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Main News</label>
                                                <textarea class="form-control"
                                                    name="description">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label>Trending: </label>
                                            <input type="checkbox" name="trending" class="js-feature ml-5">
                                        </div>
                                        <div class="col-4">
                                            <label>Headline Image: </label>
                                            <input type="checkbox" name="headline_image" class="js-feature ml-5">
                                        </div>
                                        <div class="col-4">
                                            <label>Banner News: </label>
                                            <input type="checkbox" name="news_banner" class="js-feature ml-5">
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-seo" type="button" data-toggle="collapse"
                                                data-target="#collapseExample" aria-expanded="false"
                                                aria-controls="collapseExample">
                                                Add Meta Data
                                            </button>

                                            <div class="collapse mt-3" id="collapseExample">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="meta_title">Meta Title</label>
                                                            <input type="text" class="form-control" name="meta_title"
                                                                value="{{old('meta_title')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="meta_description">Meta Description</label>
                                                            <textarea name="meta_description" id="" class="form-control"
                                                                cols="30" rows="1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Meta Tags:</label><br />
                                                            <input type="text" name="tags[]" placeholder="Tags"
                                                                class="form-control"
                                                                data-role="tagsinput" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Meta Keywords:</label><br />
                                                            <input type="text" name="keywords[]" placeholder="Keywords"
                                                                class="form-control" data-role="tagsinput"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fb_title">Facebook Title</label>
                                                            <input type="text" class="form-control" name="fb_title"
                                                                value="{{old('fb_title')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="fb_description">Facebook Description</label>
                                                            <textarea name="fb_description" id="" class="form-control"
                                                                cols="30" rows="1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="image">Facebook Image</label><br>
                                                            <div id="fb_image" class="row">

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="post-buttons d-flex">
                                        <li><button type="submit"
                                                class="btn btn-success btn-sm float-right">Create Post</button></li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="select-option">
                <div class="form-group">
                    <label for="category">Category</label><span class="text-danger"> * </span>
                    <select class="form-control" name="category" id="category_id">
                        {{--<option selected disabled>--Select--</option>--}}
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category">Sub Category</label>
                    <select class="form-control" name="sub_category" id="sub_cat">

                    </select>
                </div>
            </div>
          	<div class="select-option">
              <label for="video">Video</label>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Upload</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add Url</button>
                </li>

              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body">
                        <div id="upload-container" class="text-center">
                          <input type="button" value="Browse File" name="video" id="browseFile" class="btn btn-primary">
                        </div>
                        <div class="progress mt-3" style="height: 25px">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                        </div>
                      </div>
                      <div class="card-footer p-4" >
                        <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
                      </div>
                </div>
                <div class="tab-pane fade mt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="url" name="video" class="form-control" value="{{old('video')}}">
                </div>

              </div>
          </div>
            <div class="select-option">
                <div class="form-group">
                    <label for="publish">Publish</label>

                    <select name="status" class="form-control" id="colorselector">
                        @hasanyrole('Admin|Editor')
                        <option value="published" selected>Publish</option>
                        <option value="drafts">Draft</option>
                        <option value="scheduled" >Schedule Time</option>
                        @else
                        <option value="drafts">Draft</option>
                        @endhasanyrole
                    </select>


                    <div class="output">
                        <div id="scheduled" class="colors scheduled"><input type="datetime-local" class="form-control" name="scheduled_dt">
                        </div>
                    </div>
                </div>
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
<!--               @include('admin.posts.ajax_paginate')-->
<!--               <div>{!! $posts->links() !!}</div>-->

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
            fieldName: 'new_featured_img',
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
