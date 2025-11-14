<?php
    include('../include/config.php');
    include('../include/connect.php');
    // Use config system for paths
    $CMS_BASE = $config['cms_path'];
    ?>		

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   
    <title>ट्रायबल वेलफेयर टीचर्स एसोसिएशन | Home :: twtamp</title>
    <link rel="stylesheet" href="<?php echo $CMS_BASE; ?>/Content/bootstrap-datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/demo.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/bootstrap.css">
    <link rel="Stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/font-awesome.min.css">
    <link id="main_css" rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/fancybox-master/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/skdslider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CMS_BASE; ?>/Content/bootsnav.css">
       
	
    
    
    <style type="text/css">
        .lbl-asterisk:after {
            content: '*';
            font-weight: bold;
            color: red;
            font-size: 10px !important;
            padding: 5px;
        }

        .form-horizontal .control-label .lbl-asterisk:after {
            content: '*';
            font-weight: bold;
            color: red;
            font-size: 10px !important;
            padding: 5px;
        }

        .error-template {
            padding: 40px 15px;
            text-align: center;
        }

        .error-actions {
            margin-top: 15px;
            margin-bottom: 15px;
        }

            .error-actions .btn {
                margin-right: 10px;
            }
    </style>
    <style type="text/css">
                #photogallery .photogallery-item {
                    right: 0;
                    margin: 0 0 15px;
                }

                    #photogallery .photogallery-item .photogallery-link {
                        display: block;
                        position: relative;
                        margin: 0 auto;
                        max-width: 400px;
                    }

                        #photogallery .photogallery-item .photogallery-link .photogallery-hover {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            opacity: 0;
                            background: rgba(254,209,54,.9);
                            -webkit-transition: all ease .5s;
                            -moz-transition: all ease .5s;
                            transition: all ease .5s;
                        }

                            #photogallery .photogallery-item .photogallery-link .photogallery-hover:hover {
                                opacity: 1;
                            }

                            #photogallery .photogallery-item .photogallery-link .photogallery-hover .photogallery-hover-content {
                                position: absolute;
                                top: 50%;
                                width: 100%;
                                height: 20px;
                                margin-top: -12px;
                                text-align: center;
                                font-size: 20px;
                                color: #fff;
                            }

                                #photogallery .photogallery-item .photogallery-link .photogallery-hover .photogallery-hover-content i {
                                    margin-top: -12px;
                                }

                                #photogallery .photogallery-item .photogallery-link .photogallery-hover .photogallery-hover-content h3,
                                #photogallery .photogallery-item .photogallery-link .photogallery-hover .photogallery-hover-content h4 {
                                    margin: 0;
                                }

                    #photogallery .photogallery-item .photogallery-caption {
                        margin: 0 auto;
                        /*padding: 25px;*/
                        max-width: 400px;
                        text-align: center;
                        background-color: #fff;
                    }

                        #photogallery .photogallery-item .photogallery-caption h4 {
                            margin: 0;
                            text-transform: none;
                        }

                        #photogallery .photogallery-item .photogallery-caption p {
                            margin: 0;
                            font-family: "Droid Serif","Helvetica Neue",Helvetica,Arial,sans-serif;
                            font-size: 16px;
                            font-style: italic;
                        }

                #photogallery * {
                    z-index: 2;
                    min-height:34px;

                }

                .item-img-grid img{
                     width:280px;
                    height:190px;
                }
                .item-ads-grid{
            padding: 10px;
            border: 1px solid #DDD;
            margin-bottom: 20px;
            background-color: #FFF;
            overflow: hidden !important;
            position:relative;
            min-height: 251px;
        }


        .item-action-grid ul{
            list-style: none;
            padding: 0;
        }
        .item-action-grid ul li{
            display: inline;
            font-size: 12px;
            color: #BBB;
        }
        .item-title-grid h4{
            font-weight: 600;
        }

        .item-price-grid h3{
            font-weight: 500;
            font-size: 16px;
            color:#333;
        }

        .item-price-grid h3 i{
            color:#298CC5;
            font-size:14px;
            float:left;
            margin-right:10px;
        }

        .item-price-grid a{
            text-decoration:none !important;
        }

        .item-price-grid a:hover{
            text-decoration:none !important;
        }

        .item-price-grid span{
            color: #298CC5;
            font-size: 11px;
        }

        .item-img-grid img{
            /*height: 150px;*/
            text-align: center;
        }

        .item-badge-grid{
            top: 10%;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);
            left: -15%;
            position: absolute;
            transform: rotate(-45deg);
            z-index: 3;
            width: 175px;
        }

        .item-badge-grid a{
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            display: block;
            font-size: 11px;
            font-weight: bold;
            text-align: center;
            /*text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.8);*/
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

    </style>
<!--ad box style-->
<style>
           #myDIV.sticky {
              
  position: -webkit-sticky;
  position: sticky;
  float:right;
  top: 5%;
  left: 70%;
  background-color: #0066cc;
  border: 2px solid #0066cc;
  color: #ffffff;
  z-index: 1;
  
}

