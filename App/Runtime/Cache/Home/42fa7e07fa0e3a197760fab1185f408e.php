<?php if (!defined('THINK_PATH')) exit();?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>『ThinkPHP管理平台』By ThinkPHP <?php echo (THINK_VERSION); ?></title>
<link rel="stylesheet" type="text/css" href="/thinkphprbac2/Public/Css/blue.css" />
<script type="text/javascript" src="/thinkphprbac2/Public/Js/Base.js"></script>
<script type="text/javascript" src="/thinkphprbac2/Public/Js/prototype.js"></script>
<script type="text/javascript" src="/thinkphprbac2/Public/Js/mootools.js"></script>
<script type="text/javascript" src="/thinkphprbac2/Public/Js/Think/ThinkAjax.js"></script>
<script type="text/javascript" src="/thinkphprbac2/Public/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="/thinkphprbac2/Public/Js/common.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '/thinkphprbac2/Node';
var APP	 =	 '/thinkphprbac2';
var PUBLIC = '/thinkphprbac2/Public';
//-->
</script>
</head>

<body>
<!-- 主页面开始 -->
<div id="main" class="main" >
<!-- 主体内容  -->
<div class="content" >
<div class="title"><?php if(isset($nodeName)): ?>[<?php echo ($nodeName); ?>]<?php endif; if(($level) == "1"): ?>应用<?php endif; if(($level) == "2"): ?>模块<?php endif; if(($level) == "3"): ?>操作<?php endif; ?>列表 <span style="font-weight:normal">[ 分组:&nbsp;<?php if(is_array($groupList)): $i = 0; $__LIST__ = $groupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="/thinkphprbac2/Node/index/group_id/<?php echo ($key); ?>"><?php echo ($tag); ?></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?><a href="/thinkphprbac2/Node">所有</a> ] </span></div>
<!--  功能操作区域  -->
<div class="operate" >
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="add" value="新增" onclick="add()" class="add imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="edit" value="编辑" onclick="edit()" class="edit imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="delete" value="删除" onclick="del()" class="delete imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="sort" value="排序" onclick="sort()" class="sort imgButton"></div>
<!-- 查询区域 -->
<div class="fRig">
<form method='post' action="/thinkphprbac2/Node">
<div class="fLeft"><span id="key"><input type="text" name="name" title="名称查询" class="medium" ></span></div>
<div class="impBtn hMargin fLeft shadow" ><input type="submit" id="" name="search" value="查询" onclick="" class="search imgButton"></div>
</div>
<!-- 高级查询区域 -->
<div  id="searchM" class=" none search cBoth" >
</div>

</form>
</div>
<!-- 功能操作区域结束 -->

<!-- 列表显示区域  -->
<div class="list" >
<div id="result" class="result none"></div>
<!-- Think 系统列表组件开始 -->
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr><td height="5" colspan="8" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="10%"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','index')" title="按照编号<?php echo ($sortType); ?> ">编号<?php if(($order) == "id"): ?><img src="/thinkphprbac2/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('name','<?php echo ($sort); ?>','index')" title="按照名称<?php echo ($sortType); ?> ">名称<?php if(($order) == "name"): ?><img src="/thinkphprbac2/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('title','<?php echo ($sort); ?>','index')" title="按照显示名<?php echo ($sortType); ?> ">显示名<?php if(($order) == "title"): ?><img src="/thinkphprbac2/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('group_id','<?php echo ($sort); ?>','index')" title="按照分组<?php echo ($sortType); ?> ">分组<?php if(($order) == "group_id"): ?><img src="/thinkphprbac2/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('sort','<?php echo ($sort); ?>','index')" title="按照序号<?php echo ($sortType); ?> ">序号<?php if(($order) == "sort"): ?><img src="/thinkphprbac2/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('status','<?php echo ($sort); ?>','index')" title="按照状态<?php echo ($sortType); ?> ">状态<?php if(($order) == "status"): ?><img src="/thinkphprbac2/Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?><tr class="row" ><td><input type="checkbox" name="key"	value="<?php echo ($node["id"]); ?>"></td><td><?php echo ($node["id"]); ?></td><td><a href="javascript:child('<?php echo (addslashes($node["id"])); ?>')"><?php echo ($node["name"]); ?></a></td><td><a href="javascript:edit('<?php echo (addslashes($node["id"])); ?>')"><?php echo ($node["title"]); ?></a></td><td><?php echo (getNodeGroupName($node["group_id"])); ?></td><td><?php echo ($node["sort"]); ?></td><td><?php echo (getStatus($node["status"])); ?></td><td> <?php echo (showStatus($node["status"],$node['id'])); ?>&nbsp;<a href="javascript:edit('<?php echo ($node["id"]); ?>')">编辑</a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td height="5" colspan="8" class="bottomTd"></td></tr></table>
<!-- Think 系统列表组件结束 -->

</div>
<!--  分页显示区域 -->
<div class="page"><?php echo ($page); ?></div>
<!-- 列表显示区域结束 -->
</div>
<!-- 主体内容结束 -->
</div>
<!-- 主页面结束 -->