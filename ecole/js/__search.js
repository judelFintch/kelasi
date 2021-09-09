$(function(){
	$('.btnEffacerTab').hide();
	 $('.BarSearch').keyup(function(){
	   var searchGet=$('.BarSearch').val();
	  	$(".loaderSeach").show();
	  	  $.post('php/__search.php',{searchGet:searchGet}, function(data){
	  	  	$(".loaderSeach").hide();
	  	  	  $('.detailListes').html(data);
	  	  	   $('.btnEffacerTab').show();
 	  	});
});
$('.btnEffacerTab').click(function(){
	$('.detailListes').empty();
	$('.btnEffacerTab').hide();
    });

});