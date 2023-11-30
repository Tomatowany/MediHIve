<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'MediHive';
    require_once('./includes/shared/head-index.php');
?>
<body>
    <?php  
        require_once('./includes/shared/header-nav.php');
    ?>
    <main>
      <section id="banner">
        <div class="banner-bg">
          <div class="banner-text container-fluid">
            <div class="narratives">
              <div id="mediHive">
                <h1 id="medi">Medi</h1><h1 id="hive">Hive</h1>
              </div>
              <h6>Global provider of Electronic</h6>
              <h6>Medical Record System</h6>
              <button type="submit" onclick="location.href='/pages/admin/login.php';" class="login-btn-2">Log in</button>
            </div>
          </div>
        </div>
      </section>

      <section id="testimonies">
        <div class="testimony container-fluid">
          <div class="row">
            <div class="subject col-12 col-sm-6 col-md-6 col-lg-1" id="T-subj">
              <p>TESTIMONIES</p>
              <img src="../img/heroPage/bg_shapes_blur.svg" id="blurrr" alt="blur pic">
            </div>
            <div class="container col-12 col-sm-6 col-md-6 col-lg-11" id="tescar" style="padding: 0;">
              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="0">
                    <div class="ttmns-1">
                      <div class="profile-1 col-12 col-sm-6 col-md-6 col-lg-3">
                        <img src="img/testimonies/woman.jpg" class="img-fluid" alt="testimony pic1">
                      </div>
                      <div class="feedback-1 col-12 col-sm-6 col-md-6 col-lg-8">
                        <p>"MediHive as an electronic medical record system proved to be 
                          a revolutionary tool in a medical practitioner’s arsenal."</p>
                        <p id="witness">Angel Mae Digal Liabado (July 2025)</p>
                      </div>
                    </div>
                    <div class="ttmns-2">
                      <div class="feedback-2 col-12 col-sm-6 col-md-6 col-lg-8">
                        <p>"Life as a nurse never became more bearable thanks to 
                          MediHive. Dahil sa MediHive, nagbago buhay ko."</p>
                        <p id="witness">Rolanie Jane Tejada (October 2026)</p>  
                      </div>
                      <div class="profile-2 col-12 col-sm-6 col-md-6 col-lg-3">
                        <img src="img/testimonies/man.jpg" class="img-fluid" alt="testimony pic2">
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="0">
                    <div class="ttmns-1">
                      <div class="profile-1 col-12 col-sm-6 col-md-6 col-lg-3">
                        <img src="img/testimonies/victor.png" class="img-fluid" alt="testimony pic1">
                      </div>
                      <div class="feedback-1 col-12 col-sm-6 col-md-6 col-lg-8">
                        <p>"The stress imposed by taking care of others is  immense that's why by having MediHive,
                          life as a medical practitioner is exponentially better."</p>
                        <p id="witness">Victor Timely</p>
                      </div>
                    </div>
                    <div class="ttmns-2">
                      <div class="feedback-2 col-12 col-sm-6 col-md-6 col-lg-8">
                        <p>"MediHive is truly a remarkable feat of system engineering for it hits perfectly 
                          the many conundrum we, healthcare providers, experience in a daily basis with solutions 
                          that are truly solutions."</p>
                        <p id="witness">Loki Odinson</p>  
                      </div>
                      <div class="profile-2 col-12 col-sm-6 col-md-6 col-lg-3">
                        <img src="img/testimonies/loki.png" class="img-fluid" alt="testimony pic2">
                      </div>
                      <span id="vmg-link"></span> 
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </div>
          </div>
        </div> 
      </section>
  
      <section id="VMG">
        
        <div class="visbox col-12 col-sm-6 col-md-5" id="vmglink">
          <div class="vmgpic">
            <img src="img/heroPage/eye.svg" id="eyehair" alt="eye">
          </div>
          <div class="vmgcontent">
            <p id="titvimi">VISION</p>
            <p>To to be at the forefront of the global intersection between technology and health industry.</p>
          </div>
        </div>
        <div class="misbox col-12 col-sm-6 col-md-5">
          <div class="vmgpic">
            <img src="img/heroPage/crosshair.svg" id="eyehair" alt="crosshair">
          </div>
          <div class="vmgcontent">
            <p id="titvimi">MISSION</p>
            <p>To usher in a new era of technology and health amalgamation for the benefit of the human civilization.</p>
          </div>
        </div>
      </section>

      <section id="medihive-team">
        <div class="container-fluid" id="team-link">
          <div class="subject text-center my-2" id="MT-subj">
            <h1>MEET THE TEAM</h1>
          </div>
            <div class="mh-team row">
              <div class="concard">
                <div class="card">
                  
                  <div class="front">
                    <img src="img/heroPage/money.svg" class="picard" alt="money">
                    <p class="front-heading">Hustler</p>
                  </div>
                  <div class="back">
                    <div class="polaroid">
                      <img src="img/founders/ESTRADA.jpg" class="img-fluid" alt="shan">
                      <p class="mh-name my-2">Shan</p>
                    </div>
                  </div>

                </div>
              </div>
              <div class="concard">
                <div class="card">
                  
                  <div class="front">
                    <img src="img/heroPage/trend-up.svg" class="picard" alt="trendup">
                    <p class="front-heading">Hipster</p>
                  </div>
                  <div class="back">
                    <div class="polaroid">
                      <img src="img/founders/RUBERT_POGs.jpg" class="img-fluid" alt="rubert">
                      <p class="mh-name my-2">Rubert</p>
                    </div>
                  </div>

                </div>
              </div>
              <div class="concard">
                <div class="card">
                  
                  <div class="front">
                    <img src="img/heroPage/laptop.svg" class="picard" alt="laptop">
                    <p class="front-heading">Hacker</p>
                  </div>
                  <div class="back">
                    <div class="polaroid">
                      <img src="img/founders/LANDIAO.jpg" class="img-fluid" alt="angelo">
                      <p class="mh-name my-2">Angelo</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </div>
      </section>

      <section id="medihive-sec">
        <div class="medihive-desc">
          <p>MediHive, the ultimate Electronic Medical Record. 
            A patient-centric solution to record-keeping and medical 
            analysis.</p>
          <p id="fnder">-Living Founders</p>
        </div>
      </section>
      
      <section id="partners">
        <div class="subject text-center my-2" id="P-subj">
          <h1>OUR PARTNERS</h1>
        </div>
        <div class="parcon container-fluid">
          <div class="cards row">
            
            <div class="card one">
              <img src="img/partners/acer-2011.svg" class="img-fluid" alt="acer">
            </div>
            <div class="card one">
              <img src="img/partners/intel.svg" class="img-fluid" alt="intel">
            </div>
            <div class="card one">
              <img src="img/partners/google-1-1.svg" class="img-fluid" alt="google">
            </div>
            
            <div class="card one">
              <img src="img/partners/micro-star-international-logo.svg" class="img-fluid" alt="msi">
            </div>

            <div class="card one">
              <img src="img/partners/ryzen-amd-1.svg" class="img-fluid" alt="intel">
            </div>

            <div class="card one">
              <img src="img/partners/apple-11.svg" class="img-fluid" alt="google">
            </div>
          </div>
        </div>
      </section>
      
    </main>
    <?php
      require_once('./includes/shared/footer-index.php');
    ?>
    <?php
        require_once('./includes/js.php');
    ?>
</body>
</html>
