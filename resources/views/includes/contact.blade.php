<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Contact Us</h2>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                    <h3>{{ config('app.name') }}</h3>
                    <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus.
                        Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc
                        congue.</p>
                    <div class="social-links">
                        <a href="https://github.com/mangomessenger" class="twitter"><i class="icofont-github"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="info">
                    <div>
                        <i class="ri-map-pin-line"></i>
                        <p>Poznan, Poland</p>
                    </div>

                    <div>
                        <i class="ri-mail-send-line"></i>
                        <p><a href="mailto:mangomessenger.official@gmail.com">mangomessenger.official</a></p>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                <form action="/" method="post" role="form" class="php-email-form">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                               data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                               data-rule="email" data-msg="Please enter a valid email"/>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                               data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center">
                        <button type="submit">Send Message</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section>
