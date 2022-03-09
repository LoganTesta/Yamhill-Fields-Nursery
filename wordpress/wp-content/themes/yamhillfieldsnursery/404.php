<?php

/*Description: 404 page custom template*/
get_header(); 
?>

<div class="inner-wrapper">
    <div class="content page-content">
        <div class="content-row">
            <div class="col-sma-5">
                <h3>404 Error</h3>
                <p>Sorry, it looks like the page is not found.  Please use the navigation and continue.</p>
            </div>
            <div class="col-sma-7">
                <div class="content-background-container">
                    <div class="content__content-image" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/cacti-inside-sunny-greenhouse.jpg') 50% 50%/cover no-repeat;"></div>    
                </div>
            </div>
        </div>
    </div>
</div>
                             
<?php 
get_footer();
?>
