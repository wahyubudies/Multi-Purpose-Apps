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
                        <form wire:submit.prevent="createAppointment">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <small for="">Client</small>
                                                <select wire:model.defer="state.client_id" class="custom-select custom-select-sm rounded-0" id="exampleSelectRounded0">
                                                    <option value="">Select Client</option>
                                                    @forelse ($clients as $client)
                                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                    @empty
                                                        <option>empty.</option>
                                                    @endforelse                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <small for="">Date Appointments</small>
                                                <div class="input-group date" id="appointmentTime" data-target-input="nearest" data-appointmenttime="@this" wire:ignore>
                                                    <input type="text" id="appointTimeInput" class="form-control form-control-sm datetimepicker-input" data-target="#appointmentTime"/>
                                                    <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <small for="">Date</small>
                                                <div class="input-group date" wire:ignore id="appointmentDate" data-target-input="nearest" data-appointmentdate="@this">
                                                    <input id="appointDateInput" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#appointmentDate"/>
                                                    <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
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
