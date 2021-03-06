{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">Sidebar</li>
                    <li><a href="#">Link</a></li>
                </ul>
            </div><!--well -->
        </div><!--/span-->

        <form action="{$base}item/updatedata/{$id}/{$road_id}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

            <div class="span9">
                <?php echo validation_errors('title'); ?>
                {*
                <div class="naviko">
                <img class="img-circle" src="{$base}common/images/naviko/01.png">
                </div><!--nabiko-->
                *}
                <h3 class="page-title">
                    <table class="form">
                        <tr>
                            <th>タイトル</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="title" value="{$item.title}"></td>
                        </tr>
                        <tr>
                            <th>詳細</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="detail" value="{$item.detail}"></td>
                        </tr>
                        <tr>
                            <th>表示開始時間</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="start" value="{$item.start_time}">
                            </td>
                        </tr>
                        <tr>
                            <th>表示終了時間</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="end" value="{$item.end_time}">
                            </td>
                        </tr>
                        <tr>
                            <th>表示位置</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="type">
                                        <option value="0" {if $item.type == 0}selected{/if}>右</option>
                                        <option value="1" {if $item.type == 1}selected{/if}>左</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>背景動画</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="file"><br>登録済みファイル名<input type="text" value="{$item.file}" readonly></td>
                        </tr>
                        <tr>
                            <th>ノード接続画像</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="viewfile"><br>登録済みファイル名<input type="text" value="{$item.viewfile}" readonly></td>
                        </tr>
                    </table>
                </h3>
                <p><input type="submit" value="決定！" class="btn btn-primary btn-large"></p>
            </div><!--/span-->

        </form>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

