{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}



<div class="container-fluid">
    <div class="row-fluid">
        <p>データの登録が完了しました</p>
    </div><!--/row-->
    <div class="btn btn-primary btn-large" onclick="location.href='{$base}node/nodelist/{$category_id}';">リストを表示する</div>
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

