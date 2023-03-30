<script>
$(document).ready(function(){
    
    if($('#checkAtiva').val()=='S'){
        $('#checkAtiva').prop('checked', true);
    }
    $("#checkAtiva").change(function() {
                    if ($("input[type=checkbox]").is(
                      ":checked")) {
                        $('#checkAtiva').val('S');
                    } else {
                        $('#checkAtiva').val('N');
                    }
                });
    $('.progress-bar').css('width', 0 + '%');
    $('#formAjax').on('submit', function(event){
    event.preventDefault();

        $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
                });
        $.ajax({
            url:"{{ $route }}",
            method:"{{$method}}",
            data:$(this).serialize(),
            beforeSend:function()
            {
            $('#btnAjax').attr('disabled', 'disabled');
            $('#process').css('display', 'block');
            },
            success:function(data){
                var percentage = 0;
                var timer = setInterval(function(){
                percentage = percentage + 20;
                progress_bar_process(percentage, timer);
                }, 1000);
            }
        })
  });

  function progress_bar_process(percentage, timer){
   $('.progress-bar').css('width', percentage + '%');
   if(percentage > 100){
    clearInterval(timer);
    if("{{$novo}}"){
        $('#formAjax')[0].reset();
    }
    $('#process').css('display', 'none');
    $('.progress-bar').css('width', '0%');
    $('#btnAjax').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Registro Salvo com Sucesso.</div>");
    setTimeout(function(){
     $('#success_message').html('');
    }, 5000);
   }
  }
 });
</script>

