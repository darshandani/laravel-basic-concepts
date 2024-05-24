@extends('backend.layouts.main')
@section('title', 'MT : : Product')
@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Product</h5>
                        <small class="text-muted float-end">Merged input group</small>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" action="{!!route('product.store')!!}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-user"></i></span>
                                        <input type="text" class="form-control" name="name"
                                            id="basic-icon-default-fullname" value="" placeholder="enter product name" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">image</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                        <input type="file" id="basic-icon-default-email" class="form-control"
                                            name="image" value="" placeholder="john.doe" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Description</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="ti ti-user"></i></span>
                                        <input type="text" class="form-control" name="desc"
                                            id="basic-icon-default-fullname" value="" placeholder="enter product description" />
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection
