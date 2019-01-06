@extends('front.templates.main')

@section('title', 'Edit profile')

@section('css')
    <link rel="stylesheet" href="/css/frontend/edit-profile.css">
@endsection

@section('content')    
    <best-tags></best-tags>

    <div class="container profile-form">
            <div class="row m-y-2 mt-5 mb-5 pl-3 pr-3">
                <div class="col-lg-8 text-lg-center mb-4">
                    <h2 class="text-left">
                        Edit Master {{ $user->name }} Profile
                    </h2>
                </div>
                <div class="col-lg-4">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissable" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                
                <div class="col-lg-8 push-lg-4 personal-info">
                    {!! Form::open(['action'=>'HomeController@editUserProfile', 'method'=>'POST']) !!}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="last_name" value="{{ $user->last_name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" name="password" placeholder="********" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel" />
                                <input type="submit" class="btn btn-primary" value="Save Changes" />
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-4 pull-lg-8 text-center profile-image">
                    <img id="profile-image-preview" src="{{ $user->url_image }}" width="150" height="150" class="m-x-auto img-fluid img-circle" alt="avatar" />
                    <h6 id="profile-image-status" class="m-t-2">Upload a different photo</h6>
                    <label class="profile-file">
                        <input name="image" type="file" id="profile-file-input" class="profile-file-input" accept="image/*">
                        <span class="profile-file-control">
                            Choose avatar
                        </span>
                        <div class="profile-file-submit">
                            <simple-spinner></simple-spinner>
                            <div class="profile-file-submit-value">
                                <i class="fas fa-upload"></i>
                                Upload
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    <hr />
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            var spinner = $('.simple-spinner-container');
            spinner.hide();
            var btnSubmitValue = $('.profile-file-submit-value');
            var submitBtn = $('.profile-file-submit');
            submitBtn.hide();
            var status = $('#profile-image-status');
            var imageForUpload;

            $('#profile-file-input').change(function(e) {
                imageForUpload = e.target.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(imageForUpload);
                reader.onload = e => {
                    $('#profile-image-preview').attr('src', e.target.result);
                    submitBtn.show('fast');
                }
            });

            submitBtn.click(function(e) {
                btnSubmitValue.hide();
                spinner.show();
                status.html('Updating...');
                e.preventDefault();
                
                var formData = new FormData();
                formData.append("image", imageForUpload);
                $.ajax({
                    url: '/ajax/users/updateImage',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false, // Don't process the files
                    contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                    success: function(data) {
                        btnSubmitValue.show();
                        spinner.hide();
                        if (data.success) { 
                            status.html('Avatar updated successfully !!!');
                        }else{
                            status.html('Error on update');
                        }
                        setTimeout(function() { status.html('Upload a different photo'); }, 7000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        btnSubmitValue.show();
                        spinner.hide();
                        status.html('Error: '+textStatus);
                        setTimeout(function() { status.html('Upload a different photo'); }, 7000);
                        console.log('ERRORS: ' + textStatus);
                    }
                });
            });

            $('input[type="reset"]').click(function() {
                window.location.href = '/consejo';
            });
        });
    </script>
@endsection