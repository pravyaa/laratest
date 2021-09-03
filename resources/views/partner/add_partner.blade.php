
<style type="text/css">
    
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Partner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                  <div class="col-md-8">
                    <div class="card">
                         @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('success') }}</strong> 
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif
                        <div class="card-header">Partner Preferences</div>
                         <div class="card-body">
                         <form method="post" enctype="" action="{{ route('partner.add')}}">
                            @csrf

                            <div class="form-group">
                            <label for="maritialStatus" class="form-label">Salary Range</label>
                             <p>
                              <label for="amount">(Lakhs)</label>
                              <input type="text" name="amount" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            </p>
                             
                            <div id="slider-range"></div>
                            </div>
                            <div class="form-group">
                            <label for="maritialStatus" class="form-label">Maritial Status</label>
                            <select class="form-control" name="maritial_status" aria-label="Default select example">
                             
                              <option value="0">No</option>
                              <option value="1">Yes</option>
                              <option value="2">Both</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="maritialStatus" class="form-label">Family Type</label>
                            <select class="js-example-basic-multiple form-control" name="family_type[]" placeholder="Select Text" multiple>
                               
                                <option value="1">Joint Family</option>
                                <option value="2">Nuclear Family</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="maritialStatus" class="form-label">Occupation</label>
                            <select class="occupation_select form-control" name="job_type[]" placeholder="Select Text" multiple>
                           
                              <option value="1">Private</option>
                              <option value="2">Govt. Employee</option>
                              <option value="3">Business</option>
                            </select>
                            </div>
                            <button type="submit" class="btn btn-info">Save</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </div>
</x-app-layout>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.js"></script>
   <script>
   $(document).ready(function() {
       $('#ex6').slider(
        );
       $("#ex6").on("slide", function(slideEvt) {
           $("#ex6SliderVal").text(slideEvt.value);
       });

   })

   </script>


<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    $('.occupation_select').select2();
});
    
</script>

 <script>
    $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 90,
      values: [ 1, 10 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + "-" + ui.values[ 1 ]  );
      }
    });
    $( "#amount" ).val(  $( "#slider-range" ).slider( "values", 0 ) +
      "-" + $( "#slider-range" ).slider( "values", 1 )  );
  } );
  </script>