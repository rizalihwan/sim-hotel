@extends('layouts.app', ['title' => 'HRI-HOTEL | Edit Customer'])
@section('breadcrumb')
    <li class="breadcrumb-item">Customer Edit</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="first">First Name:</label>
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" 
                                        value="{{ $customer->first_name ?? old('first_name') }}" id="first"
                                        placeholder="first name" required>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror           
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="last">Last Name:</label>
                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" 
                                        value="{{ $customer->last_name ?? old('last_name') }}" id="last"
                                        placeholder="last name" required>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror           
                                </div>
                            </div>   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="nik">NIK:</label>
                                    <input class="form-control @error('nik') is-invalid @enderror" type="number" name="nik" 
                                        value="{{ $customer->nik ?? old('nik') }}" id="nik"
                                        placeholder="your nik" required>
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="phone">Phone:</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" 
                                        value="{{ $customer->phone ?? old('phone') }}"id="phone"
                                        placeholder="your phone" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="address">Address:</label>
                                    <textarea type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                        id="address" required>{{ $customer->address ?? old('address') }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('admin.customer.index') }}" class="btn btn-light for-light">Back</a>
                        <a href="{{ route('admin.customer.index') }}" class="btn btn-secondary for-dark">Back</a>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
