 --><style>
.mySlides {display:none;}
</style>
        <section id="home-slider">

            
               
                    <div class="w3-content w3-section" style="max-width:100%">
                          <img class="mySlides" src="img/slider/srki.jpg" style="width:100%">
                          <img class="mySlides" src="img/slider/company2.png" style="width:100%">
                          <!-- <img class="mySlides" src="img/slider/.JPG" style="width:100%;">   -->
                    </div>
                    <br><br>
                    <script>
                        var myIndex = 0;
                        carousel();

                        function carousel() {
                              var i;
                              var x = document.getElementsByClassName("mySlides");
                              for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";  
                              }
                              myIndex++;
                              if (myIndex > x.length) {myIndex = 1}    
                              x[myIndex-1].style.display = "block";  
                              setTimeout(carousel, 2500); // Change image every 2 seconds
                        }
                    </script>

				
		</section>
        <section id="about" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 wow animated fadeInLeft">
                            <div class="recent-works">
                                <h3>CHAIRMAN'S MESSAGE</h3>
                                <div id="works">
                                    <div class="message-body">
                                        <h4 style="color:white;">
                                            Shri Rajesh Desai Chairman  <br><br>
                                            Dear All, It was once said that India’s Destiny is being shaped in Four Walls.  In four walls of class rooms educational institutes were expected to work together with students and teachers to develop good human resource for the welfare of mankind. However, in the present scenario India’s destiny is being shaped both in and outside
                                              </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
                            <div class="welcome-block">
                                <h3>PRINCIPAL'S MESSAGE</h3>                                
                                 <div class="message-body">
                                    <!-- <img src="img/member-1.jpg" class="pull-left" alt="member"> -->
                                    <p>Dr. Chaulami Desai Principal <br><br>
                                    Dear Parents, students and well-wishers of the SRKI family- my prayerful greetings to all of you. First and foremost I would like to express my deep sentiments of gratitude to every one of you for your constant support, love and concern towards the college which enables and encourages us to strive hard to carry forward the mission of spreading value-based knowledge to one and all.</p>
                                 </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           