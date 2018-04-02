		<footer>
			<?php	
				if ( is_active_sidebar('footer-sidebar') ) {
					get_sidebar('footer');	
				} 
			?>
            <div id="az-footer-copyright">&copy; <?php echo date("Y"); ?> </div>	
        </footer>

        <?php wp_footer(); ?>
    </div>
</body>
  
    

</html>