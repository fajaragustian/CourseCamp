@extends('layouts.admin.app')
@section('title', 'Dashboard Admin Edit Profile Course Camp')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Welcome To Dashboard</h1>
            {{-- Jika Ingin memakai breadcumbs --}}
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div> --}}
        </div>
        <div class="section-body">
            @include('components.alert')
            <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if (Auth::user()->avatar != null)
                            <img src="{{ URL::to('/'. Auth::user()->avatar) }}"
                                class="rounded-circle profile-widget-picture" alt="" srcset="">
                            @else
                            {{-- <img src="{{ asset('/storage/profile/avatar.png') }}" --}} <img
                                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                                class="rounded-circle profile-widget-picture" alt="" srcset="">
                            @endif
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
                            <div class="profile-widget-name">{{ Auth::user()->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{ Auth::user()->occupation }}
                                    <div class="slash"></div> {{ Auth::user()->address }}
                                </div>
                            </div>
                            <div class="text-justify">{{ Auth::user()->bio }}</div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="{{route('admin.profile.update')}}" method="POST" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') ?: Auth::user()->name }}" required="">
                                        @error('name')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Occupation</label>
                                        <input type="text" name="occupation"
                                            class="form-control @error('occupation') is-invalid @enderror"
                                            value="{{ old('occupation') ?: Auth::user()->occupation }}" required="">
                                        @error('occupation')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') ?: Auth::user()->email }}" required="">
                                        @error('email')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="string" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') ?: Auth::user()->phone }}" required minlength="8"
                                            maxlength="13">
                                        @error('phone')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>City</label>
                                        <textarea type="string" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address') ?: Auth::user()->address }}"
                                            required="">{{{ Request::old('address') ?: Auth::user()->address }}}</textarea>
                                        @error('address')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Bio Profile</label>
                                        <textarea name="bio" class="form-control @error('bio') is-invalid @enderror"
                                            value="{{ old('bio') ?: Auth::user()->bio }}" rows="5"
                                            required>{{{ Request::old('bio') ?: Auth::user()->bio }}}</textarea>
                                        @error('bio')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Photo Profile</label>
                                        <div class="custom-file">

                                            <input type="file" name="avatar"
                                                class="custom-file-input @error('avatar') is-invalid @enderror"
                                                value="{{ old('avatar')}}">
                                            <br>
                                            @error('avatar') <div class="invalid-feedback mb-2 mt-2 ">
                                                <div class="text-danger">{{ $message }}</div>
                                            </div>
                                            @enderror
                                            <label class=" custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
</div>

@endsection
