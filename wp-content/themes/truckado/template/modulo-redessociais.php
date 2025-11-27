<div class="modulo-redessociais">
    <ul class="">
        <?php if(get_option('mvl_instagram')) : ?>
            <li>
                <a href="https://instagram.com/<?php echo get_option('mvl_instagram') ?>" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31.518" height="31.511" viewBox="0 0 31.518 31.511"> <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram" d="M15.757,9.914a8.079,8.079,0,1,0,8.079,8.079A8.066,8.066,0,0,0,15.757,9.914Zm0,13.331a5.252,5.252,0,1,1,5.252-5.252,5.262,5.262,0,0,1-5.252,5.252ZM26.051,9.584A1.884,1.884,0,1,1,24.166,7.7,1.88,1.88,0,0,1,26.051,9.584ZM31.4,11.5a9.325,9.325,0,0,0-2.545-6.6,9.387,9.387,0,0,0-6.6-2.545c-2.6-.148-10.4-.148-13,0a9.373,9.373,0,0,0-6.6,2.538,9.356,9.356,0,0,0-2.545,6.6c-.148,2.6-.148,10.4,0,13a9.325,9.325,0,0,0,2.545,6.6,9.4,9.4,0,0,0,6.6,2.545c2.6.148,10.4.148,13,0a9.325,9.325,0,0,0,6.6-2.545,9.387,9.387,0,0,0,2.545-6.6c.148-2.6.148-10.392,0-12.994ZM28.041,27.281a5.318,5.318,0,0,1-3,3c-2.074.823-7,.633-9.288.633s-7.221.183-9.288-.633a5.318,5.318,0,0,1-3-3c-.823-2.074-.633-7-.633-9.288s-.183-7.221.633-9.288a5.318,5.318,0,0,1,3-3c2.074-.823,7-.633,9.288-.633s7.221-.183,9.288.633a5.318,5.318,0,0,1,3,3c.823,2.074.633,7,.633,9.288S28.863,25.214,28.041,27.281Z" transform="translate(0.005 -2.238)"/> </svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if(get_option('mvl_facebook')) : ?>
            <li>
                <a href="<?php echo get_option('mvl_facebook') ?>" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14.407" height="26.899" viewBox="0 0 14.407 26.899"> <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f" d="M15.072,15.131l.747-4.868H11.148V7.1a2.434,2.434,0,0,1,2.745-2.63h2.124V.329A25.9,25.9,0,0,0,12.247,0C8.4,0,5.885,2.332,5.885,6.552v3.71H1.609v4.868H5.885V26.9h5.263V15.131Z" transform="translate(-1.609)"/> </svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if(get_option('mvl_youtube')) : ?>
            <li>
                <a href="<?php echo get_option('mvl_youtube') ?>" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38.4" height="27" viewBox="0 0 38.4 27"> <path id="Icon_awesome-youtube" data-name="Icon awesome-youtube" d="M38.648,8.725a4.825,4.825,0,0,0-3.395-3.417c-2.995-.808-15-.808-15-.808s-12.008,0-15,.808A4.825,4.825,0,0,0,1.852,8.725c-.8,3.014-.8,9.3-.8,9.3s0,6.289.8,9.3a4.753,4.753,0,0,0,3.395,3.362c2.995.808,15,.808,15,.808s12.008,0,15-.808a4.753,4.753,0,0,0,3.395-3.362c.8-3.014.8-9.3.8-9.3s0-6.289-.8-9.3ZM16.323,23.737V12.318l10.036,5.71L16.323,23.737Z" transform="translate(-1.05 -4.5)"/> </svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if(get_option('mvl_linkedin')) : ?>
            <li>
                <a href="<?php echo get_option('mvl_linkedin') ?>" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26.9" height="26.899" viewBox="0 0 26.9 26.899"> <path id="Icon_awesome-linkedin-in" data-name="Icon awesome-linkedin-in" d="M6.021,26.9H.444V8.941H6.021ZM3.23,6.491A3.245,3.245,0,1,1,6.46,3.23,3.257,3.257,0,0,1,3.23,6.491ZM26.894,26.9H21.329V18.157c0-2.084-.042-4.755-2.9-4.755-2.9,0-3.344,2.264-3.344,4.605V26.9H9.515V8.941h5.349v2.45h.078a5.86,5.86,0,0,1,5.277-2.9c5.644,0,6.682,3.717,6.682,8.544V26.9Z" transform="translate(0 -0.001)"/> </svg>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>