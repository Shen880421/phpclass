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

/* dashboard.twig */
class __TwigTemplate_335db1e47879db742217524c3754e56c extends Template
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
            'content' => [$this, 'block_content'],
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
\t\t<title>出勤紀錄</title>
\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<link href=\"wannabakery.css\" rel=\"stylesheet\">
\t\t<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
\t</head>

\t<body>
\t\t";
        // line 15
        yield "\t\t";
        yield from $this->load("partials/backend/navbar.inc.twig", 15)->unwrap()->yield($context);
        // line 16
        yield "
\t\t";
        // line 17
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 84
        yield "

\t\t";
        // line 87
        yield "\t\t";
        yield from $this->load("partials/backend/footer.inc.twig", 87)->unwrap()->yield($context);
        // line 88
        yield "

\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
\t</body>
</html>
";
        yield from [];
    }

    // line 17
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 18
        yield "\t\t\t<!--內容區塊-->
\t\t\t<main
\t\t\t\tclass=\"container-fluid mt-4\">
\t\t\t\t<!--分成左右2邊的佈區-->
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div
\t\t\t\t\t\tclass=\"col-md-2\">
\t\t\t\t\t\t<!--左側選單列-->
\t\t\t\t\t\t<div class=\"list-group\">
\t\t\t\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item div_bgcolor\">總覽</a>
\t\t\t\t\t\t\t<!-- <a href=\"javascript:;\" class=\"list-group-item\">出勤</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                    <a href=\"javascript:;\" class=\"list-group-item\">缺勤</a> -->
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t<h3>出缺勤總覽</h3>
\t\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\">
\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h6>總課程時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"totalclasshours\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>實際上課時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"attendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>出勤比率</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"attendancerate\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h6>缺席時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"unattendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>遲到時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"late\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>早退時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"leave_early\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<!--出缺席圓餅圖-->
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<h6>出/缺席</h1>
\t\t\t\t\t\t\t\t<canvas id=\"myAttenChart\"></canvas>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!--每日上課時間折線圖-->
\t\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t\t<h1>每日上課時間折線圖</h1>
\t\t\t\t\t\t\t\t<canvas id=\"myclasstimeChart\"></canvas>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!--每日在校時間折線圖-->
\t\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t\t<h1>每日在校時間折線圖</h1>
\t\t\t\t\t\t\t\t<canvas id=\"myattentimeChart\"></canvas>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t</main>
\t\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard.twig";
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
        return array (  90 => 18,  83 => 17,  73 => 88,  70 => 87,  66 => 84,  64 => 17,  61 => 16,  58 => 15,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"zh-TW\">

\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>出勤紀錄</title>
\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
\t\t<link href=\"wannabakery.css\" rel=\"stylesheet\">
\t\t<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
\t</head>

\t<body>
\t\t{# 導航列 #}
\t\t{% include \"partials/backend/navbar.inc.twig\" %}

\t\t{% block content %}
\t\t\t<!--內容區塊-->
\t\t\t<main
\t\t\t\tclass=\"container-fluid mt-4\">
\t\t\t\t<!--分成左右2邊的佈區-->
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div
\t\t\t\t\t\tclass=\"col-md-2\">
\t\t\t\t\t\t<!--左側選單列-->
\t\t\t\t\t\t<div class=\"list-group\">
\t\t\t\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item div_bgcolor\">總覽</a>
\t\t\t\t\t\t\t<!-- <a href=\"javascript:;\" class=\"list-group-item\">出勤</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                    <a href=\"javascript:;\" class=\"list-group-item\">缺勤</a> -->
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t<h3>出缺勤總覽</h3>
\t\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\">
\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h6>總課程時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"totalclasshours\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>實際上課時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"attendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>出勤比率</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"attendancerate\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h6>缺席時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"unattendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>遲到時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"late\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t\t<h6>早退時數</h6>
\t\t\t\t\t\t\t\t\t\t<div id=\"leave_early\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<!--出缺席圓餅圖-->
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<h6>出/缺席</h1>
\t\t\t\t\t\t\t\t<canvas id=\"myAttenChart\"></canvas>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!--每日上課時間折線圖-->
\t\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t\t<h1>每日上課時間折線圖</h1>
\t\t\t\t\t\t\t\t<canvas id=\"myclasstimeChart\"></canvas>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!--每日在校時間折線圖-->
\t\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t\t<h1>每日在校時間折線圖</h1>
\t\t\t\t\t\t\t\t<canvas id=\"myattentimeChart\"></canvas>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t</main>
\t\t{% endblock %}


\t\t{# 註腳 #}
\t\t{% include \"partials/backend/footer.inc.twig\" %}


\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
\t</body>
</html>
", "dashboard.twig", "C:\\xampp\\htdocs\\phpclass\\php30hr\\project\\templates\\dashboard.twig");
    }
}
