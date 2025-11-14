<?php
        include('include/connect.php');
               ?>		

<html>

<head>
	<title>ट्रायबल वेलफेयर टीचर्स एसोसिएशन | Home :: twtamp</title>

	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<!--<meta charset="utf-8">-->
	<meta name="keywords" content="टीचर्स एसोसिएशन, Teachers Association" />
	
        <script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
        <!--share Button-->
	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5d931a8b2303400012f93059&product=inline-share-buttons' async='async'></script>
	<!--//share button-->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
</head>
<style>
div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 90px;
  padding: 5px;
  background-color: #0066cc;
  border: 2px solid #0066cc;
  color: #ffffff;
  z-index: 1;
  
}
.div1 {
  position: -webkit-sticky;
  position: fixed;
  text-overflow: 100%;
  top: 18%;
  left: 74%;
  width: 25%;
  height: 40%;
  padding: 3px;
  float: right;
  background-color: #0066cc;
  border: 2px solid #0066cc;
  color: #ffffff;
  z-index: 1;
   animation-name: example;
  animation-duration: 4s;
  
}
/* Standard syntax */
@keyframes example {
  
  
  
  75%  {left:74%; top:94%;}
  100% {left:74%; top:18%;}
}

#adImage{
    /*top:100%;*/
    width: 100%;
    height: 100%;
    border: 2px;
    border-color:#ffffff; 
    position: absolute;
    clear: both;
    
}
.div1 .btn {
  position: absolute;
  top:95%;
  left: 95%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  opacity: 0.5;
  font-size: 16px;
  padding: 6px 16px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
  z-index: 3;
}
.div1 .btn:hover {
    opacity:0.9;
  background-color: black;
}
</style>

<style>
    .resp {
  width: 80%;
  max-width: 80px;
  height: auto;
}

input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style> 
<body>

    <div class="top_header" id="home">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="nav_top_fx_w3layouts_agileits">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					    aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="logo_wthree_agile">
						<h2>
                                                    <a class="navbar-brand" href="main.php">
                                                        <img src="images/header/logo.png" class="resp" align="left"><font color="#FFA500">ट्रायबल वेलफेयर टीचर्स एसोसिएशन	</font>
                                                        <!--<i class="fas fa-address-book" aria-hidden="true"></i> ट्रायबल वेलफेयर टीचर्स एसोसिएशन-->
                                                        <h1><span class="desc"><font color="#1569C7">विभाग के कल्याण में ही, कर्मचारियों का कल्याण हैI</font></span></h1>
                                                                <!--<span class="desc">Give a little. Help a lot.</span>-->
							</a>
						</h2>
					</div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<div class="nav_right_top">
						<ul class="nav navbar-nav">
							<li class="active">
                                                            <a href="main.php">Home</a>
							</li>
                                                        
                                                        
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li>
                                                            <a  href="about.php">Objectives</a>
							</li>	
                                                                    <li>
                                                                        <a  href="reg.php">Registration</a>
									</li>
									<li>
                                                                            <a  href="bylaws.php">Bylaws</a>
									</li>
								       </ul>
							</li>
                                                        
							<li>
                                                            <a  href="membership.php">Membership</a>
							</li>
                                                        <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Order
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<?php
					mysqli_set_charset('utf8');
					$query=mysqli_query("select * from city1");
					while($a=mysqli_fetch_array($query)){
						
						$cid1=$a['cid1'];
						$city1=$a['city1'];
						
					
						
					
					?>
					
                                                                    <li class="dropdown dropdown-submenu">
                                                                        <a  href="govtorder.php?cid1=<?php echo $cid1; ?>"class="dropdown-toggle" data-toggle="dropdown"><?php echo $city1; ?></a>
                                                                        <ul class="dropdown-menu">
                                                                          <?php
					mysqli_set_charset('utf8');
					$query1=mysqli_query("select * from ordersub where cid1=$cid1");
					while($a1=mysqli_fetch_array($query1)){
						
						$cid1=$a1['cid1'];
                                                $subid=$a1['subid'];
						$ordersubmenu=$a1['ordersubmenu'];
						
					
						
					
					?>  
                                                                            <li><a  href="deptorder.php?subid=<?php echo $subid; ?>"><?php echo $ordersubmenu; ?></a></li>
                                                                          <?php
						}
                                        
						?>
                                                                        </ul>	
                                                                    </li>
                                                                        
                                                                        <?php
						}
                                        
						?>
									
                                                                </ul>
							</li>

                                                        <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Associates
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<?php
					mysqli_set_charset('utf8');
					$query=mysqli_query("select * from cat");
					while($a=mysqli_fetch_array($query)){
						
						$catid=$a['catid'];
						$cattype=$a['cattype'];
						
					
						
					
					?>
					
                                                                    <li>
                                                                            <a  href="prant.php?catid=<?php echo $catid; ?>"><?php echo $cattype; ?></a>
									</li>
                                                                        <?php
						}
						?>
									
                                                                </ul>
							</li>

                                                        <!--end of associate menu-->
							<!--<li>-->
								<!--<a class="scroll" href="#team">Team</a>-->
							<!--</li>-->
							
                                                        

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li>
                                                                    <a  href="contact.php">Photos</a>
							</li>	
                                                                    <li>
                                                                        <a  href="ach.php">Achievement </a>
									</li>
									
								       </ul>
							</li>
                                                        
						</ul>
					</div>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
                <!--<div>
                    <br>
        <br>
        
        <br>
                 </div>-->
		<div class="clearfix"></div>
	</div>
    
