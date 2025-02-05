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
                <div class="play-btn">
                    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10" stroke="#1C274C" stroke-width="1.5"/>
                        <path d="M15.4137 10.941C16.1954 11.4026 16.1954 12.5974 15.4137 13.059L10.6935 15.8458C9.93371 16.2944 9 15.7105 9 14.7868L9 9.21316C9 8.28947 9.93371 7.70561 10.6935 8.15419L15.4137 10.941Z" stroke="#1C274C" stroke-width="1.5"/>
                    </svg>
                </div>
                <div class="video">
                    <div class="close-btn"></div>
                    <video src="<?php echo get_template_directory_uri() ?>/assets/vid.mp4" preload="auto" id="promo" controls width="100%" height="100%" loop></video>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages">
        <div class="container">
            <div class="list">
                <div class="item" style="--bg-icon: url('./assets/img/icons/medal.svg')">
                    <div class="icon"><img src="./assets/img/icons/medal.svg" alt=""></div>
                    <h4>BEST TATTOO</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="item" style="--bg-icon: url('./assets/img/icons/medal.svg')">
                    <div class="icon"><img src="./assets/img/icons/thumb.svg" alt=""></div>
                    <h4>GOOD QUALITY</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="item" style="--bg-icon: url('./assets/img/icons/medal.svg')">
                    <div class="icon"><img src="./assets/img/icons/syringe.svg" alt=""></div>
                    <h4>HYGIENE TOOLS</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
                <div class="item" style="--bg-icon: url('./assets/img/icons/medal.svg')">
                    <div class="icon"><img src="./assets/img/icons/person-check.svg" alt=""></div>
                    <h4>TATTOO ARTIST</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <div>
                <img src="./assets/img/tattoo-artist-makes-a-tattoo-1-1024x682.jpg" alt="">
            </div>
            <div>
                <h4 class="title">Welcome To DeepInk</h4>
                <h3>We Are The Best Tattoo Studio In Town</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                    enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                </p>
                <figure class="signature flex gap-md align-center">
                    <img src="./assets/img/signature.png" alt="Phil McCracken">
                    <figcaption>Phil McCracken</figcaption>
                </figure>
                <a href="#about" class="btn">About us</a>
            </div>
        </div>
    </section>

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
                <div class="item" data-fancybox-trigger="neo">
                    <div class="title">
                        <span>Neotraditional</span>
                    </div>
                </div>
                <img src="./assets/img/tattoos/neo.jpg" alt="Neotraditional">
                <div class="item" data-fancybox-trigger="polka">
                    <div class="title">
                        <span>Trash Polka</span>
                    </div>
                </div>
                <img src="./assets/img/tattoos/trahspolka.jpg" alt="Trash Polka">
                <div class="item" data-fancybox-trigger="blackwork">
                    <div class="title">
                        <span>Blackwork</span>
                    </div>
                </div>
                <img src="./assets/img/tattoos/blackwork.webp" alt="Blackwork">
                <div class="item" data-fancybox-trigger="watercolor">
                    <div class="title">
                        <span>Watercolor</span>
                    </div>
                </div>
                <img src="./assets/img/tattoos/watercolor.jpg" alt="Watercolor">
            </div>
        </div>
        <div class="images">
            <img src="./assets/img/tattoos/neo/0aa247b4943432059dfd9c8e9c0e0105.jpg" data-fancybox="neo" alt="">
            <img src="./assets/img/tattoos/neo/2c05af25ca3ce0559837c66e2a5d8c0f.jpg" data-fancybox="neo" alt="">
            <img src="./assets/img/tattoos/neo/9fe3232ed60c66108137d4f97d90ede2.jpg" data-fancybox="neo" alt="">
            <img src="./assets/img/tattoos/neo/5596575d7c56e6feae2e6d268387e6a7.jpg" data-fancybox="neo" alt="">
            <img src="./assets/img/tattoos/neo/a6af1202654d6f979649e89437422860.jpg" data-fancybox="neo" alt="">

            <img src="./assets/img/tattoos/polka/0d2daf0d30f9a1492407af975ca83a38.jpg" data-fancybox="polka" alt="">
            <img src="./assets/img/tattoos/polka/1f53ebcdefbae3be9fb176985a4c995d.jpg" data-fancybox="polka" alt="">
            <img src="./assets/img/tattoos/polka/176912b7e924cd5f9e606ec52dc835b5.jpg" data-fancybox="polka" alt="">
            <img src="./assets/img/tattoos/polka/b13123accd49922b6b4cae5e9c383cfa.jpg" data-fancybox="polka" alt="">
            <img src="./assets/img/tattoos/polka/ef31b354bef391270642d09df18bb23b.jpg" data-fancybox="polka" alt="">

            <img src="./assets/img/tattoos/black/8c0c28a69f9373177826d0ea99100232.jpg" data-fancybox="blackwork" alt="">
            <img src="./assets/img/tattoos/black/80ddbe277b7dff46e1ae2eee14535db5.jpg" data-fancybox="blackwork" alt="">
            <img src="./assets/img/tattoos/black/456e216c75562780d87daa9bddc371c0.jpg" data-fancybox="blackwork" alt="">
            <img src="./assets/img/tattoos/black/367337897d7f86ddb0e3cb315774f3d9.jpg" data-fancybox="blackwork" alt="">
            <img src="./assets/img/tattoos/black/efaefd4102accfde7ea5ee46935eccc6.jpg" data-fancybox="blackwork" alt="">

            <img src="./assets/img/tattoos/water/2dfb25ae6a9f5123b9332d3908003dd5.jpg" data-fancybox="watercolor" alt="">
            <img src="./assets/img/tattoos/water/5bb211ed86c17a4735f041bf1b4c576a.jpg" data-fancybox="watercolor" alt="">
            <img src="./assets/img/tattoos/water/006b0145bd32719f89099adce2f4a571.jpg" data-fancybox="watercolor" alt="">
            <img src="./assets/img/tattoos/water/e5e1d59274f68fb481be81493076d51e.jpg" data-fancybox="watercolor" alt="">
            <img src="./assets/img/tattoos/water/w.jpg" data-fancybox="watercolor" alt="">

        </div>
    </section>

    <section id="contacts" class="book">
        <div class="container">
            <h4 class="title">Still in doubt?</h4>
            <h3>
                Leave a message and we will contact you
            </h3>
            <form action="" class="flex gap-md">
                <input type="text" name="name" placeholder="Name">
                <input type="tel" name="phone" placeholder="Phone">
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>

</main>
<?php get_footer(); ?>