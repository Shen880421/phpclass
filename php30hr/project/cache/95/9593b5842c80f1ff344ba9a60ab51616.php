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

/* register.html.twig */
class __TwigTemplate_6b23a3c6195ea13ab12e0693dc1b50a5 extends Template
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

        $this->blocks = [
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "demo.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("demo.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "\t\t\t\t<h1>我的電商後台</h1>
\t\t\t\t
\t\t\t\t<hr>
\t\t\t";
        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 9
        yield "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-12 col-sm-12 col-md-4 offset-md-4\">
            <div class =\"card\">
                <div class=\"card-header\">註冊會員</div>
                <div class =\"card-body\"></div>
            </div>
        </div>
    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "register.html.twig";
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
        return array (  74 => 9,  67 => 8,  59 => 4,  52 => 3,  41 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#繼承版型#}
{% extends \"demo.html.twig\" %} 
{% block header %}
\t\t\t\t<h1>我的電商後台</h1>
\t\t\t\t
\t\t\t\t<hr>
\t\t\t{% endblock %}
{% block content %}
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-12 col-sm-12 col-md-4 offset-md-4\">
            <div class =\"card\">
                <div class=\"card-header\">註冊會員</div>
                <div class =\"card-body\"></div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "register.html.twig", "C:\\xampp\\htdocs\\phpclass\\php30hr\\project\\templates\\register.html.twig");
    }
}
