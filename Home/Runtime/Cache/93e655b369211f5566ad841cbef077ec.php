<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>拍拍说后台管理系统</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->

    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Headings -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Text -->
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <link href="Home/Public/css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="Home/Public/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
    <link href="Home/Public/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="Home/Public/css/icons.css" rel="stylesheet" type="text/css" />
	
    <!-- Plugin stylesheets -->

    <link href="Home/Public/plugins/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="Home/Public/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="Home/Public/plugins/jpages/jPages.css" rel="stylesheet" type="text/css" />
    <link href="Home/Public/plugins/prettify/prettify.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/inputlimiter/jquery.inputlimiter.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/ibutton/jquery.ibutton.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/color-picker/color-picker.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/select/select2.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/validate/validate.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/pretty-photo/prettyPhoto.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/smartWizzard/smart_wizard.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/elfinder/elfinder.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" rel="stylesheet" />
    <link href="Home/Public/plugins/search/tipuesearch.css" type="text/css" rel="stylesheet" />

	
    <!-- Main stylesheets -->
    <link href="Home/Public/css/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="Home/Public/images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="Home/Public/images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="Home/Public/images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="Home/Public/images/apple-touch-icon-57-precomposed.png" />
	<script type="text/javascript">
        //adding load class to body and hide page
        //document.documentElement.className += 'loadstate';
    </script>
	
	
	<style>
	.search {
   		display:none;
   	}
	</style>
   
   
<style>
.btn{
	float:right;
	margin:-4px 40px 0 0;
}
</style>
</head>
<body>
	
﻿ <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    
    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="dashboard.html">拍拍说后台管理.<span class="slogan"></span></a>
                <div class="nav-no-collapse">
                    
                  
                    <ul class="nav pull-right usernav">
						<li><a href="?s=/Personal/me"><span class="icon16  icomoon-icon-user"></span> 个人中心</a></li>
                        <li><a href="?s=/Public/logout"><span class="icon16 icomoon-icon-exit"></span> Logout</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 
  </div><!-- End #header -->
   
   
