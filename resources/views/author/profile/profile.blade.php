@extends('author.layout.app')

@section('title', 'Profile')

@section('heading', 'Profile')
@section('heading_nav', 'Profile')

@section('main_content')
<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid"
                 src="{{ asset('upload/profile/'.Auth::guard('author')->user()->photo) }}"
                 alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{ Auth::guard('author')->user()->name }}</h3>

          <p class="text-muted text-center">Author</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Post</b> <a class="float-right">1,322</a>
            </li>
            <li class="list-group-item">
              <b>Comment</b> <a class="float-right">543</a>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      {{-- <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">About Me</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fas fa-book mr-1"></i> Education</strong>

          <p class="text-muted">
            B.S. in Computer Science from the University of Tennessee at Knoxville
          </p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

          <p class="text-muted">Malibu, California</p>

          <hr>

          <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

          <p class="text-muted">
            <span class="tag tag-danger">UI Design</span>
            <span class="tag tag-success">Coding</span>
            <span class="tag tag-info">Javascript</span>
            <span class="tag tag-warning">PHP</span>
            <span class="tag tag-primary">Node.js</span>
          </p>

          <hr>

          <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.card-body -->
      </div> --}}
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card  card-primary card-outline">
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('author_profile_submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group row">
              <label for="inputName" class="col-sm-2 col-form-label">Name *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ Auth::guard('author')->user()->name }}" placeholder="Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control  @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ Auth::guard('author')->user()->email }}" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" placeholder="Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="inputConfirmPassword" name="confirm_password" placeholder="Confirm Password">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPhoto" class="col-sm-2 col-form-label">photo</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="inputPhoto" name="photo" placeholder="Skills">
              </div>
            </div>
            <div class="text-center">
              @if (Auth::guard('author')->user()->photo)
                <img class="profile-user-img img-fluid"
                        src="{{ asset('upload/profile/'.Auth::guard('author')->user()->photo) }}"
                        alt="User profile picture">
                  
              @endif
            </div>
            <div class="form-group row">
              <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Update</button>
              </div>
            </div>
          </form>
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection