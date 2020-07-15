$(".butt").click(function(){
	$(this).toggleClass("opens")
	$(this).toggleClass("closes")
})



$(".utility.btn-warning").click(function(){
	$(".contU .export .btn-primary").toggleClass("move")	
	$(".contU .export .btn-danger").toggleClass("move")
	$(".contU .export .btn-success").toggleClass("move")

	$(".contU .export .btn-danger").toggleClass("unmove")
	$(".contU .export .btn-primary").toggleClass("unmove")
	$(".contU .export .btn-success").toggleClass("unmove")
})

$(".btn.delete").on("click",function(){
	confirm("yakin??")
})