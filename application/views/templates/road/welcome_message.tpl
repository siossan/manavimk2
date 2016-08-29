{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav" style="display:none;">
                <ul class="nav nav-list">
                    <li class="nav-header">Sidebar</li>
                    <li><a href="#">Link</a></li>
                </ul>
            </div><!--well -->
            <div class="teacher" style=""><img src="{$base}common/images/minavi/nami1_nomal.png"></div>
        </div><!--/span-->

        <form action="{$base}map/addPoint/{$id}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

            <div class="span9">
                <?php echo validation_errors('title'); ?>
                {*
                <div class="naviko">
                <img class="img-circle" src="{$base}common/images/naviko/01.png">
                </div><!--nabiko-->
                *}
                <div class="t_comment_wrap" style="margin-top: 30px;">
                    <div class="t_comment">
                        <input type="text" id="teacher_say" class="t_txt" value="地図上に地域の情報を登録してみましょう。">
                    </div>
                    <div class="t_comment_arw"></div>
                </div>
                <h3 class="page-title">
                    場所 <small>場所を選択</small>
                    <table class="form">
                        <!--                    <tr>
                                                <th>日時</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input class="sp_start_date" type="text" name="date" value="" />
                                                </td>
                                            </tr>-->
                        <tr>
                            <th>タイトル</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="title"></td>
                        </tr>
                        <tr>
                            <th>場所</th>
                        </tr>
                        <tr>
                            <td>
                                <div id="map" style="width:100%; height:500px" onload="mapInit();"></div>

                                <script>
                                    var map;
                                    var projection3857 = new OpenLayers.Projection("EPSG:3857");
                                    var projection4326 = new OpenLayers.Projection("EPSG:4326");
                                    var deflonlat = new OpenLayers.LonLat(141.350330, 43.069671).transform(projection4326, projection3857);
                                    var markers = new OpenLayers.Layer.Markers("Markers");
                                    var size = new OpenLayers.Size(34, 37);
                                    var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);

                                    var popup = null;
                                    var timer1 = null;
                                    $(function mapInit(){

                                    map = new OpenLayers.Map({
                                    div: "map",
                                    projection: projection3857,
                                    displayProjection: projection4326
                                });
                                    {literal}
                                map.addLayer(new OpenLayers.Layer.XYZ("標準地図",
                                "http://cyberjapandata.gsi.go.jp/xyz/std/${z}/${x}/${y}.png", {
                                attribution: "<a href='http://portal.cyberjapan.jp/help/termsofuse.html'>国土地理院</a>",
                                    {/literal}
                                    maxZoomLevel: 18
                                }));

                                map.setCenter(deflonlat, 10);
    
                                var centermarker = new OpenLayers.Marker(deflonlat);

                                markers.addMarker(centermarker);

                                map.events.register('mouseup', map, onClick);
                                //        
                                function onClick(evt) {
                                var lonlat = map.getLonLatFromViewPortPx(evt.xy);
                                lonlat.transform(projection3857, projection4326);
                                $("#lat").val(lonlat.lat);
                                $("#lon").val(lonlat.lon);

                                var opx = map.getLayerPxFromViewPortPx(evt.xy);
                                centermarker.map = map;
                                centermarker.moveTo(opx);
                            }
                            // マーカーの追加(皇居)  ※画像はご自分で用意してください。 
                            // アイコンサイズと描画位置情報(x,y)
                            var iconsize = new OpenLayers.Size(20, 20);
                            var point    = new OpenLayers.Pixel(-(iconsize.w/2), -(iconsize.h/2));
                            
                            {foreach from=$data item=v}
                            x = {$v.lon};
                            y = {$v.lat};
                            var marker = new OpenLayers.Marker(
                            new OpenLayers.LonLat(x, y).transform(projection4326, projection3857), 
                                        {if $v.type_id == 1}
                                new OpenLayers.Icon('{$base}common/ico/restaurant_1_32.png', iconsize, point))
                                        {elseif $v.type_id == 2}
                                new OpenLayers.Icon('{$base}common/ico/tokyoeki_32.png', iconsize, point))
                                        {elseif $v.type_id == 3}
                                new OpenLayers.Icon('{$base}common/ico/school_1_32.png', iconsize, point))
                                        {else}
                                new OpenLayers.Icon('{$base}common/ico/house9_maplab_32.png', iconsize, point))
                                        {/if}
                                marker.tag = 'この地点は<span style="color:red;">{$v.title}</span>です。<br>{$v.detail}';
                                marker.x   = x;
                                marker.y   = y;
                                        
                                // イベントの設定
                                marker.events.register('mouseover', marker, onMarkerMouseOver); 
                                marker.events.register('mouseout', marker, onMarkerMouseOut);
                                        
                                markers.addMarker(marker);
                                    {/foreach}
                                    
                            map.addLayer(markers);

            
                            // マーカーイベント
                            function onMarkerMouseOver(evt){
                            if (popup) map.removePopup(popup); 
                            popup = new OpenLayers.Popup.FramedCloud(
                            "Popup",        // id              
                            new OpenLayers.LonLat(evt.object.x, evt.object.y).transform( projection4326, projection3857),
                            null,           // contentSize      
                            evt.object.tag, // contentHTML      
                            null,           // anchor           
                            false,          // closeBox        
                            null);          // closeBoxCallback 
                            map.addPopup(popup);
                        }
  
                        function onMarkerMouseOut(evt){
                        if (popup) map.removePopup(popup);
                        popup = null;
                    }  
                    var checktime = function(){
                    //時刻データを取得して変数jikanに格納する
                    var date= new Date();
                    var minute = date.getMinutes();
                    if(minute == 0){
                    // AudioElement を作成
                    location.href = '{$base}emergency/index/{$id}';
                    clearInterval(timer1);
                }
            }
      
            timer1 = setInterval(checktime,5000);
                                
                                    
        });
                                </script>
                                緯度：<input type="text" id="lon" name="lon">
                                経度：<input type="text" id="lat" name="lat">
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <select name="type">
                                    <option value="1">食事</option>
                                    <option value="2">観光</option>
                                    <option value="3">学習</option>
                                    <option value="0">指定なし</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea placeholder="メモを入力してください" name="detail"></textarea>
                            </td>
                        </tr>
                    </table>
                    <br>
                </h3>
                <p><input type="submit" value="決定！" class="btn btn-primary btn-large"></p>
                    {*
                    <div class="row-fluid shop-items">
                    <div class="span3">
                    <dl class="blue active">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/01.png">
                    <ul>
                    <li class="heading"><h2>笑顔</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
                    <div class="span3">
                    <dl class="green">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/02.png">
                    <ul>
                    <li class="heading"><h2>ほげ</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
                    <div class="span3">
                    <dl class="purple">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/03.png">
                    <ul>
                    <li class="heading"><h2>ほげ</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
                    <div class="span3">
                    <dl class="yellow">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/04.png">
                    <ul>
                    <li class="heading"><h2>ほげ</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
                    <div class="span3" style="margin-left:0;">
                    <dl class="green">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/05.png">
                    <ul>
                    <li class="heading"><h2>ほげ</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
                    <div class="span3">
                    <dl class="purple">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/06.png">
                    <ul>
                    <li class="heading"><h2>ほげ</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
                    <div class="span3">
                    <dl class="purple">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/07.png">
                    <ul>
                    <li class="heading"><h2>ほげ</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
            
                    <div class="span3">
                    <dl class="purple">
                    <dt class="item-img">
                    <img class="img-circle" src="{$base}common/images/naviko/08.png">
                    <ul>
                    <li class="heading"><h2>ほげ</h2></li>
                    <li class="take-look">選択</li>
                    </ul>
                    </dt>
                    <dt class="price">選択中</dt>
                    </dl>
                    </div><!--span3 -->
                    </div><!--/row-->
                    *}
            </div><!--/span-->

        </form>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

