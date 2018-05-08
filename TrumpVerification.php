<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <style>
        .center {
    margin: auto;
    width: 50%;
    //border: 3px solid green;
    padding: 10px;
}

    </style>
        <center>
    <title>Trump Verification</title>
    <div style = "color:red " class = "center">
        

    <?
    
       
        $title = $_POST['title'];
        $content = $_POST['content'];
        
        if( strpos( strtolower($title), 'trump' ) !== false ) {
          // echo("Success! Title includes Trump!" . "<br>");
        }else{
            echo("Error: title must include the word Trump.");
            exit();
        }
        if (strpos(strtolower($title), '<') !== false) {
            echo 'You cannot include the < character.';
            exit();
        }
        
         if (strlen($title) < 10){
            echo("Minimum title length is 10 characters.");
            exit();
        }
        
        if (strlen($title) > 70){
            echo("Maximum title length is 70 characters.");
            exit();
        }
        
        if (strpos(strtolower($title), 'script') !== false) {
            echo 'fuck off';
            exit();
        }
        
        if (strpos(strtolower($content), 'script') !== false) {
            echo 'fuck off';
            exit();
        }
        
        if (strpos($content, '<') !== false) {
            echo 'You cannot include the < character.';
            exit();
        }
        
        
        
        //runs if user did not include the word 'Trump' or 'trump'
      
     
        if (strlen($_POST['content']) < 10){
            echo("Minimum content length is 10 characters.");
            exit();
        }
        
        //check if title contains "Trump, else exit()"
        
        $a = 'How are you?';

        
    
    
    /////////////////////////IMAGE UPLOAD//////////////////////////
    
    
                $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                exit();
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 1000000) { //500000
                echo "Sorry, your file is too large.";
                exit();
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                exit();
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "Success! Your file has been uploaded.";
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    exit();
                }
            }
           
    /////////////////////////IMAGE UPLOAD//////////////////////////
      
    function open_url($full_url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $full_url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_REFERER, 'http://www.kaizern.com');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.97 Safari/537.11");
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $content = utf8_decode(curl_exec($curl));
        curl_close($curl);
        return $content;
    }
    
    echo('<br>');
    
    //if (strpos($a, 'are') !== false) {
  //  echo 'true';
        //}
      
    $imageUrl = "www.calhat.com/trump/uploads/".basename($_FILES["fileToUpload"]["name"]);
    
   
    
    //www.calhat.com/trump/uploads/basename( $_FILES["fileToUpload"]["name"]
    
   /* if (strpos(open_url('https://www.google.com/searchbyimage?&image_url=' . $imageUrl),'Trump')!== false){
        echo('Success! the image regards donald trump.<br>');*/
        
        
        
        $fixedTitle = str_replace(' ', '_', $_POST["title"]);
        $fixedTitle = str_replace("<", "", $fixedTitle);
        $fixedTitle = str_replace("“","\"",$fixedTitle);
        $fixedTitle = str_replace("\’","'",$fixedTitle);
        $fixedTitle = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $fixedTitle);
        $fixedTitle = preg_replace('/[^a-zA-Z0-9]/', '', $fixedTitle);
        $fixedBody = str_replace("<","",$_POST["content"]);
        $fixedBody = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $fixedBody);
        $fixedBody = str_replace("***","<br><br>",$fixedBody);
        $fixedBody = str_replace("*B*","<b>",$fixedBody);
        $fixedBody = str_replace("*b*","</b>",$fixedBody);
        $fixedBody = str_replace("*Q*","<blockquote>",$fixedBody);
        $fixedBody = str_replace("*q*","</blockquote>",$fixedBody);
        $fixedBody = str_replace("“","\"",$fixedBody);
        $fixedBody = str_replace("\’","'",$fixedBody);
        
  
         $myfile = fopen(("pages/" . $fixedTitle), "w") or die("Unable to open file!");
              
              ///////create the article
        $txt = "
        <html>
        <head>
        
        <meta property=\"og:title\" content=\"" . $_POST["title"] . "\" />

        <meta property=\"og:image\" content=\"http://" . $imageUrl . " \" />
        
        
        <title>". $_POST["title"] . " </title>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/bootstrap.min.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/font-awesome.min.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/animate.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/font.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/li-scroller.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/slick.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/jquery.fancybox.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/theme.css\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../assets/css/style.css\">
        <!--[if lt IE 9]>
        <script src=\"../assets/js/html5shiv.min.js\"></script>
        <script src=\"../assets/js/respond.min.js\"></script>
        <![endif]-->
        </head>
        
        <body style = \"background-color:red\">
