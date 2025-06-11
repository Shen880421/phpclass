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
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>後台儀表版</title>
\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\"></head>
</html></head><body>
<!--導航列-->
<nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
\t<div
\t\tclass=\"container-fluid\">
\t\t<!-- 網站品牌 -->
\t\t<a class=\"navbar-brand\" href=\"#\">網站名稱</a>

\t\t<!-- 漢堡選單按鈕 (小螢幕顯示) -->
\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t</button>

\t\t<!-- 導航菜單內容 -->
\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNav\">
\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">首頁</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" href=\"#\">類別</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" href=\"#\">推薦</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" href=\"#\">關於我們</a>
\t\t\t\t</li>

\t\t\t</ul>
\t\t</div>
\t</div>
</nav>
<!--內容區塊-->
<main
\tclass=\"container-fluid mt-4\">
\t<!--分成左右2邊的佈區-->
\t<div class=\"row\">
\t\t<div
\t\t\tclass=\"col-md-2\">
\t\t\t<!--左側選單列-->
\t\t\t<div class=\"list-group\">
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item active\">所有產品</a>
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item\">3C</a>
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item\">通訊</a>
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item\">家電</a>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"col-md-10\">
\t\t\t<h3>儀表板總覽</h3>
\t\t\t<div class=\"row row-cols-1 row-cols-md-2\">
\t\t\t\t<div class=\"col\">
\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<h6>文章統計總覽</h6>
\t\t\t\t\t\t\t<div id=\"postcount\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t<p>總發佈數量</p>
\t\t\t\t\t\t\t<div class=\"progress mb-2\">
\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-primary\" style=\"width:80%\">80%</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"d-flex justify-content-between small\">
\t\t\t\t\t\t\t\t<div>活躍作者:<span class=\"text-danger\" id=\"keepliveuser\">---</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div>本週新增:<span class=\"text-danger\" id=\"thisweeknew\">---</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"mt-3\">最後更新:<span id=\"updatedAt\">---</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col\">
\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<h6>註冊使用者</h6>
\t\t\t\t\t\t\t<div id=\"userscount\" class=\"card-title-number text-success\">---</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!--文章預覽card-->
\t\t\t<div class=\"row row-cols-1 row-cols-md-3 row-cols-lg-3 mt-4\" id=\"article-container\"></div>
\t\t</div>

\t</div>

</main>
<footer class=\"bg-dark text-white mt-5 py-4\">
\t<div class=\"container\">
\t\t<div class=\"row row-cols-1 row-cols-md-3\">
\t\t\t<div class=\"col\">
\t\t\t\t<h5>關於我們</h5>
\t\t\t\t<p>產業新尖兵全端班</p>
\t\t\t</div>
\t\t\t<div class=\"col\">
\t\t\t\t<h5>聯我我們</h5>
\t\t\t\t<p>Email: frank@imusm.net</p>
\t\t\t</div>
\t\t\t<div class=\"col\">
\t\t\t\t<h5>追踪我們</h5>
\t\t\t\t<div>
\t\t\t\t\t<a href=\"javascript:;\" class=\"text-white me-2\">Facebook</a>
\t\t\t\t\t<a href=\"javascript:;\" class=\"text-white me-2\">Instagram</a>
\t\t\t\t\t<a href=\"javascript:;\" class=\"text-white me-2\">X(Twitter)</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<hr>
\t\t<p class=\"text-center mb-0\">&copy; 2025 產業新尖兵全端班</p>
\t</div>
</footer>

<div class=\"modal fade\" id=\"article-modal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-lg  modal-dialog-scrollable\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\" id=\"article-modal-title\">---</h5>
\t\t\t\t<!-- x 關閉按鈕-->
\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\" id=\"article-modal-body\"></div>
\t\t\t<div class=\"modal-footer\">

\t\t\t\t<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">關閉</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script>
\tasync function loadDashBoard() {
console.log('Dom Content Loaded');
try {
const [posts, users] = await Promise.all([
fetch(\"https://jsonplaceholder.typicode.com/posts\").then(res => res.json()),
fetch(\"users.json\").then(res => res.json()),
])

document.getElementById('postcount').textContent = posts.length;
document.getElementById('userscount').textContent = users.length;
document.getElementById('keepliveuser').textContent = users.length;
let newusers = Math.floor(Math.random() * 50);
document.getElementById('thisweeknew').textContent = newusers;
console.log(newusers);
let now = new Date();
// 簡化版
document.getElementById('updatedAt').textContent = now;
// 優化版
let dateString = now.toLocaleDateString('zh-Hant', {
year: 'numeric',
month: 'numeric',
day: 'numeric'
}) + ' ' + now.toLocaleTimeString('zh-Hant', {hour12: false});
document.getElementById('updatedAt').textContent = dateString;
console.log(now);
console.log(posts);
console.log(users);

// 合成動態文章卡片內容
let htmlstr = \"\";
let article_amount = 3; // 在畫面渲染3篇文章
for (let i = 0; i < article_amount; i++) {
htmlstr += `<div class=\"col\">
                        <h4>文章預覽</h4>
                        <div class=\"card shadow-sm\">
                            <div class=\"card-body\">
                                <div class=\"card-title\">#<span class=\"article-id\">\${
posts[i].id
}</span></div>
                                <h5>\${
posts[i].title
}</h5>
                                <div class=\"cart-content\">\${
posts[i].body
}</div>
                                <div class=\"author-div\">作者 ID:<span class=\"author-id\">\${
posts[i].userId
}</span></div>
                                <button class=\"btn btn-primary\" onclick=\"openmodal(\${
posts[i].id
})\">查看</button>
                            </div>
                        </div>
                    </div>`;
}
// console.log(htmlstr);
// 定位到容器
document.getElementById(\"article-container\").innerHTML = htmlstr;
} catch (err) {
console.log(err);
}
}
document.addEventListener('DOMContentLoaded', loadDashBoard);


async function openmodal(articleid) {
try {
const post = await Promise.all([fetch(\"https://jsonplaceholder.typicode.com/posts/\" + articleid).then(res => res.json())])
console.log(post[0].id);
document.getElementById(\"article-modal-title\").innerHTML = \"<span>#\" + post[0].id + \"</span> \" + post[0].title;
document.getElementById(\"article-modal-body\").innerHTML = post[0].body;
// 顯示模態框
var myModal = new bootstrap.Modal(document.getElementById('article-modal'))
myModal.show()

} catch (err) {
console.log(err);
}
}
</script></body></html>
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
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>後台儀表版</title>
\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\"></head>
</html></head><body>
<!--導航列-->
<nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
\t<div
\t\tclass=\"container-fluid\">
\t\t<!-- 網站品牌 -->
\t\t<a class=\"navbar-brand\" href=\"#\">網站名稱</a>

\t\t<!-- 漢堡選單按鈕 (小螢幕顯示) -->
\t\t<button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t</button>

\t\t<!-- 導航菜單內容 -->
\t\t<div class=\"collapse navbar-collapse\" id=\"navbarNav\">
\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">首頁</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" href=\"#\">類別</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" href=\"#\">推薦</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" href=\"#\">關於我們</a>
\t\t\t\t</li>

\t\t\t</ul>
\t\t</div>
\t</div>
</nav>
<!--內容區塊-->
<main
\tclass=\"container-fluid mt-4\">
\t<!--分成左右2邊的佈區-->
\t<div class=\"row\">
\t\t<div
\t\t\tclass=\"col-md-2\">
\t\t\t<!--左側選單列-->
\t\t\t<div class=\"list-group\">
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item active\">所有產品</a>
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item\">3C</a>
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item\">通訊</a>
\t\t\t\t<a href=\"javascript:;\" class=\"list-group-item\">家電</a>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"col-md-10\">
\t\t\t<h3>儀表板總覽</h3>
\t\t\t<div class=\"row row-cols-1 row-cols-md-2\">
\t\t\t\t<div class=\"col\">
\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<h6>文章統計總覽</h6>
\t\t\t\t\t\t\t<div id=\"postcount\" class=\"card-title-number text-primary\">---</div>
\t\t\t\t\t\t\t<p>總發佈數量</p>
\t\t\t\t\t\t\t<div class=\"progress mb-2\">
\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-primary\" style=\"width:80%\">80%</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"d-flex justify-content-between small\">
\t\t\t\t\t\t\t\t<div>活躍作者:<span class=\"text-danger\" id=\"keepliveuser\">---</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div>本週新增:<span class=\"text-danger\" id=\"thisweeknew\">---</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"mt-3\">最後更新:<span id=\"updatedAt\">---</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col\">
\t\t\t\t\t<div class=\"card shadow-sm\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<h6>註冊使用者</h6>
\t\t\t\t\t\t\t<div id=\"userscount\" class=\"card-title-number text-success\">---</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!--文章預覽card-->
\t\t\t<div class=\"row row-cols-1 row-cols-md-3 row-cols-lg-3 mt-4\" id=\"article-container\"></div>
\t\t</div>

\t</div>

</main>
<footer class=\"bg-dark text-white mt-5 py-4\">
\t<div class=\"container\">
\t\t<div class=\"row row-cols-1 row-cols-md-3\">
\t\t\t<div class=\"col\">
\t\t\t\t<h5>關於我們</h5>
\t\t\t\t<p>產業新尖兵全端班</p>
\t\t\t</div>
\t\t\t<div class=\"col\">
\t\t\t\t<h5>聯我我們</h5>
\t\t\t\t<p>Email: frank@imusm.net</p>
\t\t\t</div>
\t\t\t<div class=\"col\">
\t\t\t\t<h5>追踪我們</h5>
\t\t\t\t<div>
\t\t\t\t\t<a href=\"javascript:;\" class=\"text-white me-2\">Facebook</a>
\t\t\t\t\t<a href=\"javascript:;\" class=\"text-white me-2\">Instagram</a>
\t\t\t\t\t<a href=\"javascript:;\" class=\"text-white me-2\">X(Twitter)</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<hr>
\t\t<p class=\"text-center mb-0\">&copy; 2025 產業新尖兵全端班</p>
\t</div>
</footer>

<div class=\"modal fade\" id=\"article-modal\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-lg  modal-dialog-scrollable\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\" id=\"article-modal-title\">---</h5>
\t\t\t\t<!-- x 關閉按鈕-->
\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\" id=\"article-modal-body\"></div>
\t\t\t<div class=\"modal-footer\">

\t\t\t\t<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">關閉</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script>
\tasync function loadDashBoard() {
console.log('Dom Content Loaded');
try {
const [posts, users] = await Promise.all([
fetch(\"https://jsonplaceholder.typicode.com/posts\").then(res => res.json()),
fetch(\"users.json\").then(res => res.json()),
])

document.getElementById('postcount').textContent = posts.length;
document.getElementById('userscount').textContent = users.length;
document.getElementById('keepliveuser').textContent = users.length;
let newusers = Math.floor(Math.random() * 50);
document.getElementById('thisweeknew').textContent = newusers;
console.log(newusers);
let now = new Date();
// 簡化版
document.getElementById('updatedAt').textContent = now;
// 優化版
let dateString = now.toLocaleDateString('zh-Hant', {
year: 'numeric',
month: 'numeric',
day: 'numeric'
}) + ' ' + now.toLocaleTimeString('zh-Hant', {hour12: false});
document.getElementById('updatedAt').textContent = dateString;
console.log(now);
console.log(posts);
console.log(users);

// 合成動態文章卡片內容
let htmlstr = \"\";
let article_amount = 3; // 在畫面渲染3篇文章
for (let i = 0; i < article_amount; i++) {
htmlstr += `<div class=\"col\">
                        <h4>文章預覽</h4>
                        <div class=\"card shadow-sm\">
                            <div class=\"card-body\">
                                <div class=\"card-title\">#<span class=\"article-id\">\${
posts[i].id
}</span></div>
                                <h5>\${
posts[i].title
}</h5>
                                <div class=\"cart-content\">\${
posts[i].body
}</div>
                                <div class=\"author-div\">作者 ID:<span class=\"author-id\">\${
posts[i].userId
}</span></div>
                                <button class=\"btn btn-primary\" onclick=\"openmodal(\${
posts[i].id
})\">查看</button>
                            </div>
                        </div>
                    </div>`;
}
// console.log(htmlstr);
// 定位到容器
document.getElementById(\"article-container\").innerHTML = htmlstr;
} catch (err) {
console.log(err);
}
}
document.addEventListener('DOMContentLoaded', loadDashBoard);


async function openmodal(articleid) {
try {
const post = await Promise.all([fetch(\"https://jsonplaceholder.typicode.com/posts/\" + articleid).then(res => res.json())])
console.log(post[0].id);
document.getElementById(\"article-modal-title\").innerHTML = \"<span>#\" + post[0].id + \"</span> \" + post[0].title;
document.getElementById(\"article-modal-body\").innerHTML = post[0].body;
// 顯示模態框
var myModal = new bootstrap.Modal(document.getElementById('article-modal'))
myModal.show()

} catch (err) {
console.log(err);
}
}
</script></body></html>
", "dashboard.twig", "C:\\xampp\\htdocs\\phpclass\\php30hr\\project\\templates\\dashboard.twig");
    }
}
