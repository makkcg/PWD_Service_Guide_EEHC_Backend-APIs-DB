@extends('admin.layouts.master')


@section('title')
Add service
@endsection


@section('header-content')



<section class="content-header clearfix">
 <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
 @csrf


<div class="pull-right">
  <div class="col-md-12 text-right">

    <button type="submit" class="btn btn-primary margin-r-5" ><i class="fa fa-save margin-r-5"></i> Save</button>

  </div>
</div>
</section>

@endsection


@section('content')
<section class="content" style="padding-top: 0px;">
  <div class="row">
    <div class="col-xs-12 row">


     @include('admin.services.form')



   </div>
 </div>
</form>
</section>

@endsection


@section('style')
<link rel="stylesheet" href="{{ URL::asset('/admin_style/jstree/src/themes/default/style.css')}}">
@endsection

@section('script')
<script type="text/javascript" src="{{ URL::asset('/admin_style/jstree/src/jstree.js') }}"></script>
<script type="text/javascript">

  $(document).ready(function(){

    $('#jstree').jstree({
      "core" : {
        'multiple': false,
        "themes" : {
          "variant" : "large"
        }

      },
      "checkbox" : {
        "keep_selected_style" : true
      },
      "plugins" : [  ]
    });


  });

  $('#jstree').on("changed.jstree", function (e, data) {
    $('#parent_id').val(data.selected);
    console.log(data.selected);
  });

</script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="shops"]').on('change', function() {
            var shopID = $(this).val();
            if(shopID) {
                $.ajax({
                    url: 'ajax/'+shopID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#category_service').empty();
                            $('#category_service').focus;
                            $('#category_service').append('<option value="">Choose</option>');
                            $.each(data, function(key, value){
                            $('select[name="category_service"]').append('<option value="'+ value.id +'" >' + value.translations[1].name+ '</option>');
                         });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>
@endsection