@extends('admin.includes.main')
@section('title')Product Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<form action="{{route('posts.update',$post->slug)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                            <a href="{{route('posts.index')}}" class="btn btn-success btn-sm float-right">View Product</a>
                        </div>
                        <div class="col-md-12 p-0">
                            @include('admin.includes.message')
                        </div>
                        <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="headline">News Title</label> <span class="text-danger"> * </span>
                                            <input type="text" class="form-control" name="headline" value="{{old('headline',$post->title)}}">
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" name="slug" value="{{old('slug', $post->slug)}}">
                                        </div>
                                    </div>

                                    
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="featured_img">Featured Image</label>
                                            <div id="featured_img" class="row">
                                                <div class="col-md-6">
                                                    <div class="img-upload-preview">
                                                        <img loading="lazy"  src="{{ asset('uploads/featured_img/'.$post->featured_img) }}" alt="" class="img-responsive" style="max-height:150px;">
                                                        <input type="hidden" name="previous_featured_img" value="{{ $post->featured_img }}">
                                                        <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="head_img">Headline Image</label>
                                            <div id="head_image" class="row">
                                                <div class="col-md-6">
                                                    <div class="img-upload-preview">
                                                        <img loading="lazy"  src="{{ asset('uploads/headline_img/'.$post->headline_image) }}" alt="" class="img-responsive" style="max-height:150px;">
                                                        <input type="hidden" name="previous_headline_img" value="{{ $post->headline_image }}">
                                                        <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                    
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="excerpt">Excerpt</label>
                                            <textarea name="excerpt" id="" class ="form-control" cols="30" rows="3">{{old('excerpt' , $post->excerpt)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Main News</label>
                                            <textarea class="form-control" name="description">{{old('description',$post->description)}}</textarea>
                                        </div>
                                    </div>

                                </div>
                                
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-seo" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                          Add Meta Data
                                        </button>
                                      
                                      <div class="collapse mt-3" id="collapseExample">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="{{old('meta_title',$post->meta_title)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="meta_description">Meta Description</label>
                                                    <textarea name="meta_description" id="" class ="form-control" cols="30" rows="1">{{old('meta_description',$post->meta_description)}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Meta Tags:</label><br/>
                                                    <input type="text" name="tags[]" placeholder="Tags" class="form-control" value="{{$post->tags}}" date-role="tagsinput"/>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Meta Keywords:</label><br/>
                                                    <input type="text" name="keywords[]" value="{{$post->keywords}}" placeholder="Keywords" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fb_title">Facebook Title</label>
                                                    <input type="text" class="form-control" name="fb_title" value="{{old('fb_title',$post->fb_title)}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fb_description">Facebook Description</label>
                                                    <textarea name="fb_description" id="" class ="form-control" cols="30" rows="1">{{old('fb_description',$post->fb_description)}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image">Facebook Image</label><br>
                                                    <div id="fb_image" class="row">
                                                        <div class="col-md-6">
                                                            <div class="img-upload-preview">
                                                                <img loading="lazy"  src="{{ asset('uploads/fb_image/'.$post->fb_image) }}" alt="" class="img-responsive" style="max-height:150px;">
                                                                <input type="hidden" name="previous_fb_img" value="{{ $post->fb_image }}">
                                                                <button type="button" class="btn btn-danger close-btn remove-files"><i class="fa fa-times"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button> 
                            
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="select-option">
                        <div class="form-group">
                            <label for="category">Category</label><span class="text-danger"> * </span>
                            <select class="form-control" name="category" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if($post->category==$category->id)  selected @endif>{{$category->name}}</option>
                                @endforeach                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_category">Sub Category</label>
                            <select class="form-control" name="sub_category" id="sub_cat">
                                {{-- <option selected disabled>--Select--</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach --}}
                                
                            </select>
                        </div>
                    </div>
                    <div class="select-option">
                        <div class="form-group">
                            <label for="publish">Publish</label>
                            <select name="status" class="form-control" id="colorselector">
                                @hasanyrole('Admin|Editor')
                                <option value="published" @if ($post->status=='published') selected @endif >Publish</option>
                                <option value="drafts" @if ($post->status=='drafts') selected @endif>Draft</option>
                                <option class="validate" value="scheduled" @if ($post->status=='scheduled') selected @endif>Schedule Time</option>
                                @else
                                <option value="drafts" @if ($post->status='drafts') selected @endif>Draft</option>
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
        </div>
    </section>
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
	
        $('.remove-files').on('click', function(){
            $(this).parents(".col-md-4").remove();
        });
        $("#featured_img").spartanMultiImagePicker({
                fieldName:        'featured_img',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
        });

        $("#fb_image").spartanMultiImagePicker({
                fieldName:        'fb_image',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
        });
        $("#head_image").spartanMultiImagePicker({
                fieldName:        'head_image',
                maxCount:         1,
                rowHeight:        '200px',
                groupClassName:   'col-md-6',
                maxFileSize:      '',
                dropFileLabel : "Drop Here",
                onExtensionErr : function(index, file){
                    console.log(index, file,  'extension err');
                    alert('Please only input png or jpg type file')
                },
                onSizeErr : function(index, file){
                    console.log(index, file,  'file size too big');
                    alert('File size too big');
                }
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

        $('#colorselector').change(function(){
            $('.colors').hide();
            $('#' + $(this).val()).show();
            // $('input[type="datetime-local"]').attr("required","required");
            
        });
    });
    
</script>

@endsection