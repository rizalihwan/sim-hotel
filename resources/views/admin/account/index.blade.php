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
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1.</th>
                                    <td>Rizal Ganteng</td>
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
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel2">New message</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label class="col-form-label" for="recipient-name">Recipient:</label>
                  <input class="form-control" type="text" value="@fat">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="message-text">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
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