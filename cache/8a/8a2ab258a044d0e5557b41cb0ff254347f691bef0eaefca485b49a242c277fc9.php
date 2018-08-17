<?php

/* base2.html.twig */
class __TwigTemplate_4fa4c7d67138d787b21e8ed77f24e8272da83b6a781bf22941be9e71cb0e3b0f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">

    <head>
      <meta charset=\"utf-8\">
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
      <meta name=\"description\" content=\"Phone Lookup | Reverse Cellphone Call | Area Code lookup | Check Caller Number\">
      <meta name=\"author\" content=\"checkcallernumber.com\">
      <title>Phone Lookup | Reverse Cellphone Call | Area Code lookup | Check Caller Number</title>
      <link href=\"http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/global/plugins/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/global/plugins/simple-line-icons/simple-line-icons.min.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/global/plugins/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />

      <link href=\"dist/global/css/components-md.min.css\" rel=\"stylesheet\" id=\"style_components\" type=\"text/css\" />
      <link href=\"dist/global/css/plugins-md.min.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/layouts/layout4/css/layout.min.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/layouts/layout4/css/themes/default.min.css\" rel=\"stylesheet\" type=\"text/css\" id=\"style_color\" />
      <link href=\"dist/layouts/layout4/css/custom.min.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/pages/css/search.min.css\" rel=\"stylesheet\" type=\"text/css\" />



      <link href=\"dist/global/plugins/jquery-jvectormap-2.0.3/jquery-jvectormap-2.0.3.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/global/plugins/morris/morris.css\" rel=\"stylesheet\" type=\"text/css\" />

      <link href=\"dist/global/plugins/bootstrap-toastr/toastr.min.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link href=\"dist/global/plugins/bootstrap-sweetalert/sweetalert.css\" rel=\"stylesheet\" type=\"text/css\" />

      <link href=\"dist/css/custom.css\" rel=\"stylesheet\" type=\"text/css\" />
      <link rel=\"shortcut icon\" href=\"favicon.ico\" /> 
      <link href=\"dist/css/admin.css\" rel=\"stylesheet\">

      <link href=\"dist/global/plugins/ladda/ladda-themeless.min.css\" rel=\"stylesheet\" type=\"text/css\" />


   </head>
   <body data-gr-c-s-loaded=\"true\">
      <div id=\"wrapper\">
         <!-- Navigation -->
         <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
            <div class=\"container\">
               <div class=\"navbar-header\">
                  <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".mobile-nav\">
                  <span class=\"sr-only\">Toggle navigation</span>
                  <span class=\"icon-bar\"></span>
                  <span class=\"icon-bar\"></span>
                  <span class=\"icon-bar\"></span>
                  </button>
                  <a class=\"navbar-brand\" href=\"/\">Check Caller Number</a>
               </div>
               <!-- /.navbar-header -->
               <div class=\"search-bar\" style=\"padding-right:60px !important;\">
                  <form name=\"form\" method=\"get\" action=\"./search\">
                     <div class=\"input-group custom-search-form search-bar\">
                        <input name=\"number\" type=\"text\" class=\"form-control\" placeholder=\"Search...\" required=\"\">
                        <span class=\"input-group-btn\">
                        <button class=\"btn btn-default\">
                        <i class=\"fa fa-search\"></i>
                        </button>
                        </span>
                     </div>
                  </form>
               </div>
               <ul class=\"nav navbar-top-links navbar-right\">
                  <li class=\"dropdown\">
                     <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" aria-expanded=\"false\">
                     Numbers <i class=\"fa fa-caret-down\"></i>
                     </a>
                     <ul class=\"dropdown-menu dropdown-user\">
                        <li><a href=\"/recentsuspicious\"> Recent Suspicious </a>
                        </li>
                        <li><a href=\"/recentsearch\"> Recently Search </a>
                        </li>
                        <li><a href=\"/recentreport\"> Recently Report </a>
                        </li>
                        <li><a href=\"/scams\"> Scams </a>
                        </li>
                     </ul>
                  </li>
                  <li class=\"dropdown\">
                     <a href=\"/comments\">
                     Comments
                     </a>
                  </li>
                  <li class=\"dropdown\">
                     <a href=\"/newslist\">
                     News&amp;Articles
                     </a>
                  </li>
                  <li class=\"dropdown\">
                     <a href=\"/areacode\">
                     Area Codes
                     </a>
                  </li>
                  <li class=\"dropdown\">
                     <a href=\"/contact\">
                     Contact us
                     </a>
                  </li>
                  <!-- /.dropdown -->
               </ul>
               <!-- /.navbar-top-links -->
            </div>
            <!--container-->
         </nav>
         <div id=\"main-content\">
            <div class=\"container\">
               <div class=\"row\">
                  <div class=\"row\">
                     <div class=\"col-lg-8\">
                        <br>    
                        <!-- /.col-lg-12 -->
                        <div class=\"panel panel-default\">
                           <div class=\"panel-heading\">
                              Check Caller Number
                           </div>
                           <!-- /.panel-heading -->
                           <div class=\"panel-body\">
                              <center>
                                 <h1>Reverse Phone Number Lookup</h1>
                              </center>
                              <div>
                                 Look up and report a phone number, if you have received unwanted calls. Here we offer a free reverse phone number lookup service. Please rate the number and leave your comment about the call, helping the community to watch out for those numbers.
                              </div>
                              <div>
                                 <form name=\"searchForm\" id=\"searchForm\" method=\"get\" action=\"./search.php\">
                                    <div class=\"input-group\">
                                       <input id=\"btn-input\" name=\"number\" type=\"text\" class=\"form-control input-lg\" placeholder=\"Enter a phone number (e.g. 202-365-09XX)\" required=\"\">
                                       <span class=\"input-group-btn\">
                                       <button class=\"btn btn-danger btn-lg\" id=\"btn-chat\">
                                       Search
                                       </button>
                                       </span>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        <div class=\"panel panel-default\">
                           <div class=\"panel-heading\">
                              Recently Searched Numbers
                              <div class=\"pull-right\">
                                 <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-default btn-xs dropdown-toggle\" onclick=\"location='/recentsearch'\">
                                    See More
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <!-- /.panel-heading -->
                           <div class=\"panel-body\">
                              <div class=\"row\">
                                 <div class=\"col-md-6\">
                                    <div class=\"recent-search\"><a href=\"./904-444-4048\">904-444-4048</a>
                                       Jacksonville, Florida        
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div>
                           <center>
                              <script async=\"\" src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
                              <!-- 720*90 -->
                              <ins class=\"adsbygoogle\" style=\"display:inline-block;width:728px;height:90px\" data-ad-client=\"ca-pub-8478027707529283\" data-ad-slot=\"1530569408\"></ins>
                              <script>
                                 (adsbygoogle = window.adsbygoogle || []).push({});
                                 
                              </script>
                           </center>
                        </div>
                        <div class=\"panel panel-default\">
                           <div class=\"panel-heading\">
                              Recently Reported Numbers
                              <div class=\"pull-right\">
                                 <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-default btn-xs dropdown-toggle\" onclick=\"location='/recentreport'\">
                                    See More
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <!-- /.panel-heading -->
                           <div class=\"panel-body\">
                              <div class=\"col-lg-3 col-md-6 text-left\" style=\"padding:0px;margin:0 0 10px 0\"><a href=\"/724-857-6175\">724-857-6175</a><br>By: <strong class=\"primary-font\">A t d</strong><br><small class=\"pull-left text-muted clearfix\"><i class=\"fa fa-clock-o fa-fw\"></i>2018-08-15 19:17:43</small><br></div>
                           </div>
                        </div>
                        <div class=\"panel panel-default\">
                           <div class=\"panel-heading\">
                              Recent Suspicious Numbers
                              <div class=\"pull-right\">
                                 <div class=\"btn-group\">
                                    <button type=\"button\" class=\"btn btn-default btn-xs dropdown-toggle\" onclick=\"location='/recentsuspicious'\">
                                    See More
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <!-- /.panel-heading -->
                           <div class=\"panel-body\">
                              <div class=\"col-md-3 col-xs-6 col-lg-2 text-center\"><a href=\"/877-274-6626\">877-274-6626</a></div>
                           </div>
                        </div>
                     </div>
                     <!-- /.col-lg-9 -->
                     <div class=\"col-lg-4\" style=\"max-width:330px !important;\">
                        <div class=\"panel panel-info\">
                           <div class=\"panel-heading\">
                              <strong>Recent News &amp; Articles</strong>
                           </div>
                           <!-- /.panel-heading -->
                           <div class=\"panel-body\">
                              <div><a href=\"/article/33\" title=\"Read more details\"><i class=\"fa fa-file-o\"></i> Vodafone UK warns against international 'Wangiri' phone fraud </a></div>
                              <div><a href=\"/article/32\" title=\"Read more details\"><i class=\"fa fa-file-o\"></i> Scam</a></div>
                              <div><a href=\"/article/31\" title=\"Read more details\"><i class=\"fa fa-file-o\"></i> Social Security scams in high gear</a></div>
                           </div>
                           <!-- /.panel-body -->
                           <div class=\"panel-footer\">
                              <a href=\"/newslist\">Read more and post my own Article</a>
                           </div>
                        </div>
                        <h3>Recent Comments</h3>
                        <div class=\"chat-panel panel panel-danger\">
                           <div class=\"panel-heading\">
                              <a href=\"/260-593-1121\">+1 (260) 593-1121</a>
                           </div>
                           <!-- /.panel-heading -->
                           <div class=\"panel-body\">
                              <ul class=\"chat\">
                                 <li class=\"left clearfix\">
                                    <span class=\"chat-img pull-right\">
                                       <div class=\"comment-badge danger\"><i class=\"fa fa-user\"></i></div>
                                    </span>
                                    <div class=\"chat-body clearfix\">
                                       <div class=\"header clearfix\">
                                          <strong class=\"primary-font\">Jodie hailey</strong><br>
                                          <small class=\"pull-left text-muted clearfix\">
                                          <i class=\"fa fa-clock-o fa-fw\"></i> 2018-08-16 04:42:44                            </small><br>
                                          <strong class=\"primary-font\">Call type: </strong>scam<br>
                                          <strong class=\"primary-font\">Rating: </strong>-5<br>
                                       </div>
                                       <p>
                                          Are you a photographer?  Family reunion.  Do you take credit cards                        
                                       </p>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.panel-body -->
                        </div>
                        <!-- /.panel .chat-panel -->
                        <!-- /.panel .chat-panel -->
                        <div class=\"chat-panel panel panel-default\">
                           <div class=\"panel-heading\">
                              <a href=\"/829-587-2358\">+1 (829) 587-2358</a>
                           </div>
                           <!-- /.panel-heading -->
                           <div class=\"panel-body\">
                              <ul class=\"chat\">
                                 <li class=\"left clearfix\">
                                    <span class=\"chat-img pull-right\">
                                       <div class=\"comment-badge warning\"><i class=\"fa fa-user\"></i></div>
                                    </span>
                                    <div class=\"chat-body clearfix\">
                                       <div class=\"header clearfix\">
                                          <strong class=\"primary-font\">Rajesh kumar</strong><br>
                                          <small class=\"pull-left text-muted clearfix\">
                                          <i class=\"fa fa-clock-o fa-fw\"></i> 2018-08-16 00:36:09                            </small><br>
                                          <strong class=\"primary-font\">Call type: </strong>unknown<br>
                                          <strong class=\"primary-font\">Rating: </strong>0<br>
                                       </div>
                                       <p>
                                          Fhx                        
                                       </p>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <!-- /.panel-body -->
                        </div>
                        <!-- /.panel .chat-panel -->
                        <!-- /.panel .chat-panel -->
                        <div class=\"well well-sm well-default text-center\"><a href=\"/comments\">Read more comments</a></div>
                     </div>
                     <!-- /.col-lg-3 -->
                  </div>
                  <!-- /.row -->
               </div>
               <!--row-->
            </div>
            <!-- /#container -->
         </div>
         <!-- /#main-content -->
         <div>
            <center>2018 <a href=\"/\">checkcallernumber.com</a> © All Rights Reserved<a href=\"/aboutus\">About Us</a><a href=\"/faq\">FAQ</a><a href=\"/privacy\">Privacy Policy</a><a href=\"/terms\">Terms of service</a></center>
         </div>
         <br>    
      </div>
      <!-- /#wrapper -->
      <script src=\"dist/global/plugins/jquery.min.js\"></script>
      <script src=\"dist/global/plugins/bootstrap/js/bootstrap.min.js\"></script>
      <span id=\"top-link-block\" class=\"affix\">
      <a href=\"#top\" class=\"well well-sm\" onclick=\"\$('html,body').animate({scrollTop:0},'slow');return false;\">
      <i class=\"glyphicon glyphicon-chevron-up\"></i> Back to Top
      </a>
      </span><!-- /top-link-block -->
      <script>
         if ( (\$(window).height() + 100) < \$(document).height() ) {
             \$('#top-link-block').removeClass('hidden').affix({
                 offset: {top:100}
             });
         }
      </script>
   </body>
</html>";
    }

    public function getTemplateName()
    {
        return "base2.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base2.html.twig", "C:\\wamp64\\www\\phone_checker\\src\\views\\base2.html.twig");
    }
}