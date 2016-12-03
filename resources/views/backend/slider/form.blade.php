@extends("backend.layout.backend")

@section("title","Slider")

@section("content")
<div class="panel panel-featured panel-featured-primary">
	<div class="panel-heading">
		<h3 class="panel-title">@yield("title")</h3>
	</div>
	
	<div class="panel-body">
		<form class="form-horizontal" action="{{route('dashboard.sliders.store')}}" method="POST">
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="title" id="title" required placeholder="Title" value="{{ ($action === 'add') ? old('title') : ((old('title')) ? old('title') : $slider->title) }}">
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Foto</label>
			<div class="col-sm-10">
				<input type="file" name="input_foto" class="upload" accept="image/*" />
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label">Preview</label>
			<div class="col-sm-10">
				@if($action === 'edit')
				<img id="previewHolder" width="60%" src="{{ asset('slider/'.$slider->image) }}"></img>
				@else
				<img id="previewHolder" width="60%"></img>
				<div id='pember' style='margin-left: -15px;'>Pilih foto terlebih dahulu</div>
				@endif
			</div>
		</div>
		<input type="hidden" name="image" id="image">
		<input type="hidden" name="action" value="{{$action}}">
		@if($action === 'edit')
		<input type="hidden" name="id" value="{{$slider->id}}">
		@endif
		{!! csrf_field() !!}
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
		</form>
	</div>
</div>

@push("script")
    <script type="text/javascript">var foto="";
		function readURL(input) {
		  if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      foto 	= e.target.result;
		      var ext = foto.split(";", 1);
		      var extt = ext.toString();
		      var rules = ["data:image/jpeg",'data:image/png','data:image/gif','data:image/bmp','data:image/x-windows-bmp'];
		      if($.inArray(extt, rules) == -1){
		      	fn.alert("File tidak didukung !");
		      	$("input.upload").val("");
		      	$('#previewHolder').attr('src', "");
		      	$(".submit").attr("disabled", "disabled");
		      }
		      else{
		      	$("#image").val(e.target.result);
		      	$('#previewHolder').attr('src', e.target.result);
		      	$(".submit").removeAttr("disabled");
		      }
		      $('#pember').html('');
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}

		$("input.upload").change(function() {
		  if($(this).val()){
		    readURL(this);
		  }
		  else{
		    setTimeout(function(){
		        $('#previewHolder').attr('src', "");
		        $('#pember').html('');
		    });
		  }
		});
    </script>
@endpush

@endsection
