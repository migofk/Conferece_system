@extends('layouts.frontend.layout')
@section('body')
  <!-- BOF Main Content -->
  <div role="main" class="main">




  </div>
  <!-- EOF Main Content -->
@endsection
@section('scripts')
  <link rel="stylesheet" href="{{asset('public/assets/plugins/datetimepicker/jquery.datetimepicker.min.css')}}">
    <script src="{{asset('public/assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript">
$('#timeStamp,.alertX,.timepicker').datetimepicker({
  ampm: true, // FOR AM/PM FORMAT
  format:'Y-m-d H:i:s',
  validateOnBlur: false,
  step:15
});
</script>
@endsection
