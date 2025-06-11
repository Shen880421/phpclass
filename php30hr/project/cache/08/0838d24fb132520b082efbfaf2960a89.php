<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* demo.html.twig */
class __TwigTemplate_738a01ea66e8389edbe4f4058a4901fb extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"zh-TW\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>
\t\t\t";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 9
        yield "\t\t</title>
\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<style>
\t\t\tbody {
\t\t\t\tfont-family: Arial, sans-serif;
\t\t\t\tmargin: 20px;
\t\t\t\tbackground-color: #f4f4f4;
\t\t\t}
\t\t\t.container {
\t\t\t\tmax-width: 800px;
\t\t\t\tmargin: 20px auto;
\t\t\t\tpadding: 20px;
\t\t\t\tbackground-color: #fff;
\t\t\t\tborder: 1px solid #ddd;
\t\t\t\tborder-radius: 8px;
\t\t\t\tbox-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
\t\t\t}
\t\t\t.error {
\t\t\t\tcolor: #dc3545;
\t\t\t\tbackground-color: #f8d7da;
\t\t\t\tborder-color: #f5c6cb;
\t\t\t\tpadding: 8px;
\t\t\t\tborder-radius: 4px;
\t\t\t\tmargin-top: 10px;
\t\t\t}
\t\t\t.success {
\t\t\t\tcolor: #28a745;
\t\t\t\tbackground-color: #d4edda;
\t\t\t\tborder-color: #c3e6cb;
\t\t\t\tpadding: 8px;
\t\t\t\tborder-radius: 4px;
\t\t\t\tmargin-top: 10px;
\t\t\t}
\t\t\t.form-group {
\t\t\t\tmargin-bottom: 15px;
\t\t\t}
\t\t\tlabel {
\t\t\t\tdisplay: block;
\t\t\t\tmargin-bottom: 5px;
\t\t\t\tfont-weight: bold;
\t\t\t\tcolor: #333;
\t\t\t}
\t\t\tinput[type=\"text\"],
\t\t\tinput[type=\"email\"],
\t\t\tinput[type=\"password\"],
\t\t\tinput[type=\"number\"],
\t\t\ttextarea {
\t\t\t\twidth: calc(100% - 22px); /* 100% 減去 padding 和 border */
\t\t\t\tpadding: 10px;
\t\t\t\tborder: 1px solid #ccc;
\t\t\t\tborder-radius: 4px;
\t\t\t\tbox-sizing: border-box; /* 讓 padding 不會增加寬度 */
\t\t\t\tfont-size: 1em;
\t\t\t}
\t\t\ttextarea {
\t\t\t\tresize: vertical; /* 允許垂直調整大小 */
\t\t\t\tmin-height: 80px;
\t\t\t}
\t\t\tinput[type=\"submit\"] {
\t\t\t\tpadding: 10px 20px;
\t\t\t\tbackground-color: #007bff;
\t\t\t\tcolor: white;
\t\t\t\tborder: none;
\t\t\t\tborder-radius: 5px;
\t\t\t\tcursor: pointer;
\t\t\t\tfont-size: 1em;
\t\t\t\ttransition: background-color 0.2s ease;
\t\t\t}
\t\t\tinput[type=\"submit\"]:hover {
\t\t\t\tbackground-color: #0056b3;
\t\t\t}
\t\t\tnav a {
\t\t\t\tmargin-right: 15px;
\t\t\t\ttext-decoration: none;
\t\t\t\tcolor: #007bff;
\t\t\t}
\t\t\tnav a:hover {
\t\t\t\ttext-decoration: underline;
\t\t\t}
\t\t</style>
\t\t";
        // line 90
        yield "\t\t";
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 91
        yield "\t\t";
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 92
        yield "\t</head>
\t<body>
\t\t<div class=\"container\">
\t\t\t";
        // line 95
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 108
        yield "
\t\t\t";
        // line 109
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 112
        yield "
\t\t\t";
        // line 113
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 121
        yield "\t\t</div>
\t\t";
        // line 122
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["demo"] ?? null), "html", null, true);
        yield "
\t\t <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>

\t</body>
</html>
";
        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "我的網站
\t\t\t";
        yield from [];
    }

    // line 90
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 91
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 95
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 96
        yield "\t\t\t\t<h1>我的電商後台</h1>
\t\t\t\t<nav>
\t\t\t\t\t<a href=\"/\">首頁</a>
\t\t\t\t\t|
\t\t\t\t\t<a href=\"/register.php\">註冊</a>
\t\t\t\t\t|
\t\t\t\t\t<a href=\"/add_product.php\">新增產品</a>
\t\t\t\t\t";
        // line 104
        yield "\t\t\t\t\t";
        // line 105
        yield "\t\t\t\t</nav>
\t\t\t\t<hr>
\t\t\t";
        yield from [];
    }

    // line 109
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 110
        yield "\t\t\t\t";
        // line 111
        yield "\t\t\t";
        yield from [];
    }

    // line 113
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 114
        yield "\t\t\t\t<hr>
