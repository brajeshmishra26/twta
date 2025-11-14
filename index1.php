<?php 
  
		include('include/connect.php');	
		
		if(isset($_REQUEST["reg"])){
			
            
//            echo"<script type='text/javascript'>alert('Go Away');	</script>";
				
            
			mysqli_set_charset('utf8');
			$name = $_REQUEST["rname"];
                        $email = $_REQUEST["remail"];
			$mobile = $_REQUEST["rmobile"];
                        $desig = $_REQUEST["rdesig"];
                        $uniquecode = $_REQUEST["runiquecode"];
                        $firstappointdate = $_REQUEST["rfirstappointdate"];
                        $appointplace = $_REQUEST["rappointplace"];
                        $disecode = $_REQUEST["rdisecode"];
                        $vikaskhand = $_REQUEST["rvikaskhand"];
                        $dist = $_REQUEST["rdist"];
                        $paytype = $_REQUEST["rpaytype"];
                        
                        
                        
			
                        $sql = "select * from membership where temail = '$email' or  tmobile= '$mobile'";
                        $a = mysqli_query($sql);
			if($aa = mysqli_fetch_array($a)){
                            echo"<script type='text/javascript'>alert('Member Already Existed');	</script>";
//					echo "<center><label style='color:red'><b>Member Already Existed</b></label></center>";
			}else{
                                $aa = "insert into membership (tname, temail, tmobile, tdesig, tuniquecode, tfirstappointdate, tappointplace, tdisecode, tvikaskhand, tdist, tpaytype) values ('$name', '$email', '$mobile', '$desig', '$uniquecode', '$firstappointdate', '$appointplace', '$disecode', '$vikaskhand', '$dist', '$paytype')";
                               if(mysqli_query($aa)){
//						echo "<center><b>Registered Successfully</b></center>";
				echo"<script type='text/javascript'>alert('Registered successfully');	</script>";
                                   	
                                                
                               }
			}
				
		}elseif(isset($_REQUEST["login"])){
			
			$user = $_REQUEST["luser"];
			$pass = $_REQUEST["lpass"];			
			
			$sql = "select * from writer where email = '$user' and password='$pass' ";
			
                        $a = mysqli_query($sql);
			if($aa = mysqli_fetch_array($a)){
				if($aa["flag"]==0){
				?>	<script>
				alert("Approval Pending");
				</script>
			<?php		
				}else{
				
				$_SESSION['username'] = $aa["name"];
				$_SESSION['wid'] = $aa["wid"];
				if($pass==$aa["contact"]){
					?>
					<script>window.location.href="change_pw.php"; </script>
		<?php
					//header('location:change_pw.php');
				
				}else{
					if($aa["cityid"]==0){
					
					
		?>
					<script>window.location.href="profile.php"; </script>
		<?php		
					}else{
						
						?>
						<script>window.location.href="index.php"; </script>
						<?php
					}
		echo "Invlaid Request";
				//header("location:index.php");
				}}
			}else{
				?>
				
				
				
				<script>
				alert("Invalid Username Or Password");
				</script>
				<?php
		}
		}	
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
	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
