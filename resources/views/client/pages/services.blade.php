@extends('layouts.app')
@section('page-title', 'Nos services')
@section('content-title', 'Nos services')
@section('breadcrumb', 'Nos services')
@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter de nouveaux services</h5>
                </div>
                <hr style="margin-top: -5px">
                <div class="card-body">
                    <form id="newServiceForm" action="{{ route('admin_service.store') }}" method="POST" enctype="multipart/form-data" style="margin-top: -20px;">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="id_title" class="form-label">Titre <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="id_title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Saisissez le titre du service">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="id_upload_file" class="form-label">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="upload_file" id="id_upload_file" class="form-control @error('upload_file') is-invalid @enderror">
                                    @error('upload_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="id_file_name" class="form-label">Donner un autre nom à l'image ?</label>
                                    <input type="text" name="file_name" id="id_file_name" class="form-control" value="{{ old('file_name') }}" placeholder="Saisissez le nom de l'image">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="id_description" class="form-label">Description <span class="text-danger">*</span></label>
                                    {{-- <textarea id="id_description" name="description"></textarea> --}}
                                    @error('description')
                                        <span class="" role="alert">
                                            <strong class="text-danger text-sm">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <textarea id="id_description" name="description" class="form-control @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" style="text-align: right;">
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Liste des services offerts</h5>
                </div>
                <hr style="margin-top: -5px">
                <div class="card-body">
                    <table id="service_datatable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 8%;">N°</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th style="width: 5%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($services) && sizeof($services) > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($services as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->upload_file }}</td>
                                        <td class="align-middle text-center">
                                            <a href="#"><span id="btn{{ $item->id }}" class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#serviceEdit{{ $item->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier"></span></a>
                                            <a href="#"><span class="fa fa-trash-alt text-danger" title="Supprimer"></span></a>
                                        </td>
                                    </tr>
                                    @include('admin.pages.modals.edit.service_edit')
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 8%;">N°</th>
                                <th>Rechercher un titre</th>
                                <th>Rechercher une description</th>
                                <th>Rechercher une image</th>
                                <th class="action"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .action {
            display: none;
        }

    </style>

    <script>
        $(document).ready(function() {
            $('#id_description').summernote({
                placeholder: "Saisissez la description du service dans cette zone.",
                height: 150
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#service_datatable").DataTable({
                responsive: true
            });
        });
    </script>

    <script>
        // DataTables with Column Search by Text Inputs
        document.addEventListener("DOMContentLoaded", function() {
            // Setup - add a text input to each footer cell
            $('#service_datatable tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
            });
            // DataTables
            var table = $('#service_datatable').DataTable();
            // Apply the search
            table.columns().every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change clear', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
@endsection
