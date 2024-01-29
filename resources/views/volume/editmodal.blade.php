<div class="modal fade" id="showEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <ul id="update_msgList"></ul>

                    <input type="hidden" id="volume_id" />

                    <div class="mb-3">
                        <label for="" >Description:</label>
                        <input type="text" id="description" class="form-control description"  >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                <button type="button" id="update" class="btn btn-primary update">valider</button>
            </div>
        </div>
    </div>
</div>

<!--end add modal-->

<!-- Start Create Project Modal -->
<div class="modal fade zoomIn" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="createProjectModalLabel">Create Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" class="needs-validation createProject-form" novalidate>
                    <div class="mb-4">
                        <label for="projectname-input" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="projectname-input" autocomplete="off" placeholder="Enter project name" required>
                        <div class="invalid-feedback">Please enter a project name</div>
                        <input type="hidden" class="form-control" id="projectid-input" value="" placeholder="Enter project name">
                    </div>
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="addNewProject">Add Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal-dialog -->
</div>
<!-- End Create Project Modal -->

<!-- Modal -->
<div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="createTaskLabel">Create Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="task-error-msg" class="alert alert-danger py-2"></div>
                <form autocomplete="off" action="#" id="creattask-form">
                    <input type="hidden" id="taskid-input" class="form-control">
                    <div class="mb-3">
                        <label for="task-title-input" class="form-label">Task Title</label>
                        <input type="text" id="task-title-input" class="form-control" placeholder="Enter task title">
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="task-assign-input" class="form-label">Assigned To</label>

                        <div class="avatar-group justify-content-center" id="assignee-member"></div>
                        <div class="select-element">
                            <button class="btn btn-light w-100 d-flex justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <span>Assigned To<b id="total-assignee" class="mx-1">0</b>Members</span> <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu w-100">
                                <div data-simplebar style="max-height: 141px">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">James Forbes</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">John Robles</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Mary Gant</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Curtis Saenz</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Virgie Price</div>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Anthony Mills</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Marian Angel</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Johnnie Walton</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Donna Weston</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Diego Norris</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-lg-6">
                            <label for="task-status" class="form-label">Status</label>
                            <select class="form-control" data-choices data-choices-search-false id="task-status-input">
                                <option value="">Status</option>
                                <option value="New" selected>New</option>
                                <option value="Inprogress">Inprogress</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="priority-field" class="form-label">Priority</label>
                            <select class="form-control" data-choices data-choices-search-false id="priority-field">
                                <option value="">Priority</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="mb-4">
                        <label for="task-duedate-input" class="form-label">Due Date:</label>
                        <input type="date" id="task-duedate-input" class="form-control" placeholder="Due date">
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="addNewTodo">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end create taks-->
