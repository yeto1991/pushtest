{* 本番機では削除 *}
<base href="{$config.base_en}" />
{* /本番機では削除 *}
<link href="/css/en/default.css"                 rel="stylesheet" type="text/css" media="all" />
<link href="/en/database/j-messe/css/style.css"  rel="stylesheet" type="text/css" media="all" />
<link href="/css/en/printmedia.css"              rel="stylesheet" type="text/css" media="print" />
{* 以下のCSSは最終的に削除します *}
<link href="/css/en/parts/newmodule.css"         rel="stylesheet" type="text/css" media="all" />
{* /以下のCSSは最終的に削除します *}
{if ('1' == $form.print)}
<link href="/css/en/print.css"                   rel="stylesheet" type="text/css" media="all" />
{/if}
<link href="/css/js/prettyphoto/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />

<script type="text/javascript" src="{$config.css_js_base_pub}js/jquery.js"></script>
<script type="text/javascript" src="{$config.css_js_base_pub}j-messe/js/j-messe.js" charset="utf-8"></script>
<script type="text/javascript" src="{$config.css_js_base_pub}j-messe/js2/j-messe/j-messe_en.js"></script>
<script type="text/javascript" src="{$config.css_js_base_pub}js/jquery/jquery.prettyPhoto.js" charset="utf-8"></script>
<script type="text/javascript" src="{$config.css_js_base_pub}js/jquery/jquery.tools.min.js"></script>
<script type="text/javascript" src="{$config.css_js_base_pub}j-messe/js2/j-messe/jquery.dynamicselect.js"></script>
<script type="text/javascript" src="{$config.css_js_base_pub}j-messe/js2/j-messe/jquery.dynamicselectforjson.js"></script>
<script type="text/javascript" src="{$config.css_js_base_pub}js/common.js"></script>
