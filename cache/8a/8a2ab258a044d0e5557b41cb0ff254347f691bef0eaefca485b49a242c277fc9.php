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
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
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
      <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
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
                  <a class=\"navbar-brand\" href=\"";
        // line 51
        echo ($context["app_url"] ?? null);
        echo "\">Check Caller Number</a>
               </div>
               <!-- /.navbar-header -->
               <div class=\"search-bar\" style=\"padding-right:60px !important;\">
                  <form name=\"form\" method=\"post\" action=\"";
        // line 55
        echo ($context["app_url"] ?? null);
        echo "\">
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
                        <div class=\"row flash-messages\">
                            <div class=\"col-sm-12\">
                                ";
        // line 115
        $this->loadTemplate("flash_messages.html.twig", "base2.html.twig", 115)->display($context);
        // line 116
        echo "                            </div>
                        </div>

                        <br>
                        ";
        // line 120
        $this->displayBlock('body', $context, $blocks);
        // line 121
        echo "                     </div>
                     <!-- /.col-lg-9 -->
                     <div class=\"col-lg-4\" style=\"max-width:330px !important;\">
                        <br>
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
                        ";
        // line 141
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["recent_comments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 142
            echo "                        
                           ";
            // line 143
            if ((twig_get_attribute($this->env, $this->source, $context["comment"], "rate", array()) < 0)) {
                // line 144
                echo "                               <div class=\"chat-panel panel panel-danger\">
                           ";
            } else {
                // line 146
                echo "                               <div class=\"chat-panel panel panel\">
                           ";
            }
            // line 148
            echo "                              <div class=\"panel-heading\">
                                 <a href=\"";
            // line 149
            echo ($context["app_url"] ?? null);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["comment"], "phone_number", array());
            echo "\">+1 (";
            echo twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "phone_number", array()), 0, 3);
            echo ") ";
            echo twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "phone_number", array()), 3, 3);
            echo "-";
            echo twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "phone_number", array()), 6, 4);
            echo "</a>
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
                                             <strong class=\"primary-font\">";
            // line 160
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "name", array()));
            echo "</strong><br>
                                             <small class=\"pull-left text-muted clearfix\">
                                             <i class=\"fa fa-clock-o fa-fw\"></i>";
            // line 162
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "created_at", array()));
            echo "</small><br>
                                             <strong class=\"primary-font\">Call type: </strong>";
            // line 163
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "call_type", array()));
            echo "<br>
                                             <strong class=\"primary-font\">Rating: </strong>";
            // line 164
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "rate", array()));
            echo "<br>
                                          </div>
                                          <p>";
            // line 166
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "comment", array()));
            echo "</p>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <!-- /.panel-body -->
                           </div>                        

                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        echo "                        <div class=\"well well-sm well-default text-center\"><a href=\"/comments\">Read more comments</a></div>
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

      <style type=\"text/css\">
         .flash-messages{
            margin-top: 5px;
         }
         .close{
            text-indent: 0;
         }
      </style>
   </body>
</html>";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
        echo "Home Page";
    }

    // line 120
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  308 => 120,  302 => 10,  257 => 175,  242 => 166,  237 => 164,  233 => 163,  229 => 162,  224 => 160,  202 => 149,  199 => 148,  195 => 146,  191 => 144,  189 => 143,  186 => 142,  182 => 141,  160 => 121,  158 => 120,  152 => 116,  150 => 115,  87 => 55,  80 => 51,  36 => 10,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base2.html.twig", "C:\\wamp64\\www\\phone_checker\\src\\views\\base2.html.twig");
    }
}
