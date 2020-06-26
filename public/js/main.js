$(document).ready(function(){
    $('#btn').click(function(){
        $.get('imageCount', function(data, status){
            $('#btn').html(data);
        });
    });
});