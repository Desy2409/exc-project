@extends('layouts.app')
@section('page-title', 'Messages lus')
@section('content-title', 'Messages lus')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Messages lus</li>
@endsection
@section('page-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Liste des messages lus</h5>
            </div>
            <hr style="margin-top: -5px">
            <div class="card-body">
                <table id="old_messages_datatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 8%;">N°</th>
                            <th>Nom et Prénom(s)</th>
                            <th>Raison sociale</th>
                            <th>Contact</th>
                            <th style="width: 5%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($messages) && sizeof($messages) > 0)
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($messages as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->last_name }} {{ $item->first_name }}</td>
                                    <td>{{ $item->social_reason }}</td>
                                    <td>
                                        <u class="mb-3">Email</u> : {{ $item->email }} <br>
                                        <u class="">Téléphone</u> : {{ $item->phone_number }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="#"><span id="btn{{ $item->id }}" class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#old_messageEdit{{ $item->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier"></span></a>
                                        <a href="#"><span class="fa fa-trash-alt text-danger" title="Supprimer"></span></a>
                                    </td>
                                </tr>
                                @include('admin.pages.modals.detail.old_message_detail')
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width: 8%;">N°</th>
                            <th>Rechercher nom ou prénom(s)</th>
                            <th>Rechercher une raison sociale</th>
                            <th>Rechercher email ou n° téléphone</th>
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
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables Responsive
        $("#old_messages_datatable").DataTable({
            responsive: true
        });
    });
</script>

<script>
    // DataTables with Column Search by Text Inputs
    document.addEventListener("DOMContentLoaded", function() {
        // Setup - add a text input to each footer cell
        $('#old_messages_datatable tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
        });
        // DataTables
        var table = $('#old_messages_datatable').DataTable();
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