</head>
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
                                                    <a class="navbar-brand" href="index.php">
                                                        <img src="images/g8.jpg" class="resp" align="left"><font color="#FFA500">ट्रायबल वेलफेयर टीचर्स एसोसिएशन	</font>
                                                        <!--<i class="fas fa-address-book" aria-hidden="true"></i> ट्रायबल वेलफेयर टीचर्स एसोसिएशन-->
                                                        <h1><span class="desc"><font color="#1569C7">हर कदम विभाग के साथ ... </font></span></h1>
                                                                <!--<span class="desc">Give a little. Help a lot.</span>-->
							</a>
						</h2>
					</div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<div class="nav_right_top">
						<ul class="nav navbar-nav">
							<li class="active">
                                                            <a href="index.php">Home</a>
							</li>
							<li>
                                                            <a  href="about.php">About</a>
							</li>
							<li>
                                                            <a  href="membership.php">Membership</a>
							</li>
                                                        <li>
                                                            <a  href="associates.php">Associates</a>
							</li>
							
							<!--<li>-->
								<!--<a class="scroll" href="#team">Team</a>-->
							<!--</li>-->
							
                                                        <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Order
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
                                                                            <a  href="govtorder.php">Gazette/Rule</a>
									</li>
									<li>
                                                                            <a  href="deptorder.php">Tribal</a>
									</li>
								<li>
                                                                    <a  href="education.php">education</a>
									</li>
                                                                </ul>
							</li>


							<li>
                                                            <a  href="contact.php">Contact</a>
							</li>

						</ul>
					</div>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
		<div class="clearfix"></div>
	</div>
	<!-- banner -->
	<div class="banner_top">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
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
							<h3>Change Begins With You.</h3>

							<div class="bnr-button">
								<a class="act" href="#">डी.के.सिंगोर </a>
							</div>

						</div>
					</div>
				</div>
				<div class="item item2">
					<div class="container">
						<div class="carousel-caption">
							<h3>Make good things happen</h3>

							<div class="bnr-button">
                                                            <a class="act" href="single.php">संरक्षक/मंत्री </a>
							</div>
						</div>
					</div>
				</div>
				<div class="item item3">
					<div class="container">
						<div class="carousel-caption">
							<h>
                                                            <p style="color:white;">ट्राइबल वेलफेयर टीचर्स एसोसिएसन को हार्दिक बधाई आपके द्वारा जो जनजातीय कार्य विभाग मै शिक्षा के क्षेत्र में गुणवत्ता उन्नयन के कार्य किये जा रहे है वह सराहनीय है I 
                                                            साथ ही विभाग से समन्वय कर कर्मचारियों को अपने कर्तव्य बोध का ज्ञान कराते हुए उनकी समस्याओं का निराकरण कराया जा रहा है वह एक कार्य है I
        हमारी शुभकामना है की आप और आपका संगठन हमेशा  ऐसे ही समाज उद्धार एवं शिक्षा के क्षेत्र मै कार्य करता रहे I</p></h>

							<div class="bnr-button">
                                                            <a class="act" href="single.html"> दीपाली रस्तोगी<br>
                                                                आई ए एस प्रमुख सचिव<br>
                                                                         जनजातीय कार्य विभाग मध्यप्रदेश </a>
							</div>

						</div>
					</div>
				</div>
				<div class="item item4">
					<div class="container">
						<div class="carousel-caption">

                                                    <h><p style="color:buttontext;">मुझे यह जानकर प्रसन्नता हुई की ट्राइबल वेलफेयर टीचर्स एसोसिएसन मध्यप्रदेश में जनजातीय बाहुल्य ८९ विकास खंड में शिक्षा को बढ़ावा देने के लिए कार्य कर रहा है ा  पिछड़ेपन के कारण अभी भी बहुत से बच्चे स्कूल नहीं जाते या बीच मै ही पढाई छोड़ देते है ऐसे बच्चो को पढाई की मुख्य धारा मै लाने के उद्देश्य  और जनजातीय कार्य विभाग के कर्मचारियों को अपने कर्तव्य व् अधिकारों के प्रति सचेत का कार्य एसोसिएसन कर रहे है ा  मै इनके उज्ज्वल भविष्य की कामना करता  हूँ I </p></h>

							<div class="bnr-button">
                                                            <a class="act" href="single.html">जगदीश चंद्र जाटिया<br>कलेक्टर मंडला </a>
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
	<div class="banner_bottom donate-log">
		<div class="donate-inner">

<!--			<div class="col-md-4 donate-f-login">
				<div class="donate-log-in book-form">
					<h5>Login Now</h5>
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Name" required="" />
						<input type="email" name="Email" class="email" placeholder="Email" required="" />
						<input type="password" name="Password" class="password" placeholder="Password" required="" />
						<div class="check-box two">
							<input name="chekbox" type="checkbox" id="brand1" value="">
							<label for="brand1">
								<span></span>Remember Me.</label>
						</div>
						<input type="submit" value="Login">
					</form>
				</div>
			</div>-->
			<div class="col-md-8 donate-info">
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
	<!--/ab-->
	<div class="banner_bottom" id="about">
		<div class="container">
			<h3 class="tittle_w3_agileinfo">About TWTA</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="help_full">
					<ul class="rslides" id="slider4">
						<li>
							<div class="respon_info_img">
								<img src="images/banner3.jpg" class="img-responsive" alt="Relief">
							</div>
							<div class="banner_bottom_left">
								<h4>आदिवासी पिछड़े क्षेत्र के लोगो में शिक्षा का प्रचार प्रसार करना</h4>

								<p>प्रदेश में अनुसूचित जनजाति की जनसंख्‍या 153.16 लाख (जनगणना 2011 के अनुसार) जो कि राज्‍य की कुल जनसंख्‍या का 21.10 प्रतिशत है, इस प्रकार मध्यप्रदेश देश का ऐसा राज्य है, जहाँ हर पांचवा व्यक्ति अनुसूचित जनजाति वर्ग का है। इन वर्गों के कल्याण एवं विकास को सुनिश्चित करने के लिए प्रदेश की आयोजना मद का 21.10 प्रतिशत हिस्सा अनुसूचित जनजाति उपयोजना की अवधारणा के तहत पृथक से प्रावधानित किया जाता है।</p>
								<p> </p>
								<div class="ab_button">
									<a class="btn btn-primary btn-lg hvr-underline-from-left" href="single.html" role="button">Read More </a>
								</div>
							</div>
						</li>
						<li>
							<div class="respon_info_img">
								<img src="images/banner2.jpg" class="img-responsive" alt="Relief">
							</div>
							<div class="banner_bottom_left">
								<h4>आदिवासी बच्चो को हायर एजुकेशन के लिए प्रेरित करना व मार्गदर्शन देना</h4>

								<p>शैक्षणिक स्तर एवं आर्थिक सुदृढ़ता किसी भी वर्ग की सामाजिक स्थिति की पहचान होते हैं। इसलिए विभाग का लक्ष्य अनुसूचित वर्गो का शैक्षणिक एवं आर्थिक उत्थान कर उन्हें समाज के अगले पायदान पर लाना हैं । मध्यप्रदेश ऐसा राज्य है, जहाँ आदिवासी विकासखण्डों में शिक्षा का संचालन जनजातीय कार्य विभाग द्वारा किया जाता है।</p>
								<p> </p>
								<div class="ab_button">
									<a class="btn btn-primary btn-lg hvr-underline-from-left" href="single.html" role="button">Read More </a>
								</div>
							</div>
						</li>
						<li>
							<div class="respon_info_img">
								<img src="images/banner1.jpg" class="img-responsive" alt="Relief">
							</div>
							<div class="banner_bottom_left">
								<h4>विद्यालय में शत प्रतिशत बच्चो का नामांकन व ड्राप आउट को रोकना</h4>
								<p>मध्यप्रदेश के 89 आदिवासी विकासखण्डों में प्राथमिक शिक्षा से लेकर हायर सेकेण्डरी तक की शिक्षा का दायित्व विभाग के पास है। इन विकासखण्डों में नवीन शैक्षणिक संस्थाओं को खोलना, पदों का निर्माण तथा नियन्त्रण विभाग द्वारा किया जाता है। विभाग द्वारा जनजाति छात्र-छात्राओं को विभिन्न प्रकार की छात्रवृत्तियाँ स्वीकृत एवं वितरण करने के साथ-साथ समस्त छात्रावास/आश्रमों एवं अन्य आवासीय संस्थाओं का संचालन भी किया जा रहा है। जिसमें जनजाति वर्ग के बालक एवं बालिका निवास कर शिक्षा प्राप्त कर रहे हैं।


