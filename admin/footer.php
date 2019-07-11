<footer>
				<div class="footer-area">
					<p>© Copyright 2018. All right reserved. Developed by <a href="https://developerarena.com">Developer Arena</a>.</p>
				</div>
			</footer>
			<!-- footer area end-->
		</div>
		<!-- jquery latest version -->
		<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
		<!-- bootstrap 4 js -->
		<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/owl.carousel.min.js"></script>
		<script src="../assets/js/metisMenu.min.js"></script>
		<script src="../assets/js/jquery.slimscroll.min.js"></script>
		<script src="../assets/js/jquery.slicknav.min.js"></script>
		<!-- others plugins -->
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/scripts.js"></script>
		
			<script type="text/javascript">
		
				//$('#myModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
        //});

		//});
	$(document).ready(function(){
       
          function loadnoti(){
         	$("#counter").load("ajax/count_noti.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
         }

       
           $("#tiuser").click(function(){
        
            var nid = 'yes';
           
            
            $.ajax({
			  type: "POST",
			  url: "ajax/update_noti.php",
			  data: {'nid': nid},
			  success:  function(data){
               
			   
			  }
			});

			    $("#popnoti").load("ajax/get_noti.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
			});

       setInterval(function(){

      loadnoti();

		}, 500);

});
       </script>

       <script type="text/javascript">
		
				//$('#myModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
        //});

		//});
	$(document).ready(function(){

          function loadmessage(){
         	$("#counter2").load("ajax/count_message.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
         }

       
           $("#timess").click(function(){
        
            var mid = 'yes';
           
            
            $.ajax({
			  type: "POST",
			  url: "ajax/update_message.php",
			  data: {'mid': mid},
			  success:  function(data){
               
			   
			  }
			});

			    $("#popnoti2").load("ajax/get_message.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
			});

       setInterval(function(){

      loadmessage();

		}, 500);

});
       </script>

        <script type="text/javascript">
		
				//$('#myModal').on('shown.bs.modal', function () {
        // $('#myInput').trigger('focus')
        //});

		//});
	$(document).ready(function(){

          function loadmessage(){
         	$("#counter3").load("ajax/count_inquiry.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
         }

       
           $("#tiinqu").click(function(){
        
            var inid = 'yes';
           
            
            $.ajax({
			  type: "POST",
			  url: "ajax/update_inquiry.php",
			  data: {'inid': inid},
			  success:  function(data){
               
			   
			  }
			});

			    $("#popnoti3").load("ajax/get_inquiry.php", function(responseTxt, statusTxt, xhr){
			        if(statusTxt == "success")

                     return statusTxt
			    });
			});

       setInterval(function(){

      loadmessage();

		}, 500);

});
       </script>
	</body>

</html>
