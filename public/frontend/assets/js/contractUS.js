JotForm.extendsNewTheme = false;
JotForm.newPaymentUIForNewCreatedForms = false;
JotForm.highlightInputs = false;
JotForm.clearFieldOnHide="disable";

JotForm.init(function(){
    /*INIT-START*/
    if (window.JotForm && JotForm.accessible) $('input_1').setAttribute('tabindex',0);
    if (window.JotForm && JotForm.accessible) $('input_3').setAttribute('tabindex',0);
    if (window.JotForm && JotForm.accessible) $('input_11').setAttribute('tabindex',0);
    if (window.JotForm && JotForm.accessible) $('input_5').setAttribute('tabindex',0);
    JotForm.alterTexts({"confirmClearForm":"Are you sure you want to clear the form","incompleteFields":"Please complete required (*) fields.","lessThan":"Your score should be less than"});
    /*INIT-END*/
});

JotForm.prepareCalculationsOnTheFly([null,{"name":"name","qid":"1","text":"Name","type":"control_textbox"},{"name":"submit","qid":"2","text":"Submit","type":"control_button"},{"name":"email","qid":"3","text":"E-mail","type":"control_textbox"},null,{"name":"message","qid":"5","text":"Message:","type":"control_textarea"},null,null,null,{"name":"thongTin","qid":"9","text":"Thong tin lien hệ","type":"control_head"},null,{"description":"","name":"phone","qid":"11","subLabel":"","text":"phone","type":"control_textbox"}]);
setTimeout(function() {
    JotForm.paymentExtrasOnTheFly([null,{"name":"name","qid":"1","text":"Name","type":"control_textbox"},{"name":"submit","qid":"2","text":"Submit","type":"control_button"},{"name":"email","qid":"3","text":"E-mail","type":"control_textbox"},null,{"name":"message","qid":"5","text":"Message:","type":"control_textarea"},null,null,null,{"name":"thongTin","qid":"9","text":"Thong tin lien hệ","type":"control_head"},null,{"description":"","name":"phone","qid":"11","subLabel":"","text":"phone","type":"control_textbox"}]);}, 20);
