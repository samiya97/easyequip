<script type="text/javascript">
	$(document).ready(function(){
		divArea();
		liveSearch();
		$('[data-toggle="tooltip"]').tooltip();   

	});

	function divArea(){
		$("#city").change(function(){
			$(this).find("option:selected").each(function(){
				var optionValue2 = $(this).attr("value");
				if(optionValue2){
					$(".areaOption").not("." + optionValue2).hide();
					$("." + optionValue2).show();
				} else{
					$(".areaOption").hide();
				}
			});
		}).change();
	}

	function liveSearch(){
		$('#search').click(function(){
			var search_city = document.getElementById("city").value;
			var search_area = document.getElementById("area").value;
			var search_profession = document.getElementById("profession").value;
			$.ajax({
				url: 'search.php',
				type: 'post',
				data:{
					city: search_city,
					area: search_area,
					profession: search_profession
				},
				success:function(resposeData){
					$('#features').html(resposeData);
				}
			});
		});
	}

	/* ------ Validate Input --------*/
	
</script>
