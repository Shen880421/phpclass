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
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4;}
        .container { max-width: 800px; margin: 20px auto; padding: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .error { color: #dc3545; background-color: #f8d7da; border-color: #f5c6cb; padding: 8px; border-radius: 4px; margin-top: 10px; }
        .success { color: #28a745; background-color: #d4edda; border-color: #c3e6cb; padding: 8px; border-radius: 4px; margin-top: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input[type=\"text\"], input[type=\"email\"], input[type=\"password\"], input[type=\"number\"], textarea {
            width: calc(100% - 22px); /* 100% 減去 padding 和 border */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* 讓 padding 不會增加寬度 */
            font-size: 1em;
        }
        textarea {
            resize: vertical; /* 允許垂直調整大小 */
            min-height: 80px;
        }
        input[type=\"submit\"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.2s ease;
        }
        input[type=\"submit\"]:hover {
            background-color: #0056b3;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
    ";
        // line 49
        yield "    ";
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 50
        yield "    ";
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 51
        yield "</head>
<body>
    <div class=\"container\">
        ";
        // line 54
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 64
        yield "
        ";
        // line 65
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 68
        yield "
        ";
        // line 69
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 75
        yield "    </div>
    ";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["demo"] ?? null), "html", null, true);
        yield "
</body>
</html>";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "我的網站";
        yield from [];
    }

    // line 49
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 50
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 54
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 55
        yield "            <h1>我的電商後台</h1>
            <nav>
                <a href=\"/\">首頁</a> |
                <a href=\"/register.php\">註冊</a> |
                <a href=\"/add_product.php\">新增產品</a> ";
        // line 60
        yield "                ";
        // line 61
        yield "            </nav>
            <hr>
        ";
        yield from [];
    }

    // line 65
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 66
        yield "            ";
        // line 67
        yield "        ";
        yield from [];
    }

    // line 69
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 70
        yield "            <hr>
            <footer>
                <p>&copy; ";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " 我的電商網站. All rights reserved.</p>
            </footer>
        ";
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
        return array (  212 => 72,  208 => 70,  201 => 69,  196 => 67,  194 => 66,  187 => 65,  180 => 61,  178 => 60,  172 => 55,  165 => 54,  155 => 50,  145 => 49,  134 => 6,  126 => 76,  123 => 75,  121 => 69,  118 => 68,  116 => 65,  113 => 64,  111 => 54,  106 => 51,  103 => 50,  100 => 49,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"zh-TW\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}我的網站{% endblock %}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4;}
        .container { max-width: 800px; margin: 20px auto; padding: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .error { color: #dc3545; background-color: #f8d7da; border-color: #f5c6cb; padding: 8px; border-radius: 4px; margin-top: 10px; }
        .success { color: #28a745; background-color: #d4edda; border-color: #c3e6cb; padding: 8px; border-radius: 4px; margin-top: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input[type=\"text\"], input[type=\"email\"], input[type=\"password\"], input[type=\"number\"], textarea {
            width: calc(100% - 22px); /* 100% 減去 padding 和 border */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* 讓 padding 不會增加寬度 */
            font-size: 1em;
        }
        textarea {
            resize: vertical; /* 允許垂直調整大小 */
            min-height: 80px;
        }
        input[type=\"submit\"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.2s ease;
        }
        input[type=\"submit\"]:hover {
            background-color: #0056b3;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
    {# 您可以在這裡定義更多 CSS 或 JS 區塊 #}
    {% block stylesheets %}{% endblock %}
    {% block javascripts %}{% endblock %}
</head>
<body>
    <div class=\"container\">
        {% block header %}
            <h1>我的電商後台</h1>
            <nav>
                <a href=\"/\">首頁</a> |
                <a href=\"/register.php\">註冊</a> |
                <a href=\"/add_product.php\">新增產品</a> {# 新增導覽連結 #}
                {# 未來會有更多連結 #}
            </nav>
            <hr>
        {% endblock %}

        {% block content %}
            {# 這裡是每個頁面特有的內容 #}
        {% endblock %}

        {% block footer %}
            <hr>
            <footer>
                <p>&copy; {{ \"now\"|date(\"Y\") }} 我的電商網站. All rights reserved.</p>
            </footer>
        {% endblock %}
    </div>
    {{demo}}
</body>
</html>", "demo.html.twig", "C:\\xampp\\htdocs\\phpclass\\php30hr\\project\\templates\\demo.html.twig");
    }
}
