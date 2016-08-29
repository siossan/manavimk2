<?php /* Smarty version 3.1.27, created on 2016-08-28 23:05:37
         compiled from "C:\xampp\htdocs\manavimk2\application\views\templates\road\add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2541557c35221f28fd3_51681350%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb0ec4dcdf6e13d6e35103330e9f4aed6c7c8bc8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\manavimk2\\application\\views\\templates\\road\\add.tpl',
      1 => 1468574654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2541557c35221f28fd3_51681350',
  'variables' => 
  array (
    'base' => 0,
    'id' => 0,
    'data' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57c35222107c78_27085178',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57c35222107c78_27085178')) {
function content_57c35222107c78_27085178 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2541557c35221f28fd3_51681350';
echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php $_smarty_tpl->tpl_vars["base"] = new Smarty_Variable("/manavimk2/", null, 0);?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav" style="display:none;">
                <ul class="nav nav-list">
                    <li class="nav-header">Sidebar</li>
                    <li><a href="#">Link</a></li>
                </ul>
            </div><!--well -->
            <div class="teacher" style=""><img src="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
common/images/minavi/nami1_nomal.png"></div>
        </div><!--/span-->

        <form action="<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
map/addPoint/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="post" class="form-horizontal" role="form"
              enctype="multipart/form-data">

            <div class="span9">
                <?php echo '<?php ';?>echo validation_errors('title'); <?php echo '?>';?>
                
                <div class="t_comment_wrap" style="margin-top: 30px;">
                    <div class="t_comment">
                        <input type="text" id="teacher_say" class="t_txt" value="地図上に地域の情報を登録してみましょう。">
                    </div>
                    <div class="t_comment_arw"></div>
                </div>
                <h3 class="page-title">
                    場所
                    <small>場所を選択</small>
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

                                <?php echo '<script'; ?>
>
                                    var map;
                                    var projection3857 = new OpenLayers.Projection("EPSG:3857");
                                    var projection4326 = new OpenLayers.Projection("EPSG:4326");
                                    var deflonlat = new OpenLayers.LonLat(141.350330, 43.069671).transform(projection4326, projection3857);
                                    var markers = new OpenLayers.Layer.Markers("Markers");
                                    var size = new OpenLayers.Size(34, 37);
                                    var offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);

                                    var popup = null;
                                    var timer1 = null;
                                    $(function mapInit() {

                                        map = new OpenLayers.Map({
                                            div: "map",
                                            projection: projection3857,
                                            displayProjection: projection4326
                                        });
                                        
                                        map.addLayer(new OpenLayers.Layer.XYZ("標準地図",
                                                "http://cyberjapandata.gsi.go.jp/xyz/std/${z}/${x}/${y}.png", {
                                                    attribution: "<a href='http://portal.cyberjapan.jp/help/termsofuse.html'>国土地理院</a>",
                                                    
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
                                        var point = new OpenLayers.Pixel(-(iconsize.w / 2), -(iconsize.h / 2));

                                        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                                        x = <?php echo $_smarty_tpl->tpl_vars['v']->value['lon'];?>
;
                                        y = <?php echo $_smarty_tpl->tpl_vars['v']->value['lat'];?>
;
                                        var marker = new OpenLayers.Marker(
                                                new OpenLayers.LonLat(x, y).transform(projection4326, projection3857),
                                                <?php if ($_smarty_tpl->tpl_vars['v']->value['type_id'] == 1) {?>
                                                new OpenLayers.Icon('<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
common/ico/restaurant_1_32.png', iconsize, point))
                                        <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['type_id'] == 2) {?>
                                        new OpenLayers.Icon('<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
common/ico/tokyoeki_32.png', iconsize, point)
                                        )
                                    <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['type_id'] == 3) {?>
                                    new OpenLayers.Icon('<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
common/ico/school_1_32.png', iconsize, point)
                                    )
                                    <?php } else { ?>
                                    new OpenLayers.Icon('<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
common/ico/house9_maplab_32.png', iconsize, point)
                                    )
                                    <?php }?>
                                    marker.tag = 'この地点は<span style="color:red;"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</span>です。<br><?php echo $_smarty_tpl->tpl_vars['v']->value['detail'];?>
';
                                    marker.x = x;
                                    marker.y = y;

                                    // イベントの設定
                                    marker.events.register('mouseover', marker, onMarkerMouseOver);
                                    marker.events.register('mouseout', marker, onMarkerMouseOut);

                                    markers.addMarker(marker);
                                    <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>

                                    map.addLayer(markers);


                                    // マーカーイベント
                                    function onMarkerMouseOver(evt) {
                                        if (popup) map.removePopup(popup);
                                        popup = new OpenLayers.Popup.FramedCloud(
                                                "Popup",        // id
                                                new OpenLayers.LonLat(evt.object.x, evt.object.y).transform(projection4326, projection3857),
                                                null,           // contentSize
                                                evt.object.tag, // contentHTML
                                                null,           // anchor
                                                false,          // closeBox
                                                null);          // closeBoxCallback
                                        map.addPopup(popup);
                                    }

                                    function onMarkerMouseOut(evt) {
                                        if (popup) map.removePopup(popup);
                                        popup = null;
                                    }
                                    var checktime = function () {
                                        //時刻データを取得して変数jikanに格納する
                                        var date = new Date();
                                        var minute = date.getMinutes();
                                        if (minute == 0) {
                                            // AudioElement を作成
                                            location.href = '<?php echo $_smarty_tpl->tpl_vars['base']->value;?>
emergency/index/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
';
                                            clearInterval(timer1);
                                        }
                                    }

                                    timer1 = setInterval(checktime, 5000);


                                    })
                                    ;
                                <?php echo '</script'; ?>
>
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
                
            </div><!--/span-->

        </form>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

<?php echo $_smarty_tpl->getSubTemplate ("common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php }
}
?>