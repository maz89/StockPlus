<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-info-subtle p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="id-field" />
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute  bottom-0 end-0">
                                        <label for="customer-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs cursor-pointer">
                                                <div class="avatar-title bg-light border rounded-circle text-muted">
                                                    <i class="ri-image-fill"></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="customer-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="avatar-lg p-1">
                                        <div class="avatar-title bg-light rounded-circle">
                                            <img src="assets/images/users/user-dummy-img.jpg" id="customer-img" class="avatar-md rounded-circle object-fit-cover" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="name-field" class="form-label">Name</label>
                                <input type="text" id="customername-field" class="form-control" placeholder="Enter name" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="company_name-field" class="form-label">Company Name</label>
                                <input type="text" id="company_name-field" class="form-control" placeholder="Enter company name" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="designation-field" class="form-label">Designation</label>
                                <input type="text" id="designation-field" class="form-control" placeholder="Enter Designation" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="email_id-field" class="form-label">Email ID</label>
                                <input type="text" id="email_id-field" class="form-control" placeholder="Enter email" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="phone-field" class="form-label">Phone</label>
                                <input type="text" id="phone-field" class="form-control" placeholder="Enter phone no" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="lead_score-field" class="form-label">Lead Score</label>
                                <input type="text" id="lead_score-field" class="form-control" placeholder="Enter value" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="taginput-choices" class="form-label font-size-13 text-muted">Tags</label>
                                <select class="form-control" name="taginput-choices" id="taginput-choices" multiple>
                                    <option value="Lead">Lead</option>
                                    <option value="Partner">Partner</option>
                                    <option value="Exiting">Exiting</option>
                                    <option value="Long-term">Long-term</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add Contact</button>
                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end add modal-->
