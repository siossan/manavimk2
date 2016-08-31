{include file="common/header.tpl"}
{assign var="base" value="/manavimk2/"}



<div class="container-fluid">
    <div class="row-fluid">
        <div class="answer_list">
            <div class="answer_comment"><div class="arw"></div>メニューを選択してください．</div>
            <table>
                <tr>
                    <th>名称</th>
                    <th>スタートノード</th>
                    <th>エンドノード</th>
                </tr>
                {assign var="end_flg" value=false}
                {assign var="degree" value=0}
                {foreach from=$roads item=v key=k name=loop}
                    {assign var="degree" value=$k}
                    {if $k == 3}
                        {assign var="end_flg" value=true}
                        {else}
                        {assign var="end_flg" value=false}
                    {/if}
                    <tr>
                        <td>
                            <a href="{$base}road/update/{$v.road_id}/{$node_id}/{$k}">{$v.title}</a>
                        </td>

                        <td>{$v.start_node_id}</td>
                        <td>{$v.end_node_id}</td>
                    </tr>
                {/foreach}
            </table>
            {if $end_flg == false}
            <div class="btn btn-primary btn-large" onclick="location.href='{$base}road/add/{$node_id}/{$degree}';">新規作成
                {/if}
        </div>

    </div><!--/row-->
    <hr>
</div><!--/.fluid-container-->

{include file="common/footer.tpl"}

