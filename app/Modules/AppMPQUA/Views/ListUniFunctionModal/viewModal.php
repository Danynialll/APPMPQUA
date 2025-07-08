
<div class="modal fade custom-modal" id="viewModal" tabindex="-1" aria-labelledby="viewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Preserved Header -->
            <div class="modal-header bg-gradient-primary text-dark">
                <h5 class="modal-title" id="viewLabel"><span id="modalid" hidden></span>Assessor Information</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-toggle="tooltip" title="Close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Body with Left Photo and Right Info -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Photo -->
                        <div class="col-md-3 d-flex justify-content-center align-items-start">
                            <div class="rounded shadow-sm bg-light d-flex align-items-center justify-content-center"
                                 style="width: 100%; aspect-ratio: 1 / 1; min-height: 120px; background-color: #ec6b1b; color: white;">
                                <span id="modalUniPhoto" style="font-size:2rem;">photo</span>
                            </div>
                        </div>

                        <!-- Right Information -->
                        <div class="col-md-9">
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Name:</div>
                                <div class="col-10" id="modalUniName"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Gender:</div>
                                <div class="col-10" id="modalUniGender"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Telephone:</div>
                                <div class="col-10" id="modalUniTelephone"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Fax:</div>
                                <div class="col-10" id="modalUniFax"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2 fw-bold">Email:</div>
                                <div class="col-10" id="modalUniEmail"></div>
                            </div>
                        </div>
                    </div>

                    <div class="my-2" style="border-top: 2px solid #bbb; opacity: 0.5;"></div>

                    <div class="row mb-2">
                        <div class="col-md-3 fw-bold">Service Address:</div>
                        <div class="col-md-9" id="modalUniAddress"></div>

                        <div class="col-md-3 fw-bold">Expertise:</div>
                        <div class="col-md-9" id="modalUniExpertise"></div>

                        <div class="col-md-3 fw-bold">Retirement Date:</div>
                        <div class="col-md-9" id="modalUniRetirement"></div>

                        <div class="col-md-3 fw-bold">NEC Field:</div>
                        <div class="col-md-9" id="modalUniNEC"></div>

                        <div class="col-md-3 fw-bold">CV:</div>
                        <div class="col-md-9" id="modalUniCV"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span data-bs-toggle="tooltip" title="Edit Assessor Details">
                    <button type="button" class="btn btn-warning btn-edit-details text-white"
                        id="openEditModalBtn"
                        data-asr-id=""
                        data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editAssessorModal">
                        <i class="fas fa-pencil"></i>&nbsp; Edit
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>


<!-- <script>
    jQuery(document).ready(function($) {
        $(function () {
            // Add title attributes for tooltips (buttons)
            $('.btn-edit-details').attr('title', 'Edit this assessor');

            // Initialize Bootstrap tooltip
            $('[title]').tooltip({container: 'body', trigger: 'hover'});
        });
    });
</script> -->
