<div class="modal fade" id="serviceEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="serviceModalForm" action="{{ route('admin_service.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title">Modification d'un service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="id_title" class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="id_title" class="form-control @error('title') is-invalid @enderror" value="{{ $item->title }}" placeholder="Saisissez le titre du service">
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
                                <label for="id_file_name" class="form-label">Donner un autre nom à l'image <span class="text-danger">*</span></label>
                                <input type="text" name="file_name" id="id_file_name" class="form-control @error('file_name') is-invalid @enderror" value="{{ $item->file_name }}" placeholder="Saisissez le titre du service">
                                @error('file_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-group">
                                <label for="id_description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea id="id_description" name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{!! old('description') ?? $item->description !!}</textarea>
                                @error('description')
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-outline-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>