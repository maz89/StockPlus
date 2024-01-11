<div class="modal fade" id="add_type" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="myModalLabel">Ajouter type de produit </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
            </div>
            <form action="#">
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <input type="" id="type_id" />

                    <div class="mb-3" >
                        <label for="name" class="form-label">libellé</label>
                        <input type="text" id="name" class="form-control name" placeholder="Entrer le libellé"  />
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success add_type" id="add_type">
                            <i class="ri-save-line align-bottom me-1 "></i> Save
                        </button>
                        <button type="button" class="btn btn-success update_type" id="update_type"><i class="ri-save-line align-bottom me-1"></i>Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