#myDIV {
  width: 25%;
  text-align: right;
 }
</style>
<!--/ad box style-->
</head>
<body>
    <!---Header Content Start-->
    <!---Home Content End-->
                       

<!--header Start-->
<div class="hader resizable-content">
    <div class="social-hader">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-sm-9">
                    <nav class="navbar ">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-bars" aria-hidden="true"></span> </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                
                                <Marquee>आई एफ एम आई एस में सातवें वेतनमान का विकल्प प्रारम्भ, जनवरी पेड़ फरवरी का भुगतान 7वे वेतनमान से होगा- डी के सिंगौर, विजय उपाध्याय | सभी प्रांतीय जिला ब्लॉक पदाधिकारी सभी सदस्यों की सदस्यता अतिशीघ्र करावे डी के सिंगौर , विजय उपाध्याय , मनीष पवार, सुरेश यादव, मुकेश पाटीदार सजीर कादरी | कर्मचारियों को पुरानी पेंशन पाना है तो विधायकों सांसदों की पेंशन पर हमला करना होगा - डी के सिंगौर, </Marquee>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-sm-3 text-right">
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="logo-header-wrapper">
        <div class="container">
            
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="logo-wrapper">
                        <a href="../main.php">
                            <code><img src="<?php echo $CMS_BASE; ?>/Images/header/logo.jpg" width="100" alt="logo of TWTAMP" /></code>
                            <span>ट्रायबल वेलफेयर टीचर्स एसोसिएशन <br> <strong>विभाग के कल्याण में ही, कर्मचारियों का कल्याण हैI</strong></span>
                        </a>
                    </div>
                </div>
                           </div>
        </div>
    </div>
    <nav class="navbar navbar-inverse affix-top" data-spy="affix" data-offset-top="15" data-offset-bottom="50">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
					<div class="nav_right_top">
						<ul class="nav navbar-nav">
							<li class="active">
                                                            <a href="index.php">Home</a>
							</li>
                                                        
                                                        
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li>
                                                            <a  href="../about.php">Objectives</a>
							</li>	
                                                                    <li>
                                                                        <a  href="../reg.php">Registration</a>
									</li>
									<li>
                                                                            <a  href="../bylaws.php">Bylaws</a>
									</li>
								       </ul>
							</li>
                                                        <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Membership
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<li>
                                                            <a  href="../php/index.php">Signup</a>
							</li>	
                                                                    <li>
                                                                        <a  href="../login.html">Login</a>
									</li>
									<li>
                                                                            <a  href="https://twtamp.co.in/admin/memberlist.php" target="_blank">Membership List</a>
									</li>
								       </ul>
							</li>
							
                                                        <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Order
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<?php
					mysqli_set_charset($link,'utf8');
					$query=mysqli_query($link,"select * from city");
					while($a=mysqli_fetch_array($query)){
						
						$cid1 = isset($a['cid1']) ? $a['cid1'] : 0;
						$city1 = isset($a['city1']) ? $a['city1'] : 'Undefined';
						
					    // Only proceed if cid1 is valid
					    if($cid1 > 0) {
					
					?>
					
                                                                    <li class="dropdown dropdown-submenu">
                                                                        <a  href="../govtorder.php?cid1=<?php echo $cid1; ?>"class="dropdown-toggle" data-toggle="dropdown"><?php echo $city1; ?></a>
                                                                        <ul class="dropdown-menu">
                                                                          <?php
					mysqli_set_charset($link,'utf8');
					$query1=mysqli_query($link,"select * from ordersub where cid1=" . intval($cid1));
					if($query1) {
					    while($a1=mysqli_fetch_array($query1)){
						    
						    $sub_cid1 = isset($a1['cid1']) ? $a1['cid1'] : 0;
                            $subid = isset($a1['subid']) ? $a1['subid'] : 0;
						    $ordersubmenu = isset($a1['ordersubmenu']) ? $a1['ordersubmenu'] : 'Undefined';
						
					
						
					
					?>  
                                                                            <li><a  href="../deptorder.php?subid=<?php echo $subid; ?>"><?php echo $ordersubmenu; ?></a></li>
                                                                          <?php
						    }
                            } // end if($query1)
                                        
						?>
                                                                        </ul>	
                                                                    </li>
                                                                        
                                                                        <?php
						    } // end if($cid1 > 0)
						} // end while($a=mysqli_fetch_array($query))
                                        
						?>
									
                                                                </ul>
							</li>

                                                        <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Associates
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<?php
					mysqli_set_charset($link,'utf8');
					$query=mysqli_query($link,"select * from cat");
					while($a=mysqli_fetch_array($query)){
						
						$catid=$a['catid'];
						$cattype=$a['cattype'];
						
					
						
					
					?>
					
                                                                    <li>
                                                                            <a  href="../prant.php?catid=<?php echo $catid; ?>"><?php echo $cattype; ?></a>
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
                                                                    <a  href="../contact.php">Photos</a>
							</li>	
                                                                    <li>
                                                                        <a  href="../ach.php">Achievement </a>
									</li>
									
								       </ul>
							</li>
                                                        
						</ul>
					</div>
				</div>
				<!--/.nav-collapse -->

        </div>
    </nav>
</div>

<!--header End-->

    

<div id="innerpage">
                <div class="container">
            <div class="row">
                <div>
<div class="col-xs-12 col-sm-9 col-md-9 nopaddingright">
    <div class="news-tricker-wrapper" id="maincontent">
        <h4>प्रांतीय संयोजक </h4>
        <ul id="ticker">
                        <li>ट्राइबल </li>
        </ul>
    </div>
</div>
</div>
                <div>
<div class="col-xs-12 col-sm-3 col-md-3">
    <div class="aboutusdiv no-padding">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse2" class="" aria-expanded="true">कैबिनेट मंत्री   </a>
                    </h4>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
        <div class="about-mid-content-center resizable-content">
            <div class="container">
                <div class="row">
                    
                    <div>
<!--Administrative Officer-->
<div class="col-xs-12 col-sm-2 col-md-2 wow slideInRight">
    <div class="full-width margintop10">
        <div class="cont_box newdesignbox">
            <div class="box_content text-center content_box_blue">
                    <code><img class="cm" src="<?php echo $CMS_BASE; ?>/Images/Photos/Chief Func, Madhya Pradesh/0620190411085.png" alt="माननीय प्रान्त-अध्यक्ष , photo"></code>
                                    <p><b>श्री धीरेन्द्र सिंगोर </b></p>
                                    <p>प्रान्त-अध्यक्ष , </p>
                                    <p>मध्य प्रदेश</p>
            </div>
        </div>
    </div>
</div>
<div>
<!-- Responsive slider - START -->
<div class="col-xs-12 col-sm-8 col-md-8 wow slideInLeft nopaddingright nopaddingleft">
    <div class="full-width margintop10 about-cont about-cont-hindi">
        <div class="col-xs-12 col-sm-12 col-md-12  nopaddingleft nopaddingright">
            <div id="responsive_wrapper" class="full-width">
                <ul id="slider_main">
                    <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/1.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/2.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/3.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/4.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/5.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/6.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/7.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/8.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/9.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/10.jpg" </li>
                            <li><img src="<?php echo $CMS_BASE; ?>/Images/slider/11.jpg" </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Responsive slider - END --></div>
<div class="col-xs-12 col-sm-2 col-md-2 wow slideInRight">
    <div class="full-width margintop10">
        <div class="cont_box newdesignbox">
            <div class="box_content text-center content_box_blue">
                    <code><img src="<?php echo $CMS_BASE; ?>/Images/Photos/Minister, Tribal Welfare Department/14102019053210minister_photo_right.png" alt="मंत्री, आदिम जाति कल्याण  विभाग  photo"></code>
                    <p><b>श्री कुँवर विजय शाह </b></p>
                    <p>आदिम जाति कल्याण विभाग  </p>
                    <p>मध्यप्रदेश </p>
            </div>
        </div>
    </div>
</div>
<!--Administrative Officer--></div>
                </div>
            </div>
        </div>
        <div>
<div class="industry-top resizable-content" style="margin-bottom:5px;">
    <div class="container">
        <div class="row">
                <div class="full-width">
                    <div class="col-xs-12 col-sm-6 col-md-6 ">
                            <div class="col-md-3 col-sm-3 mid-padding-left0">
                                <div class="card-view blue">
                                    <div class="text-center">
                                            <a href="../admin/memberlist.php">
                                                <em class="icon icon-user-tie"></em>
                                                <h4>सदस्य</h4>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 mid-padding-left0">
                                <div class="card-view purpel">
                                    <div class="text-center">
                                            <a href="#">
                                                <em class="icon icon-tree6"></em>
                                                <h4>ऑर्डर </h4>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 mid-padding-left0">
                                <div class="card-view pink">
                                    <div class="text-center">
                                            <a href="#">
                                                <em class="icon icon-folder-download"></em>
                                                <h4>संस्था परिपत्र</h4>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 mid-padding-left0">
                                <div class="card-view dark-grey">
                                    <div class="text-center">
                                            <a href="#">
                                                <em class="icon icon-coin-dollar"></em>
                                                <h4>दान </h4>
                                            </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                        <div class="col-xs-12 col-sm-6 col-md-6  nopaddingleft">
                                <div class="col-md-3 col-sm-3 mid-padding-left0">
                                    <div class="card-view blue">
                                        <div class="text-center">
                                                <a href="#">
                                                    <em class="icon icon-bed2"></em>
                                                    <h4>संस्था प्रबंधन</h4>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 mid-padding-left0">
                                    <div class="card-view purpel">
                                        <div class="text-center">
                                                <a href="../admin/adoptedschoollist.php">
                                                    <em class="icon icon-office"></em>
                                                    <h4>गोद लिए स्कूल </h4>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 mid-padding-left0">
                                    <div class="card-view pink">
                                        <div class="text-center">
                                                <a href="../sampark.php">
                                                    <em class="icon icon-map"></em>
                                                    <h4>संपर्क </h4>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 mid-padding-left0">
                                    <div class="card-view dark-grey">
                                        <div class="text-center">
                                                <a href="../showkarykram.php">
                                                    <em class="icon icon-file-text"></em>
                                                    <h4>कार्यक्रम </h4>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
        </div>
    </div>
</div>

</div>
        <!-- MOBILE APP POPUP-->
        <div id="myModalpratibha" class="modal fade in" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header panel-primary" style="border-bottom: 1px solid #252323;background-color: #337ab7; color:#FFF;font-size:20px;    text-align: center;">
                        <!--<a href="../main.php">-->
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="position: absolute;right: 14px;top: 12px;">&times; Close</button>
                        <h4 class="modal-title text-center" style="display: inline-block;text-align: center;"><strong>महत्वपूर्ण लिंक</strong></h4>

                    </div>
                    <!--ad
                        <div id="myDIV" class="sticky">
    <button onclick="myFunction()" title="Close Ad">X</button>
    <?php
				include('../include/connect.php');
				
				$query=mysqli_query($link,"select * from adinfo order by assid asc ");
				while($a=mysqli_fetch_array($query)){
					
					
					$assdesig=$a['assdesig'];
                                        
					
					
				
				?>
        <img src="../admin/topicimg/<?php echo $a["image"] ?>"  width="100%" alt="विज्ञापन के लिये संपर्क करें : 94070 72255">
<?php } ?>
    

</div>
<!--ad-->

                    <div class="modal-body">
                        


<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

                        <!--/ad-->
     
                        <div class="server-down" >
                            <ul>
                                <li><i class="fa fa-arrow-circle-right"></i>  डी.ए. इन्क्रीमेंट लॉस एक्सेल शीट पर -सुरेश यादव। <span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="img/da.xlsx" target="_blank"> डी.ए. इन्क्रीमेंट लॉस  एक्सेल में </a></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-arrow-circle-right"></i> टैक्स केलकुलेटरटर एक्सेल शीट पर -सुरेश यादव।<span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="img/TWTATAXcalculator.xlsx" target="_blank"> टैक्स केलक्यूलेटर एक्सेल में </a></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-arrow-circle-right"></i> मुख्यमंत्री राज्य कर्मचारी स्वास्थ बीमा योजना के लिए   ifmis  से परिवार के सदस्यों के नाम जोड़ने की लिंक।<span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="https://mptreasury.gov.in/IFMS/login.jsp" target="_blank"> https://mptreasury.gov.in/IFMS/login.jsp।</a></li>
                            </ul>

                            
                           
                            <ul>
                                <li><i class="fa fa-arrow-circle-right"></i> ट्राइबल वेलफेयर टीचर्स एसोसिएशन की सदस्यता हेतु लिंक ।<span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="https://www.twtamp.in/membership.php" target="_blank"> सदस्यता प्राप्त करने हेतु इस लिंक पर क्लिक करें।</a></li>
                            </ul>
                            
                            <!--<ul >
                                <li><i class="fa fa-arrow-circle-right"></i> MPTAAS में व्यक्तिगत प्रोफ़ाइल बनाने हेतुु इस लिंक पर क्लिक करें।<span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="https://www.tribal.mp.gov.in/mptaas/DeptUOB/Registrations/Index" target="_blank">https://www.tribal.mp.gov.in/mptaas/DeptUOB/Registrations/Index</a></li>
                            </ul>
                            
<ul style="float:left;">
    <li><i class="fa fa-arrow-circle-right"></i> मध्य प्रदेश राज्य शिक्षा सेवा के कर्मचारी अपना ईकेवाईसी पूर्ण करने हेतु लिंक पर क्लिक करें | <span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="http://educationportal.mp.gov.in/eKYC/Public/Aadhaar_e_KYC.aspx" target="_blank">http://educationportal.mp.gov.in/eKYC/Public/Aadhaar_e_KYC.aspx</a></li>
                            </ul>-->
                            
                            <ul style="float:left;">
    <li><i class="fa fa-arrow-circle-right"></i>  MPTAAS में शिक्षक प्रोफ़ाइल पंजीयन हेतु नीचे दी गयी लिंक पर क्लिक करें | <span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="www.tribal.mp.gov.in/mptaas/DeptUOB/Registrations/Index" target="_blank">www.tribal.mp.gov.in/mptaas/DeptUOB/Registrations/Index</a></li>
                            </ul>
                            
<ul style="float:left;">
    <li><i class="fa fa-arrow-circle-right"></i> एकीकृत वित्तीय प्रबंधन सूचना प्रणाली में लॉग इन करने के लिए लिंक पर क्लिक करें | <span><img src="<?php echo $CMS_BASE; ?>/images/new-icon.gif" class="img-responsive" style="width:auto;"></span><br><a href="https://mptreasury.gov.in/IFMS/" target="_blank">https://mptreasury.gov.in/IFMS/</a></li>
                            </ul>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                           
                            <ul></ul>                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- MOBILE APP POPUP-->
        <!-- SERVER DOWN MESSAGE POPUP * -->
        <!-- SERVER DOWN MESSAGE POPUP * -->
</div>



<!--footer-->

<footer class="site-footer resizable-content wow fadeIn resize-md animate animated" style="visibility: visible; animation-name: fadeIn;">
    <div class="container">
        <div class="row">
            <div class="full-width">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="footer-right-wrap">
                        <ul>
                            <li><a href="#">  सहायता के लिए इस लिंक से एप डाउनलोड करके मेसेज करें </a></li>                  </ul>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>
    
</footer>
<!--Footer-->

    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript">
        var TxtType = function (el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };
        TxtType.prototype.tick = function () {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];
            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }
            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';
            var that = this;
            var delta = 200 - Math.random() * 100;
            if (this.isDeleting) { delta /= 2; }
            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }
            setTimeout(function () {
                that.tick();
            }, delta);
        };
        window.onload = function () {
            var elements = document.getElementsByClassName('typewrite');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
        }
    </script>

    <script src="<?php echo $CMS_BASE; ?>/bundles/jquery?v=v5ipibJm7AKDxo-gwvDlrhtKDuuTixthciRUzTvH4GU1"></script>

    <script src="<?php echo $CMS_BASE; ?>/bundles/bootstrap?v=3D5dtyCt58w--LCBbqZ5-BqIiT0PEYXR6Ed-UmEH7k01"></script>

    <script src="<?php echo $CMS_BASE; ?>/bundles/jqueryval?v=GCZu7RLar-Arasw8_G5RTxhfHxNWiKln7xTV8zSoR-I1"></script>

    <script src="<?php echo $CMS_BASE; ?>/Script1/skdslider.min.js"></script>
    <script src="<?php echo $CMS_BASE; ?>/Script1/bootsnav.js"></script>
    


    <!--Mobile App-->
    

    <script type="text/javascript">
        $(window).load(function () {
            $('#myModalpratibha').modal('show');
        });
        $('#myModalpratibha').modal({
            backdrop: 'static',
            keyboard: false
        })
    </script>


    <!--Mobile App-->
    <!-- SERVER DOWN MESSAGE POPUP * -->
    
    <!-- SERVER DOWN MESSAGE POPUP * -->

    <script type="text/javascript">
        $(document).ready(function () {

            //News Tricker

            $(function () {
                $('#ticker').tickerme();
            });

            $('#colorselector').change(function () {
                $('.colors').hide();
                $('#' + $(this).val()).show();
            });


            //Navbar Hover

            $('.navbar .dropdown').hover(function () {
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
            }, function () {
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
            });
            $('.navbar .dropdown-submenu').hover(function () {
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
            }, function () {
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
            });


            //Footer Crousal
            $('.carousel[data-type="multi"] .item').each(function () {
                var next = $(this).next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i = 0; i < 2; i++) {
                    next = next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }

                    next.children(':first-child').clone().appendTo($(this));
                }
            });

            //Theme CHange

            // red
            $("#style").click(function () {
                $("#main_css").attr({ href: "Content/style.css" });
            });

            // default
            $("#them1").click(function () {
                $("#main_css").attr({ href: "Content/them-1.css" });
            });
            // black

            $("#them2").click(function () {
                $("#main_css").attr({ href: "Content//them-2.css" });
            });

            $(".resizable-content").resizable();

            new WOW().init();

        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#txtEnglishCulture").on('click',function(){
                var cultureSelectedValue=0;
                $.ajax({
                    type: "POST",
                    url: '<?php echo $CMS_BASE; ?>/Home/ChangeCurrentCulture',
                    data: { cid: cultureSelectedValue },
                    success: function (result) {
                        window.location.reload(true);
                    },
                    error: function (err) {
                        return false;
                    }
                });
            });
            $("#txtHindiCulture").on('click', function () {
                var cultureSelectedValue =1;
                $.ajax({
                    type: "POST",
                    url: '<?php echo $CMS_BASE; ?>/Home/ChangeCurrentCulture',
                    data: { cid: cultureSelectedValue },
                    success: function (result) {
                        window.location.reload(true);
                    },
                    error: function (err) {
                        return false;
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("table").addClass('table table-bordered table-striped');
        });
    </script>
    <script type="text/javascript">
        //.navbar-inverse .navbar-nav > li > a
        $(document).ready(function () {
            var selector = '.navbar-nav li';
            var url = window.location.href;
            var target = url.split('/');
            $(selector).each(function () {
                //console.log($(this).find('a').attr('href'));
                //console.log(target[target.length - 1]);
                var href = $(this).find('a').attr('href');
                if (href != undefined && href != null) {
                    var source = href.split('/');
                    if (source[source.length - 1] === (target[target.length - 1])) {
                        $(selector).removeClass('active');
                        $(this).addClass('active');
                        $(this).parents('.navbar-nav li').addClass('active');
                    }
                }

            });
        });
        ////.navbar-inverse .navbar-nav > li > a
        //$(document).ready(function () {
        //    var selector = '.navbar-nav li';
        //    var url = window.location.href;
        //    //alert(url);
        //    var target = url.split('/');
        //    $(selector).each(function () {
        //        if ($(this).find('a').attr('href') === ('/' + target[target.length - 1])) {
        //            $(selector).removeClass('active');
        //            $(this).addClass('active');
        //            $(this).parents('.navbar-nav li').addClass('active');
        //        }
        //    });
        //});
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#ddlcity").change(function () {
                var citySelectedValue = $("#ddlcity").val();
                    $.ajax({
                        url: '<?php echo $CMS_BASE; ?>/AppFooter/GetCityAddressById',
                        type: "POST",
                        data: { cityid: citySelectedValue },
                        success: function (result) {
                            $("#ftrcityadd").html("");
                            $("#ftrcityadd").append(
                              "<div  class='colors col-xs-12 col-sm-12 col-md-12'>" +
                              "<p>" + result + "</p>" +
                              "</div>")
                        },
                        error: function () {
                            console.log("No Records Found");
                        }
                    });
            });
        });
    </script>
    <script type="text/javascript">
		jQuery(document).ready(function(){
		    jQuery('#slider_main').skdslider({ delay: 10000, animationSpeed: 2500, showNextPrev: true, showPlayButton: true, autoSlide: true, animationType: 'fading' });

			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			  $(window).trigger('resize');
			});

			jQuery('#slider_main2').skdslider({delay:10000, animationSpeed: 2500,showNextPrev:true,showPlayButton:false,autoSlide:true,animationType:'fading'});

			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper2').width(jQuery(this).val());
			  $(window).trigger('resize');
			});

		});
    </script>

</body>
</html>
