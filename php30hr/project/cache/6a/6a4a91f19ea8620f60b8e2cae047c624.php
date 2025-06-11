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
\t\t<!--導航列-->
\t\t<nav class=\"navbar navbar-expand-lg nav_top\">
\t\t\t<div
\t\t\t\tclass=\"container-fluid\">
\t\t\t\t<!-- 網站品牌 -->
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">Shen
\t\t\t\t</a>

\t\t\t\t<!-- 漢堡選單按鈕 (小螢幕顯示) -->
\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t</button>

\t\t\t\t<!-- 導航菜單內容 -->
\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNav\">
\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link active\" aria-current=\"page\" href=\"../index.html\">回到首頁</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</nav>
\t\t<!--內容區塊-->
\t\t<main
\t\t\tclass=\"container-fluid mt-4\">
\t\t\t<!--分成左右2邊的佈區-->
\t\t\t<div class=\"row\">
\t\t\t\t<div
\t\t\t\t\tclass=\"col-md-2\">
\t\t\t\t\t<!--左側選單列-->
\t\t\t\t\t<div class=\"list-group\">
\t\t\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item div_bgcolor\">總覽</a>
\t\t\t\t\t\t<!-- <a href=\"javascript:;\" class=\"list-group-item\">出勤</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                    <a href=\"javascript:;\" class=\"list-group-item\">缺勤</a> -->
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t<h3>出缺勤總覽</h3>
\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\">
\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<h6>總課程時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"totalclasshours\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>實際上課時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"attendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>出勤比率</h6>
\t\t\t\t\t\t\t\t\t<div id=\"attendancerate\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<h6>缺席時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"unattendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>遲到時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"late\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>早退時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"leave_early\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!--出缺席圓餅圖-->
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<h6>出/缺席</h1>
\t\t\t\t\t\t\t<canvas id=\"myAttenChart\"></canvas>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<!--每日上課時間折線圖-->
\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t<h1>每日上課時間折線圖</h1>
\t\t\t\t\t\t\t<canvas id=\"myclasstimeChart\"></canvas>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<!--每日在校時間折線圖-->
\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t<h1>每日在校時間折線圖</h1>
\t\t\t\t\t\t\t<canvas id=\"myattentimeChart\"></canvas>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t</main>
\t\t<footer class=\"bg-dark text-white mt-5 py-4\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\"></div>
\t\t\t</div>
\t\t</footer>
\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
\t\t<!-- 抓取時數 -->
\t\t<script>
\t\t\tconst totalclasshours = document.getElementById(\"totalclasshours\");
const attendance = document.getElementById(\"attendance\");
const attendancerate = document.getElementById(\"attendancerate\");
const unattendance = document.getElementById(\"unattendance\");
const late = document.getElementById(\"late\");
const leave_early = document.getElementById(\"leave_early\");
fetch('shenattendance.json').then(res => res.json()).then(data => {
data.forEach(hours => { // console.log(typeof (parseFloat(hours.leave_early_hours)))
totalclasshours.innerHTML = `\${
parseFloat(hours.class_hours).toFixed(2)
} 小時`;
attendance.innerHTML = `\${
parseFloat(hours.attended_hours).toFixed(2)
} 小時`;
const attendanceratenum = parseInt((parseFloat(hours.attended_hours) / parseFloat(hours.class_hours)) * 100);
// console.log(typeof (attendancerate));
attendancerate.innerHTML = `\${attendanceratenum}%`;
unattendance.innerHTML = `\${
parseFloat(hours.absent_hours).toFixed(2)
} 小時`;
late.innerHTML = `\${
parseFloat(hours.late_hours).toFixed(2)
} 小時`;
leave_early.innerHTML = `\${
parseFloat(hours.leave_early_hours).toFixed(2)
} 小時`;
// 出缺席圓餅圖
const ctx = document.getElementById('myAttenChart');
new Chart(ctx, {
type: 'pie',
data: {
labels: [
'出席', '缺席'
],
datasets: [
{
label: '出缺席',
data: [
parseFloat(hours.attended_hours).toFixed(2),
parseFloat(hours.absent_hours).toFixed(2)
],
backgroundColor: [
'rgba(75, 192, 192, 0.6)', // 綠色
'rgba(255, 99, 132, 0.6)' // 紅色
],
borderWidth: 0 // 邊框寬度
}
]
}
});
});
})
\t\t</script>
\t\t<script>
\t\t\t// 每日上課時間折線圖
const ctx_ct = document.getElementById('myclasstimeChart');
const ctx_at = document.getElementById('myattentimeChart');
let mylinechart;
async function linechart() {
try {
const response = await fetch('hoursline.json');
if (! response.ok) {
throw new Error(response.status);
}
const res = await response.json();
console.log(typeof(res));
console.log(res);
const classdate = res.map(item => item.class_date);
const classhours = res.map(item => item.class_hours);
const attenhours = res.map(item => item.raw_hours);

mylinechart = new Chart(ctx_ct, {
type: 'line',
data: {
labels: classdate,
datasets: [
{
label: '每日上課時間',
data: classhours,
backgroundColor: [
'rgba(75, 192, 192, 0.6)', // 綠色
],
borderColor: 'rgba(75, 192, 192, 0.6)'
}
]
},
options: {
scales: {
y: {
beginAtZero: true // Y 軸從 0 開始
}
}
}
});
// 每日在校時間折線圖
new Chart(ctx_at, {
type: 'line',
data: {
labels: classdate,
datasets: [
{
label: '每日在校時間折線圖',
data: attenhours,
backgroundColor: [
'rgba(75, 192, 192, 0.6)', // 綠色
],
borderColor: 'rgba(75, 192, 192, 0.6)'
}
]
},
options: {
scales: {
y: {
beginAtZero: true // Y 軸從 0 開始
}
}
}
});
} catch (error) {
console.error(error);
}

}


window.onload = linechart;
\t\t</script>
\t</body>
</html>
";
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
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
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
\t\t<!--導航列-->
\t\t<nav class=\"navbar navbar-expand-lg nav_top\">
\t\t\t<div
\t\t\t\tclass=\"container-fluid\">
\t\t\t\t<!-- 網站品牌 -->
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">Shen
\t\t\t\t</a>

\t\t\t\t<!-- 漢堡選單按鈕 (小螢幕顯示) -->
\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t</button>

\t\t\t\t<!-- 導航菜單內容 -->
\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNav\">
\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link active\" aria-current=\"page\" href=\"../index.html\">回到首頁</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t</nav>
\t\t<!--內容區塊-->
\t\t<main
\t\t\tclass=\"container-fluid mt-4\">
\t\t\t<!--分成左右2邊的佈區-->
\t\t\t<div class=\"row\">
\t\t\t\t<div
\t\t\t\t\tclass=\"col-md-2\">
\t\t\t\t\t<!--左側選單列-->
\t\t\t\t\t<div class=\"list-group\">
\t\t\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item div_bgcolor\">總覽</a>
\t\t\t\t\t\t<!-- <a href=\"javascript:;\" class=\"list-group-item\">出勤</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                    <a href=\"javascript:;\" class=\"list-group-item\">缺勤</a> -->
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t<h3>出缺勤總覽</h3>
\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\">
\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<h6>總課程時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"totalclasshours\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>實際上課時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"attendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>出勤比率</h6>
\t\t\t\t\t\t\t\t\t<div id=\"attendancerate\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<h6>缺席時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"unattendance\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>遲到時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"late\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t\t<h6>早退時數</h6>
\t\t\t\t\t\t\t\t\t<div id=\"leave_early\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!--出缺席圓餅圖-->
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<h6>出/缺席</h1>
\t\t\t\t\t\t\t<canvas id=\"myAttenChart\"></canvas>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<!--每日上課時間折線圖-->
\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t<h1>每日上課時間折線圖</h1>
\t\t\t\t\t\t\t<canvas id=\"myclasstimeChart\"></canvas>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<!--每日在校時間折線圖-->
\t\t\t\t\t<div class=\"row row-cols-1 row-cols-md-1\">
\t\t\t\t\t\t<div class=\"p-5\">
\t\t\t\t\t\t\t<h1>每日在校時間折線圖</h1>
\t\t\t\t\t\t\t<canvas id=\"myattentimeChart\"></canvas>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t</main>
\t\t<footer class=\"bg-dark text-white mt-5 py-4\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row row-cols-1 row-cols-md-3\"></div>
\t\t\t</div>
\t\t</footer>
\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
\t\t<!-- 抓取時數 -->
\t\t<script>
\t\t\tconst totalclasshours = document.getElementById(\"totalclasshours\");
const attendance = document.getElementById(\"attendance\");
const attendancerate = document.getElementById(\"attendancerate\");
const unattendance = document.getElementById(\"unattendance\");
const late = document.getElementById(\"late\");
const leave_early = document.getElementById(\"leave_early\");
fetch('shenattendance.json').then(res => res.json()).then(data => {
data.forEach(hours => { // console.log(typeof (parseFloat(hours.leave_early_hours)))
totalclasshours.innerHTML = `\${
parseFloat(hours.class_hours).toFixed(2)
} 小時`;
attendance.innerHTML = `\${
parseFloat(hours.attended_hours).toFixed(2)
} 小時`;
const attendanceratenum = parseInt((parseFloat(hours.attended_hours) / parseFloat(hours.class_hours)) * 100);
// console.log(typeof (attendancerate));
attendancerate.innerHTML = `\${attendanceratenum}%`;
unattendance.innerHTML = `\${
parseFloat(hours.absent_hours).toFixed(2)
} 小時`;
late.innerHTML = `\${
parseFloat(hours.late_hours).toFixed(2)
} 小時`;
leave_early.innerHTML = `\${
parseFloat(hours.leave_early_hours).toFixed(2)
} 小時`;
// 出缺席圓餅圖
const ctx = document.getElementById('myAttenChart');
new Chart(ctx, {
type: 'pie',
data: {
labels: [
'出席', '缺席'
],
datasets: [
{
label: '出缺席',
data: [
parseFloat(hours.attended_hours).toFixed(2),
parseFloat(hours.absent_hours).toFixed(2)
],
backgroundColor: [
'rgba(75, 192, 192, 0.6)', // 綠色
'rgba(255, 99, 132, 0.6)' // 紅色
],
borderWidth: 0 // 邊框寬度
}
]
}
});
});
})
\t\t</script>
\t\t<script>
\t\t\t// 每日上課時間折線圖
const ctx_ct = document.getElementById('myclasstimeChart');
const ctx_at = document.getElementById('myattentimeChart');
let mylinechart;
async function linechart() {
try {
const response = await fetch('hoursline.json');
if (! response.ok) {
throw new Error(response.status);
}
const res = await response.json();
console.log(typeof(res));
console.log(res);
const classdate = res.map(item => item.class_date);
const classhours = res.map(item => item.class_hours);
const attenhours = res.map(item => item.raw_hours);

mylinechart = new Chart(ctx_ct, {
type: 'line',
data: {
labels: classdate,
datasets: [
{
label: '每日上課時間',
data: classhours,
backgroundColor: [
'rgba(75, 192, 192, 0.6)', // 綠色
],
borderColor: 'rgba(75, 192, 192, 0.6)'
}
]
},
options: {
scales: {
y: {
beginAtZero: true // Y 軸從 0 開始
}
}
}
});
// 每日在校時間折線圖
new Chart(ctx_at, {
type: 'line',
data: {
labels: classdate,
datasets: [
{
label: '每日在校時間折線圖',
data: attenhours,
backgroundColor: [
'rgba(75, 192, 192, 0.6)', // 綠色
],
borderColor: 'rgba(75, 192, 192, 0.6)'
}
]
},
options: {
scales: {
y: {
beginAtZero: true // Y 軸從 0 開始
}
}
}
});
} catch (error) {
console.error(error);
}

}


window.onload = linechart;
\t\t</script>
\t</body>
</html>
", "dashboard.twig", "C:\\xampp\\htdocs\\phpclass\\php30hr\\project\\templates\\dashboard.twig");
    }
}
