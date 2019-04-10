
var pictureExists;

$(()=>{
    $('input , textarea').blur(function(){
        $(this).siblings('.errorMsg').remove();
    });

    pictureExists = $('#product-image').attr('src') && $('#product-image').attr('src') != "";

});

function validate()
{
    var isvalid = true;
    $('.group input').removeClass('error');
    $('.errorMsg').remove();

    
    if($('#product-name').val().trim() == "")
    {
        addError($('#product-name'));
        isvalid = false;
    }
    if($('#product-price').val().trim() == "" || isNaN($('#product-price').val()))
    {
        addError($('#product-price'));
        isvalid = false;
    }
    if($('#product-qty').val().trim() == "" || isNaN($('#product-qty').val()) || !Number.isInteger($('#product-qty').val()/1))
    {
        addError($('#product-qty'));
        isvalid = false;
    }
    if($('#product-desc').val().trim() == "")
    {
        addError($('#product-desc'));
        isvalid = false;
    }

    if(!pictureExists)
    {
        addError($('#product-picture'));
        isvalid = false;
    }
    
    var checkBoxes = $("input[type='checkbox']:checked");
    var categories = [...checkBoxes].map((checkBox)=> {return $(checkBox).attr('data');}).join(',');

    $('#product-categories').val(categories);

    return isvalid;

    
}

function addError($control){
    $control.addClass('error');
    if($control.val().trim() == "")
        $control.parent().append($('<span class="errorMsg">Required</span>').css('color','red').css('display','block'));
    else
        $control.parent().append($('<span class="errorMsg">Invalid</span>').css('color','red'));
}

function deleteProduct(isdelete){
    $('#isdelete').val(!isdelete);
    $("#update-product-btn").click();
}

function loadFile(event){
    $('#product-image').attr('src', URL.createObjectURL(event.target.files[0]));
    pictureExists = true;
}