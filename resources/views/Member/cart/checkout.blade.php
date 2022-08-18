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
                                <label for="card_number" class="form-label">Card Number</label>
                                <input type="string" class="form-control @error('card_number') is-invalid @enderror"
                                    id="card_number" name="card_number" placeholder="Masukan Card Number "
                                    maxlength="12" value="{{ old('card_number') }}" required>
                                @error('card_number')
                                <div class="invalid-feedback mb-2">
                                    <div class="text-danger">{{ $message }}</div>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <label for="expired" class="form-label">Expired</label>
                                        <input type="month" class="form-control @error('expired') is-invalid @enderror"
                                            id="expired" name="expired" required>
                                        @error('expired')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label for="cvc" class="form-label">CVC</label>
                                        <input type="text" class="form-control @error('cvc') is-invalid @enderror"
                                            id=" cvc" name="cvc" placeholder="Masukan Kode CVC Card Number"
                                            maxlength="3" value="{{ old('cvc') }}" required>
                                        @error('cvc')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
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