<!--//Marquee-->
    
    <div class="sticky"><Marquee>दिनाँक 11 अक्टूबर 2019 को, माननीय श्री ओमकार सिंह मरकाम, मंत्री आदिम जाति कल्याण विभाग, की उपस्थिती में कार्यक्रम हो रहा है I</Marquee></div>
	<!-- banner -->
        <!--ad-->
        <div id="div1" class="div1">
        <button onclick="myFunction()" title="Close Ad" class="btn">X</button>
        <?php
				include('include/connect.php');
				
				$query=mysqli_query("select * from adinfo order by assid asc ");
				while($a=mysqli_fetch_array($query)){
					
					
					$assdesig=$a['assdesig'];
                                        
					
					
				
				?>
        <img src="admin/topicimg/<?php echo $a["image"] ?>"  id="adImage" alt="विज्ञापन के लिये संपर्क करें : 94070 72255">
<?php } ?>

        
    
     </div>
    <script>
function myFunction() {
  var x = document.getElementById("div1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<!--ad-->
<div class="banner_top" >
		<div id="myCarousel" class="carousel slide" >
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1" class=""></li>
				<li data-target="#myCarousel" data-slide-to="2" class=""></li>
				<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<div class="container">
						<div class="carousel-caption">
							<!--<h3>Change Begins With You.</h3>-->
                                                        <p>मुझे अत्यंत हर्ष है कि मैं एक ऐसी संस्था से जुड़ा हूँ जो अनुसूचित जनजाति के बच्चों और लोगों के विकास के लिए धरातल पर कार्य कर रही है I ट्रायबल वेलफेयर टीचर्स एसोसिएशन,जो बुद्धि जीवियो  का संघ है इन्होने इस समुदाय की समस्याओं को समझा और उसे दूर करने के लिए सराहनीय प्रयास किये और अनवरत किये जा रहे हैं  | आदिवासी पिछड़े क्षेत्र के लोगो में शिक्षा का प्रचार प्रसार करना विद्यालय में शत प्रतिशत बच्चो का नामांकन व ड्राप आउट को रोकना आदिवासी बच्चो को उच्च शिक्षा के लिए प्रेरित करना व मार्गदर्शन देना बालिका शिक्षा को प्रोत्साहन देना ट्रायबल विभाग के शिक्षकों व कर्मचारियों को अपने कर्त्तव्यों व अधिकारों के प्रति सचेत करना और शासन प्रशासन से समन्वय स्थापित करना इत्यादि कार्य ट्राइबल वेलफेयर टीचर्स एसोसिएसन द्वारा किये जा रहे है जो कि सराहनीय है |</p>
                                                        <p>मै संघ के उज्जवल भविष्य कि कामना करता हूँ |</p>
							<div class="bnr-button">
                                                            <a class="act" href="single.php">संरक्षक/मंत्री <br>श्री ओमकार सिंह मरकाम<br>
                                                           &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;आगे पढ़ें...
                                                            </a>
							</div>

						</div>
					</div>
				</div>
				<div class="item item2">
					<div class="container">
                                                <div class="carousel-caption">
							<h>
                                                            <p style="color:white;">ट्राइबल वेलफेयर टीचर्स एसोसिएसन को हार्दिक बधाई आपके द्वारा जो जनजातीय कार्य विभाग मै शिक्षा के क्षेत्र में गुणवत्ता उन्नयन के कार्य किये जा रहे है वह सराहनीय है I 
                                                            साथ ही विभाग से समन्वय कर कर्मचारियों को अपने कर्तव्य बोध का ज्ञान कराते हुए उनकी समस्याओं का निराकरण कराया जा रहा है वह एक कार्य है I
        हमारी शुभकामना है की आप और आपका संगठन हमेशा  ऐसे ही समाज उद्धार एवं शिक्षा के क्षेत्र मै कार्य करता रहे I</p></h>

							<div class="bnr-button">
                                                            <a class="act" href="#"> दीपाली रस्तोगी<br>
                                                                आई ए एस प्रमुख सचिव<br>
                                                                         जनजातीय कार्य विभाग मध्यप्रदेश </a>
							</div>

						</div>
                                            
					</div>
				</div>
				<div class="item item3">
					<div class="container">
						<div class="carousel-caption">

                                                    <h><p style="color:buttontext;">मुझे यह जानकर प्रसन्नता हुई की ट्राइबल वेलफेयर टीचर्स एसोसिएसन मध्यप्रदेश में जनजातीय बाहुल्य ८९ विकास खंड में शिक्षा को बढ़ावा देने के लिए कार्य कर रहा है ा  पिछड़ेपन के कारण अभी भी बहुत से बच्चे स्कूल नहीं जाते या बीच मै ही पढाई छोड़ देते है ऐसे बच्चो को पढाई की मुख्य धारा मै लाने के उद्देश्य  और जनजातीय कार्य विभाग के कर्मचारियों को अपने कर्तव्य व् अधिकारों के प्रति सचेत का कार्य एसोसिएसन कर रहे है ा  मै इनके उज्ज्वल भविष्य की कामना करता  हूँ I </p></h>

							<div class="bnr-button">
                                                            <a class="act" href="single2.php">जगदीश चंद्र जाटिया<br>कलेक्टर मंडला </a>
							</div>
						</div>
					</div>
				</div>
				<div class="item item4">
					<div class="container">
						
                                            <div class="carousel-caption">
                                                <p style="color:red;font-size:45px;">ताकत का सदुपयोग नेक इरादों से ही संभव है,अन्यथा ताकत विध्वंसकारी हो सकती हैI</p>

							<div class="bnr-button">
                                                            <a class="act" href="single1.php">प्रान्ताध्य <br>श्री डी.के.सिंगोर<br>
                                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;आगे पढ़ें... 
                                                            </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="fa fa-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="fa fa-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<!-- The Modal -->
		</div>
            
	</div>
	<!--//banner -->
	<!--<div class="banner_bottom donate-log">
		<div class="donate-inner">

			<div class="col-md-4 donate-f-login">
				<div class="donate-log-in book-form">
					<!--<h5>डी.के.सिंगोर</h5>-->
                                        <!--<p>-->

 <!--</p>--> 
					<!--<form action="#" method="post">-->
						<!--<input type="text" name="Name" placeholder="Name" required="" />-->
						<!--<input type="email" name="Email" class="email" placeholder="Email" required="" />-->
						<!--<input type="password" name="Password" class="password" placeholder="Password" required="" />-->
						<!--<div class="check-box two">-->
							<!--<input name="chekbox" type="checkbox" id="brand1" value="">-->
							<!--<label for="brand1">-->
								<!--<span></span>Remember Me.</label>-->
						<!--</div>-->
						<!--<input type="submit" value="Login">-->
					<!--</form>-->
				<!--</div>-->
			<!--</div>-->
                    <!--<br>-->
                    <!--<marquee><b>दिनाँक 11 अक्टूबर 2019 को, माननीय श्री ओमकार सिंह मरकाम, मंत्री आदिम जाति कल्याण विभाग, की उपस्थिती में मंडला में  कार्यक्रम हो रहा है I</b></marquee>-->
                    <!--<br>-->
			<!--<div class="col-md-8 donate-info">
				<h4>Message From Minister </h4>
                                <p>मुझे अत्यंत हर्ष है कि मैं एक येसी संस्था से जुड़ा हूँ जो अनुसूचित जनजाति के बच्चों और लोगों के विकास के लिए धरातल पर कार्य कर रही है I आजादी से लेकर अभी तक इस समुदाय के लिए सरकारी योजनायें तो बहुत सी आईं और पैसा भी सरकारी खजाने से निकला और कागज़ी काम भी हुआ I पर इनकी वास्तविक स्थिति किसी से छिपी नहीं है I <br>
                                    ट्रायबल वेलफेयर टीचर्स एसोसिएशन,जो बुद्धि जीवीयों का संघ है इन्होने इस समुदाय की समस्याओं को समझा और उसे दूर करने के लिए सराहनीय प्रयास किये और अनवरत किये जा रहे हैं I <br>
                                    आदिवासी पिछड़े क्षेत्र के लोगो में शिक्षा का प्रचार प्रसार करना<br>
                                        विद्यालय में शत प्रतिशत बच्चो का नामांकन व ड्राप आउट को रोकना<br>
                                        आदिवासी बच्चो को हायर एजुकेशन के लिए प्रेरित करना व मार्गदर्शन देना बालिका शिक्षा को प्रोत्साहन देना<br>
                                        ट्रायबल विभाग के शिक्षकों व कर्मचारियों को अपने कर्त्तव्यों व अधिकारों के प्रति सचेत करना और शासन प्रशासन से समन्वय स्थापित करना <br>
                                        
                                        <br>
                                        मैं संस्था के उज्ज्वल भविष्य की कामना करता हूँ I  <br>
</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
   <!--/testimonials-->
	<div class="tesimonials" id="test">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">महत्वपूर्ण लिंक</h3>
			<div class="inner_sec">
				<div class="test_grid_sec">
					<div class="col-md-offset-2 col-md-8">
						<div class="carousel slide two" data-ride="carousel" id="quote-carousel">
							<!-- Bottom Carousel Indicators -->
							<ol class="carousel-indicators two">
								<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#quote-carousel" data-slide-to="1"></li>
								<li data-target="#quote-carousel" data-slide-to="2"></li>
							</ol>

							<!-- Carousel Slides / Quotes -->
							<div class="carousel-inner">

								<!-- Quote 1 -->
								<div class="item active">
									<blockquote>
										<a href="http://educationportal.mp.gov.in/eKYC/Public/Aadhaar_e_KYC.aspx"><div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c1">
													<div class="dodecagon-in c1">
														<div class="dodecagon-bg c1">

														</div>
													</div>
												</div>
											</div>
                                                                                    <div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> मध्य प्रदेश राज्य शिक्षा सेवा के ऐसे कर्मचारी जिन्होंने अभी तक अपना ईकेवाईसी पूर्ण नहीं किया है वे अपने आधार नंबर के साथ ही समग्र आईडी का प्रयोग करके ईकेवाईसी पूर्ण कर सकते हैं यदि किसी के पास समग्र आईडी नंबर नहीं है तो समग्र आईडी के स्थान पर 9 बार 0 का प्रयोग करें और अपना ekyc पूर्ण करें</p>
                                                                                                <h6><img src="images/eKYC.JPG"></h6>
											</div>
										</div></a>
									</blockquote>
								</div>
								<!-- Quote 2 -->
								<div class="item">
									<blockquote>
                                                                            <a href="https://www.tribal.mp.gov.in/mptaas/Registration/Index"><div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c2">
													<div class="dodecagon-in c2">
														<div class="dodecagon-bg c2">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i> ट्रायबल में शिक्षक प्रोफ़ाइल पंजीयन की लिंक</p>
                                                                                                <h6><img src="images/tt2.jpg"></h6>
											</div>
										</div></a>
									</blockquote>
								</div>
								<!-- Quote 3 -->
								<div class="item">
									<blockquote>
                                                                            <a href="https://mptreasury.gov.in/IFMS/"><div class="test_grid">
											<div class="col-sm-3 text-center test_img">
												<div class="dodecagon c3">
													<div class="dodecagon-in c3">
														<div class="dodecagon-bg c3">

														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-9 test_img_info">
												<p>
													<i class="fas fa-quote-left"></i>एकीकृत वित्तीय प्रबंधन सूचना प्रणाली में लॉग इन करने के लिए लिंक </p>
                                                                                                <h6><img src="images/ifms.JPG"></h6>
											</div>
										</div></a>
									</blockquote>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//testimonials-->

	<?php
        include('include/footer.php');
        ?>
