function SendAndTestForm(oEvent, oForm, sReplaceable, sRequiredClass, sEmptyClass){
	oEvent.preventDefault();
    var bRequiredEmpty = false;
    var bRequiredCurrentEmpty = false;
    
    $(oForm).find('.' + sEmptyClass).removeClass(sEmptyClass);
    $(oForm).find('.' + sRequiredClass).each(function(){
        bRequiredCurrentEmpty = false;
        
        if ($(this).val() === undefined)
        {
            bRequiredEmpty = true;
            bRequiredCurrentEmpty = true;
        }
             
        
        if ($(this).val() !== undefined)
            if ($(this).val().length == 0)
            {
                bRequiredEmpty = true;
                bRequiredCurrentEmpty = true;
            }
              
        if (bRequiredCurrentEmpty) {
            $(this).addClass(sEmptyClass);
        }        
    });
    
    if (!bRequiredEmpty)
    {
        sFormData = $(oForm).serialize();
        $.post($(oForm).attr('action'), sFormData, function (sContent) {
            $(sReplaceable).replaceWith(sContent);
        });
    }
    
}

function CloseForm() {
    $('.bx_popup_close').trigger('click');
}