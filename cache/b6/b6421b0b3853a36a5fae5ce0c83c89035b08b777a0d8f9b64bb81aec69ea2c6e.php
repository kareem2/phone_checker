<?php

/* main.html.twig */
class __TwigTemplate_576dedb95077c1fd1779d81b6b241c6624d1ff9303174bb7f5e2d535133f73e7 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base2.html.twig", "main.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base2.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Phone Checker";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<!-- /.col-lg-12 -->
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
         <form name=\"searchForm\" id=\"searchForm\" method=\"post\" action=\"/phone_checker/public/\">
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
";
    }

    public function getTemplateName()
    {
        return "main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 6,  39 => 5,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "main.html.twig", "C:\\wamp64\\www\\phone_checker\\src\\views\\main.html.twig");
    }
}
