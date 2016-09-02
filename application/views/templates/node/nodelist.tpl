{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}



<div class="container-fluid">
    <div class="row-fluid">
        <div class="answer_list">
            <div class="answer_comment"><div class="arw"></div>ノードを選択してください．</div>
            <table>
                <tr>
                    <th>名称</th>
                    <th width="30%">編集</th>
                </tr>
                {foreach from=$nodes item=v}
                    {assign var="categoryId" value={$v.category_id}}
                    <tr>
                        <td>
                            <a href="{$base}road/roadlist/{$v.node_id}">{$v.title}</a>
                        </td>
                        <td><a class="btn btn-primary btn-large" href="{$base}node/update/{$v.node_id}" style="text-align: center;">編集</a></td>
                    </tr>
                {/foreach}
            </table>
            <div class="btn btn-primary btn-large" onclick="location.href='{$base}node/add/{$categoryId}';">新規作成</div>
        </div>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

