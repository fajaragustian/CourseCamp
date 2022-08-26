@extends('layouts.admin.app')
@section('title', 'Dashboard Admin Change Password Course Camp')
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
        @include('components.alert')
        <div class="section-body">
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
                        <form action="{{route('member.password.update')}}" method="POST" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Current Password</label>
                                        <input type="password" name="current-password"
                                            class="form-control @error('current-password') is-invalid @enderror"
                                            value="{{ old('current-password') }}" required>
                                        @error('current-password')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>New Password</label>
                                        <input type="password" name="new-password"
                                            class="form-control @error('new-password') is-invalid @enderror"
                                            value="{{ old('new-password') }}" required>
                                        @error('new-password')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Confirm Password</label>
                                        <input type="password" name="new-password_confirmation"
                                            class="form-control @error('new-password_confirmation') is-invalid @enderror"
                                            value="{{ old('new-password_confirmation') }}" required>
                                        @error('new-password_confirmation')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
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
