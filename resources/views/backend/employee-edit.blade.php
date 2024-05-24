@extends('backend.layouts.main')
@section('title', 'MT : : Admin Profile')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Admin Profile</h5>
                        <small class="text-muted float-end">Merged input group</small>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" action="{{ route('employee.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <input type="hidden" name="_method" value="PUT">

                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $user->name }}" placeholder="John Doe" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" id="email" class="form-control" name="email"
                                        value="{{ $user->email }}" placeholder="john.doe@example.com" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="phone">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="{{ $user->phone }}" placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
