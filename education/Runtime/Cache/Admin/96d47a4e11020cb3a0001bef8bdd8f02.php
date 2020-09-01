<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/education/App/Admin/Public/css/admin.css" />
<script type="text/javascript" src="/education/App/Admin/Public/js/highcharts/jquery.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/highcharts/highcharts.js"></script><script type="text/javascript" src="/education/App/Admin/Public/js/highcharts/exporting.js"></script>
  <script>


Highcharts.theme = {
	colors: ["#7cb5ec", "#f7a35c", "#90ee7e", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee",
		"#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
	chart: {
		backgroundColor: null,
		style: {
			fontFamily: "Dosis, sans-serif"
		}
	},
	title: {
		style: {
			fontSize: '16px',
			fontWeight: 'bold',
			textTransform: 'uppercase'
		}
	},
	tooltip: {
		borderWidth: 0,
		backgroundColor: 'rgba(219,219,216,0.8)',
		shadow: false
	},
	legend: {
		itemStyle: {
			fontWeight: 'bold',
			fontSize: '13px'
		}
	},
	xAxis: {
		gridLineWidth: 1,
		labels: {
			style: {
				fontSize: '12px'
			}
		}
	},
	yAxis: {
		minorTickInterval: 'auto',
		title: {
			style: {
				textTransform: 'uppercase'
			}
		},
		labels: {
			style: {
				fontSize: '12px'
			}
		}
	},
	plotOptions: {
		candlestick: {
			lineColor: '#404048'
		}
	},


	// General
	background2: '#F0F0EA'
	
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);
   $(function () {
    $('#container').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: '网站访问量统计图'
        },
        xAxis: {
            categories: [<?php echo ($dateStrArray); ?>]
        },
        yAxis: {
            title: {
                text: '数值'
            },
            labels: {
                formatter: function() {
                    return this.value +''
                }
            }
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Pv值',
            marker: {
                symbol: 'square'
            },
            data: [<?php echo ($pvArray); ?>]

        }, {
            name: 'Pr值',
            marker: {
                symbol: 'diamond'
            },
            data: [<?php echo ($prArray); ?>]
        }]
    });
});				
  </script>
</head>

<body>
<div class="main_top">
	<span id="localtime" class="localtime">
		<script type="text/javascript" src="/education/App/Admin/Public/js/time.js"></script>
	</span>
    <font> <a href="javascript:void(0);" onclick="javascript:history.back(-1);"></a> </font>
	<em class="welinfo">
		 <b><?php echo cookie('AUTH_USER_NAME');?> (<strong><?php if($m_id == 1): ?>超级管理员<?php else: echo ($group_name); endif; ?></strong>)</b>您好，欢迎访问本站。
	</em>
</div>
<div class="mainarea">
	<div class="menutop">
		<p>网站访问量统计</p>
	</div>
	<div style="padding-top:5px;width:100%;">
			<div class="menulist" id="container" style="min-width:100%;height:400px"></div>
		    <div class="clear"></div>
	</div>
	<div style="padding-top:5px;width:100%;">
  		    <div class="menulist">
            	此统计表是您的网站在过去30天内每日的访问量<br />
                <p class="pr_color"><strong>Pr</strong>：网站的访问人数<br /></p>
                <p class="pv_color"><strong>Pv</strong>：页面的访问次数</p>
            
            </div>
		    <div class="clear"></div>
	</div>
</div>


</body>
</html>