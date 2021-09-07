/**
 * @auth Ancuta 12.07.2019
 */
if (typeof(DEBUG) !== 'undefined' && window.DEBUG === true) {
	console.info('custom view js included : '+document.currentScript.src);
}


var formular_button_action = window.formular_button_action;

function form_submit_validate() {
	
		return true;
}

//form_date
function score_mapping(question_id,question_value){
	var qscore = [];
	qscore['q_1-1'] = 0 ;
	qscore['q_1-2'] = 1 ;
	qscore['q_1-3'] = 2 ;
	qscore['q_1-4'] = 3 ;
	
	qscore['q_2-1'] = 0 ;
	qscore['q_2-2'] = 1 ;
	qscore['q_2-3'] = 2 ;
	qscore['q_2-4'] = 3 ;
	
	qscore['q_3-1'] = 0 ;
	qscore['q_3-2'] = 1 ;
	qscore['q_3-3'] = 2 ;
	qscore['q_3-4'] = 3 ;
	
	qscore['q_4-1'] = 0 ;
	qscore['q_4-2'] = 1 ;
	qscore['q_4-3'] = 2 ;
	qscore['q_4-4'] = 3 ;
	
	qscore['q_5-1'] = 0 ;
	qscore['q_5-2'] = 1 ;
	qscore['q_5-3'] = 2 ;
	qscore['q_5-4'] = 3 ;
	
	qscore['q_6-1'] = 0 ;
	qscore['q_6-2'] = 1 ;
	qscore['q_6-3'] = 2 ;
	qscore['q_6-4'] = 3 ;
	
	qscore['q_7-1'] = 0 ;
	qscore['q_7-2'] = 1 ;
	qscore['q_7-3'] = 2 ;
	qscore['q_7-4'] = 3 ;
	
	qscore['q_8-1'] = 0 ;
	qscore['q_8-2'] = 1 ;
	qscore['q_8-3'] = 2 ;
	qscore['q_8-4'] = 3 ;
	
	qscore['q_9-1'] = 0 ;
	qscore['q_9-2'] = 1 ;
	qscore['q_9-3'] = 2 ;
	qscore['q_9-4'] = 3 ;
	
	qscore['q_10-1'] = 0 ;
	qscore['q_10-2'] = 1 ;
	qscore['q_10-3'] = 2 ;
	qscore['q_10-4'] = 3 ;
	
	
	qscore['q_11-1'] = 0 ;
	qscore['q_11-2'] = 1 ;
	qscore['q_11-3'] = 2 ;
	qscore['q_11-4'] = 3 ;
	
	
	qscore['q_12-1'] = 0 ;
	qscore['q_12-2'] = 1 ;
	qscore['q_12-3'] = 2 ;
	qscore['q_12-4'] = 3 ;
	
	
	qscore['q_13-1'] = 0 ;
	qscore['q_13-2'] = 1 ;
	qscore['q_13-3'] = 2 ;
	qscore['q_13-4'] = 3 ;
	
	
	qscore['q_14-1'] = 0 ;
	qscore['q_14-2'] = 1 ;
	qscore['q_14-3'] = 2 ;
	qscore['q_14-4'] = 3 ;
	
	qscore['q_15-1'] = 0 ;
	qscore['q_15-2'] = 1 ;
	qscore['q_15-3'] = 2 ;
	qscore['q_15-4'] = 3 ;
	
	qscore['q_16-1'] = 0 ;
	qscore['q_16-2'] = 1 ;
	qscore['q_16-3'] = 1 ;
	qscore['q_16-4'] = 2 ;
	qscore['q_16-5'] = 2 ;
	qscore['q_16-6'] = 3 ;
	qscore['q_16-7'] = 3 ;
	
	qscore['q_17-1'] = 0 ;
	qscore['q_17-2'] = 1 ;
	qscore['q_17-3'] = 2 ;
	qscore['q_17-4'] = 3 ;

	qscore['q_18-1'] = 0 ;
	qscore['q_18-2'] = 1 ;
	qscore['q_18-3'] = 1 ;
	qscore['q_18-4'] = 2 ;
	qscore['q_18-5'] = 2 ;
	qscore['q_18-6'] = 3 ;
	qscore['q_18-7'] = 3 ;	
	
	
	qscore['q_19-1'] = 0 ;
	qscore['q_19-2'] = 1 ;
	qscore['q_19-3'] = 2 ;
	qscore['q_19-4'] = 3 ;	
	
	qscore['q_20-1'] = 0 ;
	qscore['q_20-2'] = 1 ;
	qscore['q_20-3'] = 2 ;
	qscore['q_20-4'] = 3 ;	
	
	qscore['q_21-1'] = 0 ;
	qscore['q_21-2'] = 1 ;
	qscore['q_21-3'] = 2 ;
	qscore['q_21-4'] = 3 ;	
	
	return qscore[question_id+'-'+question_value];
}