</p>
								<p> </p>
								<div class="ab_button">
									<a class="btn btn-primary btn-lg hvr-underline-from-left" href="single.html" role="button">Read More </a>
								</div>
							</div>
						</li>
						<li>
							<div class="respon_info_img">
								<img src="images/banner4.jpg" class="img-responsive" alt="Relief">
							</div>
							<div class="banner_bottom_left">
								<h4>बालिका शिक्षा को प्रोत्साहन देना</h4>
								<p>मध्यप्रदेश सरकार द्वारा अनुसूचित जाति एवं जनजाति के छात्राओं को शिक्षण के साथ निःशुल्क आवास, भोजन, स्वच्छ पेयजल, विद्युत आदि की सुविधा देने के उद्देश्य से आश्रम शालायें,जूनियर, सीनियर, सीनियर-उत्कृष्ट, महाविद्यालयीन छात्रावासों तथा विशिष्ट आवासीय संस्थाओं का संचालन किया जा रहा है, जिसमें लाखों विद्यार्थी लाभांवित हो रहे हैं। 
</p>
								<p> </p>
								<div class="ab_button">
									<a class="btn btn-primary btn-lg hvr-underline-from-left" href="single.html" role="button">Read More </a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!--div class="news-main">
				<div class="col-md-6 banner_bottom_left">
					<div class="banner_bottom_pos">
						<div class="banner_bottom_pos_grid">
							<div class="col-xs-3 banner_bottom_grid_left">
								<div class="banner_bottom_grid_left_grid">
									<div class="dodecagon b1">
										<div class="dodecagon-in b1">
											<div class="dodecagon-bg b1">
												<span class="fas fa-camera-retro" aria-hidden="true"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--div class="col-xs-9 banner_bottom_grid_right">
								<h4>Health and Medication</h4>
								<p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>
								<div class="barWrapper">
									<span class="progressText">
										<b>Donators</b>
									</span>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
											<span class="popOver" data-toggle="tooltip" data-placement="top" title="85%"> </span>
										</div>
									</div>
								</div>
							</div>


							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-6 banner_bottom_left">
					<div class="banner_bottom_pos">
						<div class="banner_bottom_pos_grid">
							<div class="col-xs-3 banner_bottom_grid_left">
								<div class="banner_bottom_grid_left_grid">
									<div class="dodecagon b1">
										<div class="dodecagon-in b1">
											<div class="dodecagon-bg b1">
												<span class="far fa-thumbs-up" aria-hidden="true"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-9 banner_bottom_grid_right">
								<h4>Wildlife and Ecosystems</h4>
								<p>Lorem Ipsum is simply text the printing and typesetting standard industry.</p>
								<div class="barWrapper">
									<span class="progressText">
										<b>Donators</b>
									</span>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
											<span class="popOver" data-toggle="tooltip" data-placement="top" title="75%"> </span>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div-->
		</div>
	</div>
	<!--//ab-->
	<!--/what-->
	<div class="works" id="services">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">Government Order</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="ser-first">
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-edit" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>झाबुआ </h3>-->
                                                <a href="doc/govt/aahran adhikar.pdf"><p>समेकित छात्रवृत्ति योजना अंतर्गत आहरण एवं संवितरण .</p></a>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-paper-plane" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>धार </h3>-->
                                                <a href="doc/govt/anugrah rashi.pdf"><p>अध्यापक की मृत्यु होने पर आश्रित परिवार के लिए अनुग्रह राशि </p></a>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-star" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>मंडला </h3>-->
                                                <!--<a href="doc/govt/FamilyPlanning.pdf"><p>नसबंदी करने के फलस्वरूप दी जाने वाली अग्रिम वेतन वृद्धि </p></a>-->
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-user" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>सिवनी </h3>-->
						<a href="doc/govt/FamilyPlanning.pdf"><p>नसबंदी करने के फलस्वरूप दी जाने वाली अग्रिम वेतन वृद्धि </p></a>
					</div>
					<div class="clearfix"></div>
