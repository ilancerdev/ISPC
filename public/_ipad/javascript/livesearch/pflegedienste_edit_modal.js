var f_loading_pfl = function(){
	var dlist = '<div class="DropDwnTable" style="margin-top:5px;margin-left:35px; height:175px; overflow:auto;"><table border="0" align="left" cellpadding="0" cellspacing="0" class="Dropdwntble"><tr class="bluerow"><td><img src="images/loading.gif"></td></tr></table></div>';
	document.getElementById('doctdropdown').style.display = "";
	document.getElementById('doctdropdown').innerHTML=dlist;
}

function dropDownchangePfl(){
	ajaxCallserver({
		url:'pflegedienste/fetchdropdown?modal=1',
		callLoading:f_loading_pfl,
		method:'POST',
		data:{
			ltr:$("#pflegedienste").val()
		}
	});
} 


var doctors;
var docdropdivpfl = function(params){

	var dlist = '<div class="DropDwnTable" id="doctdropdowninner" style="height:175px; overflow:auto;"><table border="0" align="left" cellpadding="0" cellspacing="0" class="Dropdwntble">';
	doctors = params.doctors;
	if(doctors.length>0){
		dlist+='<tr class="bluerow"><td class="first"><strong>'+translate('nursing')+'</strong></td><td class="first"><strong>'+translate('lastname')+'</strong></td><td class="first"><strong>'+translate('firstname')+'</strong></td><td class="first"><strong>'+translate('city')+'</strong></td><td>&nbsp;</td></tr>';
	} else {
		dlist+='<tr><td colspan="2" class="BlueBox">'+translate('noresultsfoundpleaseaddnewfamilydoctor')+'</td></tr>';
		document.getElementById('hidd_pflegeid').value = "";
		document.getElementById('doctdropdown').style.display = "none";
		var t = setTimeout(function(){
			$('#pflegedienste').trigger('blur');
		},15);
	}
	
	for(i=0;i<params.doctors.length;i++){
		dlist+='<tr class="bluerow" onmousedown="selectDoctorpfl('+i+')"><td class="first">'+params.doctors[i].nursing +'</td><td class="first">'+params.doctors[i].last_name +'</td><td class="first">'+params.doctors[i].first_name +'</td><td class="first">'+params.doctors[i].city +'</td><td>'+translate('select')+'</td></tr>';
	}
	dlist+= "</table></div>";
	 
	
	if(fdocblur==false){
		//document.getElementById('doctdropdown').style.display = "";
	}
	
	document.getElementById('doctdropdown').innerHTML=dlist;
// document.getElementById('msg').innerHTML = "If doctor is not found in list. please add new doctor from here";
	 
}

function selectDoctorpfl(i){
	document.getElementById('pflegedienste').value = doctors[i].nursing;
	//	document.getElementById('first_name').value = doctors[i].first_name;
	//	document.getElementById('last_name').value = doctors[i].last_name;
	document.getElementById('street1').value = doctors[i].street1;
	document.getElementById('zip').value = doctors[i].zip;
	document.getElementById('city').value = doctors[i].city;
	document.getElementById('phone_practice').value = doctors[i].phone_practice;
	document.getElementById('fax').value = doctors[i].fax;
	document.getElementById('doctdropdown').style.display = "none";
	document.getElementById('hidd_pflegeid').value = doctors[i].id;
	//	document.getElementById('updatemaindiv').style.display = "block";
	//	document.getElementById('updatemain').value = 1;
	
	
	var t = setTimeout(function(){
		$('#pflegedienste').trigger('blur');
	},15);
	
}

var livefdocsearchkeupmpfl = function( e,ele ){
	//alert($(ele).attr('id'));
	id = $(ele).attr('id');
	fdocblur = false;
	//id = id.substring(t.length);
		
		
	if( e.keyCode == 40 ) {
		diagsearch = false;
		if( $( '.focused' ).length < 1 ) {
			//alert($("#diagnodropdown"+id+'tr:first'));
			//$("#diagnodropdown"+id+' tr:first').removeClass('bluerow');
				
			$("#doctdropdown tr:first").addClass('focused');
		//alert($("#diagnodropdown"+dv+'tr:first'));
		//alert('$("#diagnodropdown"+dv+'tr:first')');
		//$('.list_name p:first' ).addClass( 'highlight' );
				
		} else {
			if( $( '.focused' ).next().length < 1 ) {
				$( '.focused' ).removeClass( 'focused' );
				$("#doctdropdown tr:first").addClass('focused');
			} else {
				var itsNext = $( '.focused' ).removeClass( 'focused' ).next().addClass( 'focused' );
				if( itsNext.is( ':hidden' ) ) {
					$( this ).trigger( {
						type : 'keyup', 
						keyCode : 40
					});
				} else {
						
					var activeItem = $( '.focused' )[0];
					offsetTop = activeItem.offsetTop;
					var container = $('#doctdropdowninner');
							
					upperBound = container.scrollTop();
					lowerBound = upperBound + 175 - 35;
					if (offsetTop < upperBound) {
						container.scrollTop(offsetTop);
					} else if (offsetTop > lowerBound) {
						container.scrollTop(offsetTop - 175 + 35);
					}
						
				}
			}
		}
		//e.stopPropagation();
		return;
	}
	if( e.keyCode == 38 ) {
			
		diagsearch = false;
		if( $( '.focused' ).length < 1 ) {
			$("#doctdropdown tr:last").addClass('focused');
		} else {
			if( $( '.focused' ).prev().length < 1 ) {
				$( '.focused' ).removeClass( 'focused' );
				$("#doctdropdown tr:last").addClass('focused');
			} else {
				var itsPrev = $( '.focused' ).removeClass( 'focused' ).prev().addClass( 'focused' );
				if( itsPrev.is( ':hidden' ) ) {
					$( this ).trigger( {
						type : 'keyup', 
						keyCode : 38
					});
				} else {
					var activeItem = $( '.focused' )[0];
					offsetTop = activeItem.offsetTop;
					var container = $('#doctdropdowninner');
							
					upperBound = container.scrollTop();
					lowerBound = upperBound + 175 - 35;
					if (offsetTop < upperBound) {
						container.scrollTop(offsetTop);
					} else if (offsetTop > lowerBound) {
						container.scrollTop(offsetTop - 175 + 35);
					}
				}
			}
		}
			
		e.preventDefault();
		return;
	}
		
	if( e.keyCode == 13 ) {
		if(!diagsearch){
			$( '.focused' ).trigger( 'mousedown' );
			diagsearch = true;
		}
		e.preventDefault();
		//alert(e.target);
		return false;
	}
		
	if(e.keyCode == 9){
		$("#doctdropdown"+id).hide();
		return;	
	}
		
	setTimeout(function(){
		dropDownchangePfl()
	},400);
}