function calcscore(that,elem_type)
{
//	var parent = radio.data("parent");
 
//	radio.prop('checked','checked');

	if(elem_type == "radio") {
//		alert("radiooooooo");
//		console.log(that.attr('id'));
		
		
		
		
		total = 0;
		$('.calculate_score').each(function(){
			var id_text = $(this).attr('id');
			var id_array = id_text.split('-');
			var current_score = score_mapping(id_array[2],id_array[4]); 
			
			if($(this).is(":checked"))
			{
				total += parseFloat(current_score);
			} else{
			} 
			
			$('.total_slot').html(total);
			$('.form_total').val(total);
		});
		
		
	}
	else if(elem_type == "checkbox") {
		
		total = 0;
		$('.calculate_score').each(function(){
			var score_value= $(this).data("score");
			
			if($(this).is(":checked"))
			{
				//			var this_value = parseFloat( $(this).val());
				//			console.log(this_value);
				//			total += parseFloat(scoreArray[$(this).val()]);
				total += parseFloat($(this).val());
				//			total = parseFloat(total + this_value) ;
			} else{
				//			var this_value = parseFloat( $(this).val());
				//			total = parseFloat(total - this_value) ;
			} 
			
			$('.total_slot').html(total);
			$('.form_total').val(total);
		});
	}
	
}

function setunset(radio)
{
	$('.question11').removeAttr('checked');
	$('.yesno').removeAttr('checked');
    radio.prop('checked','checked');
}

function calcbmi(value)
{ }

function save_custom_form(from_ident){
	
	var _post_data = {
			"form_ident" : from_ident,
			"form_date" : $('#'+from_ident+'-custom-form_date').val(),
			"form_total" : $('#'+from_ident+'-custom-form_total').val(),
		};

		$.ajax({
			"dataType" : 'json',
			"type" : "POST",
			"url" : appbase + "rubin/saveemptyform?id="+idpd,
			"data" : _post_data,
			"success" : function(data) {
	            if (data.success == true) {
	            	$('#'+from_ident+'-custom-form_date').val('');
	    			$('#'+from_ident+'-custom-form_total').val('');
	    			
	    			$('.custom_form_status').html('<span class="success" >'+data.message+'</span>')
	    			
	            } else {
	            	$('.custom_form_status').html('<span class="err" >'+data.message+'</span>')
	            	
	            }
			},
			"error" : function(xhr, ajaxOptions, thrownError) {
				if (typeof (DEBUGMODE) !== 'undefined' && DEBUGMODE === true) {
					alert('not saved');
					
				}
			}
		});
		
	
}

$(document).ready(function() { 

 

	 $( ".form_date" ).datepicker({
			dateFormat: 'dd.mm.yy',
			showOn: "both",
			buttonImage: $('#calImg').attr('src'),
			buttonImageOnly: true,
			changeMonth: true,
			changeYear: true,
			nextText: '',
			prevText: '',
			maxDate: "0"
			
		}).mask("99.99.9999");
});