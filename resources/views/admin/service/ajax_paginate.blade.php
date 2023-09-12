<div class="row" id="paginate_data">
    @foreach ($posts as $media)
        @if ($media->featured_img != null)
            @if (file_exists(public_path('uploads/featured_img/' . $media->featured_img)))
            <div class="col-md-2" >
                <div class="img-upload-preview">
                    <img loading="lazy"  src="{{ asset('uploads/featured_img/'.$media->featured_img) }}" alt="" class="img-responsive" style="max-height:150px;">
                    <input type="radio" name="featured_img" class="close-btn sub_chk featured_img" value="{{$media->featured_img}}" style="right: -60px; top:-3px; width:150px;">
                </div>
            </div>
            @endif
        @endif
    @endforeach

</div>