<div id=\"preloader\">
  <div id=\"status\">&nbsp;</div>
</div>
<a style = \"background-color:red\" class=\"scrollToTop\" href=\"#\"><i class=\"fa fa-angle-up\"></i></a>
<div class=\"container\">
  <header id=\"header\">
    <div class=\"row\">
      <div class=\"col-lg-12 col-md-12 col-sm-12\">
        <div class=\"header_top\">
          <div class=\"header_top_left\">
            
          </div>
          
        </div>
      </div>
      <div class=\"col-lg-12 col-md-12 col-sm-12\">
        <div class=\"header_bottom\">
          <div class=\"logo_area\"><a href=\"../index.html\" class=\"logo\"><img src=\"../images/logo.jpg\" alt=\"\"></a></div>
          
      </div>
    </div>
  </header>
  
  
   <section id=\"navArea\">
    <nav class=\"navbar navbar-inverse\" role=\"navigation\">
      <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\"> <span class=\"sr-only\">Toggle navigation</span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> </button>
      </div>
      <div id=\"navbar\" class=\"navbar-collapse collapse\">
        <ul style = \"background-color: red\" class=\"nav navbar-nav main_nav\">
          <li  style = \"background-color: red\" class=\"active\"><a style = \"background-color: red\" href=\"../index.html\"><span style = \"background-color: red\" class=\"fa fa-home desktop-home\"></span><span style = \"background-color: red\" class=\"mobile-show\">Home</span></a></li>
          
          
          <li> <a href=\"../news\"  role=\"button\" style = \"background-color: red\" aria-expanded=\"false\">See All</a>
            
          </li>
          
          <li> <a href=\"../createFake\"  role=\"button\" style = \"background-color: red\" aria-expanded=\"false\">Make News</a>
          </li>
          
        </ul>
      </div>
    </nav>
  </section>
  

  <section id=\"contentSection\">
    <div class=\"row\">
      <div class=\"col-lg-8 col-md-8 col-sm-8\">
        <div class=\"left_content\">
          <div class=\"single_page\">
          <h1>" . $_POST["title"] .  "</h1>
        
        <div class=\"single_page_content\"> <img class=\"img-center\" src = \"http://" . $imageUrl . "\" alt=\"\">
        
       
        <p> " . $fixedBody . "</blockquote></b></p>
        
                </div>
                    <div class=\"social_link\">
                      <ul class=\"sociallink_nav\">
                        <li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>
                        <li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>
                        <li><a href=\"#\"><i class=\"fa fa-google-plus\"></i></a></li>
                        <li><a href=\"#\"><i class=\"fa fa-linkedin\"></i></a></li>
                        <li><a href=\"#\"><i class=\"fa fa-pinterest\"></i></a></li>
                      </ul>
                    </div>
                    
                  </div>
                </div>
              </div>
              
              <div class=\"col-lg-4 col-md-4 col-sm-4\">
                <aside class=\"right_content\">
                  <div class=\"single_sidebar\">
                  </div>
                  
                  
                  
                </aside>
              </div>
            </div>
          </section>
            <footer id=\"footer\">
            <div class=\"footer_top\">
              <div class=\"row\">
                <div class=\"col-lg-4 col-md-4 col-sm-4\">
                  <div class=\"footer_widget wow fadeInLeftBig\">
                    <h2 ><a style = \"color:green\"href = \"http://calhat.com/trump/pages/AnyoneCanCreateTheirOwnNewsArticle\">Mission</a></h2>
                  </div>
                </div>
                <div class=\"col-lg-4 col-md-4 col-sm-4\">
                  <div class=\"footer_widget wow fadeInDown\">
                    <h2>trumpne.ws team</h2>
                    <ul class=\"tag_nav\">
                      <li><a href=\"#\">David, Co-CEO</a></li>
                      <li><a href=\"#\">Michael, Co-CEO</a></li>
                      <li><a href=\"#\">Mattia, Co-CEO</a></li>
                      <li><a href=\"#\">Hunter, Engineer</a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class=\"col-lg-4 col-md-4 col-sm-4\">
                  <div class=\"footer_widget wow fadeInRightBig\">
                    <h2>Email</h2>
                    <p>kaufmandavid18@yahoo.com</p>
                    <address>
                    
                    </address>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"footer_bottom\">
              <p class=\"copyright\">2018 <a href=\"index.html\">trumpne.ws</a></p>
              
            </div>
          </footer>
        </div>
        <script src=\"../assets/js/jquery.min.js\"></script> 
        <script src=\"../assets/js/wow.min.js\"></script> 
        <script src=\"../assets/js/bootstrap.min.js\"></script> 
        <script src=\"../assets/js/slick.min.js\"></script> 
        <script src=\"../assets/js/jquery.li-scroller.1.0.js\"></script> 
        <script src=\"../assets/js/jquery.newsTicker.min.js\"></script> 
        <script src=\"../assets/js/jquery.fancybox.pack.js\"></script> 
        <script src=\"../assets/js/custom.js\"></script>
        </body>
       </html>
        ";
        //$txt = "testing";
        fwrite($myfile, $txt);
        fclose($myfile);
        
       
        
        //add to 'see all directory.'
        $file = 'news';
        // The new person to add to the file
        $article = "<a href = 'pages/" . $fixedTitle . "'>". $_POST["title"]."</a>" . "<br>";
        file_put_contents($file, $article, FILE_APPEND | LOCK_EX);
        
        //////Take out the least recent 'new post'
        $scrollyToChange = fread(fopen("scrollyposts", "r"),filesize("scrollyposts")) ;
        $changedscrolly = substr($scrollyToChange, strpos($scrollyToChange,"</li>") + 5);
         $myfile = fopen("scrollyposts", "w");
        fwrite($myfile, $changedscrolly);
        fclose($myfile);
        /////////////////////
        
        //////////append the most recent 'new post'
        $file = "scrollyposts";
        $scrolly = "<li>
                <div class=\"media\"> <a href=\"pages/" . $fixedTitle . "\" class=\"media-left\"> <img alt=\"\" src=\"http://". $imageUrl ."\"> </a>
                  <div class=\"media-body\"> <a href=\"pages/".$fixedTitle ."\" class=\"catg_title\">" .$_POST["title"].  "</a> </div>
                </div>
              </li>";
        file_put_contents($file, $scrolly, FILE_APPEND | LOCK_EX);
        ////////////////////////
        
        ///////////insert the new posts onto the homepage////////
        
        $makescrollies = "<!DOCTYPE html>
                    <html>
                    <head>
                        
                        <meta property=\"og:title\" content=\"http://TrumpNe.ws\" />
                    
                        <meta property=\"og:image\" content=\"images/slider_img4.jpg\" />
                        
                        
                    <title>trump news</title>
                    <meta charset=\"utf-8\">
                    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/bootstrap.min.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/font-awesome.min.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/animate.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/font.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/li-scroller.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/slick.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/jquery.fancybox.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/theme.css\">
                    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/style.css\">
                    <!--[if lt IE 9]>
                    <script src=\"assets/js/html5shiv.min.js\"></script>
                    <script src=\"assets/js/respond.min.js\"></script>
                    <![endif]-->
                    </head>
                    <body style = \"background-color: red\" >
                    <div id=\"preloader\">
                      <div id=\"status\">&nbsp;</div>
                    </div>
                    <a style = \"background-color: red\" class=\"scrollToTop\" href=\"#\"><i class=\"fa fa-angle-up\"></i></a>
                    <div class=\"container\">
                      <header id=\"header\">
                        <div class=\"row\">
                          <div class=\"col-lg-12 col-md-12 col-sm-12\">
                               <!---<div class=\"header_top\">
                              <div class=\"header_top_left\">
                               
                                <ul class=\"top_nav\">
                                  <li><a href=\"index.html\">Home</a></li>
                                  <li><a href=\"#\">About</a></li>
                                  <li><a href=\"pages/contact.html\">Contact</a></li>
                                </ul>
                              </div>
                              <div class=\"header_top_right\">
                                <p>Friday, December 05, 2045</p>
                              </div>
                            </div>-->
                          </div>
                          <div class=\"col-lg-12 col-md-12 col-sm-12\">
                            <div class=\"header_bottom\">
                              <div class=\"logo_area\"><a href=\"index.html\" class=\"logo\"><img style = \"height:100px\" src=\"images/logo.jpg\" alt=\"\"></a></div>
                              <!--<div class=\"add_banner\"><a href=\"#\"><img src=\"images/addbanner_728x90_V1.jpg\" alt=\"\"></a></div>-->
                            </div>
                          </div>
                        </div>
                      </header>
                      <section id=\"navArea\">
                        <nav class=\"navbar navbar-inverse\" role=\"navigation\">
                          <div class=\"navbar-header\">
                             <span class=\"sr-only\">Toggle navigation</span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span> <span class=\"icon-bar\"></span>
                          </div>
                          
                            <ul style = \"background-color: red\" class=\"nav navbar-nav main_nav\">
                            
                             <li> <a href=\"createFake\"  role=\"button\" style = \"background-color: red\" aria-expanded=\"false\">Create News</a>
                              </li>
                              
                               <li> <a href=\"news\"  role=\"button\" style = \"background-color: red\" aria-expanded=\"false\">See All</a>
                                
                              </li>
                              
                             
                    
                              <!---<li><a href=\"#\">Laptops</a></li>
                              <li><a href=\"#\">Tablets</a></li>
                              <li><a href=\"pages/contact.html\">Contact Us</a></li>
                              <li><a href=\"pages/404.html\">404 Page</a></li>---->
                            </ul>
                      
                        </nav>
                      </section>
                      <section id=\"newsSection\">
                        <div class=\"row\">
                          <div class=\"col-lg-12 col-md-12\">
                            <div style = \"background-color:red\" class=\"latest_newsarea\"> <!---<span>Latest News</span>
                              <ul id=\"ticker01\" class=\"news_sticker\">
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My First News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My Second News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My Third News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My Four News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My Five News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My Six News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My Seven News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail3.jpg\" alt=\"\">My Eight News Item</a></li>
                                <li><a href=\"#\"><img src=\"images/news_thumbnail2.jpg\" alt=\"\">My Nine News Item</a></li>
                              </ul>--><br/>
                              <div class=\"social_area\">
                                <ul class=\"social_nav\">
                                  <li class=\"facebook\"><a href=\"#\"></a></li>
                                  <li class=\"twitter\"><a href=\"#\"></a></li>
                                  <li class=\"flickr\"><a href=\"#\"></a></li>
                                  <li class=\"pinterest\"><a href=\"#\"></a></li>
                                  <li class=\"googleplus\"><a href=\"#\"></a></li>
                                  <li class=\"vimeo\"><a href=\"#\"></a></li>
                                  <li class=\"youtube\"><a href=\"#\"></a></li>
                                  <li class=\"mail\"><a href=\"#\"></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section id=\"sliderSection\">
                        <div class=\"row\">
                          <div class=\"col-lg-8 col-md-8 col-sm-8\">
                            
                                
                                    <div class=\"latest_post\">
                              <h2><span style = \"background-color:red\">NEWEST</span></h2>
                              <div class=\"latest_post_container\">
                                <div id=\"prev-button\"><i style = \"color: red\" class=\"fa fa-chevron-up\"></i></div>
                                    <ul class=\"latest_postnav\">" . fread(fopen("scrollyposts", "r"),filesize("scrollyposts")) . "</ul>
                                    <div id=\"next-button\"><i style = \"color: red\" class=\"fa  fa-chevron-down\"></i></div>
                                  </div>
                                </div>
                             
                                
                              
                              
                            </div>
                          </div>
                          <br><br><br><br><br>
                          <div class=\"col-lg-4 col-md-4 col-sm-4\">
                        
                          </section>
                          <section id=\"contentSection\">
                            <div class=\"row\">
                              <div class=\"col-lg-8 col-md-8 col-sm-8\">
                                <div class=\"left_content\">
                                  
                                  </div>
                                 
                                  
                                </aside>
                              </div>
                            </div>
                          </section>
                          <footer id=\"footer\">
                            <div class=\"footer_top\">
                              <div class=\"row\">
                                <div class=\"col-lg-4 col-md-4 col-sm-4\">
                                  <div class=\"footer_widget wow fadeInLeftBig\">
                                    <h2 ><a style = \"color:green\"href = \"http://calhat.com/trump/pages/AnyoneCanCreateTheirOwnNewsArticle\">Mission</a></h2>
                                  </div>
                                </div>
                                <div class=\"col-lg-4 col-md-4 col-sm-4\">
                                  <div class=\"footer_widget wow fadeInDown\">
                                    <h2>trumpne.ws team</h2>
                                    <ul class=\"tag_nav\">
                                      <li><a href=\"#\">David, Co-CEO</a></li>
                                      <li><a href=\"#\">Michael, Co-CEO</a></li>
                                      <li><a href=\"#\">Mattia, Co-CEO</a></li>
                                      
                                      
                                    </ul>
                                  </div>
                                </div>
                                <div class=\"col-lg-4 col-md-4 col-sm-4\">
                                  <div class=\"footer_widget wow fadeInRightBig\">
                                    <h2>Email</h2>
                                    <p>kaufmandavid18@yahoo.com</p>
                                    <address>
                                    
                                    </address>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class=\"footer_bottom\">
                              <p class=\"copyright\">2018 <a href=\"index.html\">trumpne.ws</a></p>
                              
                            </div>
                          </footer>
                        </div>
                        <script src=\"assets/js/jquery.min.js\"></script> 
                        <script src=\"assets/js/wow.min.js\"></script> 
                        <script src=\"assets/js/bootstrap.min.js\"></script> 
                        <script src=\"assets/js/slick.min.js\"></script> 
                        <script src=\"assets/js/jquery.li-scroller.1.0.js\"></script> 
                        <script src=\"assets/js/jquery.newsTicker.min.js\"></script> 
                        <script src=\"assets/js/jquery.fancybox.pack.js\"></script> 
                        <script src=\"assets/js/custom.js\"></script>
                        </body>
                        </html>";
        
        
        $myfile = fopen("index.html", "w");
        fwrite($myfile, $makescrollies);
        fclose($myfile);
     
        
        
        echo(("link: <a href = 'pages/" . $fixedTitle . "'>here</a>"));
        
         
          $to = "huntersgordon@gmail.com";
          $subject = "new article posted";
          $txt = "calhat.com/trump/pages/" . $fixedTitle ; 
          $headers = "From: calhat@calhat.com" . "\r\n" . "CC: 8186215850@vtext.com"  ;


          mail($to,$subject,$txt,$headers);
  
 
        
        

   /* }else{

        echo('the image does not appear to regard donald trump. Please choose a different image.');
            unlink("uploads/" .basename($_FILES["fileToUpload"]["name"]) );
        exit();
        
    }*/
    
        
    
    ?>
    
    
    </div>
    
    
    
</html>