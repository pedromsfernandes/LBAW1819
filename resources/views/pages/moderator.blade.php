@extends('layouts.backoffice')

@section('script')
    <script src="{{asset('js/moderator.js')}}"></script>
@endsection

@section('content')
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    You have a new report
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <ul class="nav nav-tabs mb-3" id="tasks" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users"
        aria-selected="true">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="reports-tab" data-toggle="tab" href="#reports" role="tab" aria-controls="reports"
        aria-selected="false">Reports</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
        aria-selected="false">Reviews</a>
    </li>
  </ul>

  <div class="container">
    <div class="tab-content" id="tasksContent">
      <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search-addon"><i class="fas fa-search"></i></span>
          </div>
          <input class="form-control" id="search-user" type="text" placeholder="Search..." />
        </div>
        <div class="table-responsive">
          <table id="products" class="table table-striped table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">
                  <a href="#">Username <i class="fas fa-sort"></i></a>
                </th>
                <th scope="col">
                  <a href="#">Status <i class="fas fa-sort"></i></a>
                </th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="usersTable">
              @each('partials.user', $clients, 'user')
            </tbody>
          </table>
        </div>
        <nav aria-label="table navigation">
          {{ $clients->links("pagination::bootstrap-4") }}
        </nav>
      </div>

      <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search-addon"><i class="fas fa-search"></i></span>
          </div>
          <input class="form-control" id="search-report" type="text" placeholder="Search..." />
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">
                  <a href="#">Review <i class="fas fa-sort"></i></a>
                </th>
                <th scope="col">
                  <a href="#">OP <i class="fas fa-sort"></i></a>
                </th>
                <th scope="col">
                  <a href="#">Status <i class="fas fa-sort"></i></a>
                </th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="reportsTable">
              {{-- @each('partials.report', $reports, 'report') --}}
            </tbody>
          </table>
        </div>

        <nav aria-label="table navigation">
          {{-- {{ $reports->links("pagination::bootstrap-4") }} --}}
        </nav>
      </div>
      {{-- TODO: varias paginations, mesmo link --}}
      <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search-addon"><i class="fas fa-search"></i></span>
          </div>
          <input class="form-control" id="search-review" type="text" placeholder="Search..." />
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="thead-light">
              <tr>
                <th scope="col">
                  <a href="#">Product <i class="fas fa-sort"></i></a>
                </th>
                <th scope="col">
                  <a href="#">OP <i class="fas fa-sort"></i></a>
                </th>
                <th scope="col">
                  <a href="#">Rating <i class="fas fa-sort"></i></a>
                </th>
              </tr>
            </thead>
            <tbody id="reviewsTable">
              @each('partials.reviewInfo', $reviews, 'review')
            </tbody>
          </table>
        </div>
        <nav aria-label="table navigation">
          {{ $reviews->links("pagination::bootstrap-4") }}
        </nav>
      </div>
    </div>
  </div>

  <!-- Modals -->
  <div class="modal fade" id="confirmDisable" tabindex="-1" role="dialog" aria-labelledby="confirmDisableLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDisableLabel">Ban user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="confirmEnable" tabindex="-1" role="dialog" aria-labelledby="confirmEnableLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmEnableLabel">Unban user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="disableReview" tabindex="-1" role="dialog" aria-labelledby="disableReviewLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="disableReviewLabel">Disable review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="enableReview" tabindex="-1" role="dialog" aria-labelledby="enableReviewLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="enableReviewLabel">Enable review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="userActionsModal" tabindex="-1" role="dialog" aria-labelledby="userActionsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userActionsModalLabel">Update status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          Are you sure?
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-danger"><i class="fas fa-minus-circle"></i> Ban</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="reportActionsModal" tabindex="-1" role="dialog" aria-labelledby="reportActionsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reportActionsModalLabel">Update status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          Are you sure?
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-danger"><i class="fas fa-minus-circle"></i> Disable</button>
        </div>
      </div>
    </div>
  </div>
@endsection