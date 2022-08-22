@extends('layouts.appuser')
@section('title','Checkout Course Camp')
@section('content')
<section class="checkout">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                    YOUR FUTURE CAREER
                </p>
                <h2 class="primary-header">
                    Start Invest Today
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="item-bootcamp">
                            <img src="{{ asset('/assets/images/item_bootcamp.png') }}" alt="" class="cover">
                            <h1 class="package">
                                {{ $camp->title }}
                            </h1>
                            <p class="description">
                                {{ $camp->desc }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-6 col-12">
                        <form action="{{route('member.checkout.store', $camp->id)}}" class="basic-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="occupation" class="form-label">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation"
                                    value="@if (Auth::user()->occupation != null ) {{ Auth::user()->occupation }} @else Member @endif"
                                    readonly>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="string" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" placeholder="Masukan Card Number " maxlength="12"
                                    value="{{ old('phone') ?: Auth::user()->phone }}" required>
                                @error('phone')
                                <div class="invalid-feedback mb-2">
                                    <div class="text-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="discount" class="form-label">Discount Code</label>
                                <input type="string" class="form-control @error('discount') is-invalid @enderror"
                                    id="discount" name="discount" placeholder="Masukan Card Number " maxlength="12"
                                    value="{{ old('discount') }}" required>
                                @error('discount')
                                <div class="invalid-feedback mb-2">
                                    <div class="text-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="string" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" placeholder="Masukan Card Number " maxlength="12"
                                    value="{{ old('address') ?: Auth::user()->address }}" required>
                                @error('address')
                                <div class="invalid-feedback mb-2">
                                    <div class="text-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                            <p class="text-center subheader mt-4">
                                <img src="{{ asset('/assets/images/ic_secure.svg') }}" alt=""> Your payment is secure
                                and encrypted.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
