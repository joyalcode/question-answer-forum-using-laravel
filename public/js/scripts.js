  
$('.add-question-comment').click(function(){  
	$(this).hide();
	$('.question-comment-form').removeClass('hidden');
	$('#question_comment').focus();
});



$('.add-answer-comment').click(function(){
	$(this).hide();
	$('#answer-comment-form-'+this.id).removeClass('hidden');
	$('#answer-comment-'+this.id).focus();
})



$(function(){
	$('.answer-comment-form').on('submit',function(e){

	   e.preventDefault(e);
	   var answer_id = this.answer_id.value

	   $('.btn-answer-comment-'+answer_id).addClass('hidden');
	   $('.answer-comment-ajax-loader-'+answer_id).removeClass('hidden');	


	   $.ajax({
	      type:"POST",
	      url:'../answers/comment/'+answer_id,
	      data:$(this).serialize(),
	      success: function(data){
	        	$('.btn-answer-comment-'+answer_id).removeClass('hidden');
	   			$('.answer-comment-ajax-loader-'+answer_id).addClass('hidden');	
	   			$('#answer-comment-'+answer_id).val('');
	   			$('.answer-comment-'+answer_id+':last').append(data)
	        },
	        error: function(data){
	        	alert('eerrr');
	      }
	 	})
	});
});


$(function(){
	$('#form-question_comment').on('submit',function(e){
	    e.preventDefault(e);
	   var question_id = $('input#question_id').val();
	   $('#btn_add_comment').addClass('hidden')
	   $('.question-comment-ajax-loader').removeClass('hidden');

	    $.ajax({
	      type:"POST",
	      url:'comment/'+question_id,
	      data:$(this).serialize(),		
	      success: function(data){    	
	      		$('#btn_add_comment').removeClass('hidden');
	      		$('.question-comment-ajax-loader').addClass('hidden');
	            $('.question-comment:last').append(data)
	            $('#question_comment').val('');
	        },
	        error: function(data){
	        	alert('eerrr')	;
	      }
	 	})
	});
});