<div class="bnr-button">
    <a class="act" href="govtorder.php">All Order</a>
							</div>                                        
				</div>
			</div>

		</div>
	</div>
	<!--//what-->
        <!--/what-->
	<div class="works" id="price">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">Departmental Order</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="ser-first">
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-edit" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>झाबुआ </h3>-->
						<p>.</p>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-paper-plane" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>धार </h3>-->
						<p>.</p>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-star" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>मंडला </h3>-->
						<p>.</p>
					</div>
					<div class="col-md-3 ser-first-grid text-center">
						<div class="dodecagon">
							<div class="dodecagon-in">
								<div class="dodecagon-bg">
									<span class="far fa-user" aria-hidden="true"></span>
								</div>
							</div>
						</div>
						<!--<h3>सिवनी </h3>-->
						<p>.</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
	</div>
	<!--//what-->
	<!--/team-->
	<!--div class="banner_bottom" id="team">
		<div class="container">
			<h3 class="tittle_w3_agileinfo">Charity Volunteers</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="ser-first">
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t1">
							<div class="dodecagon-in t1">
								<div class="dodecagon-bg t1">

								</div>
							</div>
						</div>
						<h3>सजीर कादरी </h3>
						<p>प्रांतीय उपाध्यक्ष </p>
						<div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>
							</ul>

						</div>

					</div>
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t2">
							<div class="dodecagon-in t2">
								<div class="dodecagon-bg t2">

								</div>
							</div>
						</div>
						<h3>इलियास खान </h3>
						<p>प्रांतीय संगठन मंत्री </p>
						<div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>

							</ul>

						</div>

					</div>
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t3">
							<div class="dodecagon-in t3">
								<div class="dodecagon-bg t3">

								</div>
							</div>
						</div>
						<h3>गरिमा दीक्षित </h3>
						<p>प्रांतीय उपाध्यक्ष</p>
						<div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>

							</ul>

						</div>

					</div>
					<div class="col-md-3 photo-grid text-center">
						<div class="dodecagon t4">
							<div class="dodecagon-in t4">
								<div class="dodecagon-bg t4">

								</div>
							</div>
						</div>
						<h3>हेमेन्द्र मालवीय </h3>
						<p>प्रांतीय सचिव </p>
						<div class="team_icons">
							<ul class="social-nav model-3d-0 footer-social social">
								<li>
									<a href="#" class="facebook">
										<div class="front">
											<i class="fab fa-facebook-f" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<div class="front">
											<i class="fab fa-twitter" aria-hidden="true"></i>
										</div>

									</a>
								</li>
								<li>
									<a href="#" class="instagram">
										<div class="front">
											<i class="fab fa-instagram" aria-hidden="true"></i>
										</div>

									</a>
								</li>

							</ul>

						</div>

					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
	</div-->
        
	<!--//team-->
	<!--/gallery-->
	<div class="banner_bottom proj" id="gallery">
		<div class="wrap_view">
			<h3 class="tittle_w3_agileinfo">Associates</h3>
			<div class="inner_sec_info_w3layouts">
				<ul class="portfolio-categ filter">
					<li class="port-filter all active">
						<a href="#">All</a>
					</li>
					<li class="cat-item-1">
						<a href="#" title="प्रांतीय">प्रांतीय </a>
					</li>
					<li class="cat-item-2">
						<a href="#" title="संभागीय">संभागीय </a>
					</li>
					<li class="cat-item-3">
						<a href="#" title="जिला">जिला</a>
					</li>
					<li class="cat-item-4">
						<a href="#" title="विकासखंड">विकासखंड</a>
					</li>
				</ul>


				<ul class="portfolio-area">

					<li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p0.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p0.jpg" class="img-responsive" alt="Relief">
<h3>डी.के.सिंगोरे  </h3>
						<p>प्रांतीय अध्यक्ष </p>								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-1" data-type="cat-item-1">
						<div>
							<span class="image-block">
                                                            <a class="image-zoom" href="images/prantiya/p1.jpg" rel="prettyPhoto[gallery]">

									<img src="images/prantiya/p1.jpg" class="img-responsive" alt="Relief">
<h3>सुरेश यादव </h3>
						<p>प्रांतीय महासचिव</p>								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1">
						<div>
							<span class="image-block">
								<a class="image-zoom" href="images/prantiya/p2.jpg" rel="prettyPhoto[gallery]">

									<img src="images/prantiya/p2.jpg" class="img-responsive" alt="Relief">
                                                <h3>मनीष पवार </h3>
						<p>प्रांतीय महासचिव</p>
								</a>
							</span>
						</div>
					</li>


                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p3.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p3.jpg" class="img-responsive" alt="Relief">
                                                <h3>मुकेश पाटीदार </h3>
						<p>वरिष्ठ प्रांतीय उपाध्यक्ष </p>								</a>
							</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-3" data-type="cat-item-1">
						<div>
							<span class="image-block">
                                                            <a class="image-zoom" href="images/prantiya/p4.jpg" rel="prettyPhoto[gallery]">

									<img src="images/prantiya/p4.jpg" class="img-responsive" alt="Relief">
                                                 <h3>हेमेन्द्र मालवीय  </h3>
						<p>प्रांतीय सचिव </p>
								</a>
							</span>
						</div>
                                            </li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p5.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p5.jpg" class="img-responsive" alt="Relief">
                                                    <h3>सजीर कादरी  </h3>
						<p>प्रांतीय उपाध्यक्ष </p>								</a>
							</span>
						</div>
					</li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p6.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p6.jpg" class="img-responsive" alt="Relief">
                                                                <h3>इलियास खान </h3>
                                                                <p>प्रांतीय संगठन मंत्री </p>								</a>
							</span>
						</div>
					</li>
                                                <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p7.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p7.jpg" class="img-responsive" alt="Relief">
                                                <h3>सुशील नागेश्वर </h3>
						<p>प्रांतीय सह-संगठन मंत्री </p>								</a>
							</span>
						</div>
					</li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p8.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p8.jpg" class="img-responsive" alt="Relief">
                                                    <h5>शिरीन कुरैशी </h5>
						<p>प्रांतीय महा सचिव </p>								</a>
							</span>
						</div>
					</li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p9.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p9.jpg" class="img-responsive" alt="Relief">
                                                <h3>संजय शुक्ल </h3>
						<p>प्रांतीय उपाध्यक्ष </p>								</a>
							</span>
						</div>
					</li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p10.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p10.jpg" class="img-responsive" alt="Relief">
                                                    <h3>व्यास नारायण दुबे </h3>
						<p>प्रांतीय उपाध्यक्ष </p>								</a>
							</span>
						</div>
					</li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p11.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p11.jpg" class="img-responsive" alt="Relief">
                                                <h3>बाबूसिंह डामोर </h3>
						<p>प्रांतीय उपाध्यक्ष </p>								</a>
							</span>
						</div>
					</li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p12.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p12.jpg" class="img-responsive" alt="Relief">
                                                <h3>अरुण कुशवाहा </h3>
						<p>प्रांतीय संयुक्त सचिव </p>								</a>
							</span>
						</div>
					</li>
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p13.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p13.jpg" class="img-responsive" alt="Relief">
                                                <h3>नीरज दुबे  </h3>
						<p>प्रांतीय कोषाध्यक्ष  </p>								</a>
							</span>
						</div>
					</li>
                                        

                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p14.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p14.jpg" class="img-responsive" alt="Relief">
                                                <h3>कमलेश गुप्ता</h3>
						<p>प्रांतीय उपकोषाध्यक्ष</p>
                                                        </span>
						</div>
					</li>

                                        
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p15.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p15.jpg" class="img-responsive" alt="Relief">
                                                <h3>संजीव सोनी  </h3>
						<p>प्रांतीय प्रवक्ता </p>								</a>
							</span>
						</div>
					</li>

                                        
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p16.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p16.jpg" class="img-responsive" alt="Relief">
                                                <h3>विजय उपाध्याय </h3>
						<p>प्रांतीय आई.टी.सेल प्रभारी </p>								</a>
							</span>
						</div>
					</li>

                                        
                                        <li class="portfolio-item2" data-id="id-0" data-type="cat-item-1">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/prantiya/p17.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/prantiya/p17.jpg" class="img-responsive" alt="Relief">
                                                <h3>इरफ़ान मंसूरी </h3>
						<p>प्रांतीय मीडिया प्रभारी </p>								</a>
							</span>
						</div>
					</li>

                                        <!--sambhageey-->
