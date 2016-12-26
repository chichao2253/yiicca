<script>
    function edit_photos(id){
        $.ajax({
                    type:"get",
                    url:"{{url('photo/index')}}",
                    async:true,
                    data:{photo_id:id}
                })
                .done(function(data,textStatus){
                })
                .always(function(){
                });
    }
    $('#addlayer').on('click', function(){
        layer.prompt(function(value, index, elem){
            addtag(value);
            layer.close(index);
        });
    });

    function addtag(value){
        var dictid=$("#dict_id").val();
        $.ajax({
                    type:"get",
                    url:"{{url('dicts/addtag')}}",
                    async:true,
                    data:{tag:value,dictid:dictid}
                })
                .done(function(data,textStatus){
                    if(data.staus==-1){
                        alert("添加成功");
                        location.href="{{url("/dicts/info/$id")}}";
                    }else {
                        alert("添加失败");
                    }
                })
                .always(function(){
                    alertsomething(data);
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
</script>