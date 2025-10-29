<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Ensino Secundario Geral Nossef')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">


  <main class="main">

    <x-navbar/>

    <!-- Hero Section -->
    @yield('content')
    <!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-brush"></i>
              </div>
              <h3>Creative Design</h3>
              <p>Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida arcu.</p>
              <a href="service-details.html" class="service-link">
                <span>Explore Service</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-globe"></i>
              </div>
              <h3>Web Development</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
              <a href="service-details.html" class="service-link">
                <span>Explore Service</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <h3>Digital Marketing</h3>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
              <a href="service-details.html" class="service-link">
                <span>Explore Service</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-headset"></i>
              </div>
              <h3>Consulting</h3>
              <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim.</p>
              <a href="service-details.html" class="service-link">
                <span>Explore Service</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="intro-content text-center mb-5" data-aos="fade-up" data-aos-delay="150">
              <p class="lead-text">Expertise refined through years of dedicated practice and continuous learning</p>
            </div>
          </div>
        </div>

        <div class="skills-grid">
          <div class="skill-item skills-animation" data-aos="fade-up" data-aos-delay="200">
            <div class="skill-icon">
              <i class="bi bi-palette2"></i>
            </div>
            <h3 class="skill-name">Creative Design</h3>
            <div class="skill-level">
              <span class="level-text">Professional</span>
              <div class="progress-track progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <p class="skill-description">Crafting visually compelling designs that communicate effectively and engage users across multiple touchpoints and platforms.</p>
          </div>

          <div class="skill-item skills-animation" data-aos="fade-up" data-aos-delay="250">
            <div class="skill-icon">
              <i class="bi bi-code-slash"></i>
            </div>
            <h3 class="skill-name">Frontend Development</h3>
            <div class="skill-level">
              <span class="level-text">Expert</span>
              <div class="progress-track progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <p class="skill-description">Building responsive, performant web applications using modern frameworks and following industry best practices for scalability.</p>
          </div>

          <div class="skill-item skills-animation" data-aos="fade-up" data-aos-delay="300">
            <div class="skill-icon">
              <i class="bi bi-graph-up"></i>
            </div>
            <h3 class="skill-name">Strategy &amp; Planning</h3>
            <div class="skill-level">
              <span class="level-text">Advanced</span>
              <div class="progress-track progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <p class="skill-description">Developing comprehensive digital strategies that align business objectives with user needs and market opportunities.</p>
          </div>

          <div class="skill-item skills-animation" data-aos="fade-up" data-aos-delay="350">
            <div class="skill-icon">
              <i class="bi bi-people"></i>
            </div>
            <h3 class="skill-name">Team Leadership</h3>
            <div class="skill-level">
              <span class="level-text">Professional</span>
              <div class="progress-track progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <p class="skill-description">Guiding cross-functional teams through complex projects while fostering collaboration and maintaining high standards of quality.</p>
          </div>

          <div class="skill-item skills-animation" data-aos="fade-up" data-aos-delay="400">
            <div class="skill-icon">
              <i class="bi bi-lightbulb"></i>
            </div>
            <h3 class="skill-name">Innovation</h3>
            <div class="skill-level">
              <span class="level-text">Advanced</span>
              <div class="progress-track progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <p class="skill-description">Identifying emerging trends and technologies to create forward-thinking solutions that push boundaries and exceed expectations.</p>
          </div>

          <div class="skill-item skills-animation" data-aos="fade-up" data-aos-delay="450">
            <div class="skill-icon">
              <i class="bi bi-gear"></i>
            </div>
            <h3 class="skill-name">Technical Architecture</h3>
            <div class="skill-level">
              <span class="level-text">Expert</span>
              <div class="progress-track progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <p class="skill-description">Designing robust technical foundations that support scalable growth while maintaining security and performance standards.</p>
          </div>
        </div>

        <div class="certification-area mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="cert-content">
                <h4 class="cert-title">Professional Certifications</h4>
                <p class="cert-description">Continuous learning and professional development ensure that skills remain current with industry standards and emerging technologies.</p>
                <div class="cert-list">
                  <div class="cert-item">
                    <i class="bi bi-award"></i>
                    <span>Google UX Design Professional Certificate</span>
                  </div>
                  <div class="cert-item">
                    <i class="bi bi-award"></i>
                    <span>AWS Certified Solutions Architect</span>
                  </div>
                  <div class="cert-item">
                    <i class="bi bi-award"></i>
                    <span>Certified Agile Project Manager</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="tools-showcase">
                <h5 class="tools-title">Essential Tools</h5>
                <div class="tools-grid">
                  <span class="tool-tag">Figma</span>
                  <span class="tool-tag">React</span>
                  <span class="tool-tag">Node.js</span>
                  <span class="tool-tag">Docker</span>
                  <span class="tool-tag">Sketch</span>
                  <span class="tool-tag">TypeScript</span>
                  <span class="tool-tag">MongoDB</span>
                  <span class="tool-tag">Kubernetes</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="200">
            <h2 class="section-headline mb-4">Measurable Excellence in Every Detail</h2>
            <p class="section-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris viverra veniam sit amet lacus cursus.</p>
          </div>
        </div>

        <div class="stats-grid row g-0 justify-content-center">
          <div class="col-lg-10">
            <div class="stats-container">

              <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-content">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2" class="purecounter"></span>K+
                  </div>
                  <div class="stat-divider"></div>
                  <div class="stat-label">Global Partners</div>
                  <p class="stat-description">Collaborating with industry leaders worldwide to deliver exceptional results.</p>
                </div>
              </div>

              <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-content">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="89" data-purecounter-duration="2" class="purecounter"></span>%
                  </div>
                  <div class="stat-divider"></div>
                  <div class="stat-label">Success Rate</div>
                  <p class="stat-description">Consistently achieving outstanding outcomes across all project categories.</p>
                </div>
              </div>

              <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-content">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="2.8" data-purecounter-duration="2" class="purecounter"></span>M
                  </div>
                  <div class="stat-divider"></div>
                  <div class="stat-label">Users Served</div>
                  <p class="stat-description">Empowering millions of users with innovative solutions and seamless experiences.</p>
                </div>
              </div>

              <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-content">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="2" class="purecounter"></span>/7
                  </div>
                  <div class="stat-divider"></div>
                  <div class="stat-label">Support Available</div>
                  <p class="stat-description">Round-the-clock assistance ensuring uninterrupted service and peace of mind.</p>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row justify-content-center mt-5">
          <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-delay="500">
            <div class="achievement-badge">
              <div class="badge-icon">
                <i class="bi bi-award"></i>
              </div>
              <div class="badge-content">
                <h4 class="badge-title">Industry Recognition</h4>
                <p class="badge-text">Awarded "Excellence in Innovation" for three consecutive years by leading industry organizations.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="client-item">
              <img src="assets/img/clients/clients-1.webp" class="img-fluid" alt="Client 1">
            </div>
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="150">
            <div class="client-item">
              <img src="assets/img/clients/clients-2.webp" class="img-fluid" alt="Client 2">
            </div>
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="client-item">
              <img src="assets/img/clients/clients-3.webp" class="img-fluid" alt="Client 3">
            </div>
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="250">
            <div class="client-item">
              <img src="assets/img/clients/clients-4.webp" class="img-fluid" alt="Client 4">
            </div>
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="client-item">
              <img src="assets/img/clients/clients-5.webp" class="img-fluid" alt="Client 5">
            </div>
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="350">
            <div class="client-item">
              <img src="assets/img/clients/clients-6.webp" class="img-fluid" alt="Client 6">
            </div>
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Check Our Services</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-laptop"></i>
              </div>
              <h3>Web Development</h3>
              <p>Crafting responsive, modern websites that deliver exceptional user experiences and drive business growth.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-brush"></i>
              </div>
              <h3>Brand Design</h3>
              <p>Creating compelling visual identities that communicate your brand's essence and resonate with your audience.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-graph-up-arrow"></i>
              </div>
              <h3>Digital Marketing</h3>
              <p>Strategic marketing solutions that amplify your reach and convert prospects into loyal customers.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-phone"></i>
              </div>
              <h3>Mobile Apps</h3>
              <p>Native and cross-platform mobile applications that provide seamless functionality across all devices.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-shield-check"></i>
              </div>
              <h3>Cybersecurity</h3>
              <p>Comprehensive security solutions to protect your digital assets and maintain customer trust.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item">
              <div class="service-icon">
                <i class="bi bi-people"></i>
              </div>
              <h3>Consulting</h3>
              <p>Expert guidance and strategic insights to optimize your business processes and achieve sustainable growth.</p>
              <a href="service-details.html" class="service-link">
                <span>Learn More</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonial-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 4000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "breakpoints": {
                "768": {
                  "slidesPerView": 2
                },
                "1200": {
                  "slidesPerView": 3
                }
              }
            }
          </script>

          <div class="swiper-wrapper">

            <!-- Testimonial Slide 1 -->
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="testimonial-header">
                  <img src="assets/img/person/person-f-12.webp" alt="Client" class="img-fluid" loading="lazy">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <div class="testimonial-body">
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit sed eiusmod tempor.</p>
                </div>
                <div class="testimonial-footer">
                  <h5>Jessica Martinez</h5>
                  <span>UX Designer</span>
                  <div class="quote-icon">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 2 -->
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="testimonial-header">
                  <img src="assets/img/person/person-m-8.webp" alt="Client" class="img-fluid" loading="lazy">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <div class="testimonial-body">
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa.</p>
                </div>
                <div class="testimonial-footer">
                  <h5>David Rodriguez</h5>
                  <span>Software Engineer</span>
                  <div class="quote-icon">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 3 -->
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
                <div class="testimonial-header">
                  <img src="assets/img/person/person-f-6.webp" alt="Client" class="img-fluid" loading="lazy">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <div class="testimonial-body">
                  <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud.</p>
                </div>
                <div class="testimonial-footer">
                  <h5>Amanda Wilson</h5>
                  <span>Creative Director</span>
                  <div class="quote-icon">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 4 -->
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="500">
                <div class="testimonial-header">
                  <img src="assets/img/person/person-m-12.webp" alt="Client" class="img-fluid" loading="lazy">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <div class="testimonial-body">
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                </div>
                <div class="testimonial-footer">
                  <h5>Ryan Thompson</h5>
                  <span>Business Analyst</span>
                  <div class="quote-icon">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 5 -->
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="600">
                <div class="testimonial-header">
                  <img src="assets/img/person/person-f-10.webp" alt="Client" class="img-fluid" loading="lazy">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <div class="testimonial-body">
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                </div>
                <div class="testimonial-footer">
                  <h5>Rachel Chen</h5>
                  <span>Project Manager</span>
                  <div class="quote-icon">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Slide -->

          </div>

          <div class="swiper-navigation">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Check Our&nbsp; Portfolio</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="fitRows" data-sort="original-order">

          <div class="portfolio-filters-wrapper" data-aos="fade-up" data-aos-delay="100">
            <ul class="portfolio-filters isotope-filters">
              <li data-filter="*" class="filter-active">All Projects</li>
              <li data-filter=".filter-branding">Branding</li>
              <li data-filter=".filter-web">Web Design</li>
              <li data-filter=".filter-print">Print Design</li>
              <li data-filter=".filter-motion">Motion</li>
            </ul>
          </div>

          <div class="row gy-4 portfolio-grid isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-3.webp" class="img-fluid" alt="Brand Identity" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-3.webp" class="glightbox zoom-link" title="Brand Identity Project">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>Brand Identity</h3>
                  <p>Corporate branding and visual identity system</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-web">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-7.webp" class="img-fluid" alt="E-commerce Platform" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-7.webp" class="glightbox zoom-link" title="E-commerce Platform">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>E-commerce Platform</h3>
                  <p>Modern online shopping experience</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-print">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-portrait-5.webp" class="img-fluid" alt="Magazine Design" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-portrait-5.webp" class="glightbox zoom-link" title="Magazine Design">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>Magazine Design</h3>
                  <p>Editorial layout and typography</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-motion">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-8.webp" class="img-fluid" alt="Motion Graphics" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-8.webp" class="glightbox zoom-link" title="Motion Graphics">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>Motion Graphics</h3>
                  <p>Animated visual storytelling</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-9.webp" class="img-fluid" alt="Logo Collection" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-9.webp" class="glightbox zoom-link" title="Logo Collection">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>Logo Collection</h3>
                  <p>Diverse brand mark explorations</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-web">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-portrait-8.webp" class="img-fluid" alt="Mobile App Design" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-portrait-8.webp" class="glightbox zoom-link" title="Mobile App Design">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>Mobile App Design</h3>
                  <p>User-centered interface design</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-print">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-10.webp" class="img-fluid" alt="Packaging Design" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-10.webp" class="glightbox zoom-link" title="Packaging Design">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>Packaging Design</h3>
                  <p>Sustainable product packaging solutions</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-motion">
              <div class="portfolio-card">
                <div class="image-container">
                  <img src="assets/img/portfolio/portfolio-11.webp" class="img-fluid" alt="Brand Animation" loading="lazy">
                  <div class="overlay">
                    <div class="overlay-content">
                      <a href="assets/img/portfolio/portfolio-11.webp" class="glightbox zoom-link" title="Brand Animation">
                        <i class="bi bi-zoom-in"></i>
                      </a>
                      <a href="portfolio-details.html" class="details-link" title="View Project Details">
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="content">
                  <h3>Brand Animation</h3>
                  <p>Dynamic brand identity systems</p>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Grid -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->


  </main>

  <x-footer/>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>