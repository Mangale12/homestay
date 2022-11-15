@extends('admin.includes.main')
@section('title')Site Settings -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Settings</h3>
                        </div>
                        @include('admin.includes.message')
                        
                        <form method="post" action="{{route('settings.update',$setting->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="Title">Site Name</label>
                                        <input type="text" class="form-control" name="title" value="{{old('Title',$setting->title)}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Address">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{old('Address',$setting->address)}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="Contact">Contact</label>
                                        <input type="tel" class="form-control" name="contact" value="{{old('Contact',$setting->contact)}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{old('Email',$setting->email)}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div>
                                            <label for="Logo">Logo</label><br>
                                            <input type="file" name="logo" id="logo">
                                        </div>
                                        <img src="{{asset('admin/image/'.$setting->logo)}}" alt="" class="img-fluid" width="100px" />
                                        <img id="preview-logo-before-upload"  style="max-height: 150px;">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div>
                                            <label for="Favicon">Favicon</label><br>
                                            <input type="file" name="favicon" id="favicon">
                                        </div>
                                        <img src="{{asset('admin/image/'.$setting->favicon)}}" alt="" class="img-fluid" width="100px" />
                                        <img id="preview-favicon-before-upload"  style="max-height: 100px;">
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="account">Bank Account No.</label>
                                        <input type="text" class="form-control" name="account_no" value="{{old('account_no',$setting->account_no)}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Bank">Bank</label>
                                        <input type="text" class="form-control" name="bank" value="{{old('bank',$setting->bank)}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="Location">Branch</label>
                                        <input type="text" class="form-control" name="branch" value="{{old('branch',$setting->branch)}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Esewa Number</label>
                                        <input type="number" class="form-control" name="esewa_num" value="{{old('esewa_num',$setting->esewa_num)}}">
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="Footer">Footer Text</label>
                                        <textarea name="footer" class="form-control">{{old('footer',$setting->footer)}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="headline_no">No. of Headline News</label>
                                        <input type="number" name="headline_no" min="1" max="10" class="form-control" value="{{old('headline_no', $setting->headline_no)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
            
    $(document).ready(function (e) {
    $('#logo').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-logo-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
    
</script>
<script type="text/javascript">
            
    $(document).ready(function (e) {
    $('#favicon').change(function(){
                
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
        $('#preview-favicon-before-upload').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });
    
    });
    
</script>
@endsection
