<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <livewire:styles />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.partials.navbar')

  @include('layouts.partials.sidebar')

  <div class="content-wrapper">
    {{ $slot }}
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  @include('layouts.partials.footer')
</div>

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
  document.addEventListener('show-form', event => {
    $('#form').modal('show');
  });
  document.addEventListener('hide-form', event => {
    $('#form').modal('hide');
    toastr.success(event.detail.message, 'Success!');
  }); 
  document.addEventListener('show-delete-modal', event => {
    $('#confirmationModal').modal('show');
  });
  document.addEventListener('hide-delete-modal', event => {
    $('#confirmationModal').modal('hide');
    toastr.success(event.detail.message, 'Success!');
  });
</script>
<script>
  $(function(){
    $('#appointmentDate').datetimepicker({
        format: 'L'
    });
    $('#appointmentTime').datetimepicker({
        format: 'LT'
    });
    $('#appointmentDate').on('change.datetimepicker', function(e){
        let date = $(this).data('appointmentdate');
        eval(date).set('state.date', $('#appointDateInput').val());
    });
    $('#appointmentTime').on('change.datetimepicker', function(e){
        let time = $(this).data('appointmenttime');
        eval(time).set('state.time', $('#appointTimeInput').val());
    });
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
  });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script>
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
</script>
<livewire:scripts />
</body>
</html>