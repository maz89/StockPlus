@extends('layout.app')

@section('title')
    Businesses
@endsection


@section('css')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>


    <!-- Sweet Alert css-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

@endsection


@section('main')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Datatables</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Datatables</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">

                    <div id="success_message"></div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Basic Datatables</h5>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#add_ajouter"><i
                                    class="ri-add-line align-bottom me-1"></i> Ajouter
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                   class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach( $types as $type )
                                    <tr>
                                        <td data-id="{{$type->id}}">{{$i++}}</td>
                                        <td>  {{ $type->wording }}</td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item editbtn" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" libelle="Modifier">
                                                    <a href="" data-bs-toggle="modal"
                                                       class="text-primary d-inline-block edit-item-btn modifierType ">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top" libelle="Supprimer">
                                                    <a class="text-danger d-inline-block remove-item-btn deletebtn"
                                                       data-bs-toggle="modal" href="">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('type.modal')
                    </div>
                </div>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <!-- end main content-->

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
            integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <!--datatable js-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
            crossorigin="anonymous"></script>

    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>


    <script>
        $(document).ready(function () {
            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                let currentRow = $(this).closest("tr");
                let business_id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                //console.log(business_id);
                $.ajax({
                    type: "GET",
                    url: "/edit-types/" + type_id,
                    success: function (response) {
                        //console.log(response.businesses.name);
                        $('#myModalLabel').text('Modifier type');
                        $('#wording').val(response.businesses.wording);
                        $('#type_id').val(response.type.id);
                        $(".add_type").hide();
                        $(".update_type").show();
                        $('#add_type').modal('toggle');
                    }
                });
            });

            $(document).on('click', '.add_type', function (e) {
                e.preventDefault();
                var data = {
                    'wording': $('.wording').val(),
                }
                //console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/types",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                        } else {
                            $('#add_type').modal('toggle');
                            $('#add_type').find('input').val('');
                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Ajouté avec succès ',
                                    showConfirmButton: false,
                                },
                                setTimeout(function () {
                                    location.reload();
                                }, 2000)
                            );
                        }
                    }
                });
            });

            $(document).on('click', '.update_business', function (e) {
                e.preventDefault();
                $(this).text('modification..');
                var id = $('#type_id').val();
                //console.log(id);
                var data = {
                    'wording': $('#wording').val(),
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/update-type/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.update_type').text('Modifier');
                        } else {
                            $('#update_msgList').html("");
                            $('#add_type').find('input').val('');
                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Modifié avec succès',
                                    showConfirmButton: false,

                                },
                                setTimeout(function () {
                                    location.reload();
                                }, 2000)
                            );
                        }
                    }
                });

            });


            $(document).on('click', '.deletebtn', function (e) {
                e.preventDefault();
                let currentRow = $(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                //alert(id);

                Swal.fire({
                    title: "êtes vous sûr de vouloir supprimer?  ",
                    icon: 'question',
                    text: "",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Oui, Supprimer",
                    cancelButtonText: "Annuler",
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                        //alert(id);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "/delete-type/" + id,
                            dataType: 'JSON',
                            success: function (response) {
                                //console.log(response);
                                if (response.status == 200) {
                                    Swal.fire("success", response.message, "success");
                                    // refresh page after 2 seconds
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000);
                                } else {
                                    Swal.fire("error!", response.message, "error");
                                }
                            }
                        });
                    } else {
                        e.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })
            });

        });

    </script>

@endsection
