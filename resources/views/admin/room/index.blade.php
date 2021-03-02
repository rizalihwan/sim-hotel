@extends('layouts.app', ['title' => 'HRI-HOTEL | Room'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  @include('layouts.partials.error')
                  <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Room Code</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Floor</th>
                                    <th>Category</th>
                                    <th>Price/Day</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- @forelse ($accounts as $account) --}}
                            <tbody>
                                <tr>
                                    {{-- <th>{{ $loop->iteration + $accounts->firstItem() - 1 . '.' }}</th> --}}
                                    <th>1.</th>
                                    <td><span class="badge badge-success">KOSONG<span></td>
                                    <td>HRM0001</td>
                                    <td>Mawar</td>
                                    <td>Image ini</td>
                                    <td>1</td>
                                    <td>VIP</td>
                                    <td>1.000.000</td>
                                    <td><i class="fa fa-star font-primary"></i></td>
                                    <td>
                                      <a href="#" style="float: left;" class="mr-1"><i class="fa fa-pencil-square-o" style="color: rgb(0, 241, 12);"></i></a>
                                      <form action="#" method="post">
                                        {{-- @csrf
                                        @method('DELETE') --}}
                                        <button type="submit" onclick="return confirm('Sure for delete this data?')" style="background-color: transparent; border: none;"><i class="icon-trash" style="color: red;"></i></button>
                                      </form>
                                    </td>
                                </tr>
                            </tbody>
                            {{-- @empty
                                <tbody>
                                  <tr>
                                    <th colspan="10" style="color: red; text-align: center;">Data Empty!</th>
                                  </tr>
                                </tbody>
                            @endforelse --}}
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer">
                    {{ $accounts->links() }}
                </div> --}}
            </div>
        </div>
    </div>
    {{-- add data modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">Add New Account</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('admin.account.register.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="avatar">Image:</label>
                      <input class="form-control" type="file" name="avatar" id="avatar" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="name">Name:</label>
                      <input class="form-control" type="text" name="name" id="name" placeholder="your name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="email">E-Mail:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="your email" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="role">Role:</label>
                      <select name="role" id="role" class="form-control custom-select" required>
                        <option disabled selected>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>
                        <option value="boss">Boss</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="username">Username:</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="username" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="password">Password:</label>
                      <input class="form-control" type="password" name="password" id="password" placeholder="****" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-light for-light" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-secondary for-dark" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection