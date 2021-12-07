
  @if ($message = Session::get('sukses'))
    <div class="alert alert-success">
      {{ $message }}
    </div>
  @endif
        
  @if ($message = Session::get('gagal'))
    <div class="alert alert-danger">
      {{ $message }}
    </div>
  @endif
        
  @if ($message = Session::get('peringatan'))
    <div class="alert alert-warning">
      {{ $message }}
    </div>
  @endif


<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 3000);
</script>