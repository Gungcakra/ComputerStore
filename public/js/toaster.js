   @if(Session::has('addproduct'))

    toastr.success('{{ Session::get('addproduct') }}');
    @endif