{* 本番機では削除 *}
<base href="{$config.base}" />
{* /本番機では削除 *}
<link href="/css/jp/default.css"                 rel="stylesheet" type="text/css" media="all" />
<link href="/j-messe/css/style.css"              rel="stylesheet" type="text/css" media="all" />
<link href="/css/jp/printmedia.css"              rel="stylesheet" type="text/css" media="print" />
<link href="/css/js/prettyphoto/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
{if ('1' == $form.print)}
<link href="/css/jp/print.css"                   rel="stylesheet" type="text/css" media="all" />
{/if}

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/j-messe/js/j-messe.js"    charset="utf-8"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/jquery/jquery.tools.min.js"></script>
<script type="text/javascript" src="{$config.url}js/j-messe/jquery.dynamicselectforjson.js"></script>
<script type="text/javascript" src="{$config.url}js/j-messe/jquery.dynamicselect.js"></script>

