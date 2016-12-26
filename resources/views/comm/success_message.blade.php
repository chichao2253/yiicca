<script>
    @if(Session::get('success'))
        alert("{{Session::get('success')}}");
    @endif
</script>