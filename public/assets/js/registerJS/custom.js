var checkBoxes = document.querySelectorAll("input[type='checkbox']");
function checkAll(myCheckbox){
    if(myCheckbox.checked == true)
    {
        checkBoxes.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }else{
        checkBoxes.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
    if(myCheckbox.checked  > 0){
        $('#dropdown-toggle').removeAttr('disabled');
    }else{
        $('#dropdown-toggle').attr('disabled', true);
    }

}
$(document).on('click', '#select-1', function(){
    if($('#select-1:checked').length > 0){
        $('#dropdown-toggle').removeAttr('disabled');
    }else{
        $('#dropdown-toggle').attr('disabled', true);
    }
});
