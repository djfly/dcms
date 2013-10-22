<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - quickstart';
$this->breadcrumbs=array(
	'quickstart',
);
?>
<header class="jumbotron subhead" id="overview">
    <div class="container">
        <h1>QuickStart</h1>
        <p class="lead"> </p>
    </div>
</header>
<div class="container">
	<div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav" data-spy="affix" data-offset-top="200">
          <li><a href="#download-dcms"><i class="icon-chevron-right"></i> 下载</a></li>
          <li><a href="#file-structure"><i class="icon-chevron-right"></i> 文件结构</a></li>
          <li><a href="#contents"><i class="icon-chevron-right"></i> 包含了哪些东西</a></li>
          <li><a href="#what-next"><i class="icon-chevron-right"></i> 下一步？</a></li>
        </ul>
      </div>
      <div class="span9">
      	<section id="download-dcms">
          <div class="page-header">
            <h1>1. 下载</h1>
          </div>
          <p class="lead">下载之前先检查一下是否准备好了一个代码编辑器(我们推荐使用 <a href="http://sublimetext.com/2">Sublime Text 2</a>) ，你是否已经掌握了足够的Yii Framework、Bootstrap、YiiBooster、jquery等知识以开展工作。这里我们不详述源码文件，但是它们可以随时被下载。在这里我们只着重介绍DCMS。</p>
          <h2>下载源码</h2>
          <p>从GitHub直接下载到的最新版的源码。</p>
          <p><a class="btn btn-large btn-primary" href="https://github.com/djfly/dcms/archive/master.zip" >下载DCMS源码</a></p>
        </section>
        <section id="file-structure">
          <div class="page-header">
            <h1>2. 文件结构</h1>
          </div>
          <p class="lead">在下载的压缩包中你可以看到如下的文件结构和内容。</p>
          <pre class="prettyprint"><span class="pln">  DCMS</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">├──</span><span class="pln"> _backup</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">├──</span><span class="pln"> assets</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">├──</span><span class="pln"> files</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">├──</span><span class="pln"> images</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">├──</span><span class="pln"> protected</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">├──</span><span class="pln"> themes</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">├──</span><span class="pln"> upload</span><span class="pun">/</span><span class="pln"></span>
          <span class="pun">│</span><span class="pln">   </span><span class="pun">├──</span><span class="pln"> link</span>
          <span class="pun">│</span><span class="pln">   </span><span class="pun">├──</span><span class="pln"> post</span>
          <span class="pun">├──</span><span class="pln"> index.php</span><span class="pln"></span>
          <span class="pun">└──</span><span class="pln"> index-test.php</span><span class="pln"></span>
          </pre>
          <p>这是Yii Framework生成的应用的基本结构，并没有做改动</p>
          
        </section>
        <section id="contents">
          <div class="page-header">
            <h1>3. 包含了哪些东西</h1>
          </div>
          <p class="lead">DCMS集成了当今最流行的框架、库、扩展，提供最先进的项目开发基础。</p>

          <h2>集成以下框架、库、扩展</h2>
          <h4><a href="index.php?r=site/page&view=links#yiiframework">Yii Framework</a></h4>
          <p>Yii 是当今国内外最为流行的 PHP 框架。由于它高性能的特性，被公认为是“最有效率的 PHP 框架”。Yii 提供了今日 Web 2.0 应用开发所需要的几乎一切功能。</p>
          <h4><a href="index.php?r=site/page&view=links#bootstrap">Bootstrap</a></h4>
          <p>Bootstrap是Twitter推出的一个开源的用于前端开发的工具包。它由Twitter的设计师Mark Otto和Jacob Thornton合作开发，是一个CSS/HTML框架。Bootstrap提供了优雅的HTML和CSS规范，它即是由动态CSS语言Less写成。Bootstrap一经推出后颇受欢迎，一直是GitHub上的热门开源项目，包括NASA的MSNBC（微软全国广播公司）的Breaking News都使用了该项目。</p>
          <h4><a href="index.php?r=site/page&view=links#booster">YiiBooster</a></h4>
          <p>自Yii开发者而生, 为Yii开发者而生: YiiBooster是基于YiiBootstrap的组合. Yii框架强劲稳健，适合敏捷开发，驱动后端代码. bootstrap框架提供前端最流行元素. YiiBooster将以上两者完美结合起来</p>
          <h4><a href="index.php?r=site/page&view=links#fontawesome">fontawesome</a></h4>
          <p>Font Awesome 是一套完美的图标字体，它使用图标字体替代图片图标，可任意缩放、旋转角度、组合叠加，支持ie7+ 包含249 个图标</p>
          <h4><a href="index.php?r=site/page&view=links#jQuery">jQuery</a></h4>
          <p>jQuery是一个兼容多浏览器的javascript框架，核心理念是write less,do more(写得更少,做得更多)。jQuery在2006年1月由美国人John Resig在纽约的barcamp发布，吸引了来自世界各地的众多JavaScript高手加入，由Dave Methvin率领团队进行开发。如今，jQuery已经成为最流行的javascript框架，在世界前10000个访问最多的网站中，有超过55%在使用jQuery。</p>
          <h4><a href="index.php?r=site/page&view=links#highcharts">highcharts</a></h4>
          <p>Highcharts 是一个用纯JavaScript编写的一个图表库, 能够很简单便捷的在web网站或是web应用程序添加有交互性的图表，并且免费提供给个人学习、个人网站和非商业用途使用。目前HighCharts支持的图表类型有曲线图、区域图、柱状图、饼状图、散状点图和综合图表。</p>
          <h4><a href="index.php?r=site/page&view=links#extension">extensions</a><span class="muted">（集成以下扩展）</span></h4>
          <ul>
            <li><a href="http://www.yiiframework.com/extension/config" target="_blank">config</a> <span class="muted">config 用于网站配置</span></li>
            <li><a href="http://www.yiiframework.com/extension/authbooster" target="_blank">authbooster</a> <span class="muted">authbooster 用于权限控制</span></li>
            <li><a href="http://www.yiiframework.com/extension/upload" target="_blank">upload</a> <span class="muted">upload 用于附件上传，水印，缩略图</span></li>
            <li><a href="http://www.yiiframework.com/extension/FTP" target="_blank">FTP</a> <span class="muted">FTP 使用FTP，远程附件</span></li>
            <li><a href="http://www.yiiframework.com/extension/yiimailer" target="_blank">YiiMailer</a> <span class="muted">YiiMailer 用于邮件发送，支持布局</span></li>
            <li><a href="http://www.yiiframework.com/extension/yii-kindeditor" target="_blank">kindeditor</a> <span class="muted">kindeditor 所见所得编辑器</span></li>
            <li><a href="http://www.yiiframework.com/extension/nestedsetbehavior" target="_blank">NestedSetBehavior</a> <span class="muted">NestedSetBehavior 无限分类</span></li>
            <li><a href="http://www.yiiframework.com/extension/backup" target="_blank">backup</a> <span class="muted">backup 用于数据备份恢复</span></li>
            <li><a href="http://www.yiiframework.com/extension/yii-debug-toolbar" target="_blank">Yii Debug Toolbar</a> <span class="muted">Yii Debug Toolbar 用于调试</span></li>
          </ul>          
          <h2>DCMS功能列表</h2>
          <p>提供了以下功能元素。</p>
          <ul>
            <li>站点信息设置</li>
            <li>访问控制ip限制</li>
            <li>会员、登录、注册</li>
            <li>无限分类</li>
            <li>文章发布</li>
            <li>缩略图</li>
            <li>FTP 远程附件 </li>
            <li>图片水印</li>
            <li>邮件发送</li>
            <li>菜单管理</li>
            <li>友情链接</li>
            <li>文本映射</li>
            <li>RABC权限控制</li>
            <li>数据库备份恢复</li>
          </ul>
          <p>在后面的文档中, 我们会挨个详细的介绍这些组件的细节,如何使用并定制它们。</p>
        </section>
        <section id="what-next">
          <div class="page-header">
            <h1>下一步？</h1>
          </div>
          <p class="lead">根据文档顶部的分类查看更多资料、代码片段, 为你即将开展的项目定制基础。</p>
          <a class="btn btn-large btn-primary" href="index.php?r=site/page&view=links">查看 DCMS 文档</a>
        </section>
    </div>
</div>
