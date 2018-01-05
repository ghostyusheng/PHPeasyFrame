<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <title>buoyage_sys</title>
	<style type="text/css">
  body, html,#map_demo, #tab, #mapfrm {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
  #menu{height:100%;overflow-y:auto}
  td{font-size:14px}
  h4{margin:0;}
  #map_demo1,#map_demo2{height: 50%}
  </style>
  <script type="text/javascript" src="../baidumapv2/baidumap_offline_v2_load.js"></script>
  <script type="text/javascript" src="jquery.js"></script>
  <script type="text/javascript" src="layer/layer.js"></script>
  <link rel="stylesheet" type="text/css" href="../baidumapv2/css/baidu_map_v2.css"/>
</head>
<body>
<div id="map_demo">1</div>
</body>
</html>
<script type="text/javascript">  
	var map = new BMap.Map("map_demo");
	map.centerAndZoom(new BMap.Point(105.302075,30.102696), 8);  //初始化地图,设置城市和地图级别。
	var pointA = new BMap.Point(104.074055,30.680869);  // 成都
	var pointB = new BMap.Point(106.566889,29.57739);  // 创建点坐标B--重庆
	
	var polyline = new BMap.Polyline([pointA,pointB], {strokeColor:"blue", strokeWeight:6, strokeOpacity:0.5});  //定义折线
	map.addOverlay(polyline);     //添加折线到地图上
  
	//layer.msg('从成都到重庆的距离是：'+(map.getDistance(pointA,pointB)).toFixed(2)+' 米。');  //获取两点距离,保留小数点后两位
</script>
