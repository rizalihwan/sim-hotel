@extends('layouts.app', ['title' => 'HRI-HOTEL | Register'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModalfat" data-whatever="@mdo">Add</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
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
                                    <th>poto satu</th>
                                    <td>Rizal Ganteng</td>
                                    <td>rizalihwan94@gmail.com</td>
                                    <td>rizalihwan</td>
                                    <td>DILINDUNGI</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- add data modal --}}
    <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">Add New Account</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="avatar">Image (Not Mandatory):</label>
                      <input class="form-control" type="file" name="avatar" id="avatar" placeholder>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label" for="name">Name:</label>
                      <input class="form-control" type="text" name="name" id="name" placeholder>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-warning" type="button" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="button">Send message</button>
            </div>
          </div>
        </div>
      </div>
@endsection