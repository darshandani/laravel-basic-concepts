@extends('backend.layouts.main')
@section('title', 'MT : : Admin Profile')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Admission</h5>
                        <small class="text-muted float-end">Merged input group</small>
                    </div>
                    <div class="card-body">


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Open Modal
                        </button>

                        <table class="table" id="admissiontable">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                        </table>


                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="profileModalLabel">Add Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="myModal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="admissionform" action="{!! route('admission.store') !!}" method="POST"
                                            class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                                            @csrf


                                            <!-- Pupil's Name -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="first-name">First
                                                    Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="first-name"
                                                        name="first_name" placeholder="First Name" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a first name.
                                                    </div>
                                                </div>
                                                <label class="col-sm-2 col-form-label" for="last-name">Last Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="last-name"
                                                        name="last_name" placeholder="Last Name" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a last name.
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Pupil's Date of Birth and Place of Birth inline -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="date-of-birth">Pupil's Date
                                                    of
                                                    Birth</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="date-of-birth"
                                                        name="date_of_birth" placeholder="MM-DD-YYYY" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid date of birth.
                                                    </div>
                                                </div>
                                                <label class="col-sm-2 col-form-label" for="place-of-birth">Place of
                                                    Birth</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="place-of-birth"
                                                        name="place_of_birth" placeholder="Place of Birth" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a place of birth.
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Religion -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="religion">Religion</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" id="religion" name="religion">
                                                        <option>Please Select</option>
                                                        <option value="hinduism">Hinduism</option>
                                                        <option value="islam">Islam</option>
                                                        <option value="christianity">Christianity</option>
                                                        <option value="sikhism">Sikhism</option>
                                                        <option value="buddhism">Buddhism</option>
                                                        <option value="jainism">Jainism</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>



                                            <!-- Gender -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="gender">Gender</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" id="gender" name="gender">
                                                        <option>Please Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Residential Address -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="street-address">Street
                                                    Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="street-address"
                                                        name="street_address" placeholder="Street Address">
                                                </div>
                                            </div>
                                            <!-- City and State / Province inline -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="city">City</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="city"
                                                        name="city" placeholder="City">
                                                </div>
                                                <label class="col-sm-2 col-form-label" for="state">State /
                                                    Province</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="state"
                                                        name="state" placeholder="State / Province">
                                                </div>
                                            </div>

                                            <!-- Last School Details -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="last-school-name">Name of
                                                    Last
                                                    School</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="last-school-name"
                                                        name="last_school_name" placeholder="Name of Last School">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="medium-of-instruction">Medium
                                                    of
                                                    Instruction</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" id="medium-of-instruction"
                                                        name="medium_of_instruction">
                                                        <option>Please Select</option>
                                                        <option value="english">English</option>
                                                        <option value="gujarati">Gujarati</option>
                                                        <option value="hindi">Hindi</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Last School Result</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="last_school_result" id="good-result" value="good">
                                                        <label class="form-check-label" for="good-result">
                                                            Good
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="last_school_result" id="average-result"
                                                            value="average">
                                                        <label class="form-check-label" for="average-result">
                                                            Average
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="last_school_result" id="poor-result" value="poor">
                                                        <label class="form-check-label" for="poor-result">
                                                            Poor
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="reason-for-leaving">Reason
                                                    for
                                                    Leaving Last
                                                    School</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="reason-for-leaving"
                                                        name="reason_for_leaving"
                                                        placeholder="Reason for Leaving Last School">
                                                </div>
                                            </div>

                                            <!-- Attachments -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Attach Scan Copy of Leaving
                                                    Certificate</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control"
                                                        name="leaving_certificate">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Attach Scan Copy of Mark-list /
                                                    Report Card</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control"
                                                        name="mark_list_report_card">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Attach Scan Copy of Medical
                                                    Certificate</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control"
                                                        name="medical_certificate">
                                                </div>
                                            </div>

                                            {{-- !-- Terms & Conditions --> --}}
                                            <div class="row mb-3">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="agree-terms"
                                                            name="agree_terms" value="1" required>
                                                        <label class="form-check-label" for="agree-terms">
                                                            I agree to terms & conditions.
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            You must agree to the terms & conditions.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Submit Button -->
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
                </div>

            </div>

        </div>

    </div>

@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script>
        (function() {
            $("#profileForm").validate({
                ignore: [],
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    date_of_birth: {
                        required: true,
                    },
                    place_of_birth: {
                        required: true,
                    },
                    religion: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    street_address: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    state: {
                        required: true,
                    },
                    last_school_name: {
                        required: true,
                    },
                    medium_of_instruction: {
                        required: true,
                    },
                    last_school_result: {
                        required: true,
                    },
                    reason_for_leaving: {
                        required: true,
                    },
                    leaving_certificate: {
                        required: true,
                    },
                    mark_list_report_card: {
                        required: true,
                        extension: "pdf|jpg|jpeg|png",

                    },
                    medical_certificate: {
                        required: false,
                    },
                    agree_terms: {
                        required: true,
                    },
                },
                messages: {
                    mark_list_report_card: {
                        extension: "Please upload a PDF, JPG, JPEG, or PNG file.",
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                },
            });
        })();


        $(document).ready(function() {

            $('#admissionform').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('admission.store') }}",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
                    },
                    success: function(response) {
                        console.log(response);
                        $('#admissiontable').DataTable().ajax.reload();
                        $('#admissionform')[0].reset();
                        $('#myModal').modal('hide');
                        alert('Data submitted successfully!');
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error occurred while submitting data.');
                    }
                });
            });


            $('#admissiontable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getAdmissiondata') }}",
                    type: "GET",
                },
                columns: [{
                        data: 'first_name',
                        name: 'first_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'last_name',
                        name: 'last_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'gender',
                        name: 'gender',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true
                    },

                ]
            });


            $(document).on('click', '.delete-btn', function(e) {
                var deleteBtn = $(this);
                var id = deleteBtn.data('row-id');
                $.ajax({
                    type: "POST",
                    url: "/addmission/" + id,
                    data: {
                        _token: "{!! csrf_token() !!}"
                    },


                    success: function(response) {
                        console.log(response);
                        $('#admissiontable').DataTable().ajax.reload();
                        alert('Data deleted successfully!');
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error occurred while submitting data.');
                    }
                });
            });


        });
    </script>
@endsection
