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

        <form action="{$base}question/adddata/" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

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
                            <td><input type="text" name="title"></td>
                        </tr>
                        <tr>
                            <th>サブタイトル</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="abstract"></td>
                        </tr>
                        <tr>
                            <th>説明</th>
                        </tr>
                        <tr>
                            <td><textarea name="body" placeholder="説明分を入力してください"></textarea><br/>
                            </td>
                        </tr>
                    </table>
                    <select name="type">
                        <option value="1">地震</option>
                        <option value="2">石狩水害</option>
                        <option value="3">豊平水害</option>
                    </select>
                    <label><input type="checkbox" name="edit_flg" value="1">フリーモードを利用する</label>
                </h3>
                <p><input type="submit" value="決定！" class="btn btn-primary btn-large"></p>
            </div><!--/span-->

        </form>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

