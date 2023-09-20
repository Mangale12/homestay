@extends('admin.includes.main')
@section('title')Post Settings - {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<style>
    .card-footer, .progress {
        display: none;
    }
    .video_input_container {
  display: inline-block;
}
.video_input_container .video_input {
  position: relative;
  width: 480px;
  height: 270px;
  border: 3px solid #2a6;
  background: #000;
}
.video_input_container .video_input input {
  display: none;
}
.video_input_container .video_input video {
  height: 100%;
  width: 100%;
}
.video_input_container .video_input .thumbnail {
  position: absolute;
  top: 5px;
  right: 5px;
  border: 3px solid #253;
  height: 30%;
  width: auto;
}
.video_input_container .thumbnail_button {
  margin: 10px 0 0 0;
  padding: 20px;
  text-align: center;
  border: 3px solid #2a6;
  background: #3f9;
  color: #153;
  font-size: 18px;
  font-weight: bold;
}
.video_input_container .thumbnail_button.disabled {
  border-color: #666;
  background: #999;
  color: #333;
}

.label_container {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  overflow: hidden;
  color: #153;
  font-weight: bold;
}
.label_container.reselect {
  height: auto;
  width: auto;
  top: 5px;
  left: 5px;
  opacity: 0.3;
}
.label_container.reselect:hover {
  opacity: 1;
}
.label_container.reselect .label {
  position: relative;
  top: 0;
  left: 0;
  transform: none;
  padding: 12px 16px;
}
.label_container.reselect:before {
  border: 3px solid #2a6;
}
.label_container:before {
  content: "";
  background: #3f9;
  position: absolute;
  height: 100%;
  width: 100%;
  box-sizing: border-box;
}
.label_container .label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.min.js'></script>
<script src='https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.js'></script><script  src="./script.js"></script>
<form action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Home Banner</h3>
                                    <a href="{{route('video.index')}}" class="btn btn-success btn-sm float-right">View
                                        Video</a>
                                </div>
                                <div class="col-md-12 p-0">
                                    @include('admin.includes.message')
                                </div>


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="headline"> Name</label> <span class="text-danger"> *
                                                </span>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{old('name')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="kicker">Description</label>
                                                <textarea name="description" class="form-control"></textarea>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="head_img">New Image</label>
                                                <div id="featured_img" class="row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>



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

{{-- video Script Start  --}}
<script>
    var appNode = document.createElement('div');
appNode.id = 'app';
document.body.appendChild(appNode);

function genId(len)
{
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < len; i++)
  text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

class VideoInput extends React.Component {
  constructor(props) {super(props);
    this.state = { inputId: genId(20), inputKey: 0 };
    this.onChange = this.onChange.bind(this);
    this.reader = new FileReader();
    this.reader.onloadend = e => {
      console.log(e.target.result);
      const arrayBuffer = e.target.result;
      const blob = new Blob([arrayBuffer], { type: "video/mp4" });
      console.log(blob);
      var x;
      this.setState({ videoUrl: (console.log(x = URL.createObjectURL(blob)), x), isLoading: false });
    };
  }

  componentWillUpdate(newProps, newState) {
    const hasNewFile = newState.file !== this.state.file;
    const hasNewThumb = newState.thumbnail !== this.state.thumbnail;
    if (hasNewThumb && this.state.thumbnail)
    URL.revokeObjectURL(this.state.thumbnail);
    if (hasNewFile || hasNewThumb)
    this.props.onUpdate && this.props.onUpdate(newState.file, newState.thumbnail);
  }

  onChange(e) {
    console.log('e.target:', e.target);
    console.log('e.target.data.key:', e.target.getAttribute('data-key'));
    const file = e.target.files[0];
    this.setState({ file: file });
    if (file) {
      this.setState({ isLoading: true, inputKey: this.state.inputKey + 1, thumbnail: null });
      this.reader.readAsArrayBuffer(file);
    }
  }

  canGrabThumbnail() {
    return !!this.state.videoUrl && !this.state.isLoading && this.refs.video && this.refs.video.videoHeight && this.refs.video.videoWidth;
  }

  grabThumb() {
    console.log(this.canGrabThumbnail());
    if (this.canGrabThumbnail()) {
      const canvas = document.createElement('canvas');
      canvas.height = this.refs.video.videoHeight;
      canvas.width = this.refs.video.videoWidth;

      const context = canvas.getContext('2d');
      context.drawImage(this.refs.video, 0, 0, canvas.width, canvas.height);
      canvas.toBlob(blob => {
        this.setState({ thumbnail: URL.createObjectURL(blob) });
      }, 'image/png', 1);
    }
  }

  render() {
    const thumbnailButtonClassList = ['thumbnail_button'];
    if (!this.canGrabThumbnail()) thumbnailButtonClassList.push('disabled');

    return /*#__PURE__*/React.createElement("div", { className: "video_input_container" }, /*#__PURE__*/
    React.createElement("div", { className: "video_input" },

    // A little hack I've just come up with to preserve a file input's selection when the file select dialog is cancelled without managing inputs manually – taking advantage of react keys to avoid doing so.
    // The latter input is the only one I need in this case, but keeping the former around leaves me the convenient method of inspecting the file through selection of the input in the inspector (`$0.files[0]`).
    [/*#__PURE__*/
    React.createElement("input", { key: this.state.inputKey, type: "file" }), /*#__PURE__*/
    React.createElement("input", { key: this.state.inputKey + 1, id: this.state.inputId, type: "file", accept: "video/mp4", onChange: this.onChange })],



    this.state.videoUrl && /*#__PURE__*/

    React.createElement("video", { ref: "video", src: this.state.videoUrl, controls: true, autoplay: true }),


    this.state.isLoading ? /*#__PURE__*/

    React.createElement("div", { class: "loading" }, "Loading video") : /*#__PURE__*/

    React.createElement("label", { htmlFor: this.state.inputId, className: "input_label" },
    this.props.children),



    this.state.thumbnail && /*#__PURE__*/
    React.createElement("img", { className: "thumbnail", src: this.state.thumbnail })), /*#__PURE__*/


    React.createElement("div", { className: thumbnailButtonClassList.join(' '), onClick: this.grabThumb.bind(this) }, "Grab Thumb"));

  }}


class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {};
  }

  onUpdate(file, thumbnail) {
    this.setState({ file, thumbnail });
  }

  render() {
    return /*#__PURE__*/(
      React.createElement(VideoInput, { onUpdate: this.onUpdate.bind(this) },

      this.state.file ? /*#__PURE__*/

      React.createElement("div", { className: "label_container reselect" }, /*#__PURE__*/
      React.createElement("div", { className: "label" }, "Change Video")) : /*#__PURE__*/


      React.createElement("div", { className: "label_container" }, /*#__PURE__*/
      React.createElement("div", { className: "label" }, "Select a Video"))));




  }}


ReactDOM.render( /*#__PURE__*/
React.createElement(App, null),
appNode);
</script>
@endsection
