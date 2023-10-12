<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <div class="row page-title">
        <div class="col-md-12">
          <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="#">Shreyu</a></li>
              <li class="breadcrumb-item"><a href="#">Apps</a></li> -->
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
          <h4 class="mb-1 mt-0">Home</h4>
        </div>
      </div>
      <div class="row" >
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Bahasa Inggris</h4>
              <p class="sub-header">
                Kelas X IPA 1
              </p>
              <button type="button" class="btn btn-danger">View</button>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Matematika</h4>
              <p class="sub-header">
                Kelas X IPA 1
              </p>
              <button type="button" class="btn btn-danger">View</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="card" style="width: 600px;">
          <div class="card-header">
            Deadline Tugas
          </div>
          <div class="card-body">
            <?php foreach ($tugas as $row): ?>
              <h5 class="card-title"><?= $row->nama_tugas ?></h5>
              <p class="card-text"><?= $row->batas_pengumpulan ?></p>
            <?php endforeach ?>
          </div>
        </div>
      </div>

      <!-- <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-6">
                  <img src="assets/images/cal.png" class="mr-4 align-self-center img-fluid " alt="cal" />
                </div> -->
                <!-- <div class="col-xl-10 col-lg-9">
                  <div class="mt-4 mt-lg-0">
                    <h5 class="mt-0 mb-1 font-weight-bold">Welcome to Your Calendar</h5>
                    <p class="text-muted mb-2">The calendar shows the events synced from all
                      your linked calendars.
                      Click on event to see or edit the details. You can create new event by
                      clicking on "Create New event" button or any cell available
                      in calendar below.</p>

                    <button class="btn btn-primary mt-2 mr-1" id="btn-new-event"><i class="uil-plus-circle"></i> Create New Event</button>
                    <button class="btn btn-white mt-2"><i class="uil-sync"></i> Link
                      Calendars</button>
                  </div>
                </div>
              </div> -->

           <!--  </div> end card body-->
          <!-- </div> end card
        </div> -->
        <!-- end col-12 -->
     <!--  </div> -->  <!-- end row -->

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div id="calendar"></div>
            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div>
        <!-- end col-12 -->
      </div> <!-- end row -->

      <!-- modals -->
      <!-- Add New Event MODAL -->
      <div class="modal fade" id="event-modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h5 class="modal-title" id="modal-title">Event</h5>
            </div>
            <div class="modal-body p-4">
              <form class="needs-validation" name="event-form" id="form-event" novalidate>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="control-label">Event Name</label>
                      <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
                      <div class="invalid-feedback">Please provide a valid event name</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label class="control-label">Category</label>
                      <select class="form-control custom-select" name="category" id="event-category" required>
                        <option value="bg-danger" selected>Danger</option>
                        <option value="bg-success">Success</option>
                        <option value="bg-primary">Primary</option>
                        <option value="bg-info">Info</option>
                        <option value="bg-dark">Dark</option>
                        <option value="bg-warning">Warning</option>
                      </select>
                      <div class="invalid-feedback">Please select a valid event category</div>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-6">
                    <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                  </div>
                  <div class="col-6 text-right">
                    <button type="button" class="btn btn-light mr-1" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                  </div>
                </div>
              </form>
            </div>
          </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
      </div>
      <!-- end modal-->
    </div> <!-- container-fluid -->

  </div> <!-- content -->
