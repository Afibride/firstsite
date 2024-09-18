@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <div class="profile-page tx-13">
        <div class="row">
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2"> 
                                <div>
                                    <img class="wd-70 rounded-circle" 
                                    src="{{(!empty($profileData->photo))? url('upload/admi_images/'.$profileData->photo) : url('upload/no_image.png')}}" 
                                    alt="profile">
                                    <span class="h4 ms-3 text-dark">{{$profileData->name}}</span>
                                </div>
                            </div>
                            <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality
                                of Social.</p>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Name:</label>
                                <p class="text-muted">{{$profileData->name}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                                <p class="text-muted">{{$profileData->email}}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Phone:</label>
                                <p class="text-muted">{{$profileData->phone}}</p>
                            </div>

                            <div class="mt-3">
                                <label class="tx-11 font-weight-bold mb-0 text-uppercase">Address:</label>
                                <p class="text-muted">{{$profileData->address}}</p>
                            </div>
                            <div class="mt-3 d-flex social-links">
                                <a href="javascript:;"
                                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                                    <i data-feather="github" data-toggle="tooltip" title="github.com/nobleui"></i>
                                </a>
                                <a href="javascript:;"
                                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                                    <i data-feather="twitter" data-toggle="tooltip" title="twitter.com/nobleui"></i>
                                </a>
                                <a href="javascript:;"
                                    class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                                    <i data-feather="instagram" data-toggle="tooltip" title="instagram.com/nobleui"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left wrapper end -->
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-8 middle-wrapper">
                    <div class="row">
                        <div class="card-body">
                            <h6 class="card-title">Update Admin Profile</h6>
                            <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{$profileData->username}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        autocomplete="off" value="{{$profileData->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{$profileData->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone1">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputPhone1"
                                        autocomplete="off" value="{{$profileData->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress1">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputAddress1"
                                        autocomplete="off" value="{{$profileData->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhoto1">Photo</label>
                                    <input type="file" name="photo" class="form-control" id="image" placeholder="Upload Image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhoto1"> </label>
                                    <img class="wd-70 rounded-circle" id="showImage" src="{{(!empty($profileData->photo))? url('upload/admi_images/'.$profileData->photo) : url('upload/no_image.png')}}" alt="profile">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- middle wrapper end -->

            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload =function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>

    @endsection