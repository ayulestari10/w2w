<style type="text/css">
	#footer {
		background-color: rgba(0, 0, 0, 0.4);
		height: 6%;
		color: white;
		padding-top: 3%;
		padding-bottom: 2%;
		margin-top: 8%;
	}
</style>
	<footer id="footer">
		<div class="container">
			<div class="pull-left">		
				&copy; BEM KM Fasilkom Unsri 2016
			</div>
			<div class="pull-right">
				Created by PTI BEM KM Fasilkom Unsri
			</div>
		</div>
	</footer>
	<script type="text/javascript">
		var docHeight = $(window).height();
		var footerHeight = $('#footer').height();
		var footerTop = $('#footer').position().top + footerHeight;

		if (footerTop < docHeight) {
			$('#footer').css('margin-top', (docHeight - footerTop - 15) + 'px');
		}
	</script>		
	</body>
</html>