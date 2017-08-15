/*Form advanced Init*/
$(document).ready(function() {
"use strict";

/* Switchery Init*/
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
$('.js-switch-1').each(function() {
	new Switchery($(this)[0], $(this).data());
});

/* Multiselect Init*/

$('#public-methods').multiSelect();
$('#select-all').click(function(){
$('#public-methods').multiSelect('select_all');
return false;
});
$('#deselect-all').click(function(){
$('#public-methods').multiSelect('deselect_all');
return false;
});
$('#refresh').on('click', function(){
$('#public-methods').multiSelect('refresh');
return false;
});
$('#add-option').on('click', function(){
$('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });
return false;
});

/* Bootstrap switch Init*/
$('.bs-switch').bootstrapSwitch('state', true);
$('#check_box_value').text($("#check_box_switch").bootstrapSwitch('state'));

$('#check_box_switch').on('switchChange.bootstrapSwitch', function () {

	$("#check_box_value").text($('#check_box_switch').bootstrapSwitch('state'));
});

});