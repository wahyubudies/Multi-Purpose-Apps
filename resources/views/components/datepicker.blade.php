@props(['id'])
<input {{ $attributes }} onchange="this.dispatchEvent(new InputEvent('input'))" type="text" class="form-control form-control-sm datetimepicker-input" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}"/>

@push('scripts')
<script type="text/javascript">
  $(function () {
      $('#{{ $id }}').datetimepicker({
        'format' : 'L'
      });
  });
</script>
@endpush