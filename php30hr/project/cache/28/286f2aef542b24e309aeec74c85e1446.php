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

/* partials/backend/footer.inc.twig */
class __TwigTemplate_37eb51147298aa5aec544f79f0710bec extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<footer class=\"bg-dark text-white mt-5 py-4\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\"></div>
\t\t\t</div>
\t\t</footer>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "partials/backend/footer.inc.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<footer class=\"bg-dark text-white mt-5 py-4\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\"></div>
\t\t\t</div>
\t\t</footer>", "partials/backend/footer.inc.twig", "C:\\xampp\\htdocs\\phpclass\\php30hr\\project\\templates\\partials\\backend\\footer.inc.twig");
    }
}