<li class="portfolio-item2" data-id="id-0" data-type="cat-item-2">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/sambhageey/s1.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/sambhageey/s1.jpg" class="img-responsive" alt="Relief">
<h3>देवेन्द्र सोलंकी</h3>
						<p>संभागीय उपाध्यक्ष-इन्दोर  </p>								</a>
							</span>
						</div>
					</li>
<li class="portfolio-item2" data-id="id-0" data-type="cat-item-2">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/sambhageey/s0.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/sambhageey/s0.jpg" class="img-responsive" alt="Relief">
<h3>लक्ष्मी नारायण धाकड़ </h3>
						<p>संभागीय अध्यक्ष-इन्दोर  </p>								</a>
							</span>
						</div>
					</li>

                                        <!--//sambhageey-->                                        
<!--jila-->					<li class="portfolio-item2" data-id="id-4" data-type="cat-item-3">
						<div>
							<span class="image-block">
                                                            <a class="image-zoom" href="images/dist/d0.jpg" >

                                                                <img src="images/dist/d0.jpg" class="img-responsive" alt="Relief">
<h3>शैलेश मालवीय  </h3>
						<p>जिला अध्यक्ष-धार  </p>
								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-5" data-type="cat-item-3">
						<div>
							<span class="image-block">
                                                            <a class="image-zoom" href="images/dist/d1.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/dist/d1.jpg" class="img-responsive" alt="Relief">
<h3>कसरसिंह सोलंकी  </h3>
						<p>जिला अध्यक्ष-बडवानी   </p>
								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-6" data-type="cat-item-3">
						<div>
							<span class="image-block">
                                                            <a class="image-zoom" href="images/dist/d2.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/dist/d2.jpg" class="img-responsive" alt="Relief">
<h3>प्रीति डाबर  </h3>
						<p>जिला अध्यक्ष-अलीराजपुर    </p>
								</a>
							</span>
						</div>
					</li>


					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-3">
						<div>
							<span class="image-block">
                                                            <a class="image-zoom" href="images/dist/d3.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/dist/d3.jpg" class="img-responsive" alt="Relief">

<h3>रोहित मनाग्रे</h3>
						<p>जिला अध्यक्ष-खरगौन  </p>
								</a>
							</span>
						</div>
					</li>
<!--//jila-->
<!--vikaskhand-->
<li class="portfolio-item2" data-id="id-0" data-type="cat-item-4">
						<div>
							<span class="image-block img-hover">
                                                            <a class="image-zoom" href="images/vikaskhand//v0.jpg" rel="prettyPhoto[gallery]">

                                                                <img src="images/vikaskhand/v0.jpg" class="img-responsive" alt="TWTA">
<h3>डी.के.सिंगोरे  </h3>
						<p>विकासखंड अध्यक्ष </p>								</a>
							</span>
						</div>
					</li>
