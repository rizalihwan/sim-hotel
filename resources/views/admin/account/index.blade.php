@extends('layouts.app', ['title' => 'HRI-HOTEL | Register'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addModal">Add</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1.</th>
                                    <td><span class="badge badge-danger">ADMIN<span></td>
                                    <td>poto satu</td>
                                    <td>Rizal Ganteng</td>
                                    <td>rizalihwan94@gmail.com</td>
                                    <td>rizalihwan</td>
                                    <td><span class="badge badge-light">DILINDUNGI<span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
            <form action="#" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="avatar">Image (Nullable):</label>
                      <input class="form-control" type="file" name="avatar" id="avatar" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="name">Name:</label>
                      <input class="form-control" type="text" name="name" id="name" placeholder="your name" required>
                    </div>
                  </div>
                  <div class="col-md-12">
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
                      <input class="form-control" type="password" name="password" id="password" placeholder="********" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection