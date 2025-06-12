<div class="modal fade custom-modal" id="viewMPQModal" tabindex="-1" aria-labelledby="viewMPQLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewMPQLabel"></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Institute:</div>
                        <div class="col-md-8" id="modalMPQInstitute"></div>
                    </div>
                    <hr class="my-2">
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Email:</div>
                        <div class="col-md-8" id="modalMPQEmail"></div>
                    </div>
                    <hr class="my-2">
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Telephone:</div>
                        <div class="col-md-8" id="modalMPQTelephone"></div>
                    </div>
                    <hr class="my-2">
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Fax:</div>
                        <div class="col-md-8" id="modalMPQFax"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-edit-details"
                    id="openEditModalBtn"
                    data-mpq-id=""
                    data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editMPQModal">
                    <i class="fas fa-pencil"></i>&nbsp; Edit
                </button>
            </div>
        </div>
    </div>
</div>

