  
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

	   $.ajax({
	      type:"POST",
	      url:'../answers/comment/'+answer_id,
	      data:$(this).serialize(),
	      dataType: 'json',
	      success: function(data){
	            console.log(data);
	        },
	        error: function(data){

	      }
	 	})
	});
});


$(function(){
	$('#form-question_comment').on('submit',function(e){
	    e.preventDefault(e);
	    var question_id = $('input#question_id').val();
	    $.ajax({
	      type:"POST",
	      url:'comment/'+question_id,
	      data:$(this).serialize(),
	      dataType: 'json',
	      success: function(data){
	            console.log(data);
	        },
	        error: function(data){

	      }
	 	})
	});
});


