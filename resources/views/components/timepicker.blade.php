@props(['id', 'error'])
<input {{ $attributes }} onchange="this.dispatchEvent(new InputEvent('input'))" type="text" class="@error($error) is-invalid @enderror form-control form-control-sm datetimepicker-input" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}"/>

@push('scripts')
<script type="text/javascript">
  $(function () {
      $('#{{ $id }}').datetimepicker({
        'format' : 'LT'
      });
  });
</script>
@endpush