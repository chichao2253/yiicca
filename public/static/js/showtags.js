
function edit_photos(id){
    $.ajax({
            type:"get",
            url:"{{url('dicts/edit_photos')}}",
            async:true,
            data:{id:id}
        })
        .done(function(data,textStatus){

        })
        .always(function(){
        });

}
function delete_photos(id){
    $.ajax({
            type:"get",
            url:"{{url('dicts/delete_photos')}}",
            async:true,
            data:{id:id}
        })
        .done(function(data,textStatus){
            if(data.error_code==-1){
                $("."+id+"").hide();
            }
        })
        .always(function(){
        });
    alert(id);
}
function  check(){
    $(".id_hidden").each(function(i){
        ajax_photos($(this).val(),i);
    });
    alert("排序成功");
}
function ajax_photos(id,i){
    var id=id;
    var i=i;
    $.ajax({
            type:"get",
            url:"{{url('dicts/sort_photo')}}",
            async:true,
            data:{id:id,sort:i}
        })
        .done(function(data,textStatus){
        })
        .always(function(){
        });
}

