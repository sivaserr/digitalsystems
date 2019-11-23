$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}


//billing


$(document).ready(function(){

	//iterate through each textboxes and add keyup
	//handler to trigger sum event
	$(".box").each(function() {

		$(this).keyup(function(){
			calculateSum();
		});
	});

});

function calculate() {
	var box = document.getElementById('box').value;	
	var loosekg = document.getElementById('loosekg').value;
	var result = document.getElementById('totalweight');	
	var totalweight = box * loosekg;
	result.value = totalweight;

	var perkgprice = document.getElementById('perkgprice').value;
	var result = document.getElementById('actualprice');	

		var actualprice = totalweight*perkgprice;
		result.value=actualprice;

	var discount= document.getElementById('discount').value;
	var resultss= document.getElementById('discountprice');


		var discountprices= actualprice / 100 * discount;
		resultss.value= discountprices;

       var result= document.getElementById('discountprice');

	   result.value=discountprices;
	   
	   var result = document.getElementById('netvalue');
	   var netvalue = actualprice - discountprices;

	   result.value=netvalue;


	   var result = document.getElementById('totalbox');
	   var totalbox = box;
	   result.value = totalbox;
	   
       
	   var result =document.getElementById('overall');
	   var overall= netvalue;
	   result.value=overall;
}

function calculate2(){
	var icebar=document.getElementById('icebar').value;
	var pericebar =document.getElementById('pericebar').value;
	var result= document.getElementById('totalicebar');
	   var totalicebar = icebar*pericebar;
	   result.value=totalicebar;
}

function total(){
	var transportcharge = parseInt(document.getElementById('transportcharge').value);
	var finalicebar = parseInt(document.getElementById('finalicebar').value);
	var discount = document.getElementById('discount').value;
	var packingcharge = parseInt(document.getElementById('packingcharge').value);
	var excess = document.getElementById('excess').value;

	var result =document.getElementById('overall');

	parseInt(document.getElementById('finalicebar')).value = totalicebar;

	var overall= transportcharge + packingcharge + finalicebar;
	result.value=overall;


	calculate2();
	 
}


  $(document).ready(function(){
	// $(document).on('change','.productcategory',function(){

	// 	var cat_id=$(this).val();

	// 	$.ajax({
	// 		   type:'get',
	// 		   url:"findproductname",
	// 		   data:{'id':cat_id},
	// 		   success:function(data){
	// 			//    console.log('success');
	// 			//    console.log(data);
	// 			//    console.log(data.lenght);
	// 		   },
	// 		   error:function(){

	// 		   }
	// 	});
	// });
	$(document).on('change','.productcategory',function(){
		var prod_id=$(this).val();
		
		console.log(prod_id);

		$.ajax({
			type:'get',
			url:"findproductprice",
			data:{'id':prod_id},
			dataType:'json',
			success:function(data){
				console.log('price');
				console.log(data);
				$('.prod_price').val(data.price);
				$('.loosekg').val(data.weight);
			},
			error:function(){

			}
	 });
    });
});