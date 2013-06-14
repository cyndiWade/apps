<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9">

<title>OA.时间轴</title>
<link href="Home/Public/Css/Smohan.blog.css" type="text/css" rel="stylesheet">
<style type="text/css">
* {
	padding:0;
	margin: 0;
}
.left {
	float:left;
	width:500px;
}
.right {
	float:right;
	width:520px
}
</style>
</head>
<body>
<br />
<br />
<!-- 
<center>
  <h2>任务时间表</h2>
</center>
-->
<!--ShowMsg-->

<center>
  <h2 style="color:#85BE19;"></h2>
</center>
<br />
<?php if(is_array($html)): $i = 0; $__LIST__ = $html;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><center>
  <h2 style="color:#85BE19;"><?php echo ($vo["date"]); ?></h2>
</center>
<div id="Container">
	<!-- 任务时间线 -->
  <div class="timeline_container">
    <div class="timeline">
      <div class="plus"></div>
      <!--<div class="plus2"></div>-->
    </div>
  </div>

  	<div class="left">
	<?php if(is_array($vo["pm"])): $i = 0; $__LIST__ = $vo["pm"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voPm): $mod = ($i % 2 );++$i;?><!-- 内容左边 -->	
	  <div class="item" >
		<span class='rightCorner'></span>
	    <h3> <span class="fl"><?php echo ($voPm[0]['nickname']); ?>：</span> <span class="fr">  </span></h3>
		
		<?php if(is_array($voPm)): $num1 = 0; $__LIST__ = $voPm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voPmT): $mod = ($num1 % 2 );++$num1;?><p class="con"><?php echo ($voPmT["pname"]); ?>(<?php echo ($voPmT["spend"]); ?>H)：<?php echo ($voPmT["content"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
	    <!--<h4><b>12</b></h4> -->
	  </div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
 	<!-- 内容右边 -->
  	<div class="right">  
	
	<?php if(is_array($vo["user"])): $i = 0; $__LIST__ = $vo["user"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voUser): $mod = ($i % 2 );++$i;?><div class="item">
	  	<span class='leftCorner'></span>
	    <h3> <span class="fl"><?php echo ($voUser[0]['nickname']); ?>： </span> <span class="fr"></span> </h3>
		
	    <?php if(is_array($voUser)): $num2 = 0; $__LIST__ = $voUser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voUserT): $mod = ($num2 % 2 );++$num2;?><p class="con"><?php echo ($voUserT["pname"]); ?>(<?php echo ($voUserT["spend"]); ?>H)：<?php echo ($voUserT["content"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
	  </div><?php endforeach; endif; else: echo "" ;endif; ?>
 	</div>

</div><?php endforeach; endif; else: echo "" ;endif; ?>

</body>
</html>