<div>

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <button wire:click.prevent="addNewUser" class="badge bg-primary border-0">add new user</button>
            </div>
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th style="width: 60px">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Update software</td>
                    <td>wahyubudies1@gmail.com</td>
                    <td class="d-flex align-items-center">
                      <a href="#" class="badge bg-warning mr-2"><i class="fas fa-edit"></i></a>
                      <a href="#" class="badge bg-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="form" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content shadow-none">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add new user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <small for="name">Name</small>
              <input type="text" class="form-control form-control-sm mt-1" id="name" placeholder="Name.">
            </div>
            <div class="form-group">
              <small for="email">Email</small>
              <input type="text" class="form-control form-control-sm mt-1" id="email" placeholder="Email.">
            </div>
            <div class="form-group">
              <small for="password">Password</small>
              <input type="password" class="form-control form-control-sm mt-1" id="password" placeholder="Password.">
            </div>
            <div class="form-group">
              <small for="confirm-password">Confirm Password</small>
              <input type="password" class="form-control form-control-sm mt-1" id="confirm-password" placeholder="Confirm Password.">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">cancel</button>
          <button type="button" class="btn btn-sm btn-primary">save</button>
        </div>
      </div>
    </div>
  </div>

</div>
