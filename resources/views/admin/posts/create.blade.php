@extends('admin.includes.main')
@section('title')Post Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
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
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control" name="slug"
                                                    value="{{old('slug')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="featured_img">Featured Image(min. 650*450)</label>
                                                <div id="featured_img" class="row">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="head_img">Headline Image(min. 1280*550)</label>
                                                <div id="head_image" class="row">
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
                        <option selected disabled>--Select--</option>
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
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function (e) {
        $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
        $("#photos").spartanMultiImagePicker({
            fieldName: 'image[]',
            maxCount: 10,
            rowHeight: '200px',
            groupClassName: 'col-md-4 col-sm-4 col-xs-6',
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

        $("#featured_img").spartanMultiImagePicker({
            fieldName: 'featured_img',
            maxCount: 1,
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

        $("#fb_image").spartanMultiImagePicker({
            fieldName: 'fb_image',
            maxCount: 1,
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

    });

</script>
@endsection
