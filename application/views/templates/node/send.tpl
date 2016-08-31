{
	"id": "{$node.node_id}",
	"title": "{$node.tile}",
	"type": "{$node.type}",
	"url": "{$node.file}",
	"lines": [
         {if $road_flg == true}
            {foreach from=$roads item=v name=loop}
                {if $smarty.foreach.loop.last}
		            {
			            "id": "{$v.road_id}",
			            "degree": {$v.degree},
			            "image": "www.snowwhite.hokkaido.jp/manavimk2/common/files/{$v.image}"
		            }
		        {else}
		            {
			            "id": "{$v.road_id}",
			            "degree": {$v.degree},
			            "image": "www.snowwhite.hokkaido.jp/manavimk2/common/files/{$v.image}"
		            },
		        {/if}
            {/foreach}
         {/if}
	]
}