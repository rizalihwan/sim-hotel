@extends('layouts.app', ['title' => 'HRI-HOTEL | Edit Room'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                                <img src="{{ $room->RoomThumbnail }}" width="100" alt="thumbnail" srcset="">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label" for="thumbnail">Image:</label>
                                  <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                                  @error('thumbnail')
                                          <span style="color: red;">{{ $message }}</span>
                                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="room">Room Code:</label>
                                    <input class="form-control @error('room_code') is-invalid @enderror" type="text" value="{{ $room->room_code ?? old('room_code') }}" name="room_code" id="room" required>
                                    @error('room_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label" for="name">Name:</label>
                                  <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $room->name ?? old('name') }}" id="name" placeholder="room name" required>
                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label" for="floor">Floor:</label>
                                  <input class="form-control @error('floor') is-invalid @enderror" type="number" name="floor" value="{{ $room->floor ?? old('floor') }}" maxlength="3" id="floor" placeholder="floor" required>
                                  @error('floor')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label" for="category_id">Category:</label>
                                  <select name="category_id" id="category_id" class="form-control custom-select" required>
                                      @foreach ($categories as $category)
                                          <option {{ $category->id == $room->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('category_id')
                                      <span>
                                          <strong style="color: red;">{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label" for="price">Price/Day:</label>
                                  <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ $room->price ?? old('price') }}" id="price" placeholder="price" required>
                                  @error('price')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                            </div>  
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="rating">Rating(nullable):</label>
                                    <select name="rating" id="rating" class="form-control custom-select">
                                        <option @if($room->rating == null) selected @endif value=""> - </option>
                                        <option @if($room->rating == 1) selected @endif value="1">1</option>
                                        <option @if($room->rating == 2) selected @endif value="2">2</option>
                                        <option @if($room->rating == 3) selected @endif value="3">3</option>
                                        <option @if($room->rating == 4) selected @endif value="4">4</option>
                                        <option @if($room->rating == 5) selected @endif value="5">5</option>
                                    </select>
                                    @error('rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                        </div>
                    </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.room.index') }}" class="btn btn-light for-light">Back</a>
                            <a href="{{ route('admin.room.index') }}" class="btn btn-secondary for-dark">Back</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection