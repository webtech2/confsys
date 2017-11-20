@extends('layouts.app')

@section('content')
<script type="text/javascript">
$(document).ready(function () {
    $("#search").keyup(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("/conferences/search", { search: $('#search').val(), _token: CSRF_TOKEN }, function(data) {
            $('.conference').html('');
            $.each(data, function(i, conference) {
                var c = '<div class="list-item-with-icon row">\n\
                             <div class="col-md-4">\n\
                               <a href="/uploads/large_'+conference.id+'.jpg">\n\
                                 <img class="img-thumbnail" src="/uploads/'+conference.id+'_small.png" alt="">\n\
                               </a>\n\
                             </div>\n\
                             <div class="col-md-8">\n\
                               <h4><a href="/conferences/'+conference.id+'">'+conference.acronym+'</a></h4>\n\
                             <div>'+conference.start_date+' - '+conference.end_date+'</div>\n\
                           </div>';
                 $('.conference').append(c);
            });
        });
    })
});
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Search</h4><input type="text" id="search"></div>
                <div class="panel-body conference">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

