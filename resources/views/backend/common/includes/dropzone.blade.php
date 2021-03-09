<script type="text/javascript">
	var imageIds = [];
	Dropzone.autoDiscover = false; // This is optional in this case
	var drop = new Dropzone('#fileThumb', {
	  maxFiles: 1,
	  maxFilesize: 5, // MB
	  createImageThumbnails: true,
	  addRemoveLinks: true,
	  acceptedFiles: ".jpg, .jpeg, .png",
	  url: '{{ route('image.upload',['todo' => 'upload']) }}',
	  headers: {
	    'X-CSRF-TOKEN': $('[name="_token"]').val()
	  },
	  init: function() {
	      this.on("sending", function(file, xhr, formData) {
	        formData.append("identity", 'thumb');
	        formData.append("folder_name", '{{$file_folder}}');
	        formData.append("product_image", '{{!empty($product_image) ? 'product' : ''}}');
	      });
	      this.on("success",function(file, response){
	      	imageIds.push(response)
	      	$('form input[name=images]').val(imageIds);
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
	      	array = imageIds.filter(function(e) {return e != data })
	      	imageIds = array;
	      	$('form input[name=images]').val(imageIds);
	      }
	  });
	});
</script>