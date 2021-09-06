<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Appointments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Apoointments</li>
                        <li class="breadcrumb-item active">Create</li>
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
                        <form wire:submit.prevent="createAppointment" autocomplete="off">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <small for="">Client</small>
                                                <select wire:model.defer="state.client_id" class="@error('client_id') is-invalid @enderror custom-select custom-select-sm rounded-0" id="exampleSelectRounded0">
                                                    <option value="">Select Client</option>
                                                    @forelse ($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                    @empty
                                                        <option>empty.</option>
                                                    @endforelse                                                    
                                                </select>
                                                @error('client_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <small class="">Appointment Date</small>
                                                <div class="input-group">
                                                    <x-datepicker id="appointmentDate" wire:model.defer="state.date" :error="'date'"/>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    @error('date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <small class="">Appointment Start Time</small>
                                                <div class="input-group">
                                                    <x-timepicker id="appointmentTime" wire:model.defer="state.time" :error="'time'"/>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                                    </div>
                                                    @error('time')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <small class="">Status</small>
                                                <div class="input-group">
                                                    <select wire:model.defer="state.status" class="@error('status') is-invalid @enderror custom-select custom-select-sm rounded-0" id="">
                                                        <option value="">Select Status</option>
                                                        <option value="SCHEDULED">Scheduled</option>
                                                        <option value="CLOSED">Closed</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" wire:ignore>
                                                <small for="">Note</small>
                                                <textarea id="note" wire:model.defer="state.note" data-note="@this" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i> reset</button>
                                <button id="submit" type="submit" class="btn btn-sm btn-success"><i class="fas fa-save mr-1"></i> submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script>
    $(function(){
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };   
                
        ClassicEditor
        .create( document.querySelector( '#note' ) )
        .then( editor => {
            document.querySelector('#submit').addEventListener('click', ()=> {
            let note = $('#note').data('note');
            eval(note).set('state.note', editor.getData());
            });
        })
        .catch( error => {
            console.error( error );
        });
    });
</script>
@endpush