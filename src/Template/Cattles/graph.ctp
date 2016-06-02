<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><link type="text/css" rel="stylesheet" href="/port-fb/javax.faces.resource/theme.css.xhtml?ln=primefaces-aristo" />
<head>
	
	<title>Bar Charts</title>

            <?php echo $this->Html->script('/jqplot/excanvas.js'); ?>
            <?php echo $this->Html->script('/jqplot/jquery.min.js'); ?>
            <?php echo $this->Html->script('/jqplot/jquery.jqplot.min.js'); ?>
            <?php echo $this->Html->script('/jqplot/plugins/jqplot.barRenderer.min.js'); ?>
            <?php echo $this->Html->script('/jqplot/plugins/jqplot.pieRenderer.min.js'); ?>
            <?php echo $this->Html->script('/jqplot/plugins/jqplot.categoryAxisRenderer.min.js'); ?>
            <?php echo $this->Html->script('/jqplot/plugins/jqplot.pointLabels.min.js'); ?>
            <?php echo $this->Html->script('/jqplot/jquery.jqplot.min.js'); ?>
            <link rel="stylesheet" type="text/css" href="/cattle_manager/jqplot/jquery.jqplot.min.css" />
                        <script  type="text/javascript">
                //<![CDATA[
$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s1 = <?php echo json_encode($s1); ?>;
        var ticks = <?php echo json_encode($tick1); ?>;
         
        plot1 = $.jqplot('chart1', [s1], {
        	title: 'Biểu đồ cân nặng đàn bò', 
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: true }
        });
     
        $('#chart1').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
                //]]>
                </script>
                
                
                                        <script  type="text/javascript">
                //<![CDATA[
$(document).ready(function(){
        $.jqplot.config.enablePlugins = true;
        var s2 = <?php echo json_encode($s2); ?>;
        var ticks = <?php echo json_encode($tick1); ?>;
         
        plot2 = $.jqplot('chart2', [s2], {
        	title: 'Biểu đồ tăng trưởng cân nặng đàn bò', 
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: true }
        });
     
        $('#chart2').bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info2').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
    });
                //]]>
                </script>
</head>
        <body>
    <div>
    <div><b>Biểu đồ cân nặng theo tháng<b></div>
    <div><span>X: Cân nặng(kg)</span></div>
    <div><span>Y: Mã số</span></div>
    <div><span>You Clicked: </span><span id="info1">Nothing yet</span></div>
    <div id="chart1" style="margin-top:20px; margin-left:20px; width:100%;max-width:1280px;margin-right:auto;margin-left:auto; height:600px;"></div>
     </div>
    <div style="margin-top:100px;">
    <div><b>Biểu đồ tăng trưởng cân nặng đàn bò lần cân gần nhất<b></div>
    <div><span>X: Cân nặng tăng lên so với lần cân trước(kg)</span></div>
    <div><span>Y: Mã số</span></div>
    <div><span>You Clicked: </span><span id="info2">Nothing yet</span></div>
    <div id="chart2" style="margin-top:20px; margin-left:20px; width:100%;max-width:1280px;margin-right:auto;margin-left:auto; height:300px;"></div>
     </div>
        </body>
</html>