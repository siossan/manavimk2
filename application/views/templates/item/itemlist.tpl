{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}



<div class="container-fluid">
    <div class="row-fluid">
        <div class="answer_list">
            <div class="answer_comment"><div class="arw"></div>メニューを選択してください．</div>
            <table>
                <tr>
                    <th>名称</th>
                </tr>
                {foreach from=$items item=v key=k name=loop}
                    <tr>
                        <td>
                            <a href="{$base}item/update/{$v.item_id}/{$road_id}/{$k}">{$v.title}</a>
                        </td>
                    </tr>
                {/foreach}
            </table>
            {if $end_flg == false}
            <div class="btn btn-primary btn-large" onclick="location.href='{$base}item/add/{$node_id}/{$degree}';">新規作成
                {/if}
        </div>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

