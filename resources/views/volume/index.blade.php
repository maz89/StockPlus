@extends('layout.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Volumes</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">STOCKPLUS</a></li>
                                <li class="breadcrumb-item active">Volumes</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <div class="flex-grow-1">
                                    <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card" id="contactList">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-card mb-3">
                                    <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>
                                            <th class="sort" data-sort="name" scope="col">Name</th>
                                            <th class="sort" data-sort="company_name" scope="col">Company</th>
                                            <th class="sort" data-sort="email_id" scope="col">Email ID</th>
                                            <th class="sort" data-sort="phone" scope="col">Phone No</th>
                                            <th class="sort" data-sort="lead_score" scope="col">Lead Score</th>
                                            <th class="sort" data-sort="tags" scope="col">Tags</th>
                                            <th class="sort" data-sort="date" scope="col">Last Contacted</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                </div>
                                            </th>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a></td>
                                            <td class="name">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0"><img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-xs rounded-circle"></div>
                                                    <div class="flex-grow-1 ms-2 name">Tonya Noble</div>
                                                </div>
                                            </td>
                                            <td class="company_name">Nesta Technologies</td>
                                            <td class="email_id">tonyanoble@velzon.com</td>
                                            <td class="phone">414-453-5725</td>
                                            <td class="lead_score">154</td>
                                            <td class="tags">
                                                <span class="badge bg-primary-subtle text-primary">Lead</span>
                                                <span class="badge bg-primary-subtle text-primary">Partner</span>
                                            </td>
                                            <td class="date">15 Dec, 2021 <small class="text-muted">08:58AM</small></td>
                                            <td>
                                                <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Call">
                                                        <a href="javascript:void(0);" class="text-muted d-inline-block">
                                                            <i class="ri-phone-line fs-16"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Message">
                                                        <a href="javascript:void(0);" class="text-muted d-inline-block">
                                                            <i class="ri-question-answer-line fs-16"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="dropdown">
                                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item view-item-btn" href="javascript:void(0);"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>View</a></li>
                                                                <li><a class="dropdown-item edit-item-btn" href="#showModal" data-bs-toggle="modal"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                <li><a class="dropdown-item remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ contacts We did not find any contacts for you search.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @include('volume.modal')

                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->


            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
