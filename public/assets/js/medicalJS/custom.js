function checkAll(className, elem ){
    var elements = document.getElementsByClassName(className);
    var l = elements.length;

    if(elem.checked){
        for(var i=0; i<l; i++){
            elements[i].checked = true;
        }
    }else{
        for(var i=0; i<l; i++){
            elements[i].checked = false;
        }
    }
    
}

// hide modal function
$(function(){
    $('#deleteAll').click(function(){
        var selected = new Array();
        $('#example1 input[type="checkbox"]:checked').each(function(){
            selected.push(this.value);
        });

        if(selected.length > 0){
            $('#modal').modal('show')
            $('input[id="deleteAllSelected"]').val(selected);
        }


    });
});