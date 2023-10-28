@extends('admin.layouts.app')

@section('alert')
<div class="container">
  @if(session('success'))
    <div class="alert alert-important alert-success alert-dismissible my-2" role="alert">
      <div class="d-flex">
        <div>
          <!-- SVG icon from http://tabler-icons.io/i/alert-triangle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="9"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>
        </div>
        <div>
          {{ session('success') }}
        </div>
      </div>
      <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
  @endif

  @if(session('danger'))
    <div class="alert alert-important alert-danger alert-dismissible my-2" role="alert">
      <div class="d-flex">
        <div>
          <!-- SVG icon from http://tabler-icons.io/i/alert-triangle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="9"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>
        </div>
        <div>
          {{ session('danger') }}
        </div>
      </div>
      <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
  @endif

  @error('name')
    <div class="alert alert-important alert-warning alert-dismissible my-2" role="alert">
      <div class="d-flex">
        <div>
          <!-- SVG icon from http://tabler-icons.io/i/alert-triangle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <circle cx="12" cy="12" r="9"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>
        </div>
        <div>
          {{ $message }}
        </div>
      </div>
      <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
  @enderror
</div>
@endsection

@section('page-header')
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h2 class="page-title text-uppercase">
          {{ __('Roles') }}
          <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-create">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="12" y1="5" x2="12" y2="19" />
              <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            {{ __('CREATE') }}
          </button>
        </h2>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-body')
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">{{ __('Roles') }}</h4>
              </div>
              <div class="card-body">
                  <div id="table-roles" class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th><button class="table-sort" data-sort="sort-number">#</button></th>
                            <th><button class="table-sort" data-sort="sort-name">{{ __('name') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-created">{{ __('created_at') }}</button></th>
                            <th><button class="table-sort" data-sort="sort-updated">{{ __('updated_at') }}</button></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody class="table-tbody">
                          @foreach ($roles as $key => $role)
                            <tr>
                              <td class="sort-number">{{ $key+1 }}</td>
                              <td class="sort-name">{{ $role->name }}</td>
                              <td class="sort-created" data-date="{{ strtotime($role->created_at) }}">{{ $role->created_at }}</td>
                              <td class="sort-updated" data-date="{{ strtotime($role->updated_at) }}">{{ $role->updated_at }}</td>
                              <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit_{{ $role->id }}">{{ __('Edit') }}</a>
                              </td>
                              <td>
                                <a href="/admin/roles/{{ $role->id }}/delete">{{ __('Delete') }}</a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
              </div>
              <div class="card-footer"></div>
          </div>
        </div>
        </div>
    </div>
</div>

{{-- Modal create --}}
<div class="modal modal-blur fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Create role') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ Route('admin.roles.create') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">{{ __('Name') }}</label>
            <input type="text" class="form-control" name="name" placeholder="{{ __('Enter role name') }}...">
          </div>
        </div>
        <div class="modal-body">
          <h3>{{ __('Permissions') }}</h3>
          <div class="datagrid">
            <div class="datagrid-item">
              <div class="datagrid-title">{{ __('Roles') }}</div>
              <div class="datagrid-content">
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Create role" value="Create role" type="checkbox">
                  <span class="form-check-label">{{ __('Create role') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Edit role" type="checkbox">
                  <span class="form-check-label">{{ __('Edit role') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Delete role" type="checkbox">
                  <span class="form-check-label">{{ __('Delete role') }}</span>
                </label>
              </div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">{{ __('Receipt') }}</div>
              <div class="datagrid-content">
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Create receipt" type="checkbox">
                  <span class="form-check-label">{{ __('Create receipt') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Update receipt" type="checkbox">
                  <span class="form-check-label">{{ __('Update receipt') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Delete receipt" type="checkbox">
                  <span class="form-check-label">{{ __('Delete receipt') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Transfer receipt" type="checkbox">
                  <span class="form-check-label">{{ __('Transfer receipt') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Issue an invoice" type="checkbox">
                  <span class="form-check-label">{{ __('Issue an invoice') }}</span>
                </label>
              </div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">{{ __('Services') }}</div>
              <div class="datagrid-content">
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Create service" type="checkbox">
                  <span class="form-check-label">{{ __('Create service') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Update service" type="checkbox">
                  <span class="form-check-label">{{ __('Update service') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Delete service" type="checkbox">
                  <span class="form-check-label">{{ __('Delete service') }}</span>
                </label>
              </div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">{{ __('Report') }}</div>
              <div class="datagrid-content">
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Receipt statistics" type="checkbox">
                  <span class="form-check-label">{{ __('Receipt statistics') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Sale statistics" type="checkbox">
                  <span class="form-check-label">{{ __('Sale statistics ') }}</span>
                </label>
              </div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">{{ __('Employees') }}</div>
              <div class="datagrid-content">
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Create employee" type="checkbox">
                  <span class="form-check-label">{{ __('Create employee') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Update employee" type="checkbox">
                  <span class="form-check-label">{{ __('Update employee') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Authorization" type="checkbox">
                  <span class="form-check-label">{{ __('Authorization') }}</span>
                </label>
              </div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">{{ __('Customers') }}</div>
              <div class="datagrid-content">
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Booking" type="checkbox">
                  <span class="form-check-label">{{ __('Booking') }}</span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="Update profile" type="checkbox">
                  <span class="form-check-label">{{ __('Update profile') }}</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>



@foreach($roles as $role)
{{-- Modal edit --}}
<div class="modal modal-blur fade" id="modal-edit_{{ $role->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $role->name }} <div class="vr mx-2"></div> Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/admin/roles/{{ $role->id }}/update" method="POST">
        @csrf
        <div class="modal-body">
          <div class="datagrid">
            <div class="datagrid-item">
              <div class="datagrid-title">{{ __('Permissions') }}</div>
              <div class="datagrid-content">
                @foreach($permissions as $permission)
                <label class="form-check">
                  <input class="form-check-input" name="permissions[]" value="{{ $permission->name }}" type="checkbox"
                    @foreach ($role->permissions as $rolePermission)
                      @if($permission->name == $rolePermission->name)
                        checked
                      @endif    
                    @endforeach
                  >
                  <span class="form-check-label">{{ __($permission->name) }}</span>
                </label>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection

@section('Libs')
<script src="{{ asset('assets/admin/dist/libs/list.js/dist/list.js?1684106062') }}" defer></script>
@endsection

@section('js')
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const list = new List('table-roles', {
      sortClass: 'table-sort',
      listClass: 'table-tbody',
      valueNames: [ 'sort-number', 'sort-name', { attr: 'data-date', name: 'sort-date' }]
    });
  })  
</script>
@endsection




{{-- Modal edit --}}
{{-- <div class="modal modal-blur fade" id="modal-edit_{{ $role->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $role->name }} <div class="vr mx-2"></div> Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="datagrid">
          <div class="datagrid-item">
            <div class="datagrid-title">{{ __('Roles') }}</div>
            <div class="datagrid-content">
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Create role" type="checkbox"

                >
                <span class="form-check-label">{{ __('Create role') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Edit role" type="checkbox">
                <span class="form-check-label">{{ __('Edit role') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Delete role" type="checkbox">
                <span class="form-check-label">{{ __('Delete role') }}</span>
              </label>
            </div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">{{ __('Receipt') }}</div>
            <div class="datagrid-content">
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Create receipt" type="checkbox">
                <span class="form-check-label">{{ __('Create receipt') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Update receipt" type="checkbox">
                <span class="form-check-label">{{ __('Update receipt') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Delete receipt" type="checkbox">
                <span class="form-check-label">{{ __('Delete receipt') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Transfer receipt" type="checkbox">
                <span class="form-check-label">{{ __('Transfer receipt') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Issue an invoice" type="checkbox">
                <span class="form-check-label">{{ __('Issue an invoice') }}</span>
              </label>
            </div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">{{ __('Services') }}</div>
            <div class="datagrid-content">
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Create service" type="checkbox">
                <span class="form-check-label">{{ __('Create service') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Update service" type="checkbox">
                <span class="form-check-label">{{ __('Update service') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Delete service" type="checkbox">
                <span class="form-check-label">{{ __('Delete service') }}</span>
              </label>
            </div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">{{ __('Report') }}</div>
            <div class="datagrid-content">
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Receipt statistics" type="checkbox">
                <span class="form-check-label">{{ __('Receipt statistics') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Sale statistics" type="checkbox">
                <span class="form-check-label">{{ __('Sale statistics ') }}</span>
              </label>
            </div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">{{ __('Employees') }}</div>
            <div class="datagrid-content">
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Create employee" type="checkbox">
                <span class="form-check-label">{{ __('Create employee') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Update employee" type="checkbox">
                <span class="form-check-label">{{ __('Update employee') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Authorization" type="checkbox">
                <span class="form-check-label">{{ __('Authorization') }}</span>
              </label>
            </div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">{{ __('Customers') }}</div>
            <div class="datagrid-content">
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Booking" type="checkbox">
                <span class="form-check-label">{{ __('Booking') }}</span>
              </label>
              <label class="form-check">
                <input class="form-check-input" name="permissions[]" value="Update profile" type="checkbox">
                <span class="form-check-label">{{ __('Update profile') }}</span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
