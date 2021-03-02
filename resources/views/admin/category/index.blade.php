@extends('layouts.app', ['title' => 'HRI-HOTEL | Category'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts.partials.error')
                    <button type="submit" class="btn btn-primary btn-md mb-3" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Facility</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse ($categories as $category)
                                <tbody>
                                    <th>{{ $loop->iteration + $categories->firstItem() - 1 . '.' }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->facility }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" style="float: left;"
                                            class="mr-1"><i class="fa fa-pencil-square-o"
                                                style="color: rgb(0, 241, 12);"></i></a>
                                        <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
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
                                        <th colspan="5" style="color: red; text-align: center;">Data Empty!</th>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $categories->links() }}
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
                    <h5 class="modal-title" id="exampleModalLabel2">Add New Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Name:</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        placeholder="Category name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="facility">Facility:</label>
                                    <input class="form-control" type="text" name="facility" id="facility"
                                        placeholder="Input facility" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Description:</label>
                                    <textarea type="text" class="form-control" name="description"
                                        id="description" required></textarea>
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
