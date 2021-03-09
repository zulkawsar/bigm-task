<!-- Vendor js -->
<script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

<!-- Plugins js -->
<script src="{{asset('backend/assets/libs/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('backend/assets/js/cropper.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/switchery/switchery.min.js')}}"></script>

<script type="text/javascript">
  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

  elems.forEach(function(html) {
    // this = html;
    var switchery = new Switchery(html,{ size: $(html).attr('data-size') });
  });
</script>
<!-- App js -->
<script src="{{asset('backend/assets/js/app.min.js')}}"></script>
@toastr_js
@toastr_render
<script type="text/javascript">
   $(function () {
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr["error"]("{{ $error }}");
        @endforeach
    @endif

   });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
    function alertFunction(action,id){
        Swal.fire({
            title: "Are you sure to "+action+"?",
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        })
        .then((willDelete) => {
          if (willDelete.value) {
            Swal.fire(
              'Done!',
              'Operation successful!',
              'success'
            )
            setTimeout(function(){
                document.getElementById(action+id).submit();
            },1000)

          }
        });
    }
</script>
@yield('page-js')