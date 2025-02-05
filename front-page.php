<?php get_header(); ?>

  <main>
    <section class="land">
      <div class="bg" style="background: no-repeat center center / cover url('<?php echo get_template_directory_uri() ?>/assets/img/tattoo-artist-makes-a-tattoo.jpg')"></div>
      <div class="container">
        <div>
          <h1>
            WE CREATE
            <mark>TATTOOS</mark>
            TO MAKE YOUR BODY STUNNING
          </h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
          </p>
          <div class="flex gap-md">
            <a href="#contacts" class="btn">BOOK NOW</a>
            <a href="#gallery" class="btn secondary">
              our works
            </a>
          </div>
        </div>
        <div>
            <?php
            $video_url = get_theme_mod('video_url');
            ?>
            <?php if ($video_url): ?>
              <div class="play-btn">
                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="10" stroke="#1C274C" stroke-width="1.5"/>
                  <path d="M15.4137 10.941C16.1954 11.4026 16.1954 12.5974 15.4137 13.059L10.6935 15.8458C9.93371 16.2944 9 15.7105 9 14.7868L9 9.21316C9 8.28947 9.93371 7.70561 10.6935 8.15419L15.4137 10.941Z" stroke="#1C274C" stroke-width="1.5"/>
                </svg>
              </div>
              <div class="video">
                <div class="close-btn"></div>
                <video src="<?php echo esc_url($video_url); ?>" preload="auto" id="promo" controls width="100%" height="100%" loop></video>
              </div>
            <?php endif ?>
        </div>
      </div>
    </section>

    <section class="advantages">
      <div class="container">
        <div class="list">
            <?php for ($i = 1; $i <= 4; $i++) :
                $icon = get_theme_mod("advantage_icon_$i");
                $title = get_theme_mod("advantage_title_$i");
                $desc = get_theme_mod("advantage_desc_$i");

                if ($title && $desc) : ?>
                  <div class="item" style="--bg-icon: url('<?php echo esc_url($icon); ?>')">
                    <div class="icon"><img src="<?php echo esc_url($icon); ?>" alt=""></div>
                    <h4><?php echo esc_html($title); ?></h4>
                    <p><?php echo esc_html($desc); ?></p>
                  </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
      </div>
    </section>
    <!--hardcoded section-->
    <section id="about" class="about">
      <div class="container">
        <div>
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/tattoo-artist-makes-a-tattoo-1-1024x682.jpg" alt="">
        </div>
        <div>
          <h4 class="title">Welcome To DeepInk</h4>
          <h3>We Are The Best Tattoo Studio In Town</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
            enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
          </p>
          <figure class="signature flex gap-md align-center">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/signature.png" alt="Phil McCracken">
            <figcaption>Phil McCracken</figcaption>
          </figure>
          <a href="#about" class="btn">About us</a>
        </div>
      </div>
    </section>
      <?php
      $args = array(
          'post_type' => 'gallery',
          'posts_per_page' => 4,
      );

      $galleries_query = new WP_Query($args);

      if ($galleries_query->have_posts()) : ?>
    <section id="gallery" class="gallery">
      <div class="">
        <div class="flex direction-column align-center">
          <h4 class="title">Artwork</h4>
          <h3>
            Our Stunning Creations
          </h3>
          <p>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis.
          </p>
        </div>
        <div class="g-list">
            <?php while ($galleries_query->have_posts()) : $galleries_query->the_post(); ?>
              <div class="item" data-fancybox-trigger="<?php the_title(); ?>">
                <div class="title">
                  <span><?php the_title(); ?></span>
                </div>
              </div>
              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?php the_title(); ?>">
            <?php endwhile;
            endif; ?>
        </div>
      </div>
      <div class="images">
          <?php while ($galleries_query->have_posts()) :
          $galleries_query->the_post();

          $gallery_images = get_post_meta(get_the_ID(), '_cgm_gallery_images', true);
          $gallery_images = $gallery_images ? explode(',', $gallery_images) : array();

          if ($gallery_images) :
              foreach ($gallery_images as $image_id) :
                  $image_url = wp_get_attachment_url($image_id);
                  ?>
                  <img src="<?php echo esc_url($image_url); ?>" data-fancybox="<?php the_title(); ?>">
              <?php
              endforeach;
          endif;
          ?>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    </section>
      <?php


      // Reset post data
      wp_reset_postdata();
      ?>
    <section id="contacts" class="book">
      <div class="container">
        <h4 class="title">Still in doubt?</h4>
        <h3>
          Leave a message and we will contact you
        </h3>
        <?php echo do_shortcode('[contact-form-7 id="020aff3" title="Контактна форма 1"]') ?>
      </div>
    </section>
  </main>
<?php get_footer(); ?>