﻿<div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        <!--Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="#" class="tipR" title="Hide sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>
                    <li><a href="#" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                    <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                    <li><a href="#" title="Sales statistics" class="tip"><span class="icon24 icomoon-icon-pie-2"></span></a></li>

                </ul>
            </div><!-- End search -->            

            <div class="sidenav">

                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->

                <div class="mainnav">
                    <ul>
                       <!--  <li><a href="charts.html"><span class="icon16 icomoon-icon-stats-up"></span>Charts</a></li>-->
                        <li>
                            <a href="#"><span class="icon16 icomoon-icon-list-view-2"></span>用户管理</a>
                            <ul class="sub">
                            	<li><a href="#"><span class="icon16  icomoon-icon-arrow-right-2"></span>用户管理</a></li>
                                <li><a href="#"><span class="icon16  icomoon-icon-arrow-right-2"></span>用户添加</a></li>

                            </ul>
                        </li>

						<li>
                            <a href="#"><span class="icon16 icomoon-icon-equalizer-2"></span>公司管理</a>
							<ul class="sub">
                            	<li><a href="#"><span class="icon16 icomoon-icon-arrow-right-2"></span>公司信息</a></li>
                           		<li><a href="#"><span class="icon16 icomoon-icon-arrow-right-2"></span>设计师</a></li>
								<li><a href="#"><span class="icon16 icomoon-icon-arrow-right-2"></span>案例</a></li>
								<li><a href="#"><span class="icon16 icomoon-icon-arrow-right-2"></span>活动</a></li>
						    </ul>
                        </li>
	
                    </ul>
                </div>
            </div><!-- End sidenav -->
        </div><!-- End #sidebar -->

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>权限管理</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                    <div class="search" >

                        <form id="searchform" action="search.html">
                            <input type="text" id="tipue_search_input" class="top-search" placeholder="Search here ..." />
                            <input type="submit" id="tipue_search_button" class="search-btn" value=""/>
                        </form>
                
                    </div><!-- End search -->
                    


                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->


                    <div class="row-fluid">

                        <div class="span6">
                            
                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-equalizer-2"></span>
                                        <span>用户列表<a href="?s=/User/addUser"><button class="btn">新建</button></span>
                                    </h4>
                                    <a href="#" class="minimize">Minimize</a>
                                </div>
                                <div class="content noPad">
                                    <table class="responsive table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>序号</th>
                                            <th>员工姓名</th>
                                            <th>账号名</th>
                                            <th>描述</th>
                                            <th>是否在职</th>
                                            <th>操作</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($UserLis)): $i = 0; $__LIST__ = $UserLis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                            <td><?php echo ($i); ?></td>
                                            <td><?php echo ($vo["nickname"]); ?></td>
                                            <td><p class="text05"><?php echo ($vo["account"]); ?></p></td>
                                            <td><p class="text05">	<?php echo ($vo["remark"]); ?></p></td>
                                            <td><p class="text06">                    	
												<?php if($vo["status"] == 1 ): ?>在职										
												<?php else: ?> <span style="color:red;">离职</span><?php endif; ?>
												</p>
											</td>
											<td>
                                                <div class="controls center">
                                                	<a href="?s=/User/userDetailed/<?php echo ($vo["id"]); ?>" title="详细信息" class="tip"><span class="icon12  icomoon-icon-user-3"></span></a>
                                                    <a href="?s=/User/updateUser/<?php echo ($vo["id"]); ?>" title="编辑" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                                    
													<?php if($vo["status"] == 1 ): ?><a href="?s=/User/deleteUser/<?php echo ($vo["id"]); ?>/0/leave" title="离职" class="tip" ><span class="icon12 icomoon-icon-smiley"></span></a>								
													<?php else: ?> 
														<a href="?s=/User/deleteUser/<?php echo ($vo["id"]); ?>/1/leave" title="恢复" class="tip" ><span class="icon12 icomoon-icon-sad-2"></span></a><?php endif; ?>
													<a href="?s=/User/deleteUser/<?php echo ($vo["id"]); ?>/1/delete" title="删除" class="tip" onclick="return confirm('删除后无法恢复，确定要删除吗？') ? true : false"><span class="icon12 icomoon-icon-remove"></span></a>			
                                                </div>
                                            </td>
                                          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div><!-- End .box -->

                        </div><!-- End .span6 -->

                    </div><!-- End .row-fluid -->

                 
           
       <!-- Page end here -->
      
                <div class="modal fade hide" id="myModal1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="icon12 minia-icon-close"></span></button>
                        <h3>Chat layout</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="messages">
                            <li class="user clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar2.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Lazar</strong> says:</span>
                                        <span class="time">25 seconds ago</span>
                                    </div>
                                    <p>
                                        Time to go i call you tomorrow.
                                    </p>
                                </div>
                            </li>
                            <li class="admin clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar3.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Sugge</strong> says:</span>
                                        <span class="time">just now</span>
                                    </div>
                                    <p>
                                        OK, have a nice day.
                                    </p>
                                </div>
                            </li>

                            <li class="sendMsg">
                                <form class="form-horizontal" action="#">
                                    <textarea class="elastic" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                    <button type="submit" class="btn btn-info marginT10">Send message</button>
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>
                
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

  
  
  
   <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="Home/Public/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="Home/Public/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="Home/Public/js/jquery.mousewheel.js"></script>

    <!-- Load plugins -->
    <script type="text/javascript" src="Home/Public/plugins/qtip/jquery.qtip.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/flot/jquery.flot.grow.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/flot/jquery.flot.tooltip_0.4.4.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/flot/jquery.flot.orderBars.js"></script>

    <script type="text/javascript" src="Home/Public/plugins/sparkline/jquery.sparkline.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/knob/jquery.knob.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/prettify/prettify.js"></script>

    <script type="text/javascript" src="Home/Public/plugins/watermark/jquery.watermark.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/elastic/jquery.elastic.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/inputlimiter/jquery.inputlimiter.1.3.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/maskedinput/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/uniform/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/stepper/ui.stepper.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/color-picker/colorpicker.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/timeentry/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/select/select2.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/dualselect/jquery.dualListBox-1.3.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/tiny_mce/jquery.tinymce.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="Home/Public/plugins/search/tipuesearch.js"></script>

    <script type="text/javascript" src="Home/Public/plugins/animated-progress-bar/jquery.progressbar.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/pnotify/jquery.pnotify.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/lazy-load/jquery.lazyload.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/jpages/jPages.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/pretty-photo/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/smartWizzard/jquery.smartWizard-2.0.min.js"></script>

    <script type="text/javascript" src="Home/Public/plugins/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/ios-fix/ios-orientationchange-fix.js"></script>

    <script type="text/javascript" src="Home/Public/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/elfinder/elfinder.min.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/plupload/plupload.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/plupload/plupload.html4.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>

    <script type="text/javascript" src="Home/Public/plugins/responsive-tables/responsive-tables.js"></script>
    <script type="text/javascript" src="Home/Public/plugins/totop/jquery.ui.totop.min.js"></script> 

    <!-- Init plugins -->
    <script type="text/javascript" src="Home/Public/js/statistic.js"></script><!-- Control graphs ( chart, pies and etc) -->

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
    <script type="text/javascript" src="Home/Public/js/main.js"></script>
   	<!---time JS--->
	
<script>
  $(function() {
  	$( "#datepicker" ).datepicker();
  });
    
  $(function() {
  	$( "#datepicker1" ).datepicker();
  });  
</script>	

<script language="javascript">

//    function add(x,id) {
//        var a1 = document.getElementById(x);
//		$.post("?s=/Content/select_data","id="+id,function(data){
//			a1.innerHTML += data;
//		},"html");
//    }

    function move(obj) {
        var divs = document.getElementsByName("abc");
        var o = document.getElementsByName("btn");
        var num = 0;
        for (var i = 0; i < o.length; i++) {
            if (obj == o[i]) {
                num = i;
            }
        }
        divs[num].parentNode.removeChild(divs[num]);
    }
</script>

    </body>
</html>