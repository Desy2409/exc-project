<div class="modal fade" id="drop_messageEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Consultation d'un nouveau message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if ($item->person_type == 'Personne physique')
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="id_last_name" class="form-label">Nom</label>
                                <input type="text" name="last_name" id="id_last_name" class="form-control" value="{{ $item->last_name }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label for="id_first_name" class="form-label">Prénom(s)</label>
                                <input type="text" name="first_name" id="id_first_name" class="form-control" value="{{ $item->first_name }}" disabled>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label for="id_social_reason" class="form-label">Raison sociale</label>
                                <input type="text" name="social_reason" id="id_social_reason" class="form-control" value="{{ $item->social_reason }}" disabled>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <label for="id_email" class="form-label">Email</label>
                            <input type="text" name="email" id="id_email" class="form-control" value="{{ $item->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="form-group">
                            <label for="id_phone_number" class="form-label">N° Téléphone</label>
                            <input type="text" name="phone_number" id="id_phone_number" class="form-control" value="{{ $item->phone_number }}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="id_message" class="form-label">Message</label>
                            <textarea id="id_message" name="message" rows="5" disabled class="form-control">{{ $item->message }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Supprimer</button>
            </div>
        </div>
    </div>
</div>
