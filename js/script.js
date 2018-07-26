$(function(){
	//alert('Ready');
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var sel2 = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(sel2).toggleClass('out');
    });
	$('#dept').on('change',function(){
		//alert(('#dept').val());
		var dept=$('#dept').val();
		if(dept==''){
			$('#pos').html('');
			return false;
		}else if(dept=='Medical'){
			$('#pos').html('<option></option><option>Doctor</option><option>Nurse</option><option>Physiologist</option>');
		}else if(dept=='Pharmacy'){
			$('#pos').html('<option></option><option>Pharmacist</option>');
		}/*else if(dept=='Nutrition'){
			$('#pos').html('<option></option><option>Nutritionist</option>');
		}*/else if(dept=='Records'){
			$('#pos').html('<option></option><option>Records Officer</option>');
		}/*else if(dept=='Ward'){
			$('#pos').html('<option></option><option>Ward Attendant</option>');
		}else if(dept=='Morgue'){
			$('#pos').html('<option></option><option>Mortuary Attendant</option>');
		}else if(dept=='Finance'){
            $('#pos').html('<option></option><option>Finance</option>');
        }*/else if(dept=='Lab'){
            $('#pos').html('<option></option><option>Lab Officer</option>');
        }else{
			$('#pos').html('');
			return false;
		}
		
	});
        $('#suspend').click(function(){
            var user_id=$('#suspend').attr('id');
            alert(user_id);
        });
        
	
});