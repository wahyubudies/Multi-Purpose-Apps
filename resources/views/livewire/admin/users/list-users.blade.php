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
              <button wire:click.prevent="addNewUser" class="badge bg-primary border-0"><i class="fas fa-plus-circle mr-1"></i> add new user</button>
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
                  @forelse($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="d-flex align-items-center">
                      <a href="#" wire:click.prevent="editUser({{ $user }})" class="badge bg-warning mr-2"><i class="fas fa-edit"></i></a>
                      <a href="#" wire:click.prevent="confirmUserRemoval({{ $user->id }})" class="badge bg-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4"> No records.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Form --}}
  <div class="modal fade" id="form" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content shadow-none">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">
            @if($editModal)
              Edit new user
            @else
              Add new user
            @endif
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent="{{ $editModal ? 'updateUser' : 'createUser'}}">
          <div class="modal-body">
              <div class="form-group">
                <small for="name">Name</small>
                <input type="text" wire:model.defer="state.name" class="form-control form-control-sm mt-1 @error('name') is-invalid @enderror" id="name" placeholder="Name.">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <small for="email">Email</small>
                <input type="text" wire:model.defer="state.email" class="form-control form-control-sm mt-1 @error('email') is-invalid @enderror" id="email" placeholder="Email.">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <small for="password">Password</small>
                <input type="password" wire:model.defer="state.password" class="form-control form-control-sm mt-1 @error('password') is-invalid @enderror" id="password" placeholder="Password.">
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <small for="confirm-password">Confirm Password</small>
                <input type="password" wire:model.defer="state.password_confirmation" class="form-control form-control-sm mt-1" id="confirm-password" placeholder="Confirm Password.">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i> cancel</button>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-1"></i>
              @if($editModal)
                save changes
              @else
                save
              @endif
            </button>
          </div>
      </form>
      </div>
    </div>
  </div>

  {{-- Modal Confirmation --}}
  <div class="modal fade" id="confirmationModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content shadow-none">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Do you want to delete data user ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i> cancel</button>
          <button type="button" wire:click.prevent="deleteUser" class="btn btn-sm btn-danger"><i class="fas fa-save mr-1"></i> Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>
