@extends('dashboard.layout')

@section('content')

    <div class="section-header">
    <h1>Profil Toko</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/home">Beranda</a></div>
            <div class="breadcrumb-item">Toko</div>
        </div>
    </div>
    @include('dashboard.flash')
          <div class="section-body">
            <h2 class="section-title">Hi, Ujang!</h2>
            <p class="section-lead">
              Informasi berkaitan dengan toko anda ada disini.
            </p>

            @foreach($data as $data)
              <form method="POST" action="/namatoko/update/{{$data->id_toko}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT')}}
                

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ url('/avatar/'.$data->avatar) }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Ujang On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>


              
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label for="nama_toko">Nama Toko</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                  </div>
                                </div>
                                  <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ $data->nama_toko }}" aria-describedby="nama_toko" required="require">
                              </div>
                          </div>

                          <div class="col-sm-6">
                              <label for="avatar">Avatar</label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                      <i class="fas fa-upload"></i>
                                    </div>
                                  </div>
                                    <input type="file" class="form-control" id="avatar" name="avatar" value="{{ $data->avatar }}" aria-describedby="avatar" required="require">
                                  </div>
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label for="alamat_toko">Alamat Toko</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                  </div>
                                </div>
                                  <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" value="{{ $data->alamat_toko }}" aria-describedby="alamat_toko" required="require">
                              </div>
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label for="telp_toko">Nomor Telepon</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                  </div>
                                </div>
                                  <input type="text" class="form-control" id="telp_toko" name="telp_toko" value="{{ $data->telp_toko }}" aria-describedby="telp_toko" required="require">
                              </div>
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label for="website">Nama Website</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                  </div>
                                </div>
                                  <input type="text" class="form-control" id="website" name="website" value="{{ $data->website }}" aria-describedby="website" required="require">
                              </div>
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label for="instagram">Instagram</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                  </div>
                                </div>
                                  <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $data->instagram }}" aria-describedby="instagram" required="require">
                              </div>
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label for="facebook">Facebook</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                  </div>
                                </div>
                                  <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $data->facebook }}" aria-describedby="facebook" required="require">
                              </div>
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label for="bio">Biografi Toko</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                  </div>
                                </div>
                                  <input type="text" class="form-control" id="bio" name="bio" value="{{ $data->bio }}" aria-describedby="bio" required="require">
                              </div>
                          </div>

                        
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
              </form>
              @endforeach
            </div>
          </div>
        

@stop