<!-- Share Buttons -->
<div class="share-buttons">
    <div class="share-buttons-content">
        <a href="#"><span class="flaticon-share"></span>SHARE</a>
        <ul class="share-buttons-icons">
            @if (!empty($storethemesetting['top_bar_whatsapp']))
                <li style="margin-right: 0">
                    <a href="whatsapp://send?text={{ url()->full() }}"
                        data-action="share/whatsapp/share" data-button-color="#4FCE5D">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </li>
            @endif
            @if (!empty($storethemesetting['top_bar_twitter']))
                <li style="margin-right: 0">
                    <a href="https://twitter.com/share?url={{ url()->full() }}"
                        data-button-color="#46c1f6">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
            @endif
            {{-- @if (!empty($storethemesetting['top_bar_messenger']))
                <li style="margin-right: 0">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}"
                        data-button-color="#3b5999">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
            @endif --}}

        </ul>
    </div>
</div>