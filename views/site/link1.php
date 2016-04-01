<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/index_v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:23 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--360浏览器优先以webkit内核解析-->


    <title>H+ 后台主题UI框架 - 主页示例</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">

    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>待处理事项</h5>
                    </div>
                    <div class="ibox-content">
                        <p>我们提供基于H+的二次开发服务，具体费用请联系作者。</p>
                        <p>同时，我们也提供以下服务：</p>
                        <ol>
                            <li>基于WordPress的网站建设和主题定制</li>
                            <li>PSD转WordPress主题</li>
                            <li>PSD转XHTML</li>
                            <li>Html页面（CSS+XHTML+jQuery）制作</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>更新日志</h5>
                    </div>
                    <div class="ibox-content no-padding">
                        <div class="panel-body">
                            <div class="panel-group" id="version">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#version" href="#v41">v4.1.0</a><code class="pull-right">2015.12.21</code>
                                            </h5>
                                    </div>
                                    <div id="v41" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="alert alert-warning">此版本是一个维护版本，主要是升级和修复bug，让我们共同期待5.0版的到来</div>
                                            <ol>
                                                <li>增加不支持IE8的页面提示</li>
                                                <li>修复页面链接和表单提交默认在新窗口中打开的问题</li>
                                                <li>更新suggest插件，修复错位问题</li>
                                                <li>升级bootstrap版本到3.3.6版本</li>
                                                <li>升级layer到2.1版本</li>
                                                <li>升级echarts到2.2.7版本</li>
                                                <li>升级webuploader到0.1.5版本</li>
                                                <li>修复网络条件不好情况下，页面加载提示遮挡页面无法操作的问题</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script id="welcome-template" type="text/x-handlebars-template">
        <div class="border-bottom white-bg page-heading clearfix">
            <h2>更新日志：</h2>
            <div>今天是情人节，H+终于跨到了v3.0，就算是情人节礼物吧，感谢你们的不离不弃，一路相伴！</div>
            <div class="pull-right">——Beau-zihan / 2015.8.20</div>
        </div>
        <div class="m">
            <div class="tabs-container">
                <div class="tabs-left">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#layouts"><i class="fa fa-columns"></i> 布局
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#new"><i class="fa fa-plus-square"></i> 新增
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#update"><i class="fa fa-arrow-circle-o-up"></i> 升级
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#revise"><i class="fa fa-pencil"></i> 修正
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#optimize"><i class="fa fa-magic"></i> 优化
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" style="line-height:1.8em;">
                        <div id="layouts" class="tab-pane active">
                            <div class="panel-body">
                                <ol class="no-left-padding">
                                    <li class="text-danger"><b>推荐：</b>期待已久的contentTabs效果，支持关闭、双击刷新、左右滑动等；</li>
                                    <li>固定左侧主菜单栏，并对菜单项做了新的调整；</li>
                                    <li>增加右侧面板及聊天窗口等。</li>
                                </ol>

                                <p style="margin-left:25px;">
                                    <hr><span class="label label-danger">特别致谢</span> 感谢[子·梦]同学提供的contentTabs优化方案和代码！</p>
                            </div>
                        </div>
                        <div id="new" class="tab-pane">
                            <div class="panel-body">
                                <ol class="no-left-padding">
                                    <li>表单：搜索自动补全插件suggest、高级表单插件（时间选择，切换按钮，图像裁剪上传，单选复选框美化，文件域美化等)等；</li>
                                    <li>图表：图表组合页面等；</li>
                                    <li>页面：团队、社交、客户管理、文章列表、文章详情、新登录页面等；</li>
                                    <li>UI元素：竖向选项卡、拖动面板、文本对比、加载动画、SweetAlert等；</li>
                                    <li>相册：layer相册、Blueimp相册等；</li>
                                    <li>表格：FooTables等。</li>
                                </ol>
                            </div>
                        </div>
                        <div id="update" class="tab-pane">
                            <div class="panel-body">
                                <ol>
                                    <li>页面弹层插件layer升级至1.9.3；</li>
                                    <li>更新jqgrid，支持树形表格；</li>
                                    <li>更新帮助文档。</li>
                                </ol>
                            </div>
                        </div>
                        <div id="revise" class="tab-pane">
                            <div class="panel-body">
                                <ol>
                                    <li>jstree、Simditor等多处错误；</li>
                                    <li>页面加载进度提示；</li>
                                    <li>Glyphicon字体图标不显示的问题；</li>
                                    <li>重新整理开发文档；</li>
                                </ol>
                            </div>
                        </div>
                        <div id="optimize" class="tab-pane">
                            <div class="panel-body">
                                <ol>
                                    <li>H+整体视觉效果；</li>
                                    <li>jstree默认主题显示效果；</li>
                                    <li>表单验证显示效果；</li>
                                    <li>iCheck显示效果；</li>
                                    <li>Tabs显示效果。</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissable m-t-sm">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                同时这也是一个示例，演示了如何从iframe中弹出一个覆盖父页面的层。
            </div>
        </div>
    </script>
    <script src="/js/jquery.min.js?v=2.1.4"></script>
    <script src="/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/js/plugins/layer/layer.min.js"></script>
    <script src="/js/content.min.js"></script>
    <script src="/js/welcome.min.js"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/index_v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:30 GMT -->
</html>
