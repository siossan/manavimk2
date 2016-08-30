{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}



<div class="container-fluid">
    <div class="row-fluid">
        <div class="answer_list">
            <div class="answer_comment"><div class="arw"></div>メニューを選択してください．</div>
            <table>
                <tr>
                    <th>名称</th>
                    <th>詳細</th>
                </tr>
                {foreach from=$nodes item=v}
                    <tr>
                        <td>
                            <a href="{$base}video/{$v.tilte}">{$v.title}</a>
                        </td>
                        <td>{$v.detail}</td>
                    </tr>
                {/foreach}
            </table>
            <div class="btn btn-primary btn-large" onclick="location.href='{$base}node/add';">新規作成</div>
        </div>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

