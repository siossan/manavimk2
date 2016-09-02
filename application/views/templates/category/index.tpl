{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}

<div class="container-fluid">
    <div class="row-fluid">
        <div class="answer_list">
            <div class="answer_comment"><div class="arw"></div>カテゴリーを選択してください．</div>
            <table>
                <tr>
                    <th>名称</th>
                </tr>
                {foreach from=$categories item=v}
                    <tr>
                        <td>
                            <a href="{$base}node/nodeslist/{$v.category_id}">{$v.title}</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
            <br />
            <div class="btn btn-primary btn-large" onclick="location.href='{$base}node/addstart';">新規作成</div>
        </div>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

