{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}

<div class="container-fluid">
    <div class="row-fluid">

        <div class="answer_comment"><div class="arw"></div>ノードを選択してください．</div>

        <form action="{$base}node/adddata/{$category_id}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

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
                            <th>背景画像</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="file"></td>
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

