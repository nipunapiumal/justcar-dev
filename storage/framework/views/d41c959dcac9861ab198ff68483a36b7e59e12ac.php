<!-- Share Buttons -->
<div class="share-buttons">
    <div class="share-buttons-content">
        <a href="#"><span class="flaticon-share"></span>SHARE</a>
        <ul class="share-buttons-icons">
            <?php if(!empty($storethemesetting['top_bar_whatsapp'])): ?>
                <li style="margin-right: 0">
                    <a href="whatsapp://send?text=<?php echo e(url()->full()); ?>"
                        data-action="share/whatsapp/share" data-button-color="#4FCE5D">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(!empty($storethemesetting['top_bar_twitter'])): ?>
                <li style="margin-right: 0">
                    <a href="https://twitter.com/share?url=<?php echo e(url()->full()); ?>"
                        data-button-color="#46c1f6">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
            <?php endif; ?>
            

        </ul>
    </div>
</div><?php /**PATH /Users/optimaz_id/Sites/justcar/resources/views/partials/social-sharing.blade.php ENDPATH**/ ?>