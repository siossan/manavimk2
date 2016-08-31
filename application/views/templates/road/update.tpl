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

        <form action="{$base}road/updatedata/{$id}/{$node_id}/{$degree}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

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
                            <td><input type="text" name="title" value="{$road.title}"></td>
                        </tr>
                        <tr>
                            <th>詳細</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="detail" value="{$road.detail}"></td>
                        </tr>
                        <tr>
                            <th>エンドノード</th>
                        </tr>
                        <tr>
                            <td>
                                <select name="end_node_id">
                                {foreach from=$nodes item=v}
                                    {if $v.node_id == $road.node_id}
                                        <option value="{$v.node_id}" checked>{$v.title}</option>
                                    {else}
                                        <option value="{$v.node_id}">{$v.title}</option>
                                    {/if}
                                {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>背景動画</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="file"><br>登録済みファイル名<input type="text" value="{$road.file}" readonly></td>
                        </tr>
                        <tr>
                            <th>ノード接続画像</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="image"><br>登録済みファイル名<input type="text" value="{$road.image}" readonly></td>
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

