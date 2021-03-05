@extends('layouts.app', ['title' => 'HRI-HOTEL | Customer'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts.partials.error')
                    <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Fullname</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse ($customers as $customer)
                                <tbody>
                                    <th>{{ $loop->iteration + $customers->firstItem() - 1 . '.' }}</th>
                                    <td>
                                        <span class="badge badge-pill badge-light">{{ $customer->nik }}</span>
                                    </td>
                                    <td>{{ $customer->FullName }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>
                                        <a href="{{ route('admin.customer.edit', $customer->id) }}" style="float: left;"
                                            class="mr-1"><i class="fa fa-pencil-square-o"
                                                style="color: rgb(0, 241, 12);"></i></a>
                                        <form action="{{ route('admin.customer.destroy', $customer->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Sure for delete this data?')"
                                                style="background-color: transparent; border: none;"><i class="icon-trash"
                                                    style="color: red;"></i></button>
                                        </form>
                                    </td>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <th colspan="6" style="color: red; text-align: center;">Data Empty!</th>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- add data modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add New Customer</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('admin.customer.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="first">First Name:</label>
                                    <input class="form-control" type="text" name="first_name" id="first"
                                        placeholder="first name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="last">Last Name:</label>
                                    <input class="form-control" type="text" name="last_name" id="last"
                                        placeholder="last name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="nik">NIK:</label>
                                    <input class="form-control" type="number" name="nik" id="nik"
                                        placeholder="your nik" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="phone">Phone:</label>
                                    <input class="form-control" type="number" name="phone" id="phone"
                                        placeholder="your phone" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="address">Address:</label>
                                    <textarea type="text" class="form-control" name="address"
                                        id="address" required></textarea>
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
@stop
