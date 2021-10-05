<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* user/add.html.twig */
class __TwigTemplate_8b65b9bc173d10c6775320d09c8636d14aaa05eed20f3d27118457e3a5b9ab15 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"css/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"css/signin.css\">
    <title>Ajouter</title>
</head>
<body>
<main class=\"form-signin\">
    <form method=\"POST\">
        <h1 class=\"h3 mb-3 fw-normal\">Inscrire</h1>

        <div class=\"form-floating\">
        <input name=\"email\" type=\"email\" class=\"form-control\" id=\"floatingInput\" placeholder=\"name@example.com\">
        <label for=\"floatingInput\">Email</label>
        </div>
        <div class=\"form-floating\">
        <input name=\"password\" type=\"password\" class=\"form-control\" id=\"floatingPassword\" placeholder=\"Password\">
        <label for=\"floatingPassword\">Password</label>
        </div>


        <button class=\"w-100 btn btn-lg btn-primary\" type=\"submit\">S'inscrire</button>
    </form>
</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "user/add.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "user/add.html.twig", "C:\\Users\\jenohug\\Documents\\php-poo-login\\templates\\user\\add.html.twig");
    }
}
