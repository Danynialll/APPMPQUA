<div class="modal fade custom-modal" id="viewModal" tabindex="-1" aria-labelledby="viewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Preserved Header -->
            <div class="modal-header bg-gradient-primary text-dark">
                <h5 class="modal-title" id="viewLabel"><span id="modalid" hidden></span>Assessor Information</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Body with Left Photo and Right Info -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Photo -->
                        <div class="col-md-3 d-flex justify-content-center align-items-start">
                            <div class="rounded shadow-sm bg-light d-flex align-items-center justify-content-center"
                                 style="width: 100%; aspect-ratio: 1 / 1; min-height: 120px; background-color: #ec6b1b; color: white;">
                                <span id="modalPhoto" style="font-size:2rem;">photo</span>
                            </div>
                        </div>

                        <!-- Right Information -->
                        <div class="col-md-9">
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Name:</div>
                                <div class="col-10" id="modalName"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Gender:</div>
                                <div class="col-10" id="modalGender"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Telephone:</div>
                                <div class="col-10" id="modalTelephone"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Fax:</div>
                                <div class="col-10" id="modalFax"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Email:</div>
                                <div class="col-10" id="modalEmail"></div>
                            </div>
                        </div>
                    </div>

                    <div class="my-2" style="border-top: 2px solid #bbb; opacity: 0.5;"></div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Institute:</div>
                        <div class="col-md-9" id="modalInst"></div>

                        <div class="col-md-3 fw-bold">Service Address:</div>
                        <div class="col-md-9" id="modalAddress"></div>

                        <div class="col-md-3 fw-bold">Expertise:</div>
                        <div class="col-md-9" id="modalExpertise"></div>

                        <div class="col-md-3 fw-bold">Retirement Date:</div>
                        <div class="col-md-9" id="modalRetirement"></div>

                        <div class="col-md-3 fw-bold">NEC Field:</div>
                        <div class="col-md-9" id="modalNEC"></div>

                        <div class="col-md-3 fw-bold">CV:</div>
                        <div class="col-md-9" id="modalCV"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