<!--//vikaskhand-->                                        
					<div class="clearfix"> </div>
				</ul>
				<!--end portfolio-area -->
			</div>
		</div>
	</div>


	<!--//gallery-->
	<div class="events-coming">
		<h3 class="tittle_w3_agileinfo cen"> Our Events Coming Soon
		</h3>
		<div class="inner_sec_info_w3layouts">
			<div class="content">
				<div class="simply-countdown-custom" id="simply-countdown-custom"></div>
			</div>
		</div>
	</div>
	<!--/last-->
	<!--div class="banner_bottom">
		<div class="container">
			<h3 class="tittle_w3_agileinfo"> Our Causes
			</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="last_sec">
					<div class="col-md-6 last-img-info-text">
						<h4>The causes title goes here </h4>
						<p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
							pulvinar neque pharetra ac. Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla
							viverra pharetra sem, eget pulvinar neque pharetra ac.
						</p>
						<div class="ab_button">
							<a class="btn btn-primary btn-lg" href="single.html" role="button">Read More </a>
						</div>
					</div>
					<div class="col-md-6 last-img-info_main">
						<div class="col-md-6 last-img-info">
							<div class="dodecagon l1">
								<div class="dodecagon-in l1">
									<div class="dodecagon-bg l1">

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 last-img-info">
							<div class="dodecagon l2">
								<div class="dodecagon-in l2">
									<div class="dodecagon-bg l2">

									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--//last-->
	<!--/price-->
	<!--div class="price-sec" id="price">
		<div class="container">
			<h3 class="tittle_w3_agileinfo">Simple Pricing</h3>
			<div class="inner_sec_info_w3layouts">
				<div class="col-md-4 last-img-info-text">
					<h4>Become a Guardian</h4>
					<p>Pellentesque convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla viverra pharetra sem, eget
						pulvinar neque pharetra ac. Lorem Ipsum convallis diam consequat magna vulputate malesuada. Cras a ornare elit. Nulla
						viverra pharetra sem, eget pulvinar neque pharetra ac.
					</p>
					<div class="ab_button">
						<a class="btn btn-primary btn-lg scroll" href="#contact">Donate Now </a>
					</div>
				</div>
				<div class="col-md-8 price-grid-main">
					<div class="price-info">
						<div class="prices">
							<div class="prices-top">
								<div class="dodecagon s1">
									<div class="dodecagon-in s1">
										<div class="dodecagon-bg s1">
											<h3>$30</h3>
										</div>
									</div>
								</div>

							</div>
							<div class="prices-bottom">
								<div class="prices-h">
									<h4>Standard</h4>

								</div>
								<ul>
									<li>First Des</li>
									<li>Second Des</li>
									<li> Third Des</li>
									<li>Fourth Des</li>
									<li class="dash">-</li>
								</ul>
								<a href="#" data-toggle="modal" data-target="#myModal1" class="button">sign up</a>
							</div>
						</div>
					</div>
					<div class="price-info">
						<div class="prices second">
							<div class="prices-top">
								<div class="dodecagon s1">
									<div class="dodecagon-in s1">
										<div class="dodecagon-bg s1">
											<h3>$90</h3>
										</div>
									</div>
								</div>

							</div>
							<div class="prices-bottom">
								<div class="prices-h">
									<h4>Golden</h4>

								</div>
								<ul>
									<li>First Des</li>
									<li>Second Des</li>
									<li> Third Des</li>
									<li>Fourth Des</li>
									<li class="dash">-</li>
								</ul>
								<a href="#" data-toggle="modal" data-target="#myModal1" class="button">sign up</a>
							</div>
						</div>
					</div>
					<div class="price-info">
						<div class="prices">
							<div class="prices-top">
								<div class="dodecagon s1">
									<div class="dodecagon-in s1">
										<div class="dodecagon-bg s1">
											<h3>$60</h3>
										</div>
									</div>
								</div>

							</div>
							<div class="prices-bottom">
								<div class="prices-h">
									<h4>Silver</h4>

								</div>
								<ul>
									<li>First Des</li>
									<li>Second Des</li>
									<li> Third Des</li>
									<li>Fourth Des</li>
									<li class="dash">-</li>
								</ul>
								<a href="#" data-toggle="modal" data-target="#myModal1" class="button">sign up</a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//price-->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header book-form">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4>Sign up Form</h4>
					<form action="#" method="post">
						<input type="text" name="Name" placeholder="Your Name" required="" />
						<input type="email" name="Email" class="email" placeholder="Email" required="" />
						<input type="password" name="Password" class="password" placeholder="Password" required="" />
						<div class="check-box">
							<input name="chekbox" type="checkbox" id="brand" value="">
							<label for="brand">
								<span></span>Remember Me.</label>
						</div>
						<input type="submit" value="Sign Up" >
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->
	<!--/testimonials-->
	<div class="tesimonials" id="test">
		<div class="container">
			<h3 class="tittle_w3_agileinfo cen">Latest News</h3>
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
										<div class="test_grid">
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
													<i class="fas fa-quote-left"></i> 2 अक्टूबर को मंडला आदिवासी बालक छातावास में "स्वछता और समाज" पर वाद-विवाद प्रतियोगिता का आयोजन किया जायेगा </p>
												<h6>संजय शुक्ला</h6>
											</div>
										</div>
									</blockquote>
								</div>
								<!-- Quote 2 -->
								<div class="item">
									<blockquote>
										<div class="test_grid">
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
													<i class="fas fa-quote-left"></i>2 अक्टूबर को जबलपुर संभाग के आदिवासी बालिका छातावास में "स्वछता और गाँधी का स्वप्न" पर निबंध लेखन प्रतियोगिता का आयोजन किया जायेगा .</p>
												<h6>मुकेश पाटीदार </h6>
											</div>
										</div>
									</blockquote>
								</div>
								<!-- Quote 3 -->
								<div class="item">
									<blockquote>
										<div class="test_grid">
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
													<i class="fas fa-quote-left"></i> अब संस्था कोई भी दान राशि या सदस्यता शुल्क ऑनलाइन माध्यम से ही ग्रहण करेगी .</p>
												<h6>विजय उपाध्याय </h6>
											</div>
										</div>
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

	<!-- /newsletter-->
	<div class="newsletter">
		<div class="col-sm-6 newsleft">
			<h3>Sign up for Newsletter !</h3>
		</div>
		<div class="col-sm-6 newsright">
			<form action="#" method="post">
				<input type="email" placeholder="Enter your email..." name="email" required="">
				<input type="submit" value="Submit">
			</form>
		</div>

		<div class="clearfix"></div>
	</div>
	<!-- //newsletter-->

	<!-- footer -->
	<div class="footer" id="contact">
		<div class="footer_inner_info_wthree_agileits">
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Membership</li>
						<li>Contact</li>
						<li>View Map</li>
					</ul>
					<div class="resp-tabs-container">
					<div class="tab2">

							<div class="tab-info">
								<div class="contact_grid_right">
									<h6>पंजीयन फॉर्म</h6>
									<form action="#" method="post">
										<div class="contact_left_grid">
											<input type="text" name="rname" placeholder="नाम" required="">
											<input type="email" name="remail" placeholder="ईमेल" required="">

                                                                                        <input type="text" name="rmobile" placeholder="मोबाइल नंबर" required="">
											<input type="text" name="rdesig" placeholder="पदनाम" required="">
                                                                                        <!--<input type="text" name="Subject" placeholder="जन्मतिथि" required="">-->
                                                                                        <input type="text" name="runiquecode" placeholder="यूनिक कोड" required="">
                                                                                        <input type="date" name="rfirstappointdate" placeholder="प्रथम नियुक्ति दिनांक" required="">
											<input type="text" name="rappointplace" placeholder="पदस्थ संस्था" required="">
                                                                                        <input type="text" name="rdisecode" placeholder="डायस कोड " required="">
                                                                                        <input type="text" name="rvikaskhand" placeholder="विकासखंड का नाम" required="">
                                                                                        <input type="text" name="rdist" placeholder="जिला का नाम" required="">
                                                                                        <select id="rpaytype" name="rpaytype" >
      <option value="0">सदस्यता का प्रकार </option>
      <option value="वार्षिक (120 रूपये)">वार्षिक (120 रूपये) </option>
      <option value="आजीवन (500 रूपये)">आजीवन (500 रूपये)</option>
    </select>
                                                                                        <!--<textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>-->
											<input type="submit" value="Submit" name="reg">
											<input type="reset" value="Clear">
											<div class="clearfix"> </div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--//tab_two-->	
                                            <!--/tab_one-->
						<div class="tab1">
							<div class="tab-info">

								<div class="address">
									<div class="col-md-4 address-grid">
										<div class="address-left">
											<div class="dodecagon f1">
												<div class="dodecagon-in f1">
													<div class="dodecagon-bg f1">
														<span class="fas fa-phone-volume" aria-hidden="true"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="address-right">
											<h6>Phone Number</h6>
											<p>+91 942 543 3556,+91 940 707 2255</p>

										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-4 address-grid">
										<div class="address-left">
											<div class="dodecagon f1">
												<div class="dodecagon-in f1">
													<div class="dodecagon-bg f1">
														<span class="far fa-envelope" aria-hidden="true"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="address-right">
											<h6>Email Address</h6>
											<p>Email :
												<a href="mailto:support@twtamp.in"> support@twtamp.in</a>
											</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="col-md-4 address-grid">
										<div class="address-left">
											<div class="dodecagon f1">
												<div class="dodecagon-in f1">
													<div class="dodecagon-bg f1">
														<span class="fas fa-map-marker-alt" aria-hidden="true"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="address-right">
											<h6>Location</h6>
											<p>मकान क्रमांक 1683,आनंद कॉलोनी देवदरा मंडला 481661  तहसील-मण्डला  जिला-मण्डला मध्यप्रदेश .

											</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<!--//tab_one-->
						
						<!--div class="tab3">

							<div class="tab-info">
								<div class="contact-map">

									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783"
									    class="map" style="border:0" allowfullscreen=""></iframe>
								</div>

							</div>
						</div-->
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!--//tabs-->
			<div class="clearfix"> </div>
			<ul class="social-nav model-3d-0 footer-social social two">
				<li>
					<a href="#" class="facebook">
						<div class="front">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
						</div>

					</a>
				</li>
				<li>
					<a href="#" class="twitter">
						<div class="front">
							<i class="fab fa-twitter" aria-hidden="true"></i>
						</div>

					</a>
				</li>
				<li>
					<a href="#" class="instagram">
						<div class="front">
							<i class="fab fa-instagram" aria-hidden="true"></i>
						</div>

					</a>
				</li>
				<li>
					<a href="#" class="pinterest">
						<div class="front">
							<i class="fab fa-linkedin" aria-hidden="true"></i>
						</div>

					</a>
				</li>
			</ul>
			<p class="copy-right">2019 TWTAMP
			</p>
		</div>
	</div>
	<!-- //footer -->
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!--// script for responsive tabs -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<script type="text/javascript" src="js/all.js"></script>
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>

	<!-- js -->
	<script type="text/javascript" src="js/simplyCountdown.js"></script>
	<link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
		$('#simply-countdown-losange').simplyCountdown({
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--js-->
	<!--/tooltip -->
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip({
				trigger: 'manual'
			}).tooltip('show');
		});

		// $( window ).scroll(function() {   
		// if($( window ).scrollTop() > 10){  // scroll down abit and get the action   
		$(".progress-bar").each(function () {
			each_bar_width = $(this).attr('aria-valuenow');
			$(this).width(each_bar_width + '%');
		});

		//  }  
		// });
	</script>
	<!--//tooltip -->
	<!-- Smooth-Scrolling-JavaScript -->
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll, .navbar li a, .footer li a").click(function (event) {
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //Smooth-Scrolling-JavaScript -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>


	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<script src="js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->


</body>

</html>
