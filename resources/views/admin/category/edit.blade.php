@extends('layouts.app', ['title' => 'HRI-HOTEL | Edit Category'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Name:</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                        value="{{ $category->name ?? old('name') }}" id="name" placeholder="your name"
                                        required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="facility">Facility:</label>
                                    <input class="form-control @error('facility') is-invalid @enderror" type="text"
                                        name="facility" value="{{ $category->facility ?? old('facility') }}" id="facility"
                                        placeholder="facility" required>
                                    @error('facility')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Description:</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" type="text"
                                        name="description" id="facility" placeholder="facility"
                                        required>{{ $category->description ?? old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-light for-light">Back</a>
                        <a href="{{ URL::previous() }}" class="btn btn-secondary for-dark">Back</a>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
