


	<!-- JS -->
	<script src="<?=base_url('_themes/')?>js/jquery-3.3.1.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/owl.carousel.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/jquery.mousewheel.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/jquery.mCustomScrollbar.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/wNumb.js"></script>
	<script src="<?=base_url('_themes/')?>js/nouislider.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/plyr.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/jquery.morelines.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/photoswipe.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/photoswipe-ui-default.min.js"></script>
	<script src="<?=base_url('_themes/')?>js/main.js"></script>
	<script>
		var img = "<?=base_url('_themes/')?>genses.jpg";
		$("img").on("error", function () {
    		$(this).attr("src", img);
			
		});
	</script>
</body>
</html>