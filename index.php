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
        <div class="banner-text container-fluid">
          <div class="narratives">
            <p><span class="spOne">Medi</span><span class="spTwo">Hive</span></p>
            <h4>Global Provider of Electronic</h4>
            <h4>Medical Record System</h4>
          </div>
          <button type="submit" onclick="location.href='/pages/admin/login.php';" class="login-btn-2">Log in</button>
        </div>
        <div class="banner-bg"></div>
      </section>

      <section id="testimonies">
        <div class="testimony container-fluid">
          <div class="row">
            <div class="subject text-center my-2" id="T-subj">
              <h1>Testimonies</h1>
            </div>
            <div class="container" style="padding: 0;">
              <div class="ttmns-1">
                <div class="profile-1 col">
                  <img src="img/testimonies/woman.jpg" class="img-fluid" alt="testimony pic1">
                </div>
                <div class="feedback-1 col">
                  <p>"MediHive as an electronic medical record system proved to be 
                    a revolutionary tool in a medical practitioner’s arsenal."</p>
                  <p id="witness">-Angel Mae Digal Liabado (July 2025)</p>
                </div>
              </div>
              <div class="ttmns-2">
                <div class="feedback-2 col">
                  <p>"Life as a nurse never became more bearable thanks to 
                    MediHive. Dahil sa MediHive, nagbago buhay ko."</p>
                  <p id="witness">-Rolanie Jane Tejada (October 2026)</p>  
                </div>
                <div class="profile-2 col">
                  <img src="img/testimonies/man.jpg" class="img-fluid" alt="testimony pic2">
                </div>
                <span id="vmg-link"></span> 
              </div>
          </div>
          </div>
        </div>
      </section>
  
      <section id="VMG">
        <div class="vmg-sec container-fluid">
          <div class="vmg-1 container-fluid">
            <div class="subject text-center my-2">
              <h1>Vision</h1>
            </div>
            <div class="vision-text">
              <p>To to be at the forefront of the global intersection 
                between the technology and health industry. </p>
            </div>
          </div>
          <div class="vmg-2 container-fluid">
            <div class="subject text-center my-2">
              <h1 id="mssn">Mission</h1>
            </div>
            <div class="mission-text">
              <p>To usher in a new era of technology and health
                amalgamation for the benefit of the human 
                civilization. </p>
                <span id="team-link"></span>
            </div>
          </div>
        </div>
      </section>

      <section id="medihive-team">
        <div class="container-fluid">
          <div class="subject text-center my-2" id="MT-subj">
            <h1>The MediHive Team</h1>
          </div>
          <div class="container">
            <div class="mh-team row">
              <div class="polaroid col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
                <img src="img/founders/ESTRADA.jpg" class="img-fluid" alt="shan">
                <div class="container"></div>
                <p class="mh-name text-center my-2">Shan</p>
              </div>
              <div class="polaroid col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
                <img src="img/founders/RUBERT_POGs.jpg" class="img-fluid" alt="rubert">
                <p class="mh-name text-center my-2">Rubert</p>
              </div>
              <div class="polaroid col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
                <img src="img/founders/LANDIAO.jpg" class="img-fluid" alt="angelo">
                <p class="mh-name text-center my-2" id="timeline-link">Angelo</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section id="medihive-timeline" class="my-3">
        <div class="container-fluid">
          <div class="subject text-center my-2" id="TL-subj">
            <h1>MediHive Timeline</h1>
          </div>
          <div class="container">

            <div class="tmln-row row">
              <div class="tmln-pic col">
                <img src="img/timelines/t1.jpeg" class="img-fluid" alt="timeline-pic1">
              </div>
              <div class="milestone col">
                <p>Company Establishment - 08/27/23</p>
              </div>
            </div>
            <div class="tmln-row row">
              <div class="milestone col">
                <p>Ciudad Medical Partnership - 09/01/23</p>
              </div>
              <div class="tmln-pic col">
                <img src="img/timelines/t2.jpg" class="img-fluid" alt="timeline-pic2">
              </div>
            </div>
            <div class="tmln-row row">
              <div class="tmln-pic col">
                <img src="img/timelines/t3.jpg" class="img-fluid" alt="timeline-pic3">
              </div>
              <div class="milestone col">
                <p>Google Partnership - 10/07/23</p>
              </div>
            </div>
            <div class="tmln-row row">
              <div class="milestone col">
                <p>Apple Partnership - 10/27/23</p>
              </div>
              <div class="tmln-pic col">
                <img src="img/timelines/t4.jpg" class="img-fluid" alt="timeline-pic4">
              </div>
            </div>
            <div class="tmln-row row">
              <div class="tmln-pic col">
                <img src="img/timelines/t5.jpg" class="img-fluid" alt="timeline-pic5">
              </div>
              <div class="milestone col">
                <p>Z.C.  General Hospital - 11/01/23</p>
              </div>
              <p id="partner-link"></p>
            </div>
          </div>
        </div>
      </section>

      <section id="medihive-sec">
        <div class="medihive-desc">
          <p>MediHive, the ultimate Electronic Medical Record. 
            A patient-centric solution to record-keeping and medical 
            analysis.<br><br>- Founder</p>
            <span id="ttmns-link"></span>
        </div>
      </section>
      
      <section id="partners">
        <div class="container-fluid">
          <div class="subject text-center my-2" id="P-subj">
            <h1>Our Partners</h1>
          </div>
          <div class="partner-list container-fluid">
            <div class="p-card col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
              <div class="card2">
                <img src="img/partners/acer-2011.svg" class="img-fluid" alt="">
              </div>
            </div>
            <div class="p-card col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
              <div class="card2">
                <img src="img/partners/micro-star-international-logo.svg" class="img-fluid" alt="">
              </div>
            </div>
            <div class="p-card col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
              <div class="card2">
                <img src="img/partners/google-1-1.svg" class="img-fluid" alt="">
              </div>
            </div>
          </div>
          <div class="partner-list container-fluid" id="partner-list-2">
            <div class="p-card col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
              <div class="card2">
                <img src="img/partners/intel.svg" class="img-fluid" alt="">
              </div>
            </div>
            <div class="p-card col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
              <div class="card2">
                <img src="img/partners/ryzen-amd-1.svg" class="img-fluid" alt="">
              </div>
            </div>
            <div class="p-card col-12 col-md-6 col-lg-4 d-flex justify-content-center flex-column align-content-center">
              <div class="card2">
                <img src="img/partners/apple-11.svg" class="img-fluid" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <?php
          require_once('./includes/shared/footer-index.php');
      ?>

    </main>
  
    <?php
        require_once('./includes/js.php');
    ?>
</body>
</html>