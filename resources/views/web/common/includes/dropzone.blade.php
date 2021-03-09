<script type="text/javascript">
	var CVs = [];
	Dropzone.autoDiscover = false; // This is optional in this case
	var drop = new Dropzone('#fileCV', {
	  maxFiles: 1,
	  maxFilesize: 5, // MB
	  createImageThumbnails: true,
	  addRemoveLinks: true,
	  acceptedFiles: "application/pdf, .doc",
	  url: '{{ route('image.upload',['todo' => 'upload']) }}',
	  headers: {
	    'X-CSRF-TOKEN': $('[name="_token"]').val()
	  },
	  init: function() {
	      this.on("sending", function(file, xhr, formData) {
	        formData.append("identity", 'cv');
	        formData.append("type", 'cv');
	        formData.append("folder_name", '{{$cv_folder}}');
	      });
	      this.on("success",function(file, response){
	      	CVs.push(response)
	      	$('form input[name=cvs]').val(CVs);
	      });
	    }
	});
	drop.on('removedfile', function(file) {
	  var id = file.id;
	  if (typeof file.xhr != 'undefined') {
	      id = file.xhr.response;
	  }
	  $.ajax({
	      type:'POST',
	      url: '{{ route('image.upload',['todo' => 'delete']) }}',
	      headers: {
	        'X-CSRF-TOKEN': $('[name="_token"]').val()
	      },
	      data:{todo:'delete', id:id},
	      success:function(data) {
	      	array = CVs.filter(function(e) {return e != data })
	      	CVs = array;
	      	$('form input[name=cvs]').val(CVs);
	      }
	  });
	});
</script>