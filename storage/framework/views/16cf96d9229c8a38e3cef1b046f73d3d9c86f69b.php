<!-- Testimonials (v1) -->
<?php if(isset($storethemesetting['enable_testimonial']) && $storethemesetting['enable_testimonial'] == 'on'): ?>
<div class="home2-testimonial-section mb-100">
    <div class="container">
        <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
            <div class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap">
                <div class="section-title-2">
                    <h2> <?php echo e(!empty($storethemesetting['testimonial_main_heading']) ? $storethemesetting['testimonial_main_heading'] : 'Testimonials'); ?>

                    </h2>
                    <p>
                        <?php echo e(!empty($storethemesetting['testimonial_main_heading_title'])
                            ? $storethemesetting['testimonial_main_heading_title']
                            : 'There is only that moment and the incredible certainty that <br> everything under the sun has been written by one hand only.'); ?>

                    </p>
                </div>
                <div class="review-and-btn d-flex flex-wrap align-items-center gap-sm-5 gap-3">
                    
                    <div class="slider-btn-group2">
                        <div class="slider-btn prev-6">
                            <svg width="9" height="15" viewBox="0 0 8 13"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                            </svg>
                        </div>
                        <div class="slider-btn next-6">
                            <svg width="9" height="15" viewBox="0 0 8 13"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="300ms">
            <div class="col-lg-12">
                <div class="swiper customer-feedback-slider2">
                    <div class="swiper-wrapper">
                        <?php if(isset($storethemesetting['enable_testimonial1']) && $storethemesetting['enable_testimonial1'] == 'on'): ?>
                            <div class="swiper-slide">
                                <div class="feedback-card">
                                    <div class="feedback-top">
                                        
                                        <div class="services">
                                            <span><?php echo e($storethemesetting['testimonial_about_us1']); ?></span>
                                        </div>
                                    </div>
                                    <p><?php echo e($storethemesetting['testimonial_description1']); ?></p>
                                    <div class="author-name">
                                        <h6><?php echo e($storethemesetting['testimonial_name1']); ?></h6>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($storethemesetting['enable_testimonial2']) && $storethemesetting['enable_testimonial2'] == 'on'): ?>
                            <div class="swiper-slide">
                                <div class="feedback-card">
                                    <div class="feedback-top">
                                        
                                        <div class="services">
                                            <span><?php echo e($storethemesetting['testimonial_about_us2']); ?></span>
                                        </div>
                                    </div>
                                    <p><?php echo e($storethemesetting['testimonial_description2']); ?></p>
                                    <div class="author-name">
                                        <h6><?php echo e($storethemesetting['testimonial_name2']); ?></h6>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($storethemesetting['enable_testimonial3']) && $storethemesetting['enable_testimonial3'] == 'on'): ?>
                            <div class="swiper-slide">
                                <div class="feedback-card">
                                    <div class="feedback-top">
                                        
                                        <div class="services">
                                            <span><?php echo e($storethemesetting['testimonial_about_us3']); ?></span>
                                        </div>
                                    </div>
                                    <p><?php echo e($storethemesetting['testimonial_description3']); ?></p>
                                    <div class="author-name">
                                        <h6><?php echo e($storethemesetting['testimonial_name3']); ?></h6>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/storefront/layout/theme29to34/testimonial-type-2.blade.php ENDPATH**/ ?>