\t\t\t\t<footer>
\t\t\t\t\t<p>&copy;
\t\t\t\t\t\t";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield "
\t\t\t\t\t\t我的電商網站. All rights reserved.</p>
\t\t\t\t</footer>
\t\t\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "demo.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  260 => 117,  255 => 114,  248 => 113,  243 => 111,  241 => 110,  234 => 109,  227 => 105,  225 => 104,  216 => 96,  209 => 95,  199 => 91,  189 => 90,  177 => 7,  166 => 122,  163 => 121,  161 => 113,  158 => 112,  156 => 109,  153 => 108,  151 => 95,  146 => 92,  143 => 91,  140 => 90,  58 => 9,  56 => 7,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"zh-TW\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>
\t\t\t{% block title %}我的網站
\t\t\t{% endblock %}
\t\t</title>
\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<style>
\t\t\tbody {
\t\t\t\tfont-family: Arial, sans-serif;
\t\t\t\tmargin: 20px;
\t\t\t\tbackground-color: #f4f4f4;
\t\t\t}
\t\t\t.container {
\t\t\t\tmax-width: 800px;
\t\t\t\tmargin: 20px auto;
\t\t\t\tpadding: 20px;
\t\t\t\tbackground-color: #fff;
\t\t\t\tborder: 1px solid #ddd;
\t\t\t\tborder-radius: 8px;
\t\t\t\tbox-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
\t\t\t}
\t\t\t.error {
\t\t\t\tcolor: #dc3545;
\t\t\t\tbackground-color: #f8d7da;
\t\t\t\tborder-color: #f5c6cb;
\t\t\t\tpadding: 8px;
\t\t\t\tborder-radius: 4px;
\t\t\t\tmargin-top: 10px;
\t\t\t}
\t\t\t.success {
\t\t\t\tcolor: #28a745;
\t\t\t\tbackground-color: #d4edda;
\t\t\t\tborder-color: #c3e6cb;
\t\t\t\tpadding: 8px;
\t\t\t\tborder-radius: 4px;
\t\t\t\tmargin-top: 10px;
\t\t\t}
\t\t\t.form-group {
\t\t\t\tmargin-bottom: 15px;
\t\t\t}
\t\t\tlabel {
\t\t\t\tdisplay: block;
\t\t\t\tmargin-bottom: 5px;
\t\t\t\tfont-weight: bold;
\t\t\t\tcolor: #333;
\t\t\t}
\t\t\tinput[type=\"text\"],
\t\t\tinput[type=\"email\"],
\t\t\tinput[type=\"password\"],
\t\t\tinput[type=\"number\"],
\t\t\ttextarea {
\t\t\t\twidth: calc(100% - 22px); /* 100% 減去 padding 和 border */
\t\t\t\tpadding: 10px;
\t\t\t\tborder: 1px solid #ccc;
\t\t\t\tborder-radius: 4px;
\t\t\t\tbox-sizing: border-box; /* 讓 padding 不會增加寬度 */
\t\t\t\tfont-size: 1em;
\t\t\t}
\t\t\ttextarea {
\t\t\t\tresize: vertical; /* 允許垂直調整大小 */
\t\t\t\tmin-height: 80px;
\t\t\t}
\t\t\tinput[type=\"submit\"] {
\t\t\t\tpadding: 10px 20px;
\t\t\t\tbackground-color: #007bff;
\t\t\t\tcolor: white;
\t\t\t\tborder: none;
\t\t\t\tborder-radius: 5px;
\t\t\t\tcursor: pointer;
\t\t\t\tfont-size: 1em;
\t\t\t\ttransition: background-color 0.2s ease;
\t\t\t}
\t\t\tinput[type=\"submit\"]:hover {
\t\t\t\tbackground-color: #0056b3;
\t\t\t}
\t\t\tnav a {
\t\t\t\tmargin-right: 15px;
\t\t\t\ttext-decoration: none;
\t\t\t\tcolor: #007bff;
\t\t\t}
\t\t\tnav a:hover {
\t\t\t\ttext-decoration: underline;
\t\t\t}
\t\t</style>
\t\t{# 您可以在這裡定義更多 CSS 或 JS 區塊 #}
\t\t{% block stylesheets %}{% endblock %}
\t\t{% block javascripts %}{% endblock %}
\t</head>
\t<body>
\t\t<div class=\"container\">
\t\t\t{% block header %}
\t\t\t\t<h1>我的電商後台</h1>
\t\t\t\t<nav>
\t\t\t\t\t<a href=\"/\">首頁</a>
\t\t\t\t\t|
\t\t\t\t\t<a href=\"/register.php\">註冊</a>
\t\t\t\t\t|
\t\t\t\t\t<a href=\"/add_product.php\">新增產品</a>
\t\t\t\t\t{# 新增導覽連結 #}
\t\t\t\t\t{# 未來會有更多連結 #}
\t\t\t\t</nav>
\t\t\t\t<hr>
\t\t\t{% endblock %}

\t\t\t{% block content %}
\t\t\t\t{# 這裡是每個頁面特有的內容 #}
\t\t\t{% endblock %}

\t\t\t{% block footer %}
\t\t\t\t<hr>
\t\t\t\t<footer>
\t\t\t\t\t<p>&copy;
\t\t\t\t\t\t{{ \"now\"|date(\"Y\") }}
\t\t\t\t\t\t我的電商網站. All rights reserved.</p>
\t\t\t\t</footer>
\t\t\t{% endblock %}
\t\t</div>
\t\t{{demo}}
\t\t <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js\"></script>

\t</body>
</html>
", "demo.html.twig", "C:\\xampp\\htdocs\\phpclass\\php30hr\\project\\templates\\demo.html.twig");
    }
}
