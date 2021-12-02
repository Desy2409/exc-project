@extends('layouts.app')
@section('page-title', 'FAQ')
@section('content-title', 'Foire Aux Questions (FAQ)')
@section('breadcrumb', 'FAQ')
@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter une nouvelle question à la FAQ</h5>
                </div>
                <hr style="margin-top: -5px">
                <div class="card-body">
                    <form id="validation-form" action="{{ route('admin_faq.store') }}" method="POST" style="margin-top: -20px;">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group error-placeholder">
                                    <label class="form-label">Question <span class="text-danger">*</span></label>
                                    <textarea id="id_question" name="question" rows="3" class="form-control @error('question') is-invalid @enderror"></textarea>
                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group error-placeholder">
                                    <label class="form-label">Réponse <span class="text-danger">*</span></label>
                                    <textarea id="id_response" name="response" rows="7" class="form-control @error('response') is-invalid @enderror"></textarea>
                                    @error('response')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                    <h5 class="card-title mb-0">Liste des questions de la FAQ</h5>
                </div>
                <hr style="margin-top: -5px">
                <div class="card-body">
                    <table id="faq_datatable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 8%;">N°</th>
                                <th>Question</th>
                                <th>Réponse</th>
                                <th style="width: 5%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($faqs) && sizeof($faqs) > 0)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($faqs as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->question }}</td>
                                        <td>{{ $item->response }}</td>
                                        <td class="align-middle text-center">
                                            <a href="#"><span id="btn{{ $item->id }}" class="fa fa-edit text-info" data-bs-toggle="modal" data-bs-target="#faqEdit{{ $item->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier"></span></a>
                                            <a href="#"><span class="fa fa-trash-alt text-danger" title="Supprimer"></span></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="faqEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <form id="faqModalForm" action="{{ route('admin_faq.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modification d'un élément de la Foire Aux Questions (FAQ)</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <div class="row">
                                                            <div class="col-lg-12 mb-3">
                                                                <div class="form-group">
                                                                    <label class="form-label">Question <span class="text-danger">*</span></label>
                                                                    <textarea id="id_question" name="question" rows="3" class="form-control @error('question') is-invalid @enderror">{!! old('question') ?? $item->question !!}</textarea>
                                                                    @error('question')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-3">
                                                                <div class="form-group error-placeholder">
                                                                    <label class="form-label">Réponse <span class="text-danger">*</span></label>
                                                                    <textarea id="id_response" name="response" rows="7" class="form-control @error('response') is-invalid @enderror">{!! old('response') ?? $item->response !!}</textarea>
                                                                    @error('response')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong class="text-danger">{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-outline-primary">Modifier</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 8%;">N°</th>
                                <th>Rechercher une question</th>
                                <th>Rechercher une réponse</th>
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

    @php
    $id = 0;
    $submit = 0;
    if (!empty(old())) {
        $submit = 1;
        $id = old('btnId');
    }
    @endphp

    <script>
        $(document).ready(function() {
            let submit = {!! $submit !!}
            let id = {!! $id !!}
            if (submit == 1) {
                $('#btn' + id).trigger('click')
            }
        })
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize validation
            $("#validation-form").validate({
                focusInvalid: false,
                rules: {
                    "question": {
                        required: true,
                        email: true
                    },
                    "response": {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    }
                    // "validation-password-confirmation": {
                    // 	required: true,
                    // 	minlength: 6,
                    // 	equalTo: "input[name=\"validation-password\"]"
                    // },
                    // "validation-required": {
                    // 	required: true
                    // },
                    // "validation-url": {
                    // 	required: true,
                    // 	url: true
                    // },
                    // "validation-select": {
                    // 	required: true
                    // },
                    // "validation-multiselect": {
                    // 	required: true,
                    // 	minlength: 2
                    // },
                    // "validation-select2": {
                    // 	required: true
                    // },
                    // "validation-select2-multi": {
                    // 	required: true,
                    // 	minlength: 2
                    // },
                    // "validation-text": {
                    // 	required: true
                    // },
                    // "validation-file": {
                    // 	required: true
                    // },
                    // "validation-radios": {
                    // 	required: true
                    // },
                    // "validation-checkbox": {
                    // 	required: true
                    // },
                    // "validation-checkbox-group-1": {
                    // 	require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                    // },
                    // "validation-checkbox-group-2": {
                    // 	require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                    // },
                    // "validation-checkbox-group-1": {
                    // 	require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                    // },
                    // "validation-checkbox-group-2": {
                    // 	require_from_group: [1, "input[name=\"validation-checkbox-group-1\"], input[name=\"validation-checkbox-group-2\"]"]
                    // }
                },
                // messages: {
                //     "question": {
                //         required: "Le champ nom est obligatoire.",
                //         maxlength: "Le champ nom ne doit pas dépasser 30 caractères."
                //     },
                //     // first_name: {
                //     //     required: "Le champ prénom(s) est obligatoire.",
                //     //     maxlength: "Le champ prénom(s) ne doit pas dépasser 100 caractères."
                //     // },
                //     // social_reason: {
                //     //     required: "Le champ raison sociale est obligatoire.",
                //     //     maxlength: "Le champ raison sociale ne doit pas dépasser 255 caractères."
                //     // },
                //     // email: {
                //     //     required: "Le champ email est obligatoire.",
                //     //     email: "Lfrefferfreferfeépasser 255 caractères."
                //     // },
                //     // phone_number: {
                //     //     required: "Le champ numéro de téléphone est obligatoire.",
                //     // },
                //     // message: {
                //     //     required: "Veuillez saisir le message à envoyer.",
                //     // },
                // },
                // Errors
                errorPlacement: function errorPlacement(error, element) {
                    var $parent = $(element).parents(".error-placeholder");
                    // Do not duplicate errors
                    if ($parent.find(".jquery-validation-error").length) {
                        return;
                    }
                    $parent.append(
                        error.addClass("jquery-validation-error small form-text invalid-feedback")
                    );
                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".error-placeholder");
                    $el.addClass("is-invalid");
                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                        $el.parent().addClass("is-invalid");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".error-placeholder").find(".is-invalid").removeClass("is-invalid");
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#faq_datatable").DataTable({
                responsive: true
            });
        });
    </script>

    <script>
        // DataTables with Column Search by Text Inputs
        document.addEventListener("DOMContentLoaded", function() {
            // Setup - add a text input to each footer cell
            $('#faq_datatable tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder=" ' + title + '" />');
            });
            // DataTables
            var table = $('#faq_datatable').DataTable